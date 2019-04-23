
<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$conn =new mysqli('localhost','root','newhorizon','ACCASE');
	$email=$_SESSION['email'];
	$currpass=$conn->real_escape_string($_POST['cp']);
	$newpass=$_POST['password1'];
	$res= "UPDATE `acc_ase` SET `password`='$newpass',`cpw`='$newpass' WHERE `email`='$email';";
	$resx= "UPDATE `php_users_login` SET `password`='$newpass' WHERE `email`='$email';";
	$res1 = $conn->query("SELECT * FROM acc_ase WHERE email='$email'"); 

	$user = $res1->fetch_assoc();
	if( $res1->num_rows <= 0 ){
		$_SESSION['check']="User does not exist.";
	} 
	else
	{
		if(($email===$user['email']) and ($currpass === $user['password']))
		{
			if(mysqli_query($conn, $res) and mysqli_query($conn ,$resx))
			{  
				$_SESSION['check']=  "Your password has been successfully changed!";
			}		
			else
			{  
				$_SESSION['check']=  "Could not change password"; 
			}
			header("location:index1.php");
		}
		else
		{
			$_SESSION['check'] = "Current password entered is incorrect!";
			header("location:index1.php");
		}
	}
}	
?>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<SCRIPT type="text/javascript">
function validate()
{
	var cp=document.getElementById("cp");
	var np=document.getElementById("password1");
	var rp=document.getElementById("password2");


	if(np.value.length< 8 || cp.value.length< 8 || rp.value.length <8 )
	{
		alert("Please enter password of atleast 8 characters");
		return false;
	}
	if (cp.value == np.value || cp.value == rp.value)
	{
		alert("Please put in a different password from last time");
		return false;
	}
	if (np.value != rp.value)
	{
		alert("Paswords do not match");
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

<BODY background="background1.jpg">
<header align="right"><FONT color="white" size=3><a href="index1.php">Home</a></FONT>&nbsp;&nbsp;&nbsp;&nbsp;</header>
<div class="container">
<div class="row">
<div class="col-sm-12">
<FONT color="white">
<h1>Change Password</h1></FONT>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<FONT color="white">
<p class="text-center">Use the form below to change your password. Your password cannot be the same as your username.</p>
</FONT>
<form method="post" id="passwordForm" action="changepw1.php" onsubmit="return validate()">
<input type="password" class="input-lg form-control" name="cp" id="cp" placeholder="Current Password" autocomplete="off" required="Please enter current password!">
</br>
<input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="New Password" autocomplete="off" required="Please input your password!">
<FONT color="white">
<div class="row">
<div class="col-sm-6">
<span id="8char" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> 8 Characters Long<br>
<span id="ucase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Uppercase Letter
</div>
<div class="col-sm-6">
<span id="lcase" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Lowercase Letter<br>
<span id="num" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> One Number
</div>
</div>
</FONT>
<input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="Repeat Password" autocomplete="off" required="Please enter the password again!">
<div class="row">
<div class="col-sm-12">
<FONT color="white">
<span id="pwmatch" class="glyphicon glyphicon-remove" style="color:#FF0004;"></span> Passwords Match
</FONT>
</div>
</div>
<input type="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password">
</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>
</BODY>