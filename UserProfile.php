<?php
$host ='localhost';
$username = 'root';
$password = '';
$dbname = 'userprofile';
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
