
<?php
include("config.php");
if(isset($_POST['sub']))
{
$i=$_REQUEST['itemno'];
$name=$_REQUEST['uid'];
$pass=$_REQUEST['paw'];

if($_REQUEST['sub'])
 {
 $sel=mysql_query("select email,passw from regtable where email='$name'");
 $arr=mysql_fetch_array($sel);
 if(($arr['email']==$name) and ($arr['passw']==$pass))
   {
   session_start();
   $_SESSION['eid']=$name;
echo"<script>location.href='cart.php?itemno=$i & custid=$name'</script>";
  }
  else
   {
     $er="name and password do not match";
	 }
}	
} 
?>


<html>
<head>
<script>

function checkvalidation()

{

var name=/^[a-zA-Z ]{2,15}$/;

   var email=/^[a-zA-Z0-9-_\.]+@[a-zA-Z]+\.[a-zA-Z]{2,3}$/;

var pass=/^[a-zA-Z0-9-_]{2,16}$/;

var mob=/^[0-9]{9,14}$/;
var addr=/^[a-zA-Z0-9 ]{2,150}$/;

if(document.loginform.uid.value.search(email)==-1)
{
alert("ENTER CORRECT USERNAME");
document.loginform.uid.focus();
return false;
}

else if(document.loginform.paw.value.search(pass)==-1)
{
alert("ENTER CORRECT PASSWORD");
document.loginform.paw.focus();
return false;
}



else
{
return true;
}
}
 	  

</script>
</head>
<body>
<font color="red">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {font-family: Arial, Helvetica, sans-serif;}

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

input[type=text] ,[type=password] {
  width: 30%;
  padding: 10px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: 2px groove;
  background: #f1f1f1;
}

input[type=submit]{
  width: 10%;
  padding: 5px;
  font-size: 10px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: 9px groove;
  background: lightgreen;
}


fieldset {
  display: block;
  margin-left: 20px;
  margin-right: 20px;
  padding-top: 0.35em;
  padding-bottom: 0.625em;
  padding-left: 0.75em;
  padding-right: 0.75em;
  border: 2px groove (internal value);
}
</style>
<?php include("header.php");?>
<div class="navbar">
  <a href="homepage.php">Home</a> 
  <a href="viewplants.php">View Plants</a> 
  <a href="aboutpage.php">About Us</a>
  <a href="contactpage.php">Contact Us</a>
  <a href="adminloginpage.php">Admin Login</a>
</div>
</font>

<form name="loginform" method="post" onSubmit="return checkvalidation()">
<center>
<fieldset>
<legend align="center"><h2>User Login</h2></legend>
 <div style="background-color:lightblue"><h3>

&nbsp;&nbsp;<font size="5"><b>UserId:-</b></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type= "text" name="uid" id="uid" ><br><br>
<font size="5"><b>Password:-</b></font>&nbsp;&nbsp;<input type="password" name="paw" id="paw"><br><br>
<input type="submit" value="login" id="sub" name="sub"><br></h3>
 <a href="http://localhost/Ayurvedplants/homepage.php">New user click here to sign in</a> 
</div>
</fieldset>
</center>
</form>
     <?php include("footer.php");?>
</body>
</html>