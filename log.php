<?php
session_start();
$_SESSION['message']=null;
$_SESSION['check']='';
$_SESSION['email']=null;



if($_SESSION['email']==null) 
{
	include_once("log.php");	
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$conn =new mysqli('localhost','root','newhorizon','ACCASE');
		$email=$conn->real_escape_string($_POST['email']);
		$password=$conn->real_escape_string($_POST['pw']);
		$res= $conn->query("SELECT * FROM acc_ase WHERE email='$email'");
		if( $res->num_rows <= 0 ){
		$_SESSION['message']="User does not exist.";
		} 
		else
		{	
			$user = $res->fetch_assoc();
    		if($password===$user['password'])
    		{
        		$_SESSION['email'] = $user['email'];
        		$_SESSION['name'] = $user['fname'];
        		$_SESSION['roll'] = $user['roll'];
        		$_SESSION['logged_in'] = true;
        		header("location:index1.php ");
        		exit();
    		}
			else
			{
				$_SESSION['message']="You have entered the wrong password. Try again.";
			}
		}
	}
}
else
{
	header("location:log.php");
	$_SESSION['message']="Already logged into another account, logout first!";
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<script type="text/javascript">
var myvar='<?php echo $_SESSION['check1'];?>';
if(myvar!='')
{
	alert("<?php echo $_SESSION['check1'];?>");
	<?php session_destroy();?>
}
</script>
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
	var EmailId=document.getElementById("email");
	var pw=document.getElementById("pw");
	var alphaExp = /^[a-zA-Z]+$/;
	var atpos = EmailId.value.indexOf("@");
    var dotpos = EmailId.value.lastIndexOf(".");

	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=EmailId.value.length) 
	{
        alert("Enter valid email-ID");
		EmailId.focus();
        return false;
   	}


	if(EmailId.value==null || EmailId.value=="")
	{
		lname.focus();
		alert("Enter valid email-ID");
		return false;
	}

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
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="log.php" onsubmit="return validate()">
					<span class="login100-form-title p-b-34">
						Login to ASE Eats
					</span>
					<div class="alert alert-error"><?=$_SESSION['message'] ?></div>
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="email" class="input100" type="text" name="email" placeholder="College mail ID">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="pw" id="pw" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">Sign in</button>
					</div>

					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							User name / password?
						</a>
					</div>

					<div class="w-full text-center">
						<a href="register.php" class="txt3">
							Sign Up
						</a>
					</div>
					</form>
				<div class="login100-more" style="background-image: url('1.jpg');background-size:120% 100%;"></div>
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