
<?php
include("config.php");
if(isset($_POST['sub']))
{


$type=$_REQUEST['pty'];

if($_REQUEST['sub'])
{
$sel=mysql_query("select ptype from pttable where ptype='$type' ");
$arr=mysql_fetch_array($sel);

if($arr['ptype']!=$type)
  {
if(mysql_query("insert into pttable (ptype) values('$type')"))
	   {
	      
	    echo "<html><script language='JavaScript'>alert('Plant type added succesfully.')</script></html>";
	
	   }
	 }
  else
{
echo "<html><script language='JavaScript'>alert('Plant type already exists.')</script></html>";
}
}
}
?>
<html>
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
  width: 33%; /* Four links of equal widths */
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
    
    input[type=text]{
  width: 30%;
  padding: 10px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: 2px groove;
  background: #f1f1f1;
}

input[type=submit] {
  width: 10%;
  padding: 5px;
  font-size: 10px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: 9px groove;
  background: lightgreen;
    font-size: 20;
}

    
</style>
<?php include("header.php");?>
<div class="navbar">
  <a href="addtype.php">Add Types</a>  
  <a href="additem1.php">Add Plants</a> 
  <a href="homepage.php">Logout</a>
</div>
</font>

<form name="addplant" method="post">
<center>
<fieldset>
<legend align="center"><h2><fieldset>Add Plant Type</fieldset></h2></legend>
 <div style="background-color:lightblue"><h3>
     <font size="5"><b>Enter Plant type :-</b></font><input type= "text" name="pty" id="pty" ><br><br>
<input type="submit" value="ADD" id="sub" name="sub"><br></h3>
</div>
</fieldset>
</center>
</form>
    <?php include("footer.php");?>
</body>
</html>