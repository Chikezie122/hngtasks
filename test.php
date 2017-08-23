<?php
	try {
	$connection = new PDO('mysql:host=127.0.0.1;dbname=team', 'root', '');
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Unable to Connect";
	echo $e->getMessage();
	die();
    }
    
if(isset($_POST['submit'])){
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$phone_number = $_POST['phone_number'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$sql = 'INSERT INTO team_table(first_name,last_name,gender,email,phone_number) VALUES (:first_name, :last_name, :phone_number, :gender, :email, :phone_number)';
	$query= $connection->prepare($sql);
	$query -> execute(array(
		':first_name' => $first_name,
		':last_name' => $last_name,
		':phone_number' => $phone_number,
		':gender' => $gender,
		':email' => $email
));

header('Location: output.php');
exit();
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta lang="en" http-equiv="Content-Type" content="text/html;charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/formlayout.css">
<title>Stage 1 form</title>
</head>
<body class="mainsection">
<form id="form" action="test.php" method="post">
	<fieldset>
	<p><b>Personal Information</b></p>
	<label>First Name:</label>
	<input type="text" name="first_name" placeholder="Enter your first name" class="fulllength" required="required" /><br>
	<label>Last Name</label>
	<input type="text" name="last_name" placeholder="Enter your last name" class="fulllength" required="required" /><br>
	<label>Phone Number</label>
	<input type="text" name="phone_number" placeholder="Enter your Phone Number" class="fulllength" required="required" /><br>
	<label>Gender</label>
	<select name="gender" class="fulllength" required="required">
		<option value="female">Female</option>
		<option value="male">Male</option>
	</select><br>
	<label>Email Address</label>
	<input type="text" name="email" placeholder="Enter your email address" class="fulllength" required="required"/>
	<input type="submit" value = "submit" name="submit" />
	</fieldset>
</form>
</body>
</html>