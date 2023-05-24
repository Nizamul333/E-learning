<?php







$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("iub642c5f81106fc");
$store_passwd=urlencode("iub642c5f81106fc@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;

} else {

	echo "Failed to connect with SSLCOMMERZ";
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
//include('./user/userInclude/header.php'); 
include('main/header.php'); 
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
         <th scope="col">Status</th>
         <th scope="col">Tran_date</th>
         <th scope="col">Amount</th>
         <th scope="col">Card_type</th>
         
          
        </tr>
       </thead>
       <tbody>';
        while($row = $result->fetch_assoc()){
          echo '<tr>';
          echo '<th scope="row">'.$row["o_id"].'</th>';
          echo '<td>'.$row["email"].'</td>';
          echo '<td>'.$row["name"].'</td>';
          echo '<td>'.$status.'</td>';
          echo '<td>'.$tran_date.'</td>';
          echo '<td>'.$amount.'</td>';
         
         echo'<td>'.$card_type.' </td>
         </tr>';
        }

        echo '</tbody>
        </table>';
      } else {
        echo "0 Result";
      }




?>