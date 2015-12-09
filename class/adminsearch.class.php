<?php
$servername = "localhost:3306";
$username = "snarna";
$password = "limingjie";
$database = "apksdb";

$con = new mysqli($servername, $username, $password, $database);

if($con->connect_error){
	die("Connection Failed".$con-connect_error);
}

//Date Validation Function
function validateDate($date, $format = 'Y-m-d')
{
	$d = DateTime::createFromFormat($format, $date);
	return $d && $d->format($format) == $date;
}

//Validate Date Format
if(validateDate($_GET['date'])){

	//Get Infomation From Database
	$command = "SELECT * FROM guestrecord WHERE tabledate='".$_GET['date']."'";
	$result = $con->query($command);

	//Get Ready For Result Table
	if($result->num_rows > 0){
		echo "<table id=\"resulttable\">";
		echo "<thead>";
		echo "<th>Edit</th>";
		echo "<th>Bus#</th>";
		echo "<th>Group#</th>";
		echo "<th>Guest Name</th>";
		echo "<th>G#</th>";
		echo "<th>R#</th>";
		echo "<th>Date</th>";
		echo "<th>Airport</th>";
		echo "<th>Flight</th>";
		echo "<th>Flight Time</th>";
		echo "<th>Hotel</th>";
		echo "<th>Agent</th>";
		echo "<th>Phone</th>";
		echo "<th>Code</th>";
		echo "<th>Remark</th>";
		echo "</thead>";
		echo "<tbody>";
		while($row = $result->fetch_assoc()){
			echo "<tr>";
			echo "<td><button class=\"button\" onclick=\"editRecord(this);\">Edit</button></td>";
			echo "<td>" . $row["busnum"] . "</td>";
			echo "<td>" . $row["groupnum"] . "</td>";
			echo "<td>" . $row["guestname"] . "</td>";
			echo "<td>" . $row["guestnum"] . "</td>";
			echo "<td>" . $row["roomnum"] . "</td>";
			echo "<td>" . $row["tabledate"] . "</td>";
			echo "<td>" . $row["airport"] . "</td>";
			echo "<td>" . $row["flight"] . "</td>";
			echo "<td>" . $row["flighttime"] . "</td>";
			echo "<td>" . $row["hotel"] . "</td>";
			echo "<td>" . $row["agent"] . "</td>";
			echo "<td>" . $row["phone"] . "</td>";
			echo "<td>" . $row["groupcode"] . "</td>";
			echo "<td>" . $row["remark"] . "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	else{
		echo "<h4>0 Search Results</h4>";
	}
}
else{
	echo "<h4>Wrong Date Format.</h4>";
}


$con->close();
?>
