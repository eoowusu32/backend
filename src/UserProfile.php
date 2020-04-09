<?php
include "config.php";
$host = $DB_HOST;
$username = $DB_USER;
$password = $DB_PASS;
$dbname = $DB_NAME;
$con = mysqli_connect($host,$username,$password, $dbname);
$result = mysqli_query($con, "SELECT * FROM user");
$json_array = array();
while($row = mysqli_fetch_assoc($result))
{
    $json_array[] = $row;
}
echo "<pre>";
print_r($json_array);
echo "</pre>";

 ?>
