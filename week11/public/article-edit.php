<?php
require_once('../inc/NewsArticles.class.php');
require_once('../inc/Users.class.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user = new Users();
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
	$user->load($_SESSION['userID']);
	if ($user->userData['userLevel'] < 2){
		header('Location: index.php');
		exit;
	}
}else{
	header('Location: index.php');
	exit;
}
// usage: http://localhost/Week05/public/article-edit.php?articleID=1
// usage new: http://localhost/Week05/public/article-edit.php


// create an instance of our class so we can use it
$newsArticle = new NewsArticles();

// initialize some variables to be used by our view
$articleDataArray = array();
$articleErrorsArray = array();

// load the article if we have it
if (isset($_REQUEST['articleID']) && $_REQUEST['articleID'] > 0) {
    $newsArticle->load($_REQUEST['articleID']);
    // set our article array to our local variable
    $articleDataArray = $newsArticle->articleData;
}

// apply the data if we have new data
if (isset($_POST['Save'])) {
    // sanitize and set the post array to our local variable
    $articleDataArray = $newsArticle->sanitize($_POST);
    // pass the array into our instance
    $newsArticle->set($articleDataArray);
    
    // validate
    if ($newsArticle->validate()) {
        // save
        if ($newsArticle->save()) {
            header("location: article-save-success.php");
            exit;
        } else {
            $articleErrorsArray[] = "Save failed";
        }
    } else {
        $articleErrorsArray = $newsArticle->errors;
        $articleDataArray = $newsArticle->articleData;
		var_dump($articleErrorsArray);
    }
}
require_once('../tpl/article-edit.tpl.php');
?>
