<HTML>
<?php
session_start();
$mysqli = new mysqli("localhost", "root", "newhorizon", "ACCASE"); 

?>
    
<HEAD>
<TITLE>UPDATE ORDER STATUS| ADMIN | ASE EATS</TITLE>
<style type="text/css">
@import url(style.css);
   a:link {color: #ffffff}
   a:visited {color: #ffffff}
   a:hover {color: #ffffff}
   a:active {color: #ffffff}
</style>
</HEAD>
<link rel="stylesheet" type="text/css" href="cs1.css">
<style type="text/css">
body {
    background-image: url('b.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: top;
  background-size: cover;
   }
   .white-box {
    border-radius:  15px 50px;
    background-color: #EBEBEB;
    color: black;
    width: relative;
    height: relative;
    padding: 50px;
    position: relative;
}
.form-style-5{
	max-width: 500px;
	padding: 10px 20px;
	background: #f4f7f8;
	margin: 10px auto;
	padding: 20px;
	background: #f4f7f8;
	border-radius: 8px;
	font-family: Georgia, "Times New Roman", Times, serif;
}
.form-style-5 fieldset{
	border: none;
}
.form-style-5 legend {
	font-size: 1.4em;
	margin-bottom: 10px;
}
.form-style-5 label {
	display: block;
	margin-bottom: 8px;
}
.form-style-5 input[type="text"],
.form-style-5 input[type="date"],
.form-style-5 input[type="datetime"],
.form-style-5 input[type="email"],
.form-style-5 input[type="number"],
.form-style-5 input[type="search"],
.form-style-5 input[type="time"],
.form-style-5 input[type="url"],
.form-style-5 textarea,
.form-style-5 select {
	font-family: Georgia, "Times New Roman", Times, serif;
	background: rgba(255,255,255,.1);
	border: none;
	border-radius: 4px;
	font-size: 15px;
	margin: 0;
	outline: 0;
	padding: 10px;
	width: 100%;
	box-sizing: border-box; 
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box; 
	background-color: #e8eeef;
	color:#8a97a0;
	-webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
	margin-bottom: 30px;
}
.form-style-5 input[type="text"]:focus,
.form-style-5 input[type="date"]:focus,
.form-style-5 input[type="datetime"]:focus,
.form-style-5 input[type="email"]:focus,
.form-style-5 input[type="number"]:focus,
.form-style-5 input[type="search"]:focus,
.form-style-5 input[type="time"]:focus,
.form-style-5 input[type="url"]:focus,
.form-style-5 textarea:focus,
.form-style-5 select:focus{
	background: #d2d9dd;
}
.form-style-5 select{
	-webkit-appearance: menulist-button;
	height:35px;
}
.form-style-5 .number {
	background: #1abc9c;
	color: #fff;
	height: 30px;
	width: 30px;
	display: inline-block;
	font-size: 0.8em;
	margin-right: 4px;
	line-height: 30px;
	text-align: center;
	text-shadow: 0 1px 0 rgba(255,255,255,0.2);
	border-radius: 15px 15px 15px 0px;
}

.form-style-5 input[type="submit"],
.form-style-5 input[type="button"]
{
	position: relative;
	display: block;
	padding: 19px 39px 18px 39px;
	color: #FFF;
	margin: 0 auto;
	background: #1abc9c;
	font-size: 18px;
	text-align: center;
	font-style: normal;
	width: 100%;
	border: 1px solid #16a085;
	border-width: 1px 1px 3px;
	margin-bottom: 10px;
}
.form-style-5 input[type="submit"]:hover,
.form-style-5 input[type="button"]:hover
{
	background: #109177;
}
</style>
<header>
  <div class="topnav-right">
    <a href="admin.php">ADMIN</a>
  </div>
  </header>
<BODY id="body">
	<FONT face="Verdana" size="4" color="grey">
<div class="page-header">
    <h1><center>ADMINISTRATOR</center></h1>
    <center><img src="log.png"  /></center> 
    <h2><center>Orders that are not delivered yet</center></h2>
</div>

<?php  

$query = "SELECT * FROM `orders` where `order_status`!='Delivered'";
echo '</br>
      </br>
      </br>
      </br>
      <div class="white-box" align="center">
          </br>
      <font size="6" face="Courier New" color="black">ORDERS</font>
      </br>
      <table border="0" cellspacing="2" cellpadding="2" align="center" width="1000" height="200"> 
      <tr> 
          <td> <b><font face="Trebuchet MS" size="2">ORDER ID</font></b> </td> 
          <td> <b><font face="Trebuchet MS" size="2">ORDER DATE</font></b> </td> 
          <td> <b><font face="Trebuchet MS" size="2">TOKEN NO</font></b> </td>
          <td> <b><font face="Trebuchet MS" size="2">ROLL NO</font></b> </td> 
          <td> <b><font face="Trebuchet MS" size="2">NAME</font></b> </td> 
          <td> <b><font face="Trebuchet MS" size="2">Order STATUS</font></b> </td> 
          <td> <b><font face="Trebuchet MS" size="2">TOTAL PRICE</font></b> </td> 
      </tr>
      </div>';
$result = $mysqli->query($query);
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) 
    {     
        $field1name = $row["order_id"];
        $field2name = $row["order_date"];
        $field3name = $row["token"];
        $field4name = $row["roll"];  
        $field5name = $row["name"];
        $field6name = $row["order_status"];
        $field7name = $row["total_price"];
        echo '<tr> 
                  <td><font face="Verdana">'.$field1name.'</font></td> 
                  <td><font face="Verdana">'.$field2name.'</font></td> 
                  <td><font face="Verdana">'.$field3name.'</font></td> 
                  <td><font face="Verdana">'.$field4name.'</font></td> 
                  <td><font face="Verdana">'.$field5name.'</font></td> 
                  <td><font face="Verdana">'.$field6name.'</font></td> 
                  <td><font face="Verdana">'.$field7name.'</font></td> 
              </tr>';
    
  }
    
    $result->free(); 
}     
if(!$mysqli){  
    die('Could not connect: '.mysqli_connect_error());  
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
      $order_id=$_POST['field1'];
      $order_status=$_POST['field2'];
      $sql = "UPDATE `orders` SET `order_status`='$order_status' WHERE `order_id`='$order_id';";
      if(mysqli_query($mysqli, $sql))
      {  
          $message = "Order Status Updated";
      }
      else
      {  
          $message = "Could not update status"; 
      }
      echo "<script type='text/javascript'>alert('$message');</script>";
      $sql2 = "UPDATE `acc_ase`,`orders`  SET `acc_ase`.`dept_due` = `acc_ase`.`dept_due`+`orders`.`total_price` WHERE `orders`.`roll`=`acc_ase`.`roll` AND `orders`.`order_status`='Cancelled';";
      if(mysqli_query($mysqli, $sql2))
      {  
          $message = "Dues added";
      }
      else
      {  
          $message = "No dues to be added"; 
      }
      echo "<script type='text/javascript'>alert('$message');</script>";
      $sql3 ="UPDATE `orders` SET `order_status`='DUE' WHERE `order_status`='Cancelled';";
      if(mysqli_query($mysqli, $sql3))
      {  
          $message = "Order Status:Cancelled updated";
      }
      else
      {  
          $message = "Could not cancel order!"; 
      }
      echo "<script type='text/javascript'>alert('$message');</script>";
      $sql4 ="UPDATE `php_users_login`,`acc_ase` SET `php_users_login`.`acc_status`=0 WHERE `php_users_login`.`email`=`acc_ase`.`email` AND `acc_ase`.`dept_due`>=200;";
      if(mysqli_query($mysqli, $sql4))
      {  
          $message = "Account banned!";
      }
      else
      {  
          $message = "No reason to ban user!"; 
      }
      echo "<script type='text/javascript'>alert('$message');</script>";

      $query1 = "SELECT * FROM `orders` WHERE `order_id`='$order_id';";
      $result1 = $mysqli->query($query1);
      $row1 = $result1->fetch_assoc();
      $email=$row1['email'];
      $order_stat=$row1['order_status'];

      if($order_stat=='Ready'){
        $to_email = $email;
        $subject = 'ASE EATS: ORDER READY!';
        $message = 'Come and collect your order in or before 30 minutes!';
        $headers = 'From: noreply@ASEeats.com';
        mail($to_email,$subject,$message,$headers);
      }

  }
?>

<div class="form-style-5" name="order">
    <form method="POST" action="updatestatus.php" onsubmit="window.location.href='admin.php';">
    <fieldset>
    <legend><span class="number"></span>ORDER ID</legend>
    <input type="text" name="field1" placeholder="OrderID">
    <legend><span class="number"></span> Order Status</legend>
    <select id="job" name="field2">
    <optgroup label="STATUS">
    <option value="Delivered">Delivered</option>
    <option value="Cancelled">Cancelled</option>
    <option value="Ready">Ready</option>
    </optgroup>
    </select>      
    </fieldset>
    <input type="submit" value="Update" />
    </form>
</div>
</BODY>
</HTML>