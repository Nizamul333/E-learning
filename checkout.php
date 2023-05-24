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
// else {
//  echo"connected";
// }
?>

<?php
include('main/header.php'); 
if(isset($_SESSION['is_login'])){
    $userEmail = $_SESSION['LogEmail'];
   } 
   else {
    echo "<script> location.href='index.php'; </script>";
   }
   $sql = "SELECT * FROM user_t WHERE email='$userEmail'";

   $result = $conn->query($sql);
   if($result->num_rows == 1){
   $row = $result->fetch_assoc();
   $userId = $row["id"];
   $userName=$row["name"];
  }
  if(isset($_REQUEST['submitFeedbackBtn'])){
    if(($_REQUEST['f_content'] == "")){
     // msg displayed if required field missing
     $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill All Fileds </div>';
    } else {
      
        $fcon= $_POST['id1'];
        echo $fcon;
        $sql = "INSERT INTO orders (user_id,course_id) VALUES ( '$userId','$fcon');";
        
        if($conn->query($sql) == TRUE){
        // below msg display on form submit success
        $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2"> Submitted Successfully </div>';
        } else {
        // below msg display on form submit failed
        $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2"> Unable to Submit </div>';
           }
       }
     
      }
   
  
  
   ?>
<div class="container row m-5" text-align="center">
<div class="col-3">
</div>
 <div class="col-6">
 <form method="POST" action="">
 <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1"
     placeholder="<?php echo $userName; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" name="f_content" class="form-control" id="exampleFormControlInput1" 
    placeholder= "<?php echo $_SESSION['LogEmail']; ?>" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">price</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" 
    value="<?php if(isset($_POST['id'])){echo $_POST['id']; }  ?>" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Id</label>
    <input type="hidden" class="form-control" id="exampleFormControlInput1" name="id1" 
    value="<?php if(isset($_POST['id1'])){echo $_POST['id1']; }  ?>" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Example select</label>
    <select class="form-control" id="exampleFormControlSelect1">
    <option>নগদ </option>
      <option>bkash</option>
      <option>Master Card</option>
      <option>visa</option>
      
      
    </select>
  </div>
  <div class="form-group">
    
    <input type="submit" class="form-control"  name="submitFeedbackBtn" value="submit" >
  </div>
  <?php if(isset($passmsg)) {echo $passmsg; } ?>
</form>
 </div>   

</div>

<?php

  

?>

