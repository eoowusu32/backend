<?php

// create connection

$host ='localhost';

$username = 'root';

$password = '';

$dbname = 'userprofile';

// check connection

$con = mysqli_connect($host,$username,$password, $dbname);

//  select all data from the database.

$result = mysqli_query($con, "SELECT * FROM user");

// Provide a list view of the data in the database in an array.
$json_array = array();

while($row = mysqli_fetch_assoc($result))
{

    $json_array[] = $row;

}
// prints out a preformatted text of data from the database
echo "<pre>";
print_r($json_array);
echo "</pre>";

 ?>
