<?php
require_once('../../inc/NewsArticles.class.php');
require_once('../../inc/Users.class.php');
require_once('../../inc/Faqs.class.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user = new Users();
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
	$user->load($_SESSION['userID']);
	if ($user->userData['userLevel'] < 3){
		header('Location: faq-list.php');
		exit;
	}
}else{
	header('Location: faq-list.php');
	exit;
}

// usage: http://localhost/Week05/public/article-edit.php?articleID=1
// usage new: http://localhost/Week05/public/article-edit.php


// create an instance of our class so we can use it
$faq = new Faqs();

// initialize some variables to be used by our view
$faqDataArray = array();
$faqErrorsArray = array();

// load the article if we have it
if (isset($_REQUEST['faqID']) && $_REQUEST['faqID'] > 0) {
    $faq->load($_REQUEST['faqID']);
    // set our article array to our local variable
    $faqDataArray = $faq->faqData;
}

// apply the data if we have new data
if (isset($_POST['Save'])) {
    // sanitize and set the post array to our local variable
    $faqDataArray = $faq->sanitize($_POST);
    // pass the array into our instance
    $faq->set($faqDataArray); 
    // validate
    if ($faq->validate()) {
        // save
        if ($faq->save()) {
           header("location: faq-list.php");
            exit;
        } else {
            $faqErrorsArray[] = "Save failed";
        }
    } else {
        $faqErrorsArray = $faq->errors;
        $faqDataArray = $faq->faqData;
		var_dump($faqErrorsArray);
    }
}
require_once('../../tpl/final/faq-edit.tpl.php');
?>
