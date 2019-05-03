<?php
session_start();

$mysqli = new mysqli("localhost", "root", "newhorizon", "ACCASE"); 

if(!$mysqli){  
    die('Could not connect: '.mysqli_connect_error());  
}
if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
  	if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
	$name= $_POST['name'];
	$img= $file_name;
	$desc= $_POST['desc'];
	$price= $_POST['price'];
	$sql = "INSERT INTO `products` (`product_name`,`product_image`,`product_description`,`product_price`) VALUES ('$name', '$img', '$desc', '$price');";
	if(mysqli_query($mysqli, $sql))
	{  
		$message = "You have successfully added new food item!";
	}
	else
	{  
		$message = "Could not add food item"; 
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
}


?>
<HTML>
<HEAD>
<TITLE>UPDATE MENU |ADMIN | ASE EATS</TITLE>
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
<BODY id="body">
	<FONT face="Verdana" size="4" color="grey">
<div class="page-header">
	<h1><center>ADMINISTRATOR</center></h1>
   <center><SECTION align="center"><A HREF="admin.php"><IMG SRC="/../log.png" alt="Home"></IMG></A></SECTION></center>
</div>
<SECTION>
<MAIN>
<div class="white-box">
<B><P>UPDATE MENU
        <br />
			<br /></P></B></FONT>
<?php  

echo '</br>
      </br>
      </br>
      </br>
      <div class="white-box" align="center">
          </br>
      <font size="6" face="Courier New" color="black">ADD NEW PRODUCT</font>
      </br>
      </div>';

?>
<form align="center" id="form" action="updatemenu.php" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="name">Product Name</label>
<input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required />
</div>
<div class="form-group">
<label for="price">Price</label>
<input type="number" class="form-control" id="price" name="price" placeholder="Enter price" required />
</div>
<div class="form-group">
<label for="price">Product Description</label>
<input type="text" id="price" name="desc" placeholder="Enter Description" required />
</div>
<input id="uploadImage" type="file" accept="image/*" name="image" />
<div id="preview"><img src="clickhere.gif" /></div><br>
<input class="btn btn-success" type="submit" value="Upload">
</form>
		  
</BODY>
</HTML>