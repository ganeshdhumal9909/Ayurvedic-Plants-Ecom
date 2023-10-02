<?php
    //Start session
    session_start();
    
    //Include database connection details
    require_once('config.php');
    
    
    
    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
        return mysql_escape_string($str);
    }
    
    //setup a directory where images will be saved 
    $target = "plantspic/"; 
    $target = $target . basename( $_FILES['photo']['name']); 
    
    //Sanitize the POST values
    $name = clean($_POST['pn']);
    $price = clean($_POST['pr']);
    $category = clean($_POST['type']);
    $photo = clean($_FILES['photo']['name']);
    $description = clean($_POST['des']);
    //Create INSERT query
    $qry = "insert into plantsdetails(plantname, price, photo, ptype,description) values('$name','$price','$photo','$category','$description')";
    $result = @mysql_query($qry);
    
    //Check whether the query was successful or not
    if($result) {
            //Writes the photo to the server 
         $moved = move_uploaded_file($_FILES['photo']['tmp_name'], $target);
         
         if($moved) 
         {      
             //everything is okay
             echo "The photo ". basename( $_FILES['photo']['name']). " has been uploaded, and your information has been added to the directory"; 
         } else {  
             //Gives an error if its not okay 
             echo "Sorry, there was a problem uploading your photo. "  . $_FILES["photo"]["error"]; 
         }
            
         echo "<br><font size='+2'>Plant Added successfully</font> ";


        exit();
    }else {
        die("Query failed " . mysql_result_error());
    } 
 ?>