<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('../inc/users.class.php');

// create an instance of our class so we can use it
$user = new Users();

// initialize some variables to be used by our view
$userDataArray = array();
$userErrorsArray = array();

//depending on form type change buttons or show elements
$buttonType = "Login";
$levelVisibility = "hidden";
$mode = "login";
if(isset($_REQUEST['logout']) && $_REQUEST['logout'] == true){
	$user->logout();
}
//signup
if(isset($_REQUEST['mode']) && $_REQUEST['mode'] == "signup"){
	$buttonType = "Sign Up";
	$levelVisibility = "";
	$mode = "signup"; //functionallity will be turned to signup
}
//update
if(isset($_REQUEST['mode']) && $_REQUEST['mode'] == "update"){
	$buttonType = "Update";
	$levelVisibility = "";
	$mode = "update"; //functionallity will be turned to update
}
// apply the data if we have new data
if (isset($_REQUEST['submit']) && $mode == "login") {
	//echo "in login";
	$userDataArray = $user->sanitize($_POST);
	$user->set($userDataArray);
	$loginID = $user->login($user->userData['userName'], $user->userData['password']);
	if ($loginID > 0 && $user->validate()){
		//success
		$_SESSION['loggedIn'] = true;
		$_SESSION['userID'] = $loginID;
		$_SESSION['userLevel'] = $user->userData['userLevel'];
		
		header('Location: index.php');
		exit;
	}else{
		//failure to login
		$userErrorsArray = $user->errors;
	}
}
if (isset($_POST['submit']) && $mode == "signup"){
	$userDataArray = $user->sanitize($_POST);
	$user->set($userDataArray);
	if($user->validate()){//validations function later
		if($user->save()){
			//success
			$_SESSION['loggedIn'] = true;
			$_SESSION['userID'] = $user->userData['userID'];
			$_SESSION['userLevel'] = $user->userData['userLevel'];
			
			echo $_SESSION['userID'];
			header('Location: index.php');
			exit;
			
		}else{
			$userErrorsArray = $user->errors;
			//echo var_dump($userErrorsArray);
		}
	}else {
		$userErrorsArray = $user->errors;
		//echo var_dump($userErrorsArray);
	}
}
if (
	//you will only be able to update if you are that user OR an administrator
	isset($_POST['submit']) &&
	$mode == "update" &&
	isset($_SESSION['loggedIn']) &&
	$_SESSION['userID'] == $_REQUEST['userID']
	|| 
	isset($_POST['submit']) &&
	$mode == "update" &&
	isset($_SESSION['loggedIn']) &&
	$_SESSION['userLevel'] >= 2
	){
		$userDataArray = $user->sanitize($_POST);
		$userDataArray['userID'] = $_REQUEST['userID'];
		$user->set($userDataArray);
		if($user->validate()){//validations function later

			if($user->update()){
				echo "success";
				//success
				$_SESSION['loggedIn'] = true;
				$_SESSION['userID'] = $user->userData['userID'];
				$_SESSION['userLevel'] = $user->userData['userLevel'];

				echo $_SESSION['userID'];
				header('Location: index.php');
				exit;

			}else{
				$userErrorsArray = $user->errors;
				//echo var_dump($userErrorsArray);
			}
		}else {
			$userErrorsArray = $user->errors;
			//echo var_dump($userErrorsArray);
		}
	}
require_once('../tpl/login.tpl.php');
?>
