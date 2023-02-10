<html>
	<head>
		<style>
			#container {
				text-align: center;
				width: 600px;
				background-color: gray;
				margin-left: auto;
				margin-right: auto;
				padding: 20px;
			}
			table, td {
				border: solid black 2px;
				padding: 5px;
			}
			table {
				margin-left: auto;
				margin-right: auto;
				background-color: white;
			}
			.header {
				background-color: lightblue;
			}
			.dir {
				float: right;
			}
			.top {
				display: inline-block;
				width: 230px;
				height: 35px;
				line-height: 35px;
				background-color:antiquewhite;
			}
			a:visited, a:link {
				color: black;
				text-decoration: none;
			}
			.nav {
				display: flex;
				flex-direction: row;
				justify-content: space-around;
			}
			.greeting {
				font-size: 1.25em;
				width: 40%;
				margin: 0px auto 20px auto;
				background-color: lightgray;
			}
			.user-define {
				background-color: lightgray;
				margin: 15px auto 15px auto;
				width: 75%;
				padding: 5px;
			}
			.user-define p {
				text-align: left;
			}
			.button {
				display: flex;
				flex-direction: row;
				justify-content: space-around;
				margin-top: 15px;
				
			}
		</style>
	</head>
	<body>
		<div id = "container">
			<?php if(isset($user->userData['userName'])){ ?>
				<div class = "greeting">Hello <?php echo $user->userData['userName']?>!</div>
			<?php }?>
			<a href = "../public/view-users.php"><div class = "top">Return to View Users</div></a>
			<h1>User Report </h1>
			<p>
				<?php if (isset($_GET['btnViewReport'])){ ?>
					<a href="<?= $_SERVER['SCRIPT_NAME'] . "?" . $downloadReportLink; ?>"><button>Download Current Report</button></a>
				<?php } ?>
			</p>
			<form action = "" method = "get">
				<p>
					Search: 
					<select name = "filterColumn">
						<option value = "userName"<?php selectedCheck("userName", $filterColumn)?>>User Name</option>
						<option value = "userLevel"<?php selectedCheck("userLevel", $filterColumn)?>>User Level</option>
					</select>
					<input type = "text" name = "filterText" value = <?php echo $filterText;?>></input>
					<input type = "submit" name = "btnViewReport" value = "View Report">

				</p>
			</form>
				
			<table>
				<tr class = "header">
					<td>Username <a href = "<?php echo $_SERVER['SCRIPT_NAME']. "?" . $sortNameDescLink;?>"class = "dir"><button>&darr;</button></a> <a href = "<?php echo $_SERVER['SCRIPT_NAME'] . "?" . $sortNameAscLink;?>" class = "dir"><button>&uarr;</button></a></td>
					
					<td>User Level <a href = "<?php echo $_SERVER['SCRIPT_NAME']. "?" . $sortLevelDescLink;?>" class = "dir"><button>&darr;</button></a> <a href = "<?php echo $_SERVER['SCRIPT_NAME'] . "?" . $sortLevelAscLink; ?>" class = "dir"><button>&uarr;</button></a></td>
					
					<td>View Profile</td>
					<td>Edit User</td>
				</tr>
				<?php foreach ($userList as $userData) {?>
					<tr>
						<td><?php echo $userData['userName']?></td>
						<td><?php echo $userData['userLevel']?></td>
						<td><a href = "user-profile.php?userID=<?php echo $userData['userID']?>"><button>View Profile</button></a></td>
						<td><a href = "login.php?mode=update&userID=<?php echo $userData['userID']?>"><button>Edit User</button></a></td>
					</tr>
				<?php } ?>
			</table>
			<div class = "button">
				<a href ="<?= $_SERVER['SCRIPT_NAME']; ?>?<?= $previousPageLink; ?>"><button <?php if ($page <= 1){ echo "disabled";}?>>Previous Page</button></a>
				
				<a href ="<?= $_SERVER['SCRIPT_NAME']; ?>?<?= $nextPageLink; ?>"><button <?php if ($page >= $maxPage){ echo "disabled";}?>>Next Page</button></a>
			</div>
		</div>

	</body>
</html>