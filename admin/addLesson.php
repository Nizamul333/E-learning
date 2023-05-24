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
include('../adminmain/header.php');
if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
   } 
   else {
    echo "<script> location.href='../index.php'; </script>";
   }


   if(isset($_REQUEST['lessonSubmitBtn'])){
    // Checking for Empty Fields
    if(($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "")){
     // msg displayed if required field missing
     $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" > Fill All Fileds </div>';
    } else {
     // Assigning User Values to Variable
     $lesson_name = $_REQUEST['lesson_name'];
     $lesson_desc = $_REQUEST['lesson_desc'];
     $course_id = $_REQUEST['course_id'];
     $course_name = $_REQUEST['course_name'];
     $lesson_link = $_FILES['lesson_link']['name']; 
     $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
     $link_folder = '../lessonvid/'.$lesson_link; 
     move_uploaded_file($lesson_link_temp, $link_folder);
      $sql = "INSERT INTO lesson (lesson_name, lesson_desc, lesson_link,course_id) 
      VALUES ('$lesson_name', '$lesson_desc', '$link_folder',$course_id)";
      if($conn->query($sql) == TRUE){
       // below msg display on form submit success
       $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" > Lesson Added Successfully </div>';
      } else {
       // below msg display on form submit failed
       $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"> Unable to Add Lesson </div>';
      }
    }
    }
?>




<div class="col-sm-6 mt-5  mx-3 ">
  <h3 class="text-center">Add New Lesson</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="course_id">Course ID</label>
      <input type="text" class="form-control" id="course_id" name="course_id"  >
    </div>
    <div class="form-group">
      <label for="course_name">Course Name</label>
      <input type="text" class="form-control" id="course_name" name="course_name">
    </div>
    <div class="form-group">
      <label for="lesson_name">Lesson Name</label>
      <input type="text" class="form-control" id="lesson_name" name="lesson_name">
    </div>
    <div class="form-group">
      <label for="lesson_desc">Lesson Description</label>
      <textarea class="form-control" id="lesson_desc" name="lesson_desc" row=2></textarea>
    </div>
    <div class="form-group">
      <label for="lesson_link">Lesson Video Link</label>
      <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
      <a href="lessons.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>



<?php
include('../adminmain/footer.php'); 
?>