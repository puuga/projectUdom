<?php //db_connect.php ?>

<?php
  $db_host = "localhost";
  $db_username = "udom_project";
  $db_password = "123456";
  $db_name = "udom_project";

  // Create connection
  $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } else {
    //echo "Connected to MySQL<br/>";
  }
  
?>
