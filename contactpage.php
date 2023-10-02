<html>
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
fieldset {
  display: block;
    padding-right: 20px;
    padding-left: 20px;
    width:100%;
  border: 3px groove (internal value);
}
    table,tr {
        background-color: cornsilk;
        border-spacing: 20px;
         width:100%;
  border: 5px solid black;
}
    
</style>
</font>
    <body bgcolor="#e6e6e6">
        
<?php include("header.php");?>
<div class="navbar">
  <a href="homepage.php">Home</a> 
  <a href="viewplants.php">View Plants</a> 
  <a href="aboutpage.php">About Us</a>
  <a href="contactpage.php">Contact Us</a>
  <a href="adminloginpage.php">Admin Login</a>
</div>
        <table>
            <tr><td>
            <fieldset>

    <legend><h2><div style="background-color:lightgreen"><font face="High Tower Text" size="6 color="black"><b>Contact Details</b></font></h2></legend>
<div style="background-color:lightblue">
<font size="6" face="High Tower Text">
    Admins...<br>
    Mr.Ganesh Dhumal<br>
    Mr.Ajay Dhobale<br>
    </font>
    </fieldset></td><br><td>
            <fieldset>
    <legend><h2><div style="background-color:lightgreen"><font size="6" face="High Tower Text" color="black"><b>Post</b></font></h2></legend>
<div style="background-color:lightblue">
<font size="6" face="High Tower Text">
    Gorakshnath Road, Vambori<br>
     Ahmednagar,Maharashtra 413704<br>
     02426-272624<br>
    
    </font>
    </fieldset></td></tr><td>
            <fieldset>
        <legend><h2><div style="background-color:lightgreen"><font size="6" face="High Tower Text" color="black"><b>Call</b></font></h2></legend>
<div style="background-color:lightblue">
    <font size="6" face="High Tower Text">
    02426-272624<br>
    9271375024<br>
    8698440750&nbsp;<font size="4" face="arial black" color="green">
    10AM TO 5PM</font><br>
    </font>
    </fieldset></td><td> 
            <fieldset>
        <legend><h2><div style="background-color:lightgreen"><font size="6" face="High Tower Text" color="black"><b>E-Mail</b></font></h2></legend>
<div style="background-color:lightblue">
<font size="6" face="High Tower Text">
 ayurvedplants@gmail.com<br>
 ganeshdhumal9909@gmail.com<br>
 ajaydhobale701@gmail.com<br>
    </font>
</fieldset></td></tr>
    </table>
         <?php include("footer.php");?>
</body>
</html>