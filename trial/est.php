<?php
session_start();

$mysqli = new mysqli("localhost", "root", "newhorizon", "ACCASE"); 

?>
<HTML>
<HEAD>
<TITLE>SET ESTIMATED TIME |ADMIN | ASE EATS</TITLE>
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
    background-image: url('bg.jpg');
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
<BODY id="body">
	<FONT face="Verdana" size="4" color="grey">
<div class="page-header">
	<h1><center>ADMINISTRATOR</center></h1>
   <center><SECTION align="center"><A HREF="admin.php"><IMG SRC="/../log.png" alt="Home"></IMG></A></SECTION></center>

</div>
<SECTION>
<MAIN>
<div class="white-box">
<B><P>SET ESTIMATED TIME
        <br />
			<br /></P></B></FONT>
<?php  


$query = "SELECT * FROM `orders`,`orders_items`,`products` where `orders`.`order_id`=`orders_items`.`order_id` and `orders_items`.`product_id`=`products`.`product_id`";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
  if($row['order_id']==$_GET['id']){
    $token=$row['token'];
    $est_time=$row['est_time'];
  }
}

echo '</br>
      </br>
      </br>
      </br>
      <div class="white-box" align="center">
          </br>
      <font size="6" face="Courier New" color="black">Ordered Items</font>
      </br>
      <font size="6" face="Courier New" color="black">Token Number : '.$token.'</font>
      </br>
      <font size="5" face="Courier New" color="black">Estimated Time : '.$est_time.'</font>
      </br>
      </br>
      <table border="0" cellspacing="2" cellpadding="2" align="center" width="1000" height="200"> 
      <tr> 
          <td> <b><font face="Trebuchet MS" size="2">Product Name</font></b> </td> 
          <td> <b><font face="Trebuchet MS" size="2">Quantity</font></b> </td> 
      </tr>
      </div>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) 
    {   
    if($row['order_id']==$_GET['id']){
        $field1name = $row["product_name"];
        $field2name = $row["quantity"];
        
        echo '<tr> 
                  <td><font face="Verdana">'.$field1name.'</font></td> 
                  <td><font face="Verdana">'.$field2name.'</font></td> 
                  
              </tr>';
          }
    
  }
    
    $result->free();         
} 
if(!$mysqli){  
    die('Could not connect: '.mysqli_connect_error());  
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
	$order_id=$_POST['field1'];
    $est=$_POST['field2'];
	$sql = "UPDATE `orders` SET `est_time`='$est' WHERE `order_id`='$order_id';";
    if(mysqli_query($mysqli, $sql))
	{  
		$message = 'Est. Time set to '.$_POST['field2'];
	}
	else
	{  
		$message = "Could not insert record"; 
	}
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<div class="form-style-5" >
          <form method="POST" action="est.php" >
          <fieldset>
          <legend><span class="number"></span>Order ID</legend>
          <input type="text" name="field1" placeholder="Enter Order ID" value="<?=$_GET['id'];?>">
          <legend><span class="number"></span> Estimated Time </legend>
          <input type="text" name="field2" placeholder="Enter Est. Time">      
          </fieldset>
          <input type="submit" value="Update" />
          </form>
</div>	  
</BODY>
</HTML>