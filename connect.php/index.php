<?php

$user = 'root';
$password   = '';
$db = 'user_profile';
$db_Host = 'localhost';

$conn =  mysqli_connect($db_Host, $user, $password, $db);




 ?>


<?php
    include_once 'connect.php';
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Profile page</title>
</head>
<body>

<h1>My profile page </h1>
<p></p>


<?php

    $sql = "SELECT * FROM  person;";

    $result = mysqli_query($conn , $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0 );
     {
        while ($row = mysqli_fetch_assoc($result)){
            echo $row ['name'] . "<br/>";
            echo $row['Email'];



        }

    }


 ?>
</body>
</html>
