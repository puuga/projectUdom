<?php // form_input_process.php ?>

<?php

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$nickname = $_POST["nickname"];
$oldFirstname = $_POST["oldFirstname"];
$oldLastname = $_POST["oldLastname"];
$education = $_POST["education"];
$occupation = $_POST["occupation"];
$title = $_POST["title"];
$occupation_desc = $_POST["occupation_desc"];
$occupation_address = $_POST["occupation_address"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$email = $_POST["email"];
$birthday = $_POST["birthday"];
$sms = $_POST["sms"];


// upload file
// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.
if (isset($_FILES['imagesToUpload'])) {
  $uploaddir = 'upload_image/';
  $uploadfile = $uploaddir . date("l_d_m_Y_H_i_s") . "_". basename($_FILES['imagesToUpload']['name']);

  //echo '<pre>';
  //echo date("l_d_m_Y_H_i_s") . "<br>";

  if (move_uploaded_file($_FILES['imagesToUpload']['tmp_name'], $uploadfile)) {
      //echo "File is valid, and was successfully uploaded.\n";
  } else {
      //echo "Possible file upload attack!\n";
  }
}


//echo 'Here is some more debugging info:<br/>';

//print_r($_FILES);

//print "</pre>";
/*
echo "firstname: ".$firstname."<br/>";
echo "lastname: ".$lastname."<br/>";
echo "nickname: ".$nickname."<br/>";
echo "oldFirstname: ".$oldFirstname."<br/>";
echo "oldLastname: ".$oldLastname."<br/>";
echo "education: ".$education."<br/>";
echo "occupation: ".$occupation."<br/>";
echo "title: ".$title."<br/>";
echo "phone: ".$phone."<br/>";
echo "address: ".$address."<br/>";
echo "email: ".$email."<br/>";
echo "birthday: ".$birthday."<br/>";
echo "sms: ".$sms."<br/>";
echo "image: <img src='$uploadfile' width='400px'><br/>";
*/

?>

<?php

include 'db_connect.php';

// sql
$sql = "insert into people (firstname, lastname, nickname, oldFirstname, oldLastname, education, occupation, title, occupation_desc, occupation_address, phone, address, email, birthday, sms, image_path) ";
$sql .= "values ('$firstname', '$lastname', '$nickname', '$oldFirstname', '$oldLastname', '$education', '$occupation', '$title', '$occupation_desc', '$occupation_address', '$phone', '$address', '$email', '$birthday', '$sms', '$uploadfile')";

if (!mysqli_query($conn, $sql)) {
  die('Error: ' . mysqli_error($conn));
} else {
  echo "1 record added<br/>";
}

mysqli_close($conn);

?>
<a href="form_input.php">back</a>
