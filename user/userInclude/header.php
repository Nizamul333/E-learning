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
 if(isset($_SESSION['is_login'])){
  $userLogEmail = $_SESSION['LogEmail'];
 } 
 // else {
 //  echo "<script> location.href='../index.php'; </script>";
 // }

 if(isset($userLogEmail)){
    $sql = "SELECT image FROM user_t WHERE email = '$userLogEmail'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $user_img = $row['image'];
   }
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>
  
 </title>
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
 <!-- Top Navbar -->
 <nav class="navbar navbar-dark " style="background-color: #225470;">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="../">Nejamul</a>
 </nav>

 <!-- Side Bar -->
 <div class="container-fluid mb-5 " style="margin-top:40px;">
  <div class="row">
   <nav class="col-sm-2 bg-light ">
    <div class="sidebar-sticky">
     <ul class="nav flex-column">
      <li class="nav-item mb-3">
      <img src="<?php echo $user_img ?>" alt="userimage" class="img-thumbnail rounded-circle">
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../user/userProfile.php">
       
       My Profile
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="../user/parchase.php">
        
        My Courses
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link " href="../user/feedback.php">
        
        Feedback
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../user/changepass.php">
        
        Change Password
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../logout.php">
        
        Logout
       </a>
      </li>
     </ul>
    </div>
   </nav>