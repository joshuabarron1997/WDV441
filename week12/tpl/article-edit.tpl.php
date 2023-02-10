<html>
	<head>
		<style>
			form {
				background-color: gray;
				width: 300px;
				margin-left: auto;
				margin-right: auto;
				text-align: center;
				padding: 25px;
				
			}
			div {
				text-align: center;
			}
		</style>
	</head>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
            <?php if (isset($articleErrorsArray['articleTitle'])) { ?>
                <div><?php echo $articleErrorsArray['articleTitle']; ?>
            <?php } ?>
            title: <input type="text" name="articleTitle" value="<?php echo (isset($articleDataArray['articleTitle']) ? $articleDataArray['articleTitle'] : ''); ?>"/><br>
            content: <textarea name="articleContent"><?php echo (isset($articleDataArray['articleContent']) ? $articleDataArray['articleContent'] : ''); ?></textarea><br>
            author: <input type="text" name="articleAuthor" value="<?php echo (isset($articleDataArray['articleAuthor']) ? $articleDataArray['articleAuthor'] : ''); ?>"/><br>
            date: <input type="text" name="articleDate" value="<?php echo (isset($articleDataArray['articleDate']) ? $articleDataArray['articleDate'] : ''); ?>"/><br>
            <input type="hidden" name="articleID" value="<?php echo (isset($articleDataArray['articleID']) ? $articleDataArray['articleID'] : ''); ?>"/>
            <input type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>            
        </form>
		<div><a href = "index.php"><button>Return</button></a></div>
		
    </body>
</html>