<?php // view_people_detail.php ?>

<?php include 'db_connect.php'; ?>

<?php

function endsWith($haystack, $needle) {
  if ($needle === "" ) {
    return true;
  }
  if (strcasecmp(substr($haystack, -strlen($needle)), $needle) == 0) {
    return true;
  }
  return false;
}

?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="css/main_style.css">

    <title>Title of the document</title>

    <script src="script/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">


    </script>
  </head>

  <body>
    <div class="container" style="width:100%">
      <div class="container_header">
        ระบบข้อมูล สำหรับงานมุทิตาจิตครูอุดม
      </div>
      <div class="container_content">
      </div>
      <div class="container_content">
        <table border="1">
          <thead>
            <tr>
              <th>&nbsp;</th>
              <th>content</th>
            </tr>
          </thead>
          <tbody>
            <?php

              $data = array();

              // sql
              $sql = "SELECT * FROM udom_project.people where firstname like '".$_GET["firstname"]."' and lastname like '".$_GET["lastname"]."';";

              //$result = mysqli_query($conn, $sql);
              if ($result = mysqli_query($conn, $sql)) {
                while($row = mysqli_fetch_array($result)) {
                  $data["image_path"] = endsWith($data["image_path"],".jpg") ? $data["image_path"] : $row['image_path'];
                  $data["firstname"] = $row['firstname'] == '' ? $data["firstname"] : $row['firstname'];
                  $data["lastname"] = $row['lastname'] == '' ? $data["lastname"] : $row['lastname'];
                  $data["nickname"] = $row['nickname'] == '' ? $data["nickname"] : $row['nickname'];
                  $data["oldFirstname"] = $row['oldFirstname'] == '' ? $data["oldFirstname"] : $row['oldFirstname'];
                  $data["oldLastname"] = $row['oldLastname'] == '' ? $data["oldLastname"] : $row['oldLastname'];
                  $data["generation"] = $row['generation'] == '' ? $data["generation"] : $row['generation'];
                  $data["education"] = $row['education'] == '' ? $data["education"] : $row['education'];
                  $data["occupation"] = $row['occupation'] == '' ? $data["occupation"] : $row['occupation'];
                  $data["title"] = $row['title'] == '' ? $data["title"] : $row['title'];
                  $data["occupation_desc"] = $row['occupation_desc'] == '' ? $data["occupation_desc"] : $row['occupation_desc'];
                  $data["occupation_address"] = $row['occupation_address'] == '' ? $data["occupation_address"] : $row['occupation_address'];
                  $data["phone"] = $row['phone'] == '' ? $data["phone"] : $row['phone'];
                  $data["address"] = $row['address'] == '' ? $data["address"] : $row['address'];
                  $data["email"] = $row['email'] == '' ? $data["email"] : $row['email'];
                  $data["birthday"] = $row['birthday'] == '0000-00-00' ? $data["birthday"] : $row['birthday'];
                  $data["sms"] = $row['sms'] == '' ? $data["sms"] : $row['sms'];
                }
              } else {
                die('Error: ' . mysqli_error($conn));
              }

              mysqli_close($conn);
            ?>
            <tr>
              <td>รูป</td>
              <td><?php echo "<a href='".$data['image_path']."'><img src='".$data['image_path']."' height='200px'></a>"; ?></td>
            </tr>
            <tr>
              <td>ชื่อ</td>
              <td><?php echo $data["firstname"]; ?></td>
            </tr>
            <tr>
              <td>นามสกุล</td>
              <td><?php echo $data["lastname"]; ?></td>
            </tr>
            <tr>
              <td>ชื่อเล่น</td>
              <td><?php echo $data["nickname"]; ?></td>
            </tr>
            <tr>
              <td>ชื่อเดิม</td>
              <td><?php echo $data["oldFirstname"]; ?></td>
            </tr>
            <tr>
              <td>นามสกุลเดิม</td>
              <td><?php echo $data["oldLastname"]; ?></td>
            </tr>
            <tr>
              <td>รุ่นจบปี</td>
              <td><?php echo $data["generation"]; ?></td>
            </tr>
            <tr>
              <td>การศึกษา</td>
              <td><?php echo $data["education"]; ?></td>
            </tr>
            <tr>
              <td>อาชีพ</td>
              <td><?php echo $data["occupation"]; ?></td>
            </tr>
            <tr>
              <td>ตำแหน่ง</td>
              <td><?php echo $data["title"]; ?></td>
            </tr>
            <tr>
              <td>ลักษณะงาน</td>
              <td><?php echo $data["occupation_desc"]; ?></td>
            </tr>
            <tr>
              <td>สถานที่ทำงาน</td>
              <td><?php echo $data["occupation_address"]; ?></td>
            </tr>
            <tr>
              <td>เบอร์โทรศัพท์</td>
              <td><?php echo $data["phone"]; ?></td>
            </tr>
            <tr>
              <td>ที่อยู่</td>
              <td><?php echo $data["address"]; ?></td>
            </tr>
            <tr>
              <td>e-mail</td>
              <td><?php echo $data["email"]; ?></td>
            </tr>
            <tr>
              <td>วันเกิด</td>
              <td><?php echo $data["birthday"]; ?></td>
            </tr>
            <tr>
              <td>ข้อความถึงอาจารย์อุดม</td>
              <td><?php echo $data["sms"]; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="container_footer">
        develop by Siwawes Wongcharoen
      </div>
    </div>
  </body>

</html>
