
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

<form action="" class="mt-3 form-inline  ">
    <div class="form-group mr-3">
      <label for="checkid" class="m-3">Enter Course ID: </label>
      <input type="text" class="form-control ml-3" id="checkid" name="checkid">
    </div>
    <button type="submit" class="btn btn-danger m-3">Search</button>
  </form>
  <?php
    
    if(isset($_REQUEST['checkid']))
    {
      $sql = "SELECT lesson_id, lesson_name, lesson_link FROM lesson p INNER JOIN course t ON p.course_id=t.course_id
       WHERE t.course_id = {$_REQUEST['checkid']}; ";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
       echo '<table class="table">
       <thead>
        <tr>
         <th scope="col">Lesson ID</th>
         
         <th scope="col">Lesson Name</th>
         <th scope="col">Lesson Link</th>
         <th scope="col">Action</th>
        </tr>
       </thead>
       <tbody>';
        while($row = $result->fetch_assoc()){
          echo '<tr>';
          echo '<th scope="row">'.$row["lesson_id"].'</th>';
          
          echo '<td>'. $row["lesson_name"].'</td>';
          echo '<td>'. $row["lesson_link"].'</td>';
          echo '<td>  
          <form action="" method="POST" class="d-inline">
          <input type="hidden" name="id" value='. $row["lesson_id"] .'>
          <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
          delete</button></form></td>
         </tr>';
        }

        echo '</tbody>
        </table>';
      } else {
        echo "0 Result";
      }
    }
      if(isset($_REQUEST['delete'])){
       $sql = "DELETE FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
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
 <div><a class="btn btn-danger box" href="./addLesson.php">add Lesson</a></div>
</div> 










<?php
include('../adminmain/footer.php'); 
?>