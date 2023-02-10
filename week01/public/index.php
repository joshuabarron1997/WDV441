<?php
/*
This Page will find a random number from 0 to 20 and display a correlating name from the $names array if it is within the max array (9).
If the number is outside the array (10-20) then it will display the full $names array in a list.
*/
$names = array("James", "Frank", "Sandra", "Melvin", "Ashlyn", "Bucky", "Samantha", "Arnold", "Katie", "Andrea"); //names array
$num = rand(0, 20); //random number from 0 to 20
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment 1</title>
</head>
	<h1>Assignment 1</h1>
	<h2>Number: <?php echo $num;?></h2> <!--displaying number chosen-->
	<?php if ($num <= 9){ ?> <!--if statement for the number decision-->
		<h3>Hello <?php echo $names[$num];?></h3> <!--Within bounds is just the correlating name-->
	<?php }else{ ?>
		<ul>Name List - 
			<?php for($i=0;$i<=9;$i++){ // out of bounds generates the list items via for loop
				echo "<li>" . $names[$i] . "</li>"; 
			}
			?>
		</ul>
	<?php }?>
<body>
</body>
</html>