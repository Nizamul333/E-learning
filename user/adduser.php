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
//signup



if(isset($_POST['stusignup']) && isset($_POST['uname']) && isset($_POST['uemail']) && isset($_POST['upass'])){
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];
    $upass = $_POST['upass'];
    $sql = "INSERT INTO user_t (name, email, password) VALUES ('$uname', '$uemail', '$upass')";
    if($conn->query($sql) == TRUE){
      echo json_encode("OK");
    } else {
      echo json_encode("Failed");
    }
  }


//login
if(!isset($_SESSION['is_login']))
{
    if(isset($_POST['checkLogemail']) && isset($_POST['LogEmail']) && isset($_POST['LogPass'])){
      $LogEmail = $_POST['LogEmail'];
      $LogPass = $_POST['LogPass'];
      $sql = "SELECT email, password FROM user_t WHERE email='".$LogEmail."' AND password='".$LogPass."'";
      $result = $conn->query($sql);
      $row = $result->num_rows;
      
      if($row === 1){
        $_SESSION['is_login'] = true;
      $_SESSION['LogEmail'] = $LogEmail;
        echo json_encode($row);
      } else if($row === 0) {
        echo json_encode($row);
      }
    }

  }
else{
  echo "valo";
}



?>