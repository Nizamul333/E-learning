
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



<div class="col-sm-9 mt-5">
    <!--Table-->
    <p class=" bg-dark text-white p-2">List of Courses</p>
    <?php
      $sql = "SELECT * FROM course";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
       echo '<table class="table">
       <thead>
        <tr>
         <th scope="col">Course ID</th>
         <th scope="col">Name</th>
         <th scope="col">Author</th>
         <th scope="col">Action</th>
        </tr>
       </thead>
       <tbody>';
        while($row = $result->fetch_assoc()){
          echo '<tr>';
          echo '<th scope="row">'.$row["course_id"].'</th>';
          echo '<td>'. $row["course_name"].'</td>';
          echo '<td>'.$row["course_author"].'</td>';
          echo '<td><form action="editcourse.php" method="POST" class="d-inline"> 
          <input type="hidden" name="id" value='. $row["course_id"] .'>
          <button type="submit" class="btn btn-secondary mr-3" name="view" value="View">
          edit</button></form>  
          <form action="" method="POST" class="d-inline">
          <input type="hidden" name="id" value='. $row["course_id"] .'>
          <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
          delete</i></button></form></td>
         </tr>';
        }

        echo '</tbody>
        </table>';
      } else {
        echo "0 Result";
      }
      if(isset($_REQUEST['delete'])){
       $sql = "DELETE FROM course WHERE course_id = {$_REQUEST['id']}";
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
 <div><a class="btn btn-danger" href="./addCourse.php">add course</a></div>
</div> 










<?php
include('../adminmain/footer.php'); 
?>