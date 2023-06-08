<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname ="test";//database name not table name

$conn = mysqli_connect($servername,$username,$pass,$dbname);


if(!$conn){    
    die("Connection failed: " . mysqli_connect_error($conn));
}

?>

