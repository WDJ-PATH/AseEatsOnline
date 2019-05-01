<!DOCTYPE html>
<html>
<head>
<title><?php echo "$title" ?></title>
</head>
<body>
<FONT size="4" color="white">
<NAV align="right">
<?php  
session_start();
if(isset($_SESSION['name']))
	echo '<A HREF="index1.php" style="color: #000000"> '.$_SESSION['name'].'</a>';
else
	echo '<A HREF="register.php">Login/Register</A>';
?>
&nbsp&nbsp&nbsp&nbsp&nbsp<A HREF="log.php" style="color: #000000">Logout</A>&nbsp&nbsp&nbsp&nbsp&nbsp
</FONT></NAV>
</body>
</html>