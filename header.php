<!DOCTYPE html>
<html>
<head>
<title><?php echo "$title" ?></title>
</head>
<body>
<FONT size="4" color="white">
<NAV align="right">
<A HREF="index1.php">Home</A>&nbsp&nbsp&nbsp
<?php  
session_start();
if(isset($_SESSION['name']))
	echo 'Welcome <A HREF="login.php"> '.$_SESSION['name'].'</a>';
else
	echo '<A HREF="register.php">Login/Register</A>';
?>
</FONT></NAV>
</body>
</html>