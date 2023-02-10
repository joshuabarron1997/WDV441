<html>
	<head>
		<style>
			.container {
				width: 500px;
				background-color: antiquewhite;
				margin-bottom: 15px;
				margin-left: auto;
				margin-right: auto;
				text-align: center;
				padding: 20px;
			}
			.content {
				text-align: left;
			}
			.return {
				text-align: center;
			}
		</style>
	</head>
    <body>
		<div class = "container">
			<h2><?php echo (isset($articleDataArray['articleTitle']) ? $articleDataArray['articleTitle'] : ''); ?></h2>
			<h4>By: <?php echo (isset($articleDataArray['articleAuthor']) ? $articleDataArray['articleAuthor'] : ''); ?>, <?php echo (isset($articleDataArray['articleDate']) ? $articleDataArray['articleDate'] : ''); ?></h4>
			<p class = "content"><?php echo (isset($articleDataArray['articleContent']) ? $articleDataArray['articleContent'] : ''); ?></p>
		</div>
		<div class = "return"><a href = "index.php"><button>Return</button></a></div>
    </body>
</html>