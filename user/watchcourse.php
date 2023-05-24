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

if(isset($_SESSION['is_login'])){
    $userEmail = $_SESSION['LogEmail'];
   } 
   else {
    echo "<script> location.href='../index.php'; </script>";
   }
?>
   <!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Watch Course</title>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="../css/bootstrap.min.css">

 <!-- Font Awesome CSS -->
 <link rel="stylesheet" href="../css/all.min.css">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

 <!-- Custom CSS -->
 <link rel="stylesheet" href="../css/stustyle.css">
</head>
<body>

   
   
   <div class="container-fluid">
    
       <h4 class="text-center mb-5">Lessons</h4>
       <ul id="playlist" class="nav flex-column">
          <?php
             if(isset($_GET['course_id'])){
              $course_id = $_GET['course_id'];
              $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
              $result = $conn->query($sql);
              if($result->num_rows > 0){
               while($row = $result->fetch_assoc()){
                echo ' <div class="row">
               <div class="col-sm-4">
                <a href="'.$row['lesson_link'].'"><li class="nav-item border-bottom py-2">
                '. $row['lesson_name'] .'</li></a>
                </div>
                <div class="col-sm-8">
                <video src="../lessonvid/'.$row['lesson_link'].'" controls autoplay type="video/mp4" style="height:70px"></video>
                </div>
                </div>
                ';
               // echo '
                //<video src="../lessonvid/'.$row['lesson_link'].'" controls autoplay type="video/mp4"></video>
                //';
               }
              }
             }
          ?>
       </ul>
     </div>
     
         
       



    <!-- Jquery and Boostrap JavaScript -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <!-- Font Awesome JS -->
    <script type="text/javascript" src="../js/all.min.js"></script>

    <!-- Ajax Call JavaScript -->
    <!-- <script type="text/javascript" src="..js/ajaxrequest.js"></script> -->

    <!-- Custom JavaScript -->
    <script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>