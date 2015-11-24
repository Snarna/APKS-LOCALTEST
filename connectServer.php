<? php
$url = "127.4.85.2:3306";
$username = "snarna";
$password = "limingjie";
$db = "apks";

$con = new mysqli($url, $username, $password, $db);

if($con->connect_error){
  die("Connection Failed:" . $con->connect_error);
}
echo "Connected!";


$con->close();
echo "Connection Closed";

?>
