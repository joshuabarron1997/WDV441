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
		</style>
	</head>
	<body>
		<div id = "container">
			<?php if(isset($user->userData['userName'])){ ?>
				<div class = "greeting">Hello <?php echo $user->userData['userName']?>!</div>
			<?php }?>
			
			<div class = "nav">
				<?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']){?>
					<a href = "login.php?logout=true"><div class = "top">Logout</div></a>
				<?php }else{?>
					<a href = "login.php"><div class = "top">Login</div></a>
				<?php }?>
				<a href = "index.php"><div class = "top">View Articles</div></a>
			</div>
			<div class = "user-define">
				<h1>User List</h1>
				<p>*User Level 0 is a guest and has no privileges</p>
				<p>*User Level 1 is a Contributer and has privileges to articles</p>
				<p>*User Level 2 is a Administrator and has privileges articles &amp; users</p>
			</div>
			<form action = "view-users.php" method = "get">
				<p>
					Search: 
					<select name = "filterColumn">
						<option value = "userName"<?php selectedCheck("userName", $filterColumn)?>>User Name</option>
						<option value = "userLevel"<?php selectedCheck("userLevel", $filterColumn)?>>User Level</option>
					</select>
					<input type = "text" name = "filterText" value = <?php echo $filterText;?>></input>
					<input type = "submit" name = "submit" value = "Search">
					<input type = "submit" name = "submit" value = "Reset">
				</p>
			</form>
				
			<table>
				<tr class = "header">
					<td>Username <a href = "<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userName&sortDirection=DESC"class = "dir"><button>&darr;</button></a> <a href = "<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userName&sortDirection=ASC" class = "dir"><button>&uarr;</button></a></td>
					
					<td>User Level <a href = "<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userLevel&sortDirection=DESC" class = "dir"><button>&darr;</button></a> <a href = "<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=userLevel&sortDirection=ASC" class = "dir"><button>&uarr;</button></a></td>
					
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
		</div>
	</body>
</html>