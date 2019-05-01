
<html>
<body>
<style type="text/css">
  tr:nth-child(even) {background-color: #f2f2f2;}

  body {
    background-image: url('b.jpg');
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
$query = "SELECT * FROM `orders`";
 
echo '</br>
      </br>
      </br>
      </br>
      <div class="white-box" align="center">
      <SECTION align=""><A HREF="/../index1.php"><IMG SRC="/../log.png" alt="Home"></IMG></A></SECTION>
      <b><font size="8" face="Courier New" color="black">Your Orders</font></b>
      </br>
      </br>
      <table border="0" cellspacing="2" cellpadding="2" align="center" width="1200" height="200"> 
      <tr> 
          <td> <b><font face="Trebuchet MS" size="5">Order ID</font></b> </td> 
          <td> <b><font face="Trebuchet MS" size="5">Order Date</font></b> </td> 
          <td> <b><font face="Trebuchet MS" size="5">Order Status</font></b> </td> 
          <td> <b><font face="Trebuchet MS" size="5">Estimated Time</font></b> </td> 
      </tr>
      </div>';
 
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
      if($row['roll']===$_SESSION['roll']){
        $field1name = $row["order_id"];
        $field2name = $row["order_date"];
        $field3name = $row["order_status"];
        $field4name = $row["est_time"];
 
        echo '<tr> 
                  <td><a href="bill.php?id='.$field1name.'"><font face="Verdana">'.$field1name.'</font></a></td> 
                  <td><font face="Verdana">'.$field2name.'</font></td> 
                  <td><font face="Verdana">'.$field3name.'</font></td> 
                  <td><font face="Verdana">'.$field4name.'</font></td>
              </tr>';
    }
  }
    $result->free();
} 
?>
</body>
</html>

