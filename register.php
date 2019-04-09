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

    if(fname.value==null || fname.value=="")
	{
		fname.focus();
		alert("Enter valid full name");
		return false;
	}
	if(rollno.value==null || rollno.value=="")
	{
		lname.focus();
		alert("Enter valid college roll number");
		return false;
	}
	if(mob.value==null || mob.value==" ")
	{
		alert("Please Enter Mobile Number");
		mob.focus();
		return false;
	}
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

	if(EmailId.value==null || EmailId.value=="")
	{
		lname.focus();
		alert("Enter valid email-ID");
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
<BODY  background="background3.jpg" link="white" alink="white" vlink="white">
<FONT size="4"><NAV align="right">
<A HREF="">Menu</A>
<A HREF="register.php">Login/Register</A></FONT></NAV>
<FORM name="register" method="post" action="register.php" onsubmit="return validate()">
<TABLE align="center" border="1" bordercolor="white">
<CAPTION><FONT size="6" color="WHITE">Create an account in ASE Eats</FONT></CAPTION>
<CAPTION><FONT size="6" color="WHITE">Enter your details:</FONT></CAPTION>
<TR class="left">
<TD><FONT size="5" color="WHITE">Full Name:</FONT></TD>
<TD><INPUT name="fname" type="TEXT" placeholder="Enter your full name" size="50" maxlength="50" align="center" id="fname"></TD>
</TR>
<TR class="left">
<TD><FONT size="5" color="WHITE">Roll No:</FONT></TD>
<TD><INPUT type="TEXT" name="roll" align="center" size="50" maxlength="50" placeholder="Enter your college roll number" id="roll"></TD>
</TR>
<TR class="left">
<TD><FONT size="5" color="WHITE">Mobile Number:</FONT></TD>
<TD><INPUT type="TEXT" name="mob" size="30" maxlength="10" placeholder="Enter your mobile number" id="mob"></TD>
</TR>
<TR class="left">
<TD><FONT size="5" color="WHITE">E-Mail ID:</FONT></TD>
<TD><INPUT name="email" type="TEXT" id="email" placeholder="Enter your E-Mail ID" size="50" maxlength="50"></TD>
</TR>
<TR class="left">
<TD><FONT size="5" color="WHITE">Password:</FONT></TD>
<TD><INPUT type="PASSWORD" name="pw" placeholder="Enter your password" size="30"  id="pw"></TD>
</TR>
<TR class="left">
<TD><FONT size="5" color="WHITE">Confirm Password:</FONT></TD>
<TD><INPUT type="PASSWORD" name="cpw" placeholder="Re-enter your password" size="30" id="cpw"></TD>
</TR>

</TABLE>
<P align="center"><INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<INPUT TYPE="Reset" value="Reset" id="reset" class="button"></P></FORM>
<HR width="1000">
<FORM action="log.php">
<P align="CENTER"><FONT size="6" color="white" face="Arial">
Already have an account with us?<BR></FONT>
<INPUT TYPE="submit" value="Login" id="login" class="button">
</P>
</FORM>
</BODY>
</HTML>
