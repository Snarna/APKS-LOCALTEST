<?php
require_once 'simplexlsx.class.php';

$servername = "localhost:3306";
$username = "snarna";
$password = "limingjie";
$database = "apksdb";

$con = new mysqli ( $servername, $username, $password, $database );

if ($con->connect_error) {
	die ( "Connection Failed!" . $con->connect_error );
}

//Get The File From FormData
if(!isset($_FILES['file']['error']) || is_array($_FILES['file']['error'])){
	throw new RuntimeException('Invalid	Parameters');
}

//Check File Value
switch($_FILES['file']['error']){
	case UPLOAD_ERR_OK:
		break;
	case UPLOAD_ERR_NO_FILE:
		throw new RuntimeException('No File Sent!');
	case UPLOAD_ERR_INI_SIZE:
	case UPLOAD_ERR_FROM_SIZE:
		throw new RuntimeException('File Too Big');	
	default:
		throw new RuntimeException('Unknown Errors');
}



// Insert File Here
$errorBit = 0;
$xlsx = new SimpleXLSX ( $_FILES['file']['tmp_name'] );
list ( $num_cols, $num_rows ) = $xlsx->dimension ( 3 );

foreach ( $xlsx->rows ( 3 ) as $k => $r ) {
	if ($k == 0) continue;
		$busnum = $r [0];
		$groupnum = $r [1];
		$guestname = $r [2];
		$guestnum = $r [3];
		$roomnum = $r [4];
		$tabledate = date ( 'Y-m-d', mktime ( 0, 0, 0, 1, $r [5] - 1, 1900 ) );
		$airport = $r [6];
		$flight = $r [7];
		$flighttime = date ( 'H:i:s', round ( $r [8] * 86400 ) - 3600 );
		$hotel = $r [9];
		$agent = $r [10];
		$phone = $r [11];
		$groupcode = $r [12];
		$remark = $r [13];

		// Prepare Statement & Insert
		$command = "INSERT INTO apksdb.guestrecord (busnum, groupnum, guestname, guestnum, roomnum, tabledate, airport, flight, flighttime, hotel, agent, phone, groupcode, remark) VALUES ('$busnum','$groupnum','$guestname','$guestnum','$roomnum','$tabledate','$airport','$flight','$flighttime','$hotel','$agent','$phone','$groupcode','$remark')";
		if ($con->query ( $command ) === FALSE) {
					$errorBit = 1;
			$errorMsg = "<div style=\"color:red;\"><h2>Bad! :(</h2><br>Somthing Went Wrong. You May Uploaded This File Already.<br>" . "Detailed Error Info:" . $con->error . "</div>";
			break;
		}
}
if($errorBit == 0){
	echo "<div style=\"color:green;\">Congratulation! Your File Has Been Uploaded! :D</div>";
}
else{
	echo $errorMsg;
}


$con->close ();
?>