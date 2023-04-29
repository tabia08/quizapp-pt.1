<?php

require "vendor/autoload.php";

// 1. What does this function session_start() do to the application?
// _____________________________________________________________________


session_start();
if(isset($_POST['fullname'])) {
    $_SESSION['user_fullname'] = $_POST['fullname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['birthday'] = $_POST['birthday'];
    header("Location: quiz.php");
    exit;
}
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>

	<h1>Analogy Exam Registration</h1>
	<h3>Kindly register your basic information before starting the exam.</h3>

	<form method="POST" action="register.php">
		Full Name: &emsp;<input type="text" name="fullname" required />
		<br><br />
		Email Address: &emsp;<input type="email" id="email" name="email" />
		<br><br />
		Birthdate: &emsp;<input type="date" id="birthday" name="birthday" />
		<br><br />
		<br><input type="submit">
	</form>

</body>
</html>
