<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUP</title>
    <link rel="stylesheet" type="text/css" href="..\css\styles.css">
  </head>

  <body>
  <?php
  
//Initialize Variables

	$name = $lastname = $email = $password = $passwordcon = "";
	$nameErr = $lastnameErr = $passwordErr = $emailErr = $passwordconErr = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Verify Inputs, require content in each field, passwords must match
		if (empty($_POST["name"])) {
			$nameErr = "Name is required!";
		} 
		else {
			$name = test_input($_POST["name"]);
		}

		if (empty($_POST["lastname"])) {
			$lastnameErr = "Lastname is required!";
		} 
		else {
			$lastname = test_input($_POST["lastname"]);
		}

		if (empty($_POST["email_sign"])) {
			$emailErr = "Email is required!";
		} 
		else {
			$email = test_input($_POST["email_sign"]);
		}

		if (empty($_POST["psswrd"])) {
			$passwordErr = "Password is required!";
		} else {
			$password = test_input($_POST["psswrd"]);
		}

		if (empty($_POST["psswrd_con"])) {
			$passwordconErr = "Password Confirmation is required!";
		} else {
			$passwordcon = test_input($_POST["psswrd_con"]);
			if ($passwordcon != $password) {
			$passwordconErr = "Passwords do not match!";
			}
		}
	
//MySQL server connection, only runs if form submitted
	$servername = "localhost";
	$username = "husocial";
	$password = "12345";
// Create connection
	$conn = new mysqli($servername, $username, $password);

// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
// Insert Items into temporary table
	$sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ($name, $lastname, $email, $password)";
	$conn->query($sql);

//Close the connection
	$conn->close();
	
}
//Trim input to prevent code injection
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}
  
  
  ?>
    <header><h1>Welcome to HU Social<h1></header>
      <br>
      <br>
      <center>
      <p1 style="font-size: 30px;">Please Sign Up</p1>
      <br>
      <br>
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div style="text-align:center;">
          <input type="text"
                  id="name_first"
                  name="name"
                  class="text"
                  placeholder="First Name"></input>
				  <span color = "red">* <?php echo $nameErr;?></span>
        </div>
        <br>
          <div style="text-align:center;">
          <input type="text"
                  id="name_last"
                  name="lastname"
                  class="text"
                  placeholder="Last Name"></input>
				  <span color = "red">* <?php echo $lastnameErr;?></span>
        </div>
        <br>
        <div style="text-align:center;">
          <input type="text"
                  id="email_sign"
                  name="email_sign"
                  class="text"
                  placeholder="HU Email/User Name"></input>
				  <span color = "red">* <?php echo $emailErr;?></span>
        </div>
        <br>
        <div style="float: center;">
            <input type="password"
                    id="psswrd"
                    name="psswrd"
                    class="text"
                    placeholder="Password"></input>
					<span color = "red">* <?php echo $passwordErr;?></span>
      </div>
      <br>
        <div style="float: center;">
            <input type="password"
                    id="psswrd_con"
                    name="psswrd_con"
                    class="text"
                    placeholder="Confirm Password"></input>
					<span color = "red">* <?php echo $passwordconErr;?></span>
        </div>
        <br>
		<button type="submit" id="signupButton" class="button" style="vertical-align:middle"><span>Sign Up</span></button>
      </form>
      
      <br>
	  
      <a href="..\HTML\login.html" class="text">Login</a>
      <br>
	  <center>
      <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo("Thank you for signing up, $name");} ?><br>
	  <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo("A verification email has been sent to $email ");} ?><br>
	  </center>
      <br>
    </center>
    </body>
    <script src="..\js\signup.js"></script>
</html>
