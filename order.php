<?php

include("config.php");

$itemno=$_REQUEST['itemno'];
$id=$_REQUEST['custid'];
$pn=$_REQUEST['pname'];
$price=$_REQUEST['price'];
$qty=$_REQUEST['qty'];

if(isset($_POST['send']))
{
if($_REQUEST['send'])
  {
  $pname=$_REQUEST['m1'];
  $itemno=$_REQUEST['m2'];
  $price=$_REQUEST['m3'];

  $qty=$_REQUEST['m4'];
  $amt=$_REQUEST['m5'];
  $custname=$_REQUEST['t12'];
  $paym=$_REQUEST['sel2'];
  $cid=$_REQUEST['t11'];
  

  if(mysql_query("insert into orderdetails(custno,custname,plantcode,plantname,price,quantity,amount,paymentmode) values('$cid','$custname','$itemno','$pname','$price','$qty','$amt','$paym')"))

   
    {

		 echo "<script>location.href='bill.php?itemno=$itemno & pname=$pname & custid=$cid & price=$price & qty=$qty'</script>";
	  }
	  
    }
}	

	
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
    width: 50%;
    align-content: center;
    background-color: aquamarine;
    align-items: center;
}
       input[type=text],input[type=password]{
  width: 100%;
  padding: 2px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: 2px groove;
  background: #f1f1f1;
}

 input[type=submit] {
  width: 50%;
  padding: 5px;
  font-size: 12px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: 4px groove;
  background: lightgreen;
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

<h1>

<div style="background:lightgreen; height:80px ">
<center><h1><font face="Times New Roman" size="+2" color="Red">Welcome 
<?php
$sel=mysql_query("select * from regtable where custid='$id'");
  $arr=mysql_fetch_array($sel);
  echo $arr['fname']."&nbsp;".$arr['lname'];
?>
</h1>

</font></h2></center>

</div>
<center>
<fieldset >
 <legend align="center"><fieldset><div style="background-color:lightgreen "><font size="5"><b>PAYMENT DETAILS</b></font></div></fieldset></legend>
	<?php
	$sel=mysql_query("select * from plantsdetails where plantno='$itemno'");
    $mat=mysql_fetch_array($sel);
	?>
<form method="post" name="f1" onSubmit="return vali()">
<table width="366" border="0" align="center">

  <tr>
    <td width="164"><font size="+1" face="Times New Roman" color="brown"><b> Plant Code:</b></font></td>
    <td width="192">
      
        <input name="m2" type="text" id="m2" onChange="return fnam()" readonly="readonly" value="<?php echo $mat['plantno'];?>">    </td>
  </tr>

  <tr>
    <td><strong><font size="+1" face="Times New Roman"  color="brown">Plant Name: </font></strong></td>
    <td><label>
    <input name="m1" type="text" id="m1" onChange="return fnam()" readonly="readonly" value="<?php echo $mat['plantname'];?>">

    </label></td>
  </tr>

  <tr>
    <td><font size="+1" face="Times New Roman" color="brown"><strong>Price:</strong></font></td>
    <td><input name="m3" type="text" id="m3" onChange="return lnam()" readonly="readonly" value="<?php echo $mat['price'];?>">  </td>
  </tr>
  
<tr>
    <td><font size="+1" face="Times New Roman" color="brown"><b>&nbsp;Quantity: </b> </font></td>
     <td><input name="m4" type="text" id="m4" onChange="return lnam()" readonly="readonly" value="<?php echo $qty;?>">  </td>
  </tr>

<tr>
    <td><font size="+1" face="Times New Roman" color="brown"><strong>Amount:</strong></font></td>
    <td><input name="m5" type="text" id="m5" onChange="return lnam()" readonly="readonly" value="<?php echo ($qty * $mat['price']);?>">  </td>
  </tr>

  <tr>
    <td><font size="+1" face="Times New Roman" color="brown"><b>&nbsp;Customer : </b></font></td>
<?php
$sel=mysql_query("select * from regtable where custid='$id'");
  $arr=mysql_fetch_array($sel);
  
?>
    <td><input name="t11" type="text" id="t11" onChange="return email()" readonly="readonly" value="<?php echo $arr['custid'];?>"></td>
  </tr>
  <tr>
    <td><font size="+1" face="Times New Roman" color="brown"><b>&nbsp;Name: </b> </font></td>
    <td><input name="t12" type="text" id="t12" onChange="return email()" readonly="readonly" value="<?php echo $arr['fname']."&nbsp;".$arr['lname'];?>"></td>
  </tr>
  

  <tr>
    <td><font size="+1" face="Times New Roman" color="brown"><b>Payment Mode:</b></font></td>
    <td><label>
      <select name="sel2" id="sel2">
        <option value="cod">Cash On Delivery</option>
        <option value="debit">Debit Card</option>
        <option value="credit">Credit Card</option>
      </select>
    </label></td>
  </tr>
  
  <tr>
    <td colspan="2"><label><br>
    <center>
      <input name="send" type="submit" id="send" value="Send">
    </center>
    </label></td>
    </tr>
</table>
 </form>
</fieldset>
</div>
</center>
 <?php include("footer.php");?>
</body>
</html>
