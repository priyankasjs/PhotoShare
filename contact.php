<?php
//session information
require('session.php');
?>

<!--this file will display after contact form is submitted and it will input the data into the databse-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome!</title>

  <link href="../css/style.css" rel="stylesheet" type="text/css">

  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">

</head>
<body>

  <?php
  //navigation bar
  //guests and members will see different nav bars.
if (isset($_SESSION['user'])) {
  require('member_nav.php');
}
else {
require('guest_nav.php');
}
?>

  <br><br>

  <?php

//storing information from the form in php variables
$username = $_POST["user_name"];
$email = $_POST["email"];
$feedback = $_POST["feedback"];

//database connection
require('db_connect.php');

  //use PHP variables as input to MqSQL query. 
$qry = "INSERT INTO user_feedback (username, email, feedback) VALUES ('$username', '$email', '$feedback');";  

//execute the query     
$result = mysqli_query($conn, $qry);

//check on the success of the query 
 if(!$result) echo 'Error occurred: ' . mysqli_error($conn) . '<br><br>';  
 mysqli_close($conn); 

  ?>

<p>Thank you for your feedback! We will get back to you soon.</p>

 <?php
 //footer
 require('footer.php');
 ?>

</body>
</html>