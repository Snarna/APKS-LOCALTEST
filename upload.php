<?php
include 'simplexlsx.class.php';

$servername = "localhost:3306";
$username = "snarna";
$password = "limingjie";
$database = "apksdb";

$con = new mysqli($servername, $username, $password, $database);

if($con->connect_error){
  die("Connection Failed!" . $con->connect_error . "<br>");
}

echo "Connected!<br>";



//Simple XLSX Read
$xlsx = new SimpleXLSX('excel/10-15 appu.xlsx');

list($num_cols, $num_rows) = $xlsx->dimension(3);

//For Each Columns Version
foreach ($xlsx->rows(3) as $k => $r) {
  if($k === 0) continue;
  $busnum = $r[0];
  $groupnum = $r[1];
  $guestname = $r[2];
  $guestnum = $r[3];
  $roomnum = $r[4];
  if(!empty($r[5]) && gettype($r[5]) != 'string'){
    $tabledate = date('Y-m-d', mktime(0,0,0,1,$r[5]-1,1900));
  }
  $airport = $r[6];
  $flight =$r[7];
  if(!empty($r[5]) && gettype($r[5]) != 'string'){
    $flighttime = date('H:i:s',round($r[8]*86400)-3600);
  }
  $hotel = $r[9];
  $agent = $r[10];
  $phone = $r[11];
  $groupcode = $r[12];
  $remark = $r[13];
  $command = "INSERT INTO guestrecord (busnum, groupnum, guestname, guestnum, roomnum, tabledate, airport, flight, flighttime, hotel, agent, phone, groupcode, remark) VALUES ('$busnum', '$groupnum', '$guestname', '$guestnum', '$roomnum', '$tabledate', '$airport', '$flight', '$flighttime', '$hotel', '$agent', '$phone', '$groupcode', '$remark')";
  if($con->query($command) === TRUE){
    echo "Done For Row: " . $k . "<br>";
  }
  else{
    echo "Failed Row:" . $k . "<br>" .$con->error . "<br>" ;
  }
}

/* For Loop Version
echo "<h1>This is target table</h1>";
echo "<table>";
foreach ($xlsx->rows(3) as $k => $r) {
  if($k === 0) continue; //Skip First Row
  echo "<tr>";
  for($i=0; $i<$num_cols; $i++){
    switch ($i) {
      case 5:
        if(!empty($r[5]) && gettype($r[5]) != 'string'){
          echo "<td>". date('Y-m-d', mktime(0,0,0,1,$r[5]-1,1900)) ."</td>"; //Date
        }
        else{
          echo "<td>". $r[5] ."</td>";
        }
        break;
      case 8:
        if(!empty($r[8]) && gettype($r[8]) != 'string'){
          echo "<td>". date('H:i:s',round($r[8]*86400)-3600) ."</td>"; //Flight Time
        }
        else{
          echo "<td>". $r[8] ."</td>";
        }
        break;
      default:
        echo "<td>". $r[$i] ."</td>"; //General
        break;
    }
  }
  echo "</tr>";
}
echo "</table>";
*/




$con->close();
echo "Connection Closed!<br>";
?>
