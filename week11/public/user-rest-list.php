<?php
require_once('../inc/NewsArticles.class.php');
require_once('../inc/Users.class.php');
$user = new Users();
$filterColumn = "";
$filterText = "";
if(isset($_REQUEST["submit"]) && $_REQUEST["submit"] == "Search" || isset($_REQUEST["sortColumn"])){
	
	$userList = $user->getFilteredList(
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
	$userList = $user->getList();
}
echo json_encode($userList);
?>
