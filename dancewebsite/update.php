<?php
include 'dbconnect.php';
// Step 1: Check if 'updateid' is set and numeric
if (isset($_GET["updateid"]) && is_numeric($_GET["updateid"])) {
    $id = $_GET["updateid"]; 
    // Step 2: Fetch the data of the specific record
    $sql = "SELECT * FROM `user` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    // Step 3: Display the current values in the form fields
    if (!$row) {
        echo "Record not found.";
        exit;
    }
    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    // Step 4: Process the form submission and update data
    if (isset($_POST['submit'])) {
        $name = $_POST['name']; 
        $email = $_POST['email']; 
        $mobile = $_POST['mobile'];  
        
        $sql = "UPDATE `user` SET `name`='$name', `email`='$email', `mobile`='$mobile' WHERE id=$id";
    
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            echo "Successfully updated";
            header('Location: index.php');
            exit; // Ensure script execution stops after the redirection
        } else {
            echo "Error updating data.";
        }
    }
} else {
    echo "Invalid or missing 'updateid' parameter.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update-date</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
<body>
    <div class="container p-5">
        <h4 class="text-center">Update Data</h4>
        <div class="container border shadow form-body w-50 p-5">
            <form method="post" >
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" value="<?php echo $name ?>" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" value="<?php echo $email ?>" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mobile</label>
                    <input type="number" class="form-control" value="<?php echo $mobile ?>" name="mobile" id="exampleInputPassword1">
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
