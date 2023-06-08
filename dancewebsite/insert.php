<?php
$conn = mysqli_connect("localhost","root","","test"); //database connection

if($conn){
    echo "connected";
}else{
    echo "error in connection".mysqli_connect_error($conn);
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ID = $_REQUEST['id']; 
    $name = $_REQUEST['name']; 
    $email = $_REQUEST['email']; 
    $mobile = $_REQUEST['mobile']; 
    
    
    $sqlquery = "INSERT INTO `user`(`id`, `name`, `email`, `mobile`) VALUES ('$ID','$name','$email','$mobile')";
    $result = mysqli_query($conn,$sqlquery);
    
    if($result){
        echo "<br>data inserted";
    }else{
        echo "erro";
    }
}

?>
