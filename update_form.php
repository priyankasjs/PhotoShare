<?php
require('session.php');
?>

<!--a member's only page, will display after users update their profile-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Updated</title>

  <link href="../css/style.css" rel="stylesheet" type="text/css">

</head>
<body>

  <?php
  //navigation bar
  require('member_nav.php');

  //connect to database
  require('db_connect.php');

  //the user must enter their password to update the form
  //edited to ensure the update won't go through if password isn't entered.
if(empty($_POST["pword"])) {
  die("Password must be entered to update. Go back to the <a href='edit_profile.php'>update</a> form.");
}

  //initalizing variables 
  $username = $email = $pword = $fname = $lname = $age = $phone = "";

  //retrieving form data
  $username = $_POST["user_name"];
  $email = $_POST["email"];
  $pword = $_POST["pword"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $age = $_POST["age"];
  $phone = $_POST["phone"];


//to encrypt the password again
  $pword_hash = hash('sha256', $pword);

  //Create the query string 
  $query = "update user_info set email = '$email', pword = '$pword_hash', fname = '$fname', lname = '$lname', age = '$age', phone_num = '$phone' where username = '$username';";  

  //execute the query 
  $result = mysqli_query($conn, $query); 

  //process the results and provide feedback           
  if ($result) 
  {
   //query successfully executed in MySQL   
   $rows_aff = mysqli_affected_rows($conn); 
   //retrieves the number of rows updated               
   if ($rows_aff > 0) {// at least 1 row was updated                 
     echo "<h1 class=\"header_center\">Profile Information Updated</h1>
     
     $rows_aff rows were updated as requested. <br><br>";             
   } 
   else
    {
     // query executed but no rows were updated                 
     echo "Sorry no rows were found for username: $username. <br><br>";           
    }          
    } 
    else {               
     echo "Sorry, there was an error in processing this update. <br><br>";           
 }          

    //close the connection         
    mysqli_close($conn); 
  ?>  
</body>
</html>