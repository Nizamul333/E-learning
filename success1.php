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
include('./user/userInclude/header.php'); 
if(isset($_SESSION['is_login'])){
    $userEmail = $_SESSION['LogEmail'];
   } 
   else {
    echo "<script> location.href='../index.php'; </script>";
   }


   $sql = "SELECT Max(order_id) AS o_id,email,name FROM orders AS o ,user_t AS u where o.user_id=u.id AND 
   u.email = '$userEmail';";
   $result = $conn->query($sql);


if($result->num_rows > 0){
       echo '<table class="table">
       <thead>
        <tr>
         <th scope="col">Order_Id</th>
         <th scope="col">Your_email</th>
         <th scope="col">Name</th>
         
          
        </tr>
       </thead>
       <tbody>';
        while($row = $result->fetch_assoc()){
          echo '<tr>';
          echo '<th scope="row">'.$row["o_id"].'</th>';
          echo '<td>'.$row["email"].'</td>';
          echo '<td>'.$row["name"].'</td>';
          // echo '<td>'.$status.'</td>';
          // echo '<td>'.$tran_date.'</td>';
          // //echo '<td>'.$amount.'</td>';
         
           echo '<td> </td>
         </tr>';
        }

        echo '</tbody>
        </table>';
      } else {
        echo "0 Result";
      }




?>