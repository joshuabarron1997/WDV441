<?php
require_once('../inc/NewsArticles.class.php');
require_once('../inc/Users.class.php');
$user = new Users();
$userDataArray = array();

if (isset($_REQUEST['userID']) && $_REQUEST['userID'] > 0) {
    $user->load($_REQUEST['userID']);
    $userDataArray = $user->userData;
}
echo json_encode($userDataArray);
?>
