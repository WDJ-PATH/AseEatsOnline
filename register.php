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
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=EmailId.value.length) 
	{
        alert("Enter valid email-ID");
		EmailId.focus();
        return false;
   	}
	if(fname.value==null || fname.value=="")
	{
		fname.focus();
		alert("Enter valid first name");
		return false;
	}
	if(fname.value.match(alphaExp)){}
	else{
		alert("First name can have only letters");
		fname.focus();
		return false;
	}
	if(lname.value==null || lname.value=="")
	{
		lname.focus();
		alert("Enter valid last name");
		return false;
	}
	if(lname.value.match(alphaExp)){}
	else{
		alert("Last name can have only letters");
		lname.focus();
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
	if(location.selectedIndex==0)
	{
		alert("Please select location");
		location.focus();
		return false;		
	}
	if(addr.value==" " || addr.value=="")
	{
		alert("Please Enter Your Address");
		addr.focus();
		return false;
	}
	if (confirm("Do you want to submit your details?") == true) {} 
	else 
	{
       return false;
    }
    var survey=prompt("How did you hear about us? (Used only for survey)");
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
<TD><INPUT name="fname" type="TEXT" placeholder="Enter your first name" size="50" maxlength="50" align="center" id="fname"></TD>
</TR>
<TR class="left">
<TD><FONT size="5" color="WHITE">Roll No:</FONT></TD>
<TD><INPUT type="TEXT" name="roll" align="center" size="30" maxlength="30" placeholder="Enter your last name" id="lname"></TD>
</TR>
<TR class="left">
<TD><FONT size="5" color="WHITE">Mobile Number:</FONT></TD>
<TD><INPUT type="TEXT" name="mob" size="30" maxlength="10" placeholder="Enter your mobile number" id="mob"></TD>
</TR>
<TR class="left">
<TD><FONT size="5" color="WHITE">E-Mail ID:</FONT></TD>
<TD><INPUT name="email" type="TEXT" id="email" placeholder="Enter your E-Mail ID" size="30" maxlength="30"></TD>
</TR>
<TR class="left">
<TD><FONT size="5" color="WHITE">Password:</FONT></TD>
<TD><INPUT type="PASSWORD" name="pw" size="30"  id="pw"></TD>
</TR>
<TR class="left">
<TD><FONT size="5" color="WHITE">Confirm Password:</FONT></TD>
<TD><INPUT type="PASSWORD" name="cpw" size="30" id="cpw"></TD>
</TR>

</TABLE>
<P align="center"><INPUT TYPE="Submit" value="Submit" name="submit" id="submit" class="button" onclick="if(!this.form.tc.checked){alert('You must agree to the terms first.');return false}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<INPUT TYPE="Reset" value="Reset" id="reset" class="button"></P></FORM>
<HR width="1000">
<FORM action="login.php">
<P align="CENTER"><FONT size="6" color="white" face="Arial">
Already have an account with us?<BR></FONT>
<INPUT TYPE="submit" value="Login" id="login" class="button">
</P>
</FORM>
</BODY>
</HTML>
