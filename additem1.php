<?php
include("config.php");

?>


<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
<script>

function checkvalidation()

{

var name=/^[a-zA-Z ]{2,15}$/;

var pri=/^[0-9]{9,14}$/;
if(document.productform.pn.value.search(name)==-1)
{
alert("ENTER CORRECT PLANT NAME");
document.productform.pn.focus();
return false;
}

else if(document.productform.pr
.value.search(pri)==-1)
{
alert("ENTER CORRECT PRICE");
document.productform.pr.focus();
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
    font-size:15; 
}

</style>
<?php include("header.php");?>
<div class="navbar">
  <a href="addtype.php#">Add Types</a>  
  <a href="additem1.php#">Add Plants</a> 
  <a href="homepage.php">Logout</a>
</div>
</font>



<center>
<form name="productForm" id="productForm" action="addproduct-exec.php" method="post" enctype="multipart/form-data" onsubmit="return checkvalidation()" >
<fieldset>
<legend align="center"><h2><fieldset>Add Plants</fieldset></h2></legend>
<div style="background-color:lightblue">
<font size="5"><b>Select Type:-</b></font>	
<select name="type" id="type">
    <option value="select">- select one option -
    <?php
     $ptable=mysql_query("select ptid,ptype from pttable"); 
    //loop through categories table rows
    while ($row=mysql_fetch_array($ptable)){
    echo "<option value=$row[ptid]>$row[ptype]"; 
    }
    ?>
    </select><br><br><br> 
<font size="5"><b>Plant Name:-</b></font>  	<input type="text" id="pn" name="pn"/> <br><br>
<font size="5"><b>Plant Price:-</font></b> 	<input type="text" id="pr" name="pr"/><br><br>
<font size="5"><b>Description:-</b> </font>	<input type="text" id="des" name="des"/> <br><br>
<font size="5"><b>Photo:-</b> </font>		<input type="file" name="photo" id="photo" dropzone/>&nbsp;&nbsp;<input type="reset" name="reser" value="reset"></br><br>
<tr><td colspan="2"><input type="submit" name="sub" id="sub" value="Add"/></td></tr><br><br><br>
</div>
</fieldset>
</center>
</form>
     <?php include("footer.php");?>
</body>
</html>