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

<div class="row "> 
           <div class="col-2 "></div>
            <div class="col-3 con1"><img src="data:image/png;base64,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" alt="">  </div> 
                <div class="col-2 "></div>
            <div class="col-4  con" style="margin-top:20px ;">
                <form action="" method="post">
                <input type="text"class="d-block mb-3" placeholder="First Name" name="firstname"> 
                <input type="text" class="d-block mb-3" placeholder="Last Name" name="lastname"> 
                <input type="email" class="d-block mb-3" placeholder="what's your email" name="email">  
                  
                <textarea class="d-block" id=""  placeholder="Your questions" name="ques"></textarea>
                <input class="d-block" type="submit" value="SEND MESSAGE" class="sub" name="submit" >
                <span id="id"></span>
                </form>
            </div> 
                <div class="col-1"></div>
        </div>


</div>
</div> <!--end Header -->
<?php
    if( isset($_POST["submit"])){
    if(!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) ){
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$ques= $_POST["ques"];
$sql="INSERT INTO form (first_name,last_name,email,query) VALUES('$firstname','$lastname','$email','$ques')";

$run=mysqli_query($conn, $sql);
if($run) {
   echo "<script>
   document.getElementById('id');
   document.getElementById('id').innerHTML= 'successfully data submited';
</script>";
}
else{
    echo "error!";
}
    }
    else{
     echo   "<script>
   document.getElementById('id');
   document.getElementById('id').innerHTML= 'Please enter your first name and last name and email';
</script>";
        
    }
}
?>