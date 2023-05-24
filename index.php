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
   <div class="div1">
    

   <?php    
              if(!isset($_SESSION['is_login'])){
              echo '<a href="" data-toggle="modal" data-target="#exampleModal"><button>GET STARTED</button></a>' ;
              } else {
               echo '<a href="user/userProfile.php"><button>My Profile</button></a>' ;
              }
          ?> 




   
   
   </div>
   <div class="navnext">
    <!-- <div class="navnext1">
        <img src="image/pic.jpg" alt="" height="240px" width="240px">
        
    </div>
    
    <div class="navnext2">
        <h2> Hi I AM</h2>
        <h2>Nejamul</h2>
        <p>I am developer,and I love to drink coffee I live in Mirpur I would love to visit anywhere to drink coffee</p>
<div class="button">
   <a href="cv.text" target="_blank" class="btn"> <button>Download CV</button></a>

</div> -->
    </div>


   </div>
  
    

<div class="container-fluid bg-danger txt-banner"> <!-- Start Text Banner -->
        <div class="row bottom-banner">
          <div class="col-sm">
            <h5> <i class="fas fa-book-open mr-3"></i> 100+ Online Courses</h5>
          </div>
          <div class="col-sm">
            <h5><i class="fas fa-users mr-3"></i> Expert Instructors</h5>
          </div>
          <div class="col-sm">
            <h5><i class="fas fa-keyboard mr-3"></i> Lifetime Access</h5>
          </div>
          <div class="col-sm">
            <h5><i class="fas fa-euro-sign mr-3"></i> Money Back Guarantee*</h5>
          </div>
        </div>
    </div> <!-- End Text Banner -->
    




<!--card-->
<div class="container mt-5">
<h2 class="text-center">Popular Services</h2>
<div class="card-deck mt-4">
  <?php
  $sql = "SELECT * FROM course LIMIT 3";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $course_id = $row['course_id'];
    
      echo '
      <a href="coursedetails.php?course_id='.$course_id.'"  class="btn" style="text-align: left; padding:0px; margin:0px;">
    <div class="card" style="width: 18rem;">
  <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="...">
  
  <div class="card-body">
    <h5 class="card-title">'.$row['course_name'].'</h5>
    <p class="card-text">'.$row['course_desc'].'</p>
    </div>
    <div class="card-footer mt-auto">
    <p class="card-text d-inline">Price: <small><del>&#8352 '.$row['course_original_price'].'

    </del></small> <span class="font-weight-bolder">&#8352 '.$row['course_price'].'
        <span></p> <a class="btn btn-primary text-white font-weight-bolder float-right"
     href="coursedetails.php?course_id='.$course_id.' ">Enroll</a>
    </div>
</div>
</a>';

    }
  }
  ?>

 
</div>



<div class="card-deck mt-4">
<?php
  $sql = "SELECT * FROM course LIMIT 3,3";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $course_id = $row['course_id'];
    
      echo '
      <a href="coursedetails.php?course_id='.$course_id.'"  class="btn" style="text-align: left; padding:0px; margin:0px;">
    <div class="card" style="width: 18rem;">
  <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="...">
  
  <div class="card-body">
    <h5 class="card-title">'.$row['course_name'].'</h5>
    <p class="card-text">'.$row['course_desc'].'</p>
    </div>
    <div class="card-footer mt-auto">
    <p class="card-text d-inline">Price: <small><del>&#8352 '.$row['course_original_price'].'

    </del></small> <span class="font-weight-bolder">&#8352 '.$row['course_price'].'
        <span></p> <a class="btn btn-primary text-white font-weight-bolder float-right"
     href="coursedetails.php?course_id='.$course_id.' ">Enroll</a>
    </div>
</div>
</a>';

    }
  }
  ?>




</div>
<div class="text-center m-2">
        <a class="btn btn-danger btn-sm mt-5" href="courses.php">View All Course</a> 
      </div>

</div>

   

   


    
    



    <!-- Start Students Testimonial -->
    <div class="container-fluid mt-5" style="background-color: #7d7777;" id="Feedback">
        <h1 class="text-center testyheading p-4"> Student's Feedback </h1>
        <div class="row">
          <div class="col-md-12">
            <div id="testimonial-slider" class="owl-carousel">
            <?php 
              $sql = "SELECT s.name, s.occ, s.image, f.f_content FROM user_t AS s JOIN feedback AS f ON s.id = f.user_id";
              $result = $conn->query($sql);
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                  $s_img = $row['image'];
                  $n_img = str_replace('../','',$s_img)
            ?>
           
              <div class="testimonial">
                <p class="description">
                <?php echo $row['f_content'];?> 
                </p>
                <div class="pic">
                  <img src="<?php echo $n_img; ?>" alt=""/>
                </div>
                <div class="testimonial-prof">
                  <h4><?php echo $row['name']; ?></h4>
                  <small><?php echo $row['occ']; ?></small>
                </div>
              </div>
              <?php }} ?>
            </div>
          </div>
        </div>
    </div>  <!-- End Students Testimonial -->

    <div class="container-fluid bg-dark"> <!-- Start Social Follow -->
        <div class="row text-white text-center p-1">
          <div class="col-sm">
            <a class="text-white social-hover" href="https://www.facebook.com/md.shahariarabid"><i class="fab fa-facebook-f"></i> Facebook</a>
          </div>
          <div class="col-sm">
            <a class="text-white social-hover" href="#"><i class="fab fa-twitter"></i> Twitter</a>
          </div>
          <div class="col-sm">
            <a class="text-white social-hover" href="#"><i class="fab fa-whatsapp"></i> WhatsApp</a>
          </div>
          <div class="col-sm">
            <a class="text-white social-hover" href="#"><i class="fab fa-instagram"></i> Instagram</a>
          </div>
        </div>
    </div> <!-- End Social Follow -->

    <div class="div2">
        <h2>FAVOURITE QUOTES</h2>
       
             
        <div class="flex" align="center">
             <div class="flex-container">
                <div class="flex-item"></div>
                <div class="flex-item1"> 
                    
                    <div class="under-flex">
                        <p>"Happiness is not by chance,but by choice."<b> Jim Rohn.</b></p>
                        <button>LEARN MORE</button>
                    </div>
                        
                </div>
                
                    </div>
                </div>
        
        
        
        
                <div class="flex" align="center">
                    <div class="flex-container1">
                       <div class="flex-ite">
        
                        <div class="under-flex">
                            <p>"Out of the mountain of despair,a stone of hope." <b>Martin Luther King Jr.</b></p>
                            <button>FIND OUT MORE</button>
                        </div>
        
                       </div>
                       <div class="flex-ite1"></div>
                       
                       
                           </div>
                       </div>
               
        
                
                       
        
        
        
        
            </div>


            <?php
include('main/footer.php');
?>





 