<?php
session_start();  
?>
<HTML>
<script type="text/javascript">
function checkban () {
    var stat='<?php echo $_SESSION['stat'];?>';
    if(stat==1){
      window.location.href='ASE-EATS-ORDER-master/3b-products.php';
  }else{
      window.location.href='index1.php';
      alert("You are banned from placing orders! Pay department dues to place more orders!");
      return false;
}
}
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
    background-image: url('b.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: top;
  background-size: cover;
   }
.white-box {
	border-radius: 15px 50px;
    background-color: #EBEBEB;
    color: black;
    width: 450px;
  	height: 250px;
  	padding: 50px;
  	position: relative;
  	left: 395px;
}
</style>
<BODY id="body">
<FONT size="4">
<NAV align="right">
<A HREF="yourorders.php" style="color: #000000">Your Orders</A>&nbsp&nbsp&nbsp
<A HREF="log.php" style="color: #000000" onclick="<? session_destroy();?>">LOGOUT</A>&nbsp&nbsp&nbsp
</FONT></NAV>
<FONT size="5" color="black">
<SECTION align="center"><A HREF="index1.php"><IMG SRC="log.png" alt="Home"></IMG></A></SECTION>
<SECTION>
<MAIN>
<div class="white-box">
<B><P>Welcome, you are logged in. 
        <br />
		Thank you for choosing us.
		<br /></P></B></FONT>
<SECTION align="center"><IMG src="clickhere.gif" width="100" height="50"></IMG></SECTION>
</br>
<div id="form-content">
	<div class="welcome" style="display: block;">
		<center><u><a style="color:#000000" onclick="return checkban();">Place an order</a></u></center>
    </br>
    </br>
		<center><a href="changepw1.php" style="color:#000000">Change password</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="deact.php" style="color:#000000">Deactivate your account</a></center><br /><br/>
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
</div>
</MAIN><BR><HR width="1000">
<FOOTER >
<FONT size="2" color="white" style="color: #000000">
Save time, be smart!</FONT>
</FOOTER>
</BODY>
</HTML>