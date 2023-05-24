<?php
include('main/header.php');
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

<div class="container-fluid bg-dark"> <!-- Start Course Page Banner -->
      <div class="row">
        <img src="./image/natu1.jpg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;"/>
      </div> 
    </div> <!-- End Course Page Banner -->

    <div class="container mt-5"> <!-- Start All Course -->
      <h2 class="text-center">All Courses</h2>
      <div class="row mt-auto"> <!-- Start All Course Row -->
      <?php
          $sql = "SELECT * FROM course";
          $result = $conn->query($sql);
          if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){
              $course_id = $row['course_id'];
              echo ' 
                <div class="col-sm-4 mb-4">
                  <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left;
                   padding:0px;">
                  <div class="card mt-auto " style="height:100%">
                    <img  src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top"/>
                    <div class="card-body">
                      <h5 class="card-title">'.$row['course_name'].'</h5>
                      <p class="card-text">'.$row['course_desc'].'</p>
                    </div>
                    <div class="card-footer mt-auto">
                 <p class="card-text d-inline">Price: <small><del>&#8352 '.$row['course_original_price'].' 
                   </del></small> <span class="font-weight-bolder">&#8352 '.$row['course_price'].'
                 <span></p> <a class="btn btn-primary text-white font-weight-bolder float-right"
                   href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
                    </div>
                  </div> </a>
                </div>
              ';
            }
          }
        ?> 
        </div><!-- End All Course Row -->   
      </div><!-- End All Course -->   
      <?php
include('main/footer.php');
?>
