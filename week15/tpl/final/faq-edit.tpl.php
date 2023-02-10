<html>
	<head>
		<style>
			form {
				background-color: gray;
				width: 400px;
				margin-left: auto;
				margin-right: auto;
				text-align: center;
				padding: 25px;
				
			}
			div {
				text-align: center;
			}
			.input {
				width: 200px;
			}
		</style>
	</head>
    <body>
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">

            <?php if (isset($faqErrorsArray['faqQuestion'])) { ?>
                <div><?php echo $faqErrorsArray['faqQuestion']; ?>
            <?php } ?>
            FAQ Question: <input type="text" name="faqQuestion" class = "input" value="<?php echo (isset($faqDataArray['faqQuestion']) ? $faqDataArray['faqQuestion'] : ''); ?>"/><br>

            <?php if (isset($faqErrorsArray['faqAnswer'])) { ?>
                <div><?php echo $faqErrorsArray['faqAnswer']; ?>
            <?php } ?>

			FAQ Answer: <input type="text" name="faqAnswer" class = "input" value="<?php echo (isset($faqDataArray['faqAnswer']) ? $faqDataArray['faqAnswer'] : ''); ?>"/><br>
            <input type="hidden" name="faqID" value="<?php echo (isset($faqDataArray['faqID']) ? $faqDataArray['faqID'] : ''); ?>"/>
            <input type="submit" name="Save" value="Save"/>
            <input type="submit" name="Cancel" value="Cancel"/>            
        </form>
		<div><a href = "faq-list.php"><button>Return</button></a></div>
		
    </body>
</html>