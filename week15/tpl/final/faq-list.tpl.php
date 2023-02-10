<html>
	<head>
		<style>
			#container {
				text-align: center;
				width: 750px;
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
				width: 80%;
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
			.button {
				margin-top: 15px;
			}
			.listControls {
				display: flex;
				flex-direction: row;
				justify-content: left;
				width: 80%;
				margin-left: auto;
				margin-right: auto;
			}
			.FAQ-table {
				width: 750px;
				margin: 10px auto 0px auto;
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
					<a href = "../login.php?logout=true"><div class = "top">Logout</div></a>
				<?php }else{?>
					<a href = "../login.php"><div class = "top">Login</div></a>
				<?php }?>
				<a href = "../index.php"><div class = "top">View Articles</div></a>
			</div>
			<form action = "faq-list.php" method = "get">
				<p>
					Search: 
					<select name = "filterColumn">
						<option value = "faqQuestion"<?php selectedCheck("faqQuestion", $filterColumn)?>>FAQ Question</option>
						<option value = "faqAnswer"<?php selectedCheck("faqAnswer", $filterColumn)?>>FAQ Answer</option>
					</select>
					<input type = "text" name = "filterText" value = <?php echo $filterText;?>></input>
					<input type = "submit" name = "submit" value = "Search">
					<input type = "submit" name = "submit" value = "Reset">
				</p>
			</form>
				
			<table>
				<tr class = "header">
					<td>FAQ Question <a href = "<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=faqQuestion&sortDirection=DESC"class = "dir"><button>&darr;</button></a> <a href = "<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=faqQuestion&sortDirection=ASC" class = "dir"><button>&uarr;</button></a></td>
					
					<td>FAQ Answer <a href = "<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=faqAnswer&sortDirection=DESC" class = "dir"><button>&darr;</button></a> <a href = "<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=faqAnswer&sortDirection=ASC" class = "dir"><button>&uarr;</button></a></td>
					
					<td>View FAQ</td>
					<td>Edit FAQ</td>
				</tr>
				<?php foreach ($faqList as $faqData) {?>
					<tr>
						<td><?php echo $faqData['faqQuestion']?></td>
						<td><?php echo $faqData['faqAnswer']?></td>
						<td><a href = "faq-view.php?faqID=<?php echo $faqData['faqID']?>"><button>View FAQ</button></a></td>
						<td><a href = "faq-edit.php?faqID=<?php echo $faqData['faqID']?>"><button>Edit FAQ</button></a></td>
					</tr>
				<?php } ?>
			</table>
			<div class = "listControls">
				<div class = "button"><a href = "faq-rest-list.php"><button>Restful FAQ List</button></a></div>
				<div class = "button"><a href = "faq-widget.php?limit=2"><button>FAQ Widget</button></a></div>
			</div>
		</div>
		<div>
			<?php require_once("../../public/final/faq-widget.php"); ?>
		</div>
	</body>
</html>