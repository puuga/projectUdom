<?php // view_people_v2.php ?>

<?php include 'db_connect.php'; ?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="css/main_style.css">

    <title>Title of the document</title>

    <script src="script/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">


      function viewPeople(name) {
        window.location = "view_people_detail.php?firstname="+name;
      }

    </script>
  </head>

  <body>
    <div class="container" style="width:100%">
      <div class="container_header">
        ระบบข้อมูล สำหรับงานมุทิตาจิตครูอุดม
      </div>
      <div class="container_content">
        <?php
          // sql
          $sql = "SELECT distinct firstname FROM udom_project.people where firstname != '';";
          $result = mysqli_query($conn, $sql);
          $rowcount=mysqli_num_rows($result);
          //echo "count = ".$rowcount;
          //$result = mysqli_query($conn, $sql);
        ?>
      </div>
      <div class="container_content">
        <table border="1">
          <thead>
            <tr>
              <th>#</th>
              <th>ชื่อ</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $i = 0;

              // sql
              $sql = "SELECT distinct firstname FROM udom_project.people where firstname != '';";

              //$result = mysqli_query($conn, $sql);
              if ($result = mysqli_query($conn, $sql)) {
                while($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  echo "<td>".++$i."</td>";
                  echo "<td onclick='viewPeople(".$row['firstname'].")'>".$row['firstname']."</td>";
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
