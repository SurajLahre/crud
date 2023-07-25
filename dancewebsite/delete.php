<?php
include "dbconnect.php";
if (isset($_GET['del_id'])){
  $uid=$_GET['del_id'];

  $sql ="DELETE FROM `user` WHERE id=$uid";
  $result =mysqli_query($conn, $sql);
  if($result){
    Header('location:index.php');
  }else{
    die(mysqli_connect_error($conn));
  }
}

?>
