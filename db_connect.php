<!--this file will be called whenever a database connection is needed-->
<?php
//store our connection credentials in variables;   
$server = 'localhost';   
$user = 'root';   
$pass = '';
$dbase = 'final_project';      
//making the actual connection to mysql and the chosen database   
$conn = mysqli_connect($server, $user, $pass, $dbase);  
 //if the connection failed print error message 
 if (!$conn) {     
    die('Could not connect to database because: ' . mysqli_connect_error());    
 }   
?>