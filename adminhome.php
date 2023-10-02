<html>
<body>
<font color="black">
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
</style>
<?php include("header.php");?>
<div class="navbar">
  <a href="http://localhost/Ayurvedplants/addtype.php">Add Types</a>  
  <a href="http://localhost/Ayurvedplants/additem1.php#">Add Plants</a> 
  <a href="http://localhost/Ayurvedplants/homepage.php">Logout</a>
</div>
    <font size="16"> WELCOME ADMIN </font>
    <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
    
</font>
     <?php include("footer.php");?>
</body>
</html>