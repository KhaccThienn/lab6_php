<?php
  include "../Connection/connect.php";

  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE author FROM author WHERE id = $id";
    $connect -> query($sql);
  }
  
  header("location: ../author.php");
  exit;
?>