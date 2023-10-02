<?php
//checking connection and connecting to a database
include("config.php");

$result=mysql_query("SELECT * FROM plantsdetails,pttable WHERE plantsdetails.ptype=pttable.ptid ")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours11."); 
?>
<?php
    //retrive type from the pttable table
    $categories=mysql_query("SELECT * FROM pttable")
    or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
?>

<HTML>
<head>
<title>HOME</title>

<font color="red">
<meta name="viewport" content="width=device-width, initial-scale=1">

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
    max-width: 70px;
    
    background-color: aquamarine;
    align-items: center;
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


<body bgcolor="cornsilk">

	  
    <center><h1><ab style="background-color:aquamarine;">Welcome To Plant Shop</ab></h1> </center>

<?php
    if(isset($_POST['Submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
            $str = @trim($str);
            if(get_magic_quotes_gpc()) {
                $str = stripslashes($str);
            }
            return mysql_escape_string($str);
        }
        //get category id
        $id1 = clean($_POST['category']);
        

	$result1=mysql_query("SELECT * FROM pttable WHERE ptid='$id1'");
	$id=$result1['ptype'];
        $result=mysql_query("SELECT * FROM plantsdetails,pttable WHERE ptid='$id1' AND plantsdetails.ptype=pttable.ptid ")
        or die("11A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
    }
?>
 <hr>
<table>
 <form name="categoryForm" id="categoryForm" method="post" action="viewplants.php" onsubmit="return categoriesValidate(this)">
     <table width="260" align="center">
     <tr>
         <td><font size="5"><b>Category</b></font></td>
        <td width="168"><select name="category" id="category">
        <option value="select">- select plant type -
        <?php 
        //loop through categories table rows
        while ($row1=mysql_fetch_array($categories)){
        echo "<option value=$row1[ptid]>$row1[ptype]"; 
        }
        ?>
        </select></td>
        <td><input type="submit" name="Submit" value="Show plants" /></td>
     </tr>
     </table>
 </form>
</table>
        <div style="display:flex; padding: 30px 30px; flex-wrap:wrap ; column-space:30px ; border: 2px solid #c3c3c3; ">
        <?php
            $count = mysql_num_rows($result);
            if(isset($_POST['Submit']) && $count < 1){
                echo "<html><script language='JavaScript'>alert('There are no products under the selected category at the moment. Please check back later.')</script></html>";
            }
            else{
                //loop through all table rows
                $counter = 0;
              
                while ($row=mysql_fetch_assoc($result)){
                   echo "<fieldset>";
                    echo "<tr>";
                    echo '<td><a href=plantspic/'. $row['photo']. ' alt="click to view full image" target="_blank"><img src=plantspic/'. $row['photo']. ' width="100" height="100"></a></td>';
                    echo"</tr>";
                    echo"<br>";
                        echo"<br>";
                    echo "<tr>";
                    echo "<td><b>Name:-</b>&nbsp;&nbsp;" . $row['plantname']."</td>";
                    echo "</tr>";
                    echo"<br>";
                        echo"<br>";
                    echo "<tr>";
                    echo "<td><b>Type:-</b>&nbsp;&nbsp;" . $row['ptype']."</td>";
                    echo "</tr>";
                    echo"<br>";
                        echo"<br>";
                    echo "<tr>";
                    echo "<td><b>Price:-</b>&nbsp;&nbsp;" . $row['price']."</td>";
                    echo "</tr>";
                    echo"<br>";
                        echo"<br>";
                    echo "<td><b>Description:-</b>&nbsp;&nbsp;" . $row['description']."</td>";
                    echo"<br>";
                        echo"<br>";
                    echo "<tr>";
                    echo '<td><a href="userloginpage.php?itemno=' . $row['plantno'] . '">Add To Cart</a></td>';
                    echo "</tr>";
                    echo "</td>";
                    echo "</tr>";
                    echo "</fieldset>";
                    
                }
            }
            mysql_free_result($result);
        ?>
        </div>
</div>
	 <?php include("footer.php");?>	  

</body>
</html>
