<?php
if(!isset($_SESSION)){ 
    session_start(); 
  }
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "final";

// Create Connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check Connection
if($conn->connect_error) {
 die("connection failed");
} 
// else {
//  echo"connected";
// }
?>

<?php
include('./userInclude/header.php'); 
if(isset($_SESSION['is_login'])){
    $userEmail = $_SESSION['LogEmail'];
   } 
   else {
    echo "<script> location.href='../index.php'; </script>";
   }

   $sql = "SELECT * FROM user_t WHERE email='$userEmail'";
 $result = $conn->query($sql);
 if($result->num_rows == 1){
 $row = $result->fetch_assoc();
 $stuId = $row["id"];
 $stuName = $row["name"]; 
 $stuOcc = $row["occ"];
 $stuImg = $row["image"];

}


if(isset($_REQUEST['updateStuNameBtn'])){
    if(($_REQUEST['stuName'] == "")){
     // msg displayed if required field missing
     $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" > Fill All Fileds </div>';
    } else {
     $stuName = $_REQUEST["stuName"];
     $stuOcc = $_REQUEST["stuOcc"];
     $stu_image = $_FILES['stuImg']['name']; 
     $stu_image_temp = $_FILES['stuImg']['tmp_name'];
     $img_folder = '../image/stu/'. $stu_image; 
     move_uploaded_file($stu_image_temp, $img_folder);
     $sql = "UPDATE user_t SET name = '$stuName', occ = '$stuOcc', image = '$img_folder' WHERE 
     email = '$userEmail'";
     if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" > Updated Successfully </div>';
     } else {
     // below msg display on form submit failed
     $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" > Unable to Update </div>';
        }
      }
   }
?>



<div class="col-sm-6 mt-5">
  <form class="mx-5" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="stuId">Student ID</label>
      <input type="text" class="form-control" id="stuId" name="stuId" 
      value=" <?php if(isset($stuId)) {echo $stuId;} ?>" readonly>
    </div>
    <div class="form-group">
      <label for="stuEmail">Email</label>
      <input type="email" class="form-control" id="stuEmail" value=" <?php echo $userEmail ?>" readonly>
    </div>
    <div class="form-group">
      <label for="stuName">Name</label>
      <input type="text" class="form-control" id="stuName" name="stuName" 
      value=" <?php if(isset($stuName)) {echo $stuName;} ?>">
    </div>
    <div class="form-group">
      <!-- Student doesnt mean school student it also means learner -->
      <label for="stuOcc">Occupation</label>
      <input type="text" class="form-control" id="stuOcc" name="stuOcc"
       value=" <?php if(isset($stuOcc)) {echo $stuOcc;} ?>">
    </div>
    <div class="form-group">
      <label for="stuImg">Upload Image</label>
      <input type="file" class="form-control-file" id="stuImg" name="stuImg">
    </div>
    <button type="submit" class="btn btn-primary" name="updateStuNameBtn">Update</button>
    <?php if(isset($passmsg)) {echo $passmsg; } ?>
  </form>
 </div>

 </div> <!-- Close Row Div from header file -->

<?php
include('./userInclude/footer.php'); 
?>