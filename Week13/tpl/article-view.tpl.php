<html>
    <body>
        title: <?php echo (isset($articleDataArray['articleTitle']) ? $articleDataArray['articleTitle'] : ''); ?><br>
        content: <?php echo (isset($articleDataArray['articleContent']) ? $articleDataArray['articleContent'] : ''); ?><br>
        author: <?php echo (isset($articleDataArray['articleAuthor']) ? $articleDataArray['articleAuthor'] : ''); ?><br>
        date: <?php echo (isset($articleDataArray['articleDate']) ? $articleDataArray['articleDate'] : ''); ?><br>
        
        <?php if (is_file(dirname(__FILE__) . "/../public/images/" . $articleDataArray['articleID'] . "_article.jpg")) { ?>
            <img src="images/<?php echo $articleDataArray['articleID'] . "_article.jpg"; ?>"/>
        <?php } ?>
        <a href="article-list.php">Back to List</a>        
    </body>
</html>