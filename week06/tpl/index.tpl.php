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
		</style>
	</head>
	<body>
		<div id = "container">
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
	</body>
</html>