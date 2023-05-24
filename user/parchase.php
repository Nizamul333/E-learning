<?php


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
include('./userInclude/header.php'); 
if(isset($_SESSION['is_login'])){
    $userEmail = $_SESSION['LogEmail'];
   } 
   else {
    echo "<script> location.href='../index.php'; </script>";
   }


   $sql = "SELECT c.course_name,c.course_desc,c.course_duration,c.course_original_price,
   c.course_price,c.course_author,c.course_img,c.course_id
    FROM orders AS o ,user_t AS u,course AS c
   where o.user_id=u.id AND o.course_id=c.course_id AND u.email = '$userEmail';";
   $result = $conn->query($sql);
   if($result->num_rows > 0){ 
     while($row = $result->fetch_assoc()){
       echo ' 
         
         <div class="col-sm-4">
           <img src="'. $row['course_img'].'" class="card-img-top" alt="" />
         </div>
         <div class="col-sm-6 ">
           <div class="card-body">
             <h5 class="card-title">Course Name: '.$row['course_name'].'</h5>
             <p class="card-text"> Description: '.$row['course_desc'].'</p>
             <p class="card-text"> Duration: '.$row['course_duration'].'</p>
             <small class="card-text">Instructor:  '.$row['course_author'].' </small><br/>
            
               <p class="card-text d-inline">Price: <small><del>&#8352 '.$row['course_original_price'].'</del>
               </small> <span class="font-weight-bolder">&#8352 '.$row['course_price'].'<span></p>
               <input type="hidden" name="id" value='. $row["course_price"] .'> 
               <input type="hidden" name="id1" value='. $row["course_id"] .'> 
               
               <a href="watchcourse.php?course_id= '.$row["course_id"].'" class="btn btn-primary mt-5">
               Watch Course</a>


               
           </div>
           </div>
          
           <div class="col-sm-2">
           </div>
        
       ';
     }
   }



   ?>
    </div>
    </div>
   