<?php
include("config.php");
$itemno=$_REQUEST['itemno'];
$id=$_REQUEST['custid'];
$pn=$_REQUEST['pname'];
$price=$_REQUEST['price'];
$qty=$_REQUEST['qty'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>E-Plants</title>
    <style>
* {box-sizing: border-box}
body {font-family: Arial, Helvetica, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
  width: 20%; /* Four links of equal widths */
  text-align: center;
}

.navbar a:hover {
  background-color: #000;
}

.navbar a.active {
  background-color: #4CAF50;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
    width: 100%;
    text-align: left;
  }
}


fieldset {
  display: block;
  width: 60px;
    
    background-color: aquamarine;
    align-items: center;
}

</style>
</head>

<body>
    <?php include("header.php");?>
    <div class="navbar">
  <a href="homepage.php">Home</a> 
  <a href="viewplants.php">View Plants</a> 
  <a href="aboutpage.php">About Us</a>
  <a href="contactpage.php">Contact Us</a>
  <a href="adminloginpage.php">Admin Login</a>
</div>

    <a href="homepage.php"><font size="5" color="blue"><b>Log Out</b></font></a>

	<?php
	$sel=mysql_query("select * from orderdetails where plantcode='$itemno' AND custno='$id' AND plantname='$pn' AND price='$price' AND quantity='$qty' ");
    $mat=mysql_fetch_array($sel);
	?>

<div style="  background-color: aquamarine; align-items: center;">
    <h1>Thank You !<font color="blue"> <?php echo $mat['custname'];?></font> Your Order ID Is <font color="blue"><?php echo $mat['orderid'];?></font><br>
    Order Is confirmed!
<br>Despatched shortly.
</h1>
    </div>
 <?php include("footer.php");?>
</body>
</html>
