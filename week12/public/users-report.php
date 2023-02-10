<?php
require_once('../inc/NewsArticles.class.php');
require_once('../inc/Users.class.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//login functionality with users
$user = new Users();
$userList = array();
$totalRecords = 0;
$recordsPerPage = 2;
$page = 0;
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
	$user->load($_SESSION['userID']);
	if ($user->userData['userLevel'] < 3){
		header('Location: index.php');
		exit;
	}
}else {
	header('Location: index.php');
	exit;
}
//echo 'name: '.$user->userData['userName'];
$filterColumn = "";
$filterText = "";
if(isset($_GET['btnViewReport'])){
	$userList = $user->getFilteredList(
		(isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
		(isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
		(isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
		(isset($_GET['filterText']) ? $_GET['filterText'] : null),
		(isset($_GET['page']) ? $_GET['page'] : 1)
	);
	//echo $userList[0]['userName'];
	$totalRecords = count($user->getFilteredList(
		(isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
		(isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
		(isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
		(isset($_GET['filterText']) ? $_GET['filterText'] : null)
	));
	
	if (isset($_REQUEST["filterColumn"])){
		$filterColumn = $_REQUEST["filterColumn"];
	}
	if (isset($_REQUEST["filterText"])){
		$filterText = $_REQUEST["filterText"];
	}
	$page = 1;
	
}
if (isset($_GET['download']) && $_GET['download'] == "1") {
	
	// echo the data
	$userList = $user->getFilteredList(
		(isset($_GET['sortColumn']) ? $_GET['sortColumn'] : null),
		(isset($_GET['sortDirection']) ? $_GET['sortDirection'] : null),
		(isset($_GET['filterColumn']) ? $_GET['filterColumn'] : null),
		(isset($_GET['filterText']) ? $_GET['filterText'] : null),
		null
	);
	
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="' . date("YmdHis") . '_users_report.csv"');
	
	foreach ($userList as $rowData) {
		echo '"' . implode('","', $rowData) . '"';
		echo "\r\n";
	}
	
	exit;
}
function selectedCheck($value1, $value2){
	if ($value1 == $value2){
	echo 'selected="selected"';
	}
	return '';
}
if (isset($_GET['page'])){
	$page = $_GET['page'];
}
$maxPage = ceil( $totalRecords/$recordsPerPage);

//echo var_dump($userList) . "<br>" . $totalRecords ."<br>". $maxPage;

$nextPage = $previousPage = $sortNameAsc = $sortNameDesc = $sortLevelAsc = $sortLevelDesc = $downloadReport = $_GET;

$sortNameAsc['sortColumn'] = 'userName';
$sortNameAsc['sortDirection'] = 'ASC';
$sortNameAscLink = http_build_query($sortNameAsc);

$sortNameDesc['sortColumn'] = 'userName';
$sortNameDesc['sortDirection'] = 'DESC';
$sortNameDescLink = http_build_query($sortNameDesc);

$sortLevelAsc['sortColumn'] = 'userLevel';
$sortLevelAsc['sortDirection'] = 'ASC';
$sortLevelAscLink = http_build_query($sortLevelAsc);

$sortLevelDesc['sortColumn'] = 'userLevel';
$sortLevelDesc['sortDirection'] = 'DESC';
$sortLevelDescLink = http_build_query($sortLevelDesc);

$downloadReport['download'] = '1';
$downloadReportLink = http_build_query($downloadReport);

$nextPage['page'] = (isset($_GET['page']) ? $_GET['page'] + 1 : 2); //how
$nextPageLink = http_build_query($nextPage);

$previousPage['page'] = (isset($_GET['page']) ? $_GET['page'] - 1 : 2);
$previousPageLink = http_build_query($previousPage);


//var_dump($newsArticle->getList());
//var_dump($articleList[1]["articleTitle"]);
require_once('../tpl/users-report.tpl.php');
?>
