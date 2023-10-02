<?php
include("config.php");
$itemno=$_REQUEST['itemno'];
$id=$_REQUEST['custid'];

if(isset($_POST['send']))
{
if($_REQUEST['send'])
  {
  $pno=$_REQUEST['m2'];
  $pname=$_REQUEST['m1'];
  $price=$_REQUEST['m3'];
  $customer=$_REQUEST['t1'];
  $cid=$_REQUEST['t2'];
  $addr=$_REQUEST['t3'];
  $cno=$_REQUEST['t4'];
  $quan=$_REQUEST['t5'];

 if(mysql_query("insert into cart(plantno,plantname,price,customer,custid,addr,conno,quantity) values('$pno','$pname','$price','$customer','$cid','$addr','$cno','$quan')"))
    {
	 echo "<script>location.href='order.php?itemno=$itemno & pname=$pname & custid=$cid & price=$price & qty=$quan'</script>";
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
    width: 80%;
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

<br/>
   <div style="background:lightgreen; height:60px ">
<center><h1><font face="Times New Roman" size="+2" color="Red">Welcome 
<?php
$sel=mysql_query("select * from regtable where email='$id'");
  $arr=mysql_fetch_array($sel);
  echo $arr['fname']."&nbsp;".$arr['lname'];
?>


</font></h1></center>
        </div>
<center>
<fieldset>
    <legend align="center"><fieldset><div style="background-color:lightgreen"><font size="5"><b>CART DETAILS</b></font></div></fieldset></legend>
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
    <td><strong><font size="+1" face="Times New Roman" color="brown">Plant Name: </font></strong></td>
    <td><label>
    <input name="m1" type="text" id="m1" onChange="return fnam()" readonly="readonly" value="<?php echo $mat['plantname'];?>">

    </label></td>
  </tr>
  
  <tr>
    <td><font size="+1" face="Times New Roman" color="brown"><strong>Price:</strong></font></td>
    <td><input name="m3" type="text" id="m3" onChange="return price()" readonly="readonly" value="<?php echo $mat['price'];?>">  </td>
  </tr>
  
  <tr>
    <td><font size="+1" face="Times New Roman" color="brown"><b>&nbsp;Customer : </b></font></td>
<?php
$sel=mysql_query("select * from regtable where email='$id'");
  $arr=mysql_fetch_array($sel);
  
?>
    <td><input name="t1" type="text" id="t1" onChange="return email()" readonly="readonly" value="<?php echo $arr['fname']."&nbsp;".$arr['lname'];?>"></td>
    </tr>
<tr>
    <td><font size="+1" face="Times New Roman" color="brown"><strong>Customer Id:</strong></font></td>
    <td><input name="t2" type="text" id="t2" onChange="return cust()" readonly="readonly" value="<?php echo $arr['custid'];?>">  </td>
  </tr>  
<tr>
    <td><font size="+1" face="Times New Roman" color="brown"><strong>Shipping Address:</strong></font></td>
    <td><input name="t3" type="text" id="t3" onChange="return cust()" readonly="readonly" value="<?php echo $arr['addr'];?>">  </td>
  </tr>

    <tr>
    <td><font size="+1" face="Times New Roman" color="brown"><strong>Contact No:</strong></font></td>
    <td><input name="t4" type="text" id="t4" onChange="return cust()" readonly="readonly" value="<?php echo $arr['mobno'];?>">  </td>
  </tr>
    
    
  <tr>
    <td><font size="+1" face="Times New Roman" color="brown"><b>&nbsp;Quantity: </b> </font></td>
    <td><input name="t5" type="text" id="t5" onChange="return qty()"></td>
  </tr>  

  
  <tr>
    <td colspan="2"><label><br>
    <center>
      <input name="send" type="submit" id="send" value="Proceed For Payment">
    </center>
    </label></td>
    </tr>


</table>
 </form>
</fieldset>
    </center>
</div>
</center>
 <?php include("footer.php");?>
</body>
</html>
