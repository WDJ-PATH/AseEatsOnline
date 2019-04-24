<?php
session_start();
$_SESSION['check1']='';
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$conn =new mysqli('localhost','root','newhorizon','ACCASE');
	$email=$_SESSION['email'];
	$password=$conn->real_escape_string($_POST['pw']);
	$res= $conn->query("SELECT * FROM php_users_login WHERE email='$email'");
	if( $res->num_rows <= 0 ){
	$_SESSION['check1']="User does not exist.";
	} 
	else
	{	
		$user = $res->fetch_assoc();
		if($email===$user['email']&&$password===$user['password'])
		{	
			$sql1 ="DELETE FROM `php_users_login` WHERE `email`='$email';";
			if(mysqli_query($conn,$sql1))
			{  
				$_SESSION['check1']="User deleted successfully";
			}
			else
			{  
				$_SESSION['check1']="Could not delete user,Try again!";
			}
		}
		else
		{
			$_SESSION['check1']="Incorrect password";
		}
		header('location:log.php');	
	}
}
?>

<html>
<head>
	<title>ASEeats v1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<SCRIPT type="text/javascript">
function validate()
{
	var pw=document.getElementById("pw");

	if(pw.value.length< 8 )
	{
		alert("Password Invalid");
		pw.focus();
		return false;
	}


	if (confirm("Do you want to submit your details?") == true) {} 
	else 
	{
       return false;
    }
	return true;
}
</SCRIPT>
</head>
<body>
<?php include("header.php"); ?>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="deact.php" onsubmit="return validate()">
					<span class="login100-form-title p-b-34">
						Deactivate account ?
					</span>
					<div class="alert alert-error"><?=$_SESSION['message'] ?></div>

					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="pw" id="pw" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">Deactivate</button>
					</div>
					</form>
					<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
				</div>
		</div>
	</div>

<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>