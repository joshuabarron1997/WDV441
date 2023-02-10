<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<html>
    <body>
		<p>Article Successfully Saved</p>
		<p><a href = "index.php"><button>Return</button></a></p>
	</body>    
</html>