<?php // edit_generation.php ?>

<?php
  header('Content-Type: application/json');

  $id = $_POST['id'];
  $gen = $_POST['generation'];

  include 'db_connect.php';

  // sql
  $sql = "update people set generation='$gen' where id=$id";


  if (!mysqli_query($conn,$sql)) {
    die('Error: ' . mysqli_error($conn));
    echo json_encode(array("result"=>"Error: ".mysqli_error($conn)));
  } else {
    echo json_encode(array("result"=>"success"));
  }

  mysqli_close($conn);
?>
