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
			#weather {
				text-align: center;
				width: 600px;
				background-color: lightblue;
				margin: 15px auto 0px auto;
				padding: 20px;
			}
			#weather div {
				text-align: left;
			}
			#weather table td {
				border: none;
				border-bottom: solid 1px gray;
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
				<a href = "view-users.php"><div class = "top">View Users</div></a>
			</div>
			<h1>Newspaper</h1>
			<form action = "index.php" method = "get">
				<p>
					Search: 
					<select name = "filterColumn">
						<option value = "articleTitle"<?php selectedCheck("articleTitle", $filterColumn)?>>Article Title</option>
						<option value = "articleAuthor"<?php selectedCheck("articleAuthor", $filterColumn)?>>Article Author</option>
						<option value = "articleDate"<?php selectedCheck("articleDate", $filterColumn)?>>Article Date</option>
						<option value = "articleContent"<?php selectedCheck("articleContent", $filterColumn)?>>Article Content</option>
					</select>
					<input type = "text" name = "filterText" value = <?php echo $filterText;?>></input>
					<input type = "submit" name = "submit" value = "Search">
					<input type = "submit" name = "submit" value = "Reset">
				</p>
			</form>
				
			<table>
				<tr class = "header">
					<td>Article Title <a href = "<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleTitle&sortDirection=DESC"class = "dir"><button>&darr;</button></a> <a href = "<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleTitle&sortDirection=ASC" class = "dir"><button>&uarr;</button></a></td>
					
					<td>Author <a href = "<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=DESC" class = "dir"><button>&darr;</button></a> <a href = "<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleAuthor&sortDirection=ASC" class = "dir"><button>&uarr;</button></a></td>
					
					<td>Date <a href = "<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleDate&sortDirection=DESC" class = "dir"><button>&darr;</button></a> <a href = "<?php echo $_SERVER['SCRIPT_NAME']; ?>?sortColumn=articleDate&sortDirection=ASC" class = "dir"><button>&uarr;</button></a></td>
					
					<td>View</td>
					<td>Edit</td>
				</tr>
				<?php foreach ($articleList as $articleData) {?>
					<tr>
						<td><?php echo $articleData['articleTitle']?></td>
						<td><?php echo $articleData['articleAuthor']?></td>
						<td><?php echo $articleData['articleDate']?></td>
						<td><a href = "article-view.php?articleID=<?php echo $articleData['articleID']?>"><button>View</button></a></td>
						<td><a href = "article-edit.php?articleID=<?php echo $articleData['articleID']?>"><button>Edit</button></a></td>
					</tr>
				<?php } ?>
			</table>
			<p><a href = "article-edit.php"><button>Create Article</button></a></p>
		</div>
		<div id = "weather">
		<table>
			<tr><th><h2>Current Weather via API</h2></th></tr>
			<tr><td><p>it is currently <?php echo $output->temp_f?>°, but feels like <?php echo $output->feelslike_f?>°.</p></td></tr>
			<tr><td><p>There is a max windspeed of <?php echo $output->windspd_mph?> mph coming from <?php echo $output->winddir_deg?> degrees.</p></td></tr>
			<tr><td><p>it is about <?php echo $output->cloudtotal_pct?>% cloudy at the moment.</p></td></tr>
			<tr><td><p>Humidity is <?php echo $output->humid_pct?>%.</p></td></tr>
			<tr><td><p>Visibility is <?php echo $output->vis_mi?> miles.</p></td></tr>
		</table>
		</div>
	</body>
</html>