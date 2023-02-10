<?php
require_once('../../inc/NewsArticles.class.php');
require_once('../../inc/Users.class.php');
require_once('../../inc/Faqs.class.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//login functionality with users
$user = new Users();
$faq = new Faqs();
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
	$user->load($_SESSION['userID']);
}
//echo 'name: '.$user->userData['userName'];

$filterColumn = "";
$filterText = "";
if(isset($_REQUEST["submit"]) && $_REQUEST["submit"] == "Search" || isset($_REQUEST["sortColumn"])){
	
	$faqList = $faq->getFilteredList(
		(isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
		(isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
		(isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
		(isset($_GET['filterText']) ? $_GET['filterText'] : null),
		null
	);
	if (isset($_REQUEST["filterColumn"])){
		$filterColumn = $_REQUEST["filterColumn"];
	}
	if (isset($_REQUEST["filterText"])){
		$filterText = $_REQUEST["filterText"];
	}
	
} else {
	$faqList = $faq->getList();
}
function selectedCheck($value1, $value2){
	if ($value1 == $value2){
	echo 'selected="selected"';
	}
	return '';
}

//var_dump($newsArticle->getList());
//var_dump($articleList[1]["articleTitle"]);
require_once('../../tpl/final/faq-list.tpl.php');
?>
