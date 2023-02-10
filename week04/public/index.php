<?php

//self posting variables
$status = "";
$firstName = "";
$lastName = "";
$dateOfBirth = "";
$email = "";
$message = "";
$firstNameERR = "";
$lastNameERR = "";
$dateOfBirthERR = "";
$emailERR = "";
$messageERR = "";
//functions
function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}
function validPost(){
	//requiring the class only after it is good to send
	require_once("../inc/email.class.php");
	$mail = new ContactForm(); //creating object
	
	$mail->setFirst($_POST["firstName"]); //filling object will information through functions
	$mail->setLast($_POST["lastName"]);
	$mail->setDate($_POST["dateOfBirth"]);
	$mail->setEmail($_POST["email"]);
	$mail->setMessage($_POST["message"]);
	$mail->setSubject("Josh Barron Week 4 E-mail");
	
	$mail->send(); //sending mail through function
}
//submition
if (isset($_POST["submit"])){
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$dateOfBirth = $_POST["dateOfBirth"];
	$email = $_POST["email"];
	$message = $_POST["message"];
	$validPost = true;
	
	//firstname
		$firstName = filter_var($firstName);
		if (!is_numeric($firstName)){
			$firstNameERR = "";
		}
		else {
			//failure to validate
			$firstNameERR = "Please use non-numerics";
			$validPost = false;
		}
	//lastname
		$lastName = filter_var($lastName);
		if (!is_numeric($lastName)){
			$lastNameERR = "";

		}
		else{
			//failure to validate
			$lastNameERR = "Please use non-numerics";
			$validPost = false;
		}
	//date
		$dateOfBirth = filter_var($dateOfBirth);
		if (validateDate($dateOfBirth)){
			$dateOfBirthERR = "";
		}
		else{
			//failure to validate
			$dateOfBirthERR = "Invalid Date";
			$validPost = false;
		}
	//email
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false){
			$emailERR = "";
		}
		else {
			//failure to validate
			$emailERR = "Invalid E-mail Adress";
			$validPost = false;
		}
	//message
		$message = filter_var($message);
		if (filter_var($message)){
			$messageERR = "";
		}
		else{
			//failure to validate
			$messageERR = "Invalid characters in message";
			$validPost = false;
		}
	//delivery
		if($validPost){
			$status = "success";
			validPost();
		}
		else {
			$status = "failure";
		}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>E-mail Class Refresher</title>
	<style>
		#container {
			width: 400px;
			padding: 15px;
			margin-right: auto;
			margin-left: auto;
			background-color: lightgoldenrodyellow;
			text-align: left;
		}
		#emailForm {
			display: flex;
			flex-direction: column;
			margin-left: auto;
			margin-right: auto;

		}
		label {
			margin: 5px;
		}
		.center {
			text-align: center;
		}
		.buttons {
			margin: 15px;
		}
		.error {
			color: red;
			font-size: 75%;
		}
	</style>
</head>

<body>
	<div id = "container">
		<h1 class = "center">E-mail Form</h1>
		<form action = "index.php" method = "post" id = "emailForm">
			<label>First Name
				<input type = "text" name = "firstName" placeholder="John" id = "firstName" value="<?php echo $firstName?>" required ><?php echo $firstNameERR?>
			</label>
			<label>Last Name
				<input type = "text" name = "lastName" placeholder="Doe" id = "lastName" value="<?php echo $lastName?>" required><?php echo $lastNameERR?>
			</label>
			<label>Date of Birth
				<input type = "date" name = "dateOfBirth" id = "dateOfBirth" value="<?php echo $dateOfBirth?>" required><?php echo $dateOfBirthERR?>
			</label>
			<label>E-mail Address
				<input type = "email" name = "email" placeholder = "johndoe1975@gmail.com" id = "email" value="<?php echo $email?>" required><?php echo $emailERR?>
			</label>
			<label for = "message">Message</label><?php echo $messageERR?>
			<textarea name = "message" placeholder="your message here." id = "message" rows="10" cols="40" required><?php echo $message?></textarea>
			
			<div class = "center buttons">
				<input type = "reset" name = "reset" id = "reset">
				<input type = "submit" name = "submit" id = "submit">
			</div>
			<?php echo $status?>
		
		</form>
	</div>
</body>
</html>