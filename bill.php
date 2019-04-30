<html>
<body>
<style type="text/css">
  tr:nth-child(even) {background-color: #f2f2f2;}

  body {
    background-image: url('1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: top;
  background-size: cover;
   }
   head{
    color: #ffffff;
   }
.white-box {
  border-radius: 15px 50px;
    background-color: #EBEBEB;
    color: black;
    width: relative;
    height: relative;
    padding: 50px;
    position: relative;
}
</style>
<head><?php include("header.php"); ?></head>
<?php  
session_start();
$mysqli = new mysqli("localhost", "root", "newhorizon", "ACCASE"); 
$query = "SELECT * FROM `orders`,`orders_items`,`products` where `orders`.`order_id`=`orders_items`.`order_id` and `orders_items`.`product_id`=`products`.`product_id`";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc()) {
  if($row['roll']===$_SESSION['roll'] and $row['order_id']==$_GET['id']){
    $token=$row['token'];
  }
}

echo '</br>
      </br>
      </br>
      </br>
      <div class="white-box" align="center">
      <b><font size="8" face="Courier New" color="black">Bill</font></b>
      </br>
      <font size="6" face="Courier New" color="black">Token Number : '.$token.'</font>
      </br>
      <table border="0" cellspacing="2" cellpadding="2" align="center" width="1200" height="200"> 
      <tr> 
          <td> <b><font face="Trebuchet MS" size="5">Product Name</font></b> </td> 
          <td> <b><font face="Trebuchet MS" size="5">Quantity</font></b> </td> 
          <td> <b><font face="Trebuchet MS" size="5">Price</font></b> </td> 
      </tr>
      </div>';
$tot=0;
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
      if($row['roll']===$_SESSION['roll'] and $row['order_id']==$_GET['id']){
        $field1name = $row["product_name"];
        $field2name = $row["quantity"];
        $field3name = $row["quantity"]*$row["product_price"];
        $tot+=$field3name;
        echo '<tr> 
                  <td><a href="bill.php"><font face="Verdana">'.$field1name.'</font></a></td> 
                  <td><font face="Verdana">'.$field2name.'</font></td> 
                  <td><font face="Verdana">'.$field3name.'</font></td> 
              </tr>';
    }
  }
    echo '<tr>
                <td></td>
                <td><strong><font face="Verdana">Total Price</font></strong></td>
                <td><font face="Verdana">'.$tot.'</font></td>
          </tr>';
    $result->free();
} 
?>
</body>
</html>
