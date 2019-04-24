<?php
session_start();
?>
<HTML>
<script type="text/javascript">
var myvar='<?php echo $_SESSION['check'];?>';
if(myvar!='')
{
	alert("<?php echo $_SESSION['check'];?>");
}
</script>
<HEAD>
<TITLE>Welcome to ASEeats Online!</TITLE>
<style type="text/css">
@import url(style.css);
   a:link {color: #ffffff}
   a:visited {color: #ffffff}
   a:hover {color: #ffffff}
   a:active {color: #ffffff}
</style>
</HEAD>
<link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
body {
    background-image: url('1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: top;
  background-size: cover;
   }
</style>
<BODY id="body">
<FONT size="4" color="white">
<NAV align="right">
<A HREF="log.php">LOGOUT</A>&nbsp&nbsp&nbsp
</FONT></NAV>
<FONT size="5" color="white">
<SECTION align="center"><A HREF=""><IMG SRC="log.png" alt="Home"></IMG></A></SECTION>
<SECTION>
<MAIN>
<B><P>Welcome, you are logged in. 
        <br />
		Thank you for choosing us.
		<br /></P></B></FONT>
<SECTION align="center"><IMG src="clickhere.gif" width="100" height="50"></IMG></SECTION>
<div id="form-content">
	<div class="welcome" style="display: block;">
		<center><a href="order.php" style="color:#ffffff">Place an order</a></center>
		<center><a href="changepw1.php" style="color:#ffffff">Change password</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="deact.php" style="color:#ffffff">Deactivate your account</a></center><br /><br/>
		<script>
		if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) 
        	{
        		window.location.href='log.php';
    			alert("You cannot go back to the home page! Login if you want to!");
			}
		</script>
	</div>	
</div>
</SECTION>
</MAIN><BR><HR width="1000">
<FOOTER >
<FONT size="2" color="white">
Save time, be smart!</FONT>
</FOOTER>
</BODY>
</HTML>