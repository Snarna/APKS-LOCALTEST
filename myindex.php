<?php
$servername = "localhost:3306";
$username = "snarna";
$password = "limingjie";
$database = "apksdb";

$con = new mysqli($servername, $username, $password, $database);

if($con->connect_error){
  die("Connection Failed!" . $con->connect_error);
}

echo "Connected!";

$con->close();
echo "Connection Closed!";

?>
