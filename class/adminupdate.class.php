<?php
$servername = "localhost:3306";
$username = "snarna";
$password = "limingjie";
$database = "apksdb";

$con = new mysqli($servername, $username, $password, $database);

if($con->connect_error){
	die("Connection Failed: " . $con->connect_error);
}

$id = $_GET["id"];
$busnum = $_GET["busnum"];
$groupnum = $_GET["groupnum"];
$guestname = $_GET["guestname"];
$guestnum = $_GET["guestnum"];
$roomnum = $_GET["roomnum"];
$tabledate = $_GET["tabledate"];
$airport = $_GET["airport"];
$flight = $_GET["flight"];
$flighttime = $_GET["flighttime"];
$hotel = $_GET["hotel"];
$agent = $_GET["agent"];
$phone = $_GET["phone"];
$groupcode = $_GET["groupcode"];
$remark = $_GET["remark"];



$command = "UPDATE guestrecord SET busnum='".$busnum."', groupnum='".$groupnum."', guestname='".$guestname."',
		guestnum='".$guestnum."', roomnum='".$roomnum."', tabledate='".$tabledate."', airport='".$airport."', flight='".$flight."',
		flighttime='".$flighttime."', hotel='".$hotel."', agent='".$agent."', phone='".$phone."', groupcode='".$groupcode."',
		remark='".$remark."' WHERE guestid='".$id."'";

if($con->query($command) === TRUE){
	//Success
}
else{
	//Something Went Wrong
}

$con->close();
?>