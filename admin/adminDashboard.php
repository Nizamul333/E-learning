<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
include('../adminmain/header.php'); 
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
if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } 
 else {
  echo "<script> location.href='../index.php'; </script>";
 }

 $sql = "SELECT * FROM course";
$result = $conn->query($sql);
$totalcourse = $result->num_rows;

 $sql = "SELECT * FROM user_t";
 $result = $conn->query($sql);
 $totaluser= $result->num_rows;

 $sql = "SELECT * FROM orders";
 $result = $conn->query($sql);
 $totalsold = $result->num_rows;
?>



<div class="col-sm-9 mt-5">
    <div class="row mx-5 text-center">
      <div class="col-md-4 mt-5">
        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
          <div class="card-header">Courses</div>
          <div class="card-body">
            <h4 class="card-title">
              <?php echo $totalcourse;  ?>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-md-4 mt-5">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-header">User</div>
          <div class="card-body">
            <h4 class="card-title">
            <?php echo $totaluser;  ?>
            </h4>
            
          </div>
        </div>
      </div>
      <div class="col-md-4 mt-5">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-header">Sold</div>
          <div class="card-body">
            <h4 class="card-title">
            <?php echo $totalsold;  ?>
            </h4>
            
          </div>
        </div>
      </div>
    </div>
    

    </div>  <!-- div Row close from header -->
 </div>  <!-- div Conatiner-fluid close from header -->








<?php
include('../adminmain/footer.php'); 
?>