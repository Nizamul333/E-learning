<?php

if(!isset($_SESSION)){ 
    session_start(); 
  }
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "final";

// Create Connection
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if($conn->connect_error) {
    die("connection failed");
   } 
    else {
    
    }
// Check Connection

?>


<?php
include('../adminmain/header.php'); 
if(isset($_SESSION['is_admin_login'])){
    $adminEmail = $_SESSION['adminLogEmail'];
   } 
   else {
    echo "<script> location.href='../index.php'; </script>";
   }
?>


  <?php
      $sql = "SELECT * FROM form";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        echo '<div class="col-sm-9">';
        echo '<table class="table">
        <thead>
         <tr>
          <th scope="col">FirstName</th>
          <th scope="col">LastName</th>
          <th scope="col">Email of Client</th>
          <th scope="col">Query</th>
          <th scope="col">Action</th>
         </tr>
        </thead>
        <tbody>';
         while($row = $result->fetch_assoc()){
           echo '<tr>';
           echo '<th scope="row">'.$row["first_name"].'</th>';
           echo '<td>'. $row["last_name"].'</td>';
           echo '<td>'.$row["email"].'</td>';
           echo '<td>'.$row["query"].'</td>';
           echo '<td>  
           <form action="" method="POST" class="d-inline">
           <input type="hidden" name="id" value='. $row["form_id"] .'>
           <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
           delete</i></button></form></td>
          </tr>';
         }
 
         echo '</tbody>
         </table>';
         echo '</div>';
  }

  if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM form WHERE form_id = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
   }
  ?> 

</div>
 </div>  <!-- div Row close from header -->

    







    

