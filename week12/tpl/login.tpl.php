<html>
<head>
<meta charset="utf-8">
<title><?php echo $buttonType?></title>
	<style>
		form {
			background-color: lightgray;
			width: 400px;
			margin-left: auto;
			margin-right: auto;
			text-align: center;
			padding: 25px 25px 5px 25px;

		}
		div {
			text-align: center;
		}
		.button {
			margin: 15px 0px 5px 0px;
		}
		td input, td select {
			width: 80%;
		}
		.error {
			color: red;
		}
		table {
			margin-left: auto;
			margin-right: auto;
		}
		.
	</style>
</head>

<body>
        <form action="" method="post" enctype="multipart/form-data"><!--found out leaving the action empty will make it use the current url-->
			<table>
				<tr>
					<td><label for = "userName">Username:</label></td>
					<td><input type="text" name="userName" value=""/></td>
				</tr>
				<?php if(isset($userErrorsArray['userName'])){ ?>
				<tr>
					<td></td>
					<td class = "error"><?php echo $userErrorsArray['userName']?></td>
				</tr>
				<?php } ?>
				<tr>
					<td><label for = "password">Password:</label></td>
					<td><input type = "text" name = "password" value = ""></td>
				</tr>
				<?php if(isset($userErrorsArray['password'])){ ?>
				<tr>
					<td></td>
					<td class = "error"><?php echo $userErrorsArray['password']?></td>
				</tr>
				<?php } ?>
				<?php if(isset($userErrorsArray['login'])){ ?>
				<tr>
					<td></td>
					<td class = "error"><?php echo $userErrorsArray['login']?></td>
				</tr>
				<?php } ?>			
				<tr <?php echo $signUpVisibility?>>
					<td><label for = "userLevel">User Level</label></td>
					<td>
						<select name = "userLevel">
							<option value = "1">Guest</option>
							<option value = "2">Contributer</option>
							<option value = "3">Administrator</option>
						</select>					
					</td>
				</tr>
				<tr class = "center" <?php echo $signUpVisibility?>>
					<td><label for = "userImage">Image: </label></td>
					<td><input type = "file" name = "userImage"></td>
				</tr>
				<?php if(isset($userErrorsArray['image'])){ ?>
				<tr>
					<td></td>
					<td class = "error"><?php echo $userErrorsArray['image']?></td>
				</tr>
				<?php } ?>
			</table>
			<input type="submit" name="submit" value="<?php echo $buttonType?>" class = "button"/>
			<?php if(isset($_REQUEST['mode']) && $_REQUEST['mode'] == "signup"){?>
				<div>Already have an account? <a href = "login.php">Login here</a></div>
			<?php }else{ ?>
				<div>Need an account? <a href = "login.php?mode=signup">Sign Up here</a></div>
			<?php } ?>
        </form>
		<div class = "button"><a href = "index.php"><button>Return</button></a></div>
</body>
</html>