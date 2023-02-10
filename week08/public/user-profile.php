<?php
require_once('../inc/NewsArticles.class.php');
require_once('../inc/Users.class.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// usage: http://localhost/Week05/public/article-view.php?articleID=1

$newsArticle = new NewsArticles();
$articleDataArray = array();

$user = new Users();
$userDataArray = array();
$validProfile = false;

// load the user if we have it
if (isset($_REQUEST['userID'])) {
    $validProfile = $user->load($_REQUEST['userID']);
    $userDataArray = $user->userData;
}
require_once('../tpl/user-profile.tpl.php');
?>
