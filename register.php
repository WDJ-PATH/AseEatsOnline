<?php
session_start();
$conn = mysqli_connect("localhost","root","newhorizon","ACCASE");
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$roll=$_POST['roll'];
	$mobileno=$_POST['mob'];
	$email=$_POST['email'];
	$password=$_POST['pw'];
	$cpw=$_POST['cpw'];
	$sql = "INSERT INTO acc_ase(`fname`,`roll`,`mobileno`,`email`,`password`,`cpw`) VALUES ('$fname', '$roll', '$mobileno', '$email', '$password', '$cpw');";

	if(mysqli_query($conn, $sql))
	{  
		$message = "You have been successfully registered";
	}
	else
	{  
		$message = "Could not insert record"; 
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
	$sql1 = "INSERT INTO php_users_login(`email`, `password`) VALUES ('$email', '$password');";
	if(mysqli_query($conn, $sql1))
	{  
		$message1 = "Added in login table";
	}
	else
	{  
		$message1 = "Could not insert record";
	}	 
	echo "<script type='text/javascript'>alert('$message1');</script>";
}
?>

<HTML>
<HEAD>
<TITLE>ASE Eats - Create An Account</TITLE>
<style type="text/css">
tr:nth-child(even) {background-color: #f2f2f2;}
body {
    background-image: url('b.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: top;
  background-size: cover;
   }
.button {
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  border-radius: 12px;
  font-size: 20px;
  display: block;
  max-width: 300px;
  margin: auto;
  background-color: #4CAF50;
}

.button:hover {
  background-color: #4CAF50; /* Green */
  color: white;
}

.white-box {
	border-radius: 15px 50px;
    background-color: #EBEBEB;
    color: black;
    width: 700px;
  	height: relative;
  	padding: 50px;
  	position: relative;
  	left: 240px;
}

</style>
<LINK REL="STYLESHEET" HREF="STYLE.CSS">
<SCRIPT type="text/javascript">
function validate()
{
	var fname=document.getElementById("fname");
	var rollno=document.getElementById("roll");
	var mob=document.getElementById("mob");
	var EmailId=document.getElementById("email");
	var pw=document.getElementById("pw");
	var cpw=document.getElementById("cpw");
	var alphaExp = /^[a-zA-Z]+$/;
	var atpos = EmailId.value.indexOf("@");
    var dotpos = EmailId.value.lastIndexOf(".");

	if (isNaN(mob.value))
	{
		alert(" Your Mobile Number must be Integers");
		mob.focus();
		return false;
	}
	if((mob.value.length!= 10))
	{
		alert("Enter the valid Mobile Number(Like : 9669666999)");
		mob.focus();
		return false;
	}
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=EmailId.value.length) 
	{
        alert("Enter valid email-ID");
		EmailId.focus();
        return false;
   	}

 	if(pw.value.length< 8 || cpw.value.length< 8)
	{
		alert("Please enter a password of atleast 8 characters");
		pw.focus();
		return false;
	}
	else if (pw.value.length != cpw.value.length) 
	{
		alert("Passwords do not match.");
		pw.focus();
        return false;
    }
	else if (pw.value != cpw.value) 
	{
		alert("Passwords do not match.");
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
</HEAD>
<style type="text/css">
body {
    background-image: url('1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: top;
  background-size: cover;
   }
   body {
    background-image: url('b.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: top;
  background-size: cover;
   }
.button {
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  border-radius: 12px;
  font-size: 20px;
  display: block;
  max-width: 300px;
  margin: auto;
  background-color: #4CAF50;
}

.button:hover {
  background-color: #4CAF50; /* Green */
  color: white;
}

.white-box {
	border-radius: 15px 50px;
    background-color: #EBEBEB;
    color: black;
    width: 700px;
  	height: relative;
  	padding: 50px;
  	position: relative;
  	left: 240px;
}

</style>
<BODY  id="body" link="white" alink="white" vlink="white">
<FONT size="4"><NAV align="right">
<div class="white-box">
<SECTION align="center"><IMG SRC="log.png" alt="Home"></IMG></SECTION>
<FORM name="register" method="post" action="register.php" onsubmit="return validate()">
<TABLE align="center" border="1" bordercolor="white">
<CAPTION><FONT size="6" face="Courier New" color="black">Create an account in ASE Eats</FONT></CAPTION>
<CAPTION><FONT size="5" face="Courier New" color="black">Enter your details:</FONT></br>
</br></CAPTION>

<tr>
<TD><FONT size="4" face="Trebuchet MS" color="black">Full Name:</FONT></TD>
<TD><INPUT name="fname" type="TEXT" placeholder="Enter your full name" size="50" maxlength="50" align="center" id="fname" required></TD>
</TR>
<tr>
<TD><FONT size="4" color="black" face="Trebuchet MS">Roll No:</FONT></TD>
<TD><INPUT type="TEXT" name="roll" align="center" size="50" maxlength="50" placeholder="Enter your college roll number" id="roll" required></TD>
</TR>
<tr class="left">
<TD><FONT size="4" color="black" face="Trebuchet MS">Mobile Number:</FONT></TD>
<TD><INPUT type="TEXT" name="mob" size="30" maxlength="10" placeholder="Enter your mobile number" id="mob" required></TD>
</TR>
<tr class="left">
<TD><FONT size="4" color="black" face="Trebuchet MS">E-Mail ID:</FONT></TD>
<TD><INPUT name="email" type="TEXT" id="email" placeholder="Enter your E-Mail ID" size="50" maxlength="50" required></TD>
</TR>
<tr class="left">
<TD><FONT size="4" color="black" face="Trebuchet MS">Password:</FONT></TD>
<TD><INPUT type="PASSWORD" name="pw" placeholder="Enter your password" size="30"  id="pw" required></TD>
</TR>
<tr class="left">
<TD><FONT size="4" color="black" face="Trebuchet MS">Confirm Password:</FONT></TD>
<TD><INPUT type="PASSWORD" name="cpw" placeholder="Re-enter your password" size="30" id="cpw" required></TD>
</TR>

</TABLE>
<P align="center"><INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<INPUT TYPE="Reset" value="Reset" id="reset" class="button"></P></FORM>
</div>
</BR>
</BR>
</BR>
<HR width="1000">
<FORM action="log.php">
<P align="CENTER"><FONT size="6" color="black" face="Trebuchet MS">
Already have an account with us?<BR></FONT>
<INPUT TYPE="submit" value="Login" id="login" class="button">
</P>
</FORM>
</BODY>
</HTML>
