<?php
require_once('../inc/NewsArticles.class.php');

$newsArticle = new NewsArticles();
//var_dump($newsArticle->getList());
$articleList = $newsArticle->getList();
$articleTable = "";
//var_dump($articleList[1]["articleTitle"]);

for ($i = 0; $i < count($articleList); $i++){
	$articleTable = $articleTable 
		. "<tr><td>" . $articleList[$i]["articleTitle"] . "</td>"
		. "<td><a href = 'article-view.php?articleID=".$articleList[$i]["articleID"]."'><button>View</button></a></td>
		<td><a href = 'article-edit.php?articleID=".$articleList[$i]["articleID"]."'><button>Edit</button></a></td></tr>";
}


//var_dump($newsArticle->load(1));
//var_dump($newsArticle->articleData);
//die;
//
/*
$article = array(
    "articleID" => "",
    "articleTitle" => "Test Article 1",
    "articleContent" => "Content 1",
    "articleAuthor" => "GG",
    "articleDate" => "2021-02-18"
);

$newsArticle->set($article);
*/

//$newsArticle->articleData["articleAuthor"] = "GG2";
//
////var_dump($newsArticle->articleData);
//
//if ($newsArticle->validate()) {
//    var_dump($newsArticle->save());
//} else {
//    // do something with the errors
//    var_dump($newsArticle->errors);
//}

//var_dump($newsArticle->articleData);

/*
$newsArticle->load(1);
$newsArticle->articleData['articleTitle'] = "Test Article 1a";
*/

//var_dump($newsArticle->save());

//var_dump($newsArticle);
?>
<html>
	<head>
		<style>
			#container {
				text-align: center;
				width: 450px;
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
		</style>
	</head>
	<body>
		<div id = "container">
			<h1>Newspaper</h1>
			<table>
				<tr class = "header">
					<td>Article Title</td>
					<td>View</td>
					<td>Edit</td>
				</tr>
				<?php
					echo $articleTable;
				?>
			</table>
			<p><a href = "article-edit.php"><button>Create Article</button></a></p>
		</div>
	</body>
</html>