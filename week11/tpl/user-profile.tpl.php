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
				<h1><?php echo (isset($userDataArray['userName']) ? $userDataArray['userName'] : '');?>'s Profile</h1>
				<h4>User Level -  <?php echo (isset($userDataArray['userLevel']) ? $userDataArray['userLevel'] : ''); ?></h4>
				<?php if (is_file(dirname(__FILE__) . "/../public/images/" . $userDataArray['userID'] . "_profileImage.jpg")) { ?>
					<img src="images/<?php echo $userDataArray['userID'] . "_profileImage.jpg"; ?>" width = 75% height = auto>
				<?php } ?>
			</div>
		<?php }else{ ?>
			<div class = "container">
				<h1>No User of that ID.</h1>
			</div>
		<?php }?>
		<div class = "return"><a href = "view-users.php"><button>View Users</button></a></div>
    </body>
</html>