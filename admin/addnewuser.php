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

?>






<?php
if(isset($_REQUEST['newStuSubmitBtn'])){
    // Checking for Empty Fields
    if(($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") 
    || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_occ'] == "")){
     // msg displayed if required field missing
     $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill All Fileds </div>';
    } else {
     // Assigning User Values to Variable
     $stu_name = $_REQUEST['stu_name'];
     $stu_email = $_REQUEST['stu_email'];
     $stu_pass = $_REQUEST['stu_pass'];
     $stu_occ = $_REQUEST['stu_occ'];
  
      $sql = "INSERT INTO user_t (name, email, password, occ) 
      VALUES ('$stu_name', '$stu_email', '$stu_pass', '$stu_occ')";
      if($conn->query($sql) == TRUE){
       // below msg display on form submit success
       $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" > Student Added Successfully </div>';
      } else {
       // below msg display on form submit failed
       $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"> Unable to Add Student </div>';
      }
    }
    }
?>

<div class="col-sm-6 mt-5  mx-3 ">
  <h3 class="text-center">Add New User</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="stu_name">Name</label>
      <input type="text" class="form-control" id="stu_name" name="stu_name">
    </div>
    <div class="form-group">
      <label for="stu_email">Email</label>
      <input type="text" class="form-control" id="stu_email" name="stu_email">
    </div>
    <div class="form-group">
      <label for="stu_pass">Password</label>
      <input type="text" class="form-control" id="stu_pass" name="stu_pass">
    </div>
    <div class="form-group">
      <label for="stu_occ">Occupation</label>
      <input type="text" class="form-control" id="stu_occ" name="stu_occ">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-danger" id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>
      <a href="students.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
</div> <!-- div Row close from header -->

</div>





<?php
include('../adminmain/footer.php'); 
?>