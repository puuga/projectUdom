<?php // form_input.php ?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="css/main_style.css">

    <title>Title of the document</title>

    <script src="script/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">

      // preview selected image after choose file
      function previewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imageToUpload").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("imageInfo").src = oFREvent.target.result;
        };
      };

    </script>
  </head>

  <body>
    <div class="container">
      <div class="container_header">
        ระบบบันทึกข้อมูล สำหรับงานมุทิตาจิตครูอุดม
      </div>
      <div class="container_content">
        <form id="form1" action="form_input_process.php" method="post" enctype="multipart/form-data">
          <div class="obj_content">
            ชื่อ:
            <input type="text" name="firstname" />
          </div>

          <div class="obj_content">
            นามสกุล:
            <input type="text" name="lastname" />
          </div>

          <div class="obj_content">
            ชื่อเล่น:
            <input type="text" name="nickname" />
          </div>
          <div class="obj_content">
            ชื่อเดิม:
            <input type="text" name="oldFirstname" />
          </div>
          <div class="obj_content">
            นามสกุลเดิม:
            <input type="text" name="oldLastname" />
          </div>
          <div class="obj_content">
            การศึกษา: <input list="educations" name="education">
            <datalist id="educations">
              <option value="มัธยม" />
              <option value="ปริญญาตรี" />
              <option value="ปริญญาโท" />
              <option value="ปริญญาเอก" />
            </datalist>
          </div>

          <div class="obj_content">
            อาชีพ:
            <input type="text" name="occupation" />
            ตำแหน่ง:
            <input type="text" name="title" /> <br/>
            ลักษณะงาน:
            <input type="text" name="occupation_desc" />
            สถานที่ทำงาน:
            <input type="text" name="occupation_address" />
          </div>

          <div class="obj_content">
            เบอร์โทรศัพท์: <input type="tel" name="phone" />
          </div>

          <div class="obj_content">
            ที่อยู่:<br/>
            <textarea rows="4" cols="50" name="address"></textarea>
          </div>

          <div class="obj_content">
            e-mail:
            <input type="email" name="email" />
          </div>

          <div class="obj_content">
            วันเกิด:
            <input type="date" name="birthday" />
          </div>

          <div class="obj_content">
            ข้อความถึงอาจารย์อุดม:<br/>
            <textarea rows="4" cols="50" name="sms"></textarea>
          </div>

          <div class="obj_content">
            <label for="imageToUpload">
              รูปปัจจุบัน
            </label><br />
            <input type="file" name="imagesToUpload" id="imageToUpload" accept="image/*" onchange="javascript:previewImage();" />
            <br/>
            <img id="imageInfo" style="width:400px;"/>
          </div>

          <input id="btnSubmit" type="submit" value="Submit"/>
          <input type="reset" value="Reset"/>
        </form>
        <script type="text/javascript">
          // disable submit button
          // btnSubmit
          $( "#form1" ).submit(function( event ) {
            //alert( "Handler for .submit() called." );
            //event.preventDefault();
            $( "#btnSubmit" ).attr("disabled", "disabled");
            //event.preventDefault();
          });
        </script>
      </div>
      <div class="container_footer">
        develop by Siwawes Wongcharoen
      </div>
    </div>
  </body>

</html>
