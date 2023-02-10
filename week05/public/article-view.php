<?php
// usage: http://localhost/Week05/public/article-view.php?articleID=1
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();

$articleDataArray = array();

// load the article if we have it
if (isset($_REQUEST['articleID']) && $_REQUEST['articleID'] > 0) {
    $newsArticle->load($_REQUEST['articleID']);
    $articleDataArray = $newsArticle->articleData;
}
?>
<html>
	<head>
		<style>
			.container {
				width: 500px;
				background-color: antiquewhite;
				margin-left: auto;
				margin-right: auto;
				text-align: center;
				padding: 20px;
			}
			.content {
				text-align: left;
			}
		</style>
	</head>
    <body>
		<div class = "container">
			<h2><?php echo (isset($articleDataArray['articleTitle']) ? $articleDataArray['articleTitle'] : ''); ?></h2>
			<h4>By: <?php echo (isset($articleDataArray['articleAuthor']) ? $articleDataArray['articleAuthor'] : ''); ?>, <?php echo (isset($articleDataArray['articleDate']) ? $articleDataArray['articleDate'] : ''); ?></h4>
			<p class = "content"><?php echo (isset($articleDataArray['articleContent']) ? $articleDataArray['articleContent'] : ''); ?></p>
		</div>
    </body>
</html>