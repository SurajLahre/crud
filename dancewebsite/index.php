<?php
$conn = mysqli_connect("localhost","root","","test"); //database connection
if(!$conn){
    die("error in connection:".mysqli_connect_error($conn));
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ID = $_REQUEST['id']; 
    $name = $_REQUEST['name']; 
    $email = $_REQUEST['email']; 
    $mobile = $_REQUEST['mobile'];     
    
    $sqlquery = "INSERT INTO `user`(`id`, `name`, `email`, `mobile`) VALUES ('$ID','$name','$email','$mobile')";
    $result = mysqli_query($conn,$sqlquery);
    
    if($result){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> Data inserted success !</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        
    }else{
        echo "erro";
    }
}
?>
<!-- for showing table detail -->
<?php 
 $showq = "SELECT * FROM `user`";
 $result = mysqli_query($conn,$showq);  
 ?>
<?php
include "dbconnect.php";
if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $sql =mysqli_query($conn, "DELETE FROM `user` WHERE `id`= $id");
  if($sql){
    echo "delete succes !";
  }else{
    echo "error";
  }
}
?>
<!-- Button trigger modal -->
<!-- Modal START -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Value</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="index.php">
          <div class="mb-3">
            <input type="number" name="id" required class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" value="hello " name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
            
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
        
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">mobile</label>
        <input type="number" class="form-control" name="mobile" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary">update</button>
    </form>
  </div>  
</div>
  </div>
</div>
<!-- Modal END -->
<!doctype html>
<html lang="en">  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary position-sticky top-0">
      <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>

        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-warning" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <h1 class="text-center">Registration form</h1>
  <div class="container p-5 my-5 bg-warning"> <!-- form star's here -->
    <form method="POST" action="index.php">
      <div class="mb-3">
        <input type="number" placeholder="id" name="id" required class="form-control" id="exampleInputEmail1"
          aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">mobile</label>
        <input type="number" class="form-control" name="mobile" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <div class="container p-5 bg-secondary">
    <table class="table text-light">
      <thead>
        <tr class="bg-white text-dark">
          <th scope="col">ID</th>
          <th scope="col">NAME</th>
          <th scope="col">EMAIL</th>
          <th scope="col">MOBILE</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <?php while($row = mysqli_fetch_assoc($result)) {?>

          <td><?php echo $row["id"] ?></td>
          <td><?php echo $row["name"]?></td>
          <td><?php echo $row["email"]?></td>
          <td><?php echo $row["mobile"]?></td>
          <td><button type="button" class="btn btn-primary edit" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Update
            </button>
            <button class="btn btn-danger"><a href="index.php">delete</a></button>
          </td>

        </tr>
        <?php } ?>

      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script>
    fuction update(){
      edits = document.getElementsByClassName('edit');
      Arrey.from(edits).foreach((element)=>{
        element.addEventListenar("click",(e)=>{  
          console.log('edit',);
          tr= e.target.parentNode.parentNode;
          title=tr.getElementByTagName("td")[0].innerText;
          description= tr.getElementByTagName("td")[1].innerText;
          console.log(title,description);
          titleEdit.value = title;
          description.value = description;
          $('#editmodal').modal('toggle'); 
        })
      })
    }

  </script>
</body>

</html>