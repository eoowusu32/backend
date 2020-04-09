<?php

	include "config.php";

	//Receive JSON object from webpage and convert to an array of values
	$inputJSON = file_get_contents('php://input');
	$input = json_decode($inputJSON, TRUE);
	
	$error = []
	
	//Create database connection
	$servername = $DB_HOST;
	$username = $DB_USER;
	$password = $DB_PASS;
	$dbname = $DB_NAME;
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	//Prepare statement
	$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password, verified) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("ssss", $firstname, $lastname, $email, $password, $verified);
	
	//Separate Array into Variables - if empty, return error
	if(isNotEmpty(input[0])){
		$firstname = $input[0]
	}
	else {
		if(error[0] != "HTML400"){
			$error = ["HTML400","firstname"];
		}
		else {
			array_push($error, "firstname");
		}
	}
	
	if(isNotEmpty(input[1])){
		$lastname = $input[1];
	}
	else {
		if(error[0] != "HTML400"){
			$error = ["HTML400","lastname"];
		}
		else {
			array_push($error, "lastname");
		}
	}
	
	if(isNotEmpty(input[2])){
		$email = $input[2];
	}
	else {
		if(error[0] != "HTML400"){
			$error = ["HTML400","email"];
		}
		else {
			array_push($error, "email");
		}
	}
	
	if(isNotEmpty(input[3])){
		$password = $input[3];
	}
	else {
		if(error[0] != "HTML400"){
			$error = ["HTML400","password"];
		}
		else {
			array_push($error, "password");
		}
	}
	
	if(isNotEmpty(input[4])){
		$passwordcon = $input[4];
	}
	else {
		if(error[0] != "HTML400"){
			$error = ["HTML400","passwordcon"];
		}
		else {
			array_push($error, "passwordcon");
		}
	}
	
	//Check if email is valid, if not, return email error
	if (strpos($email, '@') !== true) {
		if(error[0] != "HTML400"){
			$error = ["HTML400","email"];
		}
		else {
			if(!in_array("email",$error){
				array_push($error, "email");
		}
	}
	
	//Check if password and password confirmation match, else return password error
	if($password != $passwordcon){
		if(error[0] != "HTML400"){
			$error = ["HTML400","passwordmatch"];
		}
		else {
			array_push($error, "passwordmatch");
		}
	}
	
	$verified = false;
	
	//Execute statement if no errors are present
	if(isEmpty($error)){
		$stmt->execute();
	}
	
	//Return success/failure as needed. 
	if(isEmpty($error)){
		$error = ["HTTP201", "Success"];
	}
	return json_encode($error);
	
	//Close connection
	$stmt->close();
	$conn->close();
	
	?>
