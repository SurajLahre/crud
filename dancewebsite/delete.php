<?php
include "dbconnect.php";

if(isset($_GET['id']))
{
  $id = senitize_input($_GET['id']);

  // parse sql
  $res =mysqli_query($conn, "DELETE FROM `user` WHERE `id`= $id");

  $stmt = $conn->prepare($res);
  if($stmt){
    $stmt->bind_param('i',$id);
    // echo "succesully delted !";
$stmt->execute();
$stmt->close();
  }
  else{

    echo "error faild to prepare statement";

  }
}
$conn->close();
?>