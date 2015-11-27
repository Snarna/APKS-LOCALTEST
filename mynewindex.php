<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
	<?php
	include 'simplexlsx.class.php';
	
	if (isset ( $_FILES ['file'] )) {
		$servername = "localhost:3306";
		$username = "snarna";
		$password = "limingjie";
		$database = "apksdb";
		
		$con = new mysqli ( $servername, $username, $password, $database );
		
		if ($con->connect_error) {
			die ( "Connection Failed!" . $con->connect_error );
		}
		echo "Connected!<br>";	
		
		// Insert File Here
		$xlsx = new SimpleXLSX ( $_FILES ['file'] ['tmp_name'] );
		list ( $num_cols, $num_rows ) = $xlsx->dimension ( 3 );
		
		foreach ( $xlsx->rows ( 3 ) as $k => $r ) {
			if ($k == 0)
				continue;
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
			if($con->query($command) === TRUE){
				echo "Good:".$k."<br>";
			}
			else{
				echo "Failed:".$k.$con->error."<br>";
			}
			
		}
		
		$con->close ();
		echo "Connection Closed!";
	}
	
	?>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Choose File:</td>
				<td><input type="file" name="file" accept=".xlsx"></td>
			</tr>
			<tr>
				<td></td>
				<td><button type="submit" name="submitButton">Submit</button></td>
			</tr>
		</table>
	</form>
</body>

</html>