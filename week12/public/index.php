<?php
require_once('../inc/NewsArticles.class.php');
require_once('../inc/Users.class.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//login functionality with users
$user = new Users();
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
	$user->load($_SESSION['userID']);
}
//echo 'name: '.$user->userData['userName'];

$filterColumn = "";
$filterText = "";
if(isset($_REQUEST["submit"]) && $_REQUEST["submit"] == "Search" || isset($_REQUEST["sortColumn"])){
	
	$newsArticle = new NewsArticles();
	$articleList = $newsArticle->getFilteredList(
		(isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
		(isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
		(isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
		(isset($_GET['filterText']) ? $_GET['filterText'] : null)
	);
	if (isset($_REQUEST["filterColumn"])){
		$filterColumn = $_REQUEST["filterColumn"];
	}
	if (isset($_REQUEST["filterText"])){
		$filterText = $_REQUEST["filterText"];
	}
	
} else {
	$newsArticle = new NewsArticles();
	$articleList = $newsArticle->getList();
}
function selectedCheck($value1, $value2){
	if ($value1 == $value2){
	echo 'selected="selected"';
	}
	return '';
}

//$url = "http://localhost/WDV%20Server/WDV441/week12/public/user-rest-single.php?userID=1";
$url = "http://api.weatherunlocked.com/api/current/us.50317?app_id=4d027a5f&app_key=180f2565ad758dc4d93995e8bdb37719";


$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, $url);

//header
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));

// if redirected, follow it
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$userAgent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36";

curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);

// $output contains the output string
$output = json_decode(curl_exec($ch));

// close curl resource to free up system resources
curl_close($ch);     

//var_dump($newsArticle->getList());
//var_dump($articleList[1]["articleTitle"]);
require_once('../tpl/index.tpl.php');
?>
