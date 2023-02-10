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
		<?php if($validProfile){ ?>
			<div class = "container">
				<h1>Question: <?php echo (isset($faqDataArray['faqQuestion']) ? $faqDataArray['faqQuestion'] : '');?></h1>
				<h1>Answer: <?php echo (isset($faqDataArray['faqAnswer']) ? $faqDataArray['faqAnswer'] : ''); ?></h1>
			</div>
		<?php }else{ ?>
			<div class = "container">
				<h1>No User of that ID.</h1>
			</div>
		<?php }?>
		<div class = "return"><a href = "../final/faq-list.php"><button>View FAQs</button></a></div>
    </body>
</html>