<?php
  include "../Connection/connect.php";

  if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM book WHERE id = '$id'";
    $connect -> query($sql);
  }

  header("location: ../book.php");
  exit;
?>