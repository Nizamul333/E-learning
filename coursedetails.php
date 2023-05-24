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
        <img src="./image/natu1.jpg" alt="courses" style="height:  auto;  width:100%;
          box-shadow:10px;"/>
      </div> 
    </div> <!-- End Course Page Banner -->


    <div class="container mt-5"> <!-- Start All Course -->
      <?php
          if(isset($_GET['course_id'])){
           $course_id = $_GET['course_id'];
           
           $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
          $result = $conn->query($sql);
          if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){
              echo ' 
                <div class="row">
                <div class="col-md-4">
                  <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="" />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Course Name: '.$row['course_name'].'</h5>
                    <p class="card-text"> Description: '.$row['course_desc'].'</p>
                    <p class="card-text"> Duration: '.$row['course_duration'].'</p>
                      
                     <form action="checkout1.php" method="post">
                   <p class="card-text d-inline">Price: <small><del>&#8352 '.$row['course_original_price'].'
                   </del></small> <span class="font-weight-bolder">&#8352 '.$row['course_price'].'<span></p>
                      <input type="hidden" name="id" value='. $row["course_price"] .'> 
                      <input type="hidden" name="id1" value='. $row["course_id"] .'> 
                      
                      <button type="submit" class="btn btn-primary text-white font-weight-bolder float-right" 
                      name="buy">Buy Now</button>
                    </form>
                  </div>
                </div>
              ';
            }
          }
         }
        ?>   
      </div><!-- End All Course --> 
      <div class="container">
          <div class="row">
          <?php $sql = "select lesson_id,lesson_name FROM lesson l,course c WHERE l.course_id=c.course_id
and c.course_id= $course_id;";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
          echo '
           <table class="table table-bordered table-hover">
             <thead>
               <tr>
                 <th scope="col">Lesson No.</th>
                 <th scope="col">Lesson Name</th>
               </tr>
             </thead>
             <tbody>';
            
             while($row = $result->fetch_assoc()){
             
              echo ' <tr>
               <th scope="row">'. $row["lesson_id"].'</th>
               <td>'. $row["lesson_name"].'</td></tr>';
              
             }
             echo '</tbody>
           </table>';
            } ?>         
       </div>
      </div>  
      
      




     <?php 





    
include('main/footer.php');
?>