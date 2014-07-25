<?php // form_input.php ?>

<?php include 'db_connect.php'; ?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="css/main_style.css">

    <title>Title of the document</title>

    <script src="script/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">


      function editGeneration(id) {
        var temp = prompt("Please enter generation", "");

        if (temp!=null || temp!="") {
          // Send the data using post
          var posting = $.post( "edit_generation.php",
            { id:id, generation: temp },
            function( data ) {
              console.log( data.result );
              if(data.result=="success") {
                location.reload();
              }
            },
            "json"
          );
        }

      }

    </script>
  </head>

  <body>
    <div class="container" style="width:100%">
      <div class="container_header">
        ระบบบันทึกข้อมูล สำหรับงานมุทิตาจิตครูอุดม
      </div>
      <div class="container_content">
        <?php
          // sql
          $sql = "select distinct firstname from people";
          $result = mysqli_query($conn, $sql);
          $rowcount=mysqli_num_rows($result);
          echo "count = ".$rowcount;
          //$result = mysqli_query($conn, $sql);
        ?>
      </div>
      <div class="container_content">
        <table border="1">
          <thead>
            <tr>
              <th>รูป</th>
              <th>ชื่อ</th>
              <th>นามสกุล</th>
              <th>ชื่อเล่น</th>
              <th>ชื่อเดิม</th>
              <th>นามสกุลเดิม</th>
              <th>รุ่นจบปี</th>
              <th>การศึกษา</th>
              <th>อาชีพ</th>
              <th>ตำแหน่ง</th>
              <th>ลักษณะงาน</th>
              <th>สถานที่ทำงาน</th>
              <th>เบอร์โทรศัพท์</th>
              <th>ที่อยู่</th>
              <th>e-mail</th>
              <th>วันเกิด</th>
              <th>ข้อความถึงอาจารย์อุดม</th>
            </tr>
          </thead>
          <tbody>
            <?php

              // sql
              $sql = "select * from people";

              //$result = mysqli_query($conn, $sql);
              if ($result = mysqli_query($conn, $sql)) {
                while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  echo "<td><a href='" . $row['image_path'] . "'><img src='" . $row['image_path'] . "' height='100px'></a></td>";
                  echo "<td>" . $row['firstname'] . "</td>";
                  echo "<td>" . $row['lastname'] . "</td>";
                  echo "<td>" . $row['nickname'] . "</td>";
                  echo "<td>" . $row['oldFirstname'] . "</td>";
                  echo "<td>" . $row['oldLastname'] . "</td>";
                  echo "<td onclick='editGeneration(".$row['id'].")'>" . $row['generation'] . "</td>";
                  echo "<td>" . $row['education'] . "</td>";
                  echo "<td>" . $row['occupation'] . "</td>";
                  echo "<td>" . $row['title'] . "</td>";
                  echo "<td>" . $row['occupation_desc'] . "</td>";
                  echo "<td>" . $row['occupation_address'] . "</td>";
                  echo "<td>" . $row['phone'] . "</td>";
                  echo "<td>" . $row['address'] . "</td>";
                  echo "<td>" . $row['email'] . "</td>";
                  echo "<td>" . $row['birthday'] . "</td>";
                  echo "<td>" . $row['sms'] . "</td>";
                  echo "</tr>";
                }
              } else {
                die('Error: ' . mysqli_error($conn));
              }

              mysqli_close($conn);
            ?>
          </tbody>
        </table>
      </div>
      <div class="container_footer">
        develop by Siwawes Wongcharoen
      </div>
    </div>
  </body>

</html>
