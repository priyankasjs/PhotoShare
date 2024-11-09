<?php
//session info
require('session.php');
?>

<!--login authentication to ensure the data the user uses to login is the same as the one stored in the database-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Back!</title>
  <link href="../css/style.css" rel="stylesheet" type="text/css">

  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
</head>
<body>
  <?php

  $username = $pword = $db_pass = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["submit"])) {

    //storing form data into php variables
    $username = $_POST["user_name"];
    $pword = $_POST["password"];

    //database connection
    require("db_connect.php");

    //Create the query string 
	$query = "select * from user_info where username = '$username';";

	//execute the query
	$result = mysqli_query($conn, $query);
	if ($result) {
 
		if (mysqli_num_rows($result) > 0) {

			while ($row = mysqli_fetch_assoc($result)) {
	
 
				//storing database password into a php variable
        $db_pass = $row["pword"];
 
			} 
			//end while loop
 
		} 
		//end if 1 or more rows
 
		else {
			echo "<br>Incorrect Username.";
	}

}

  //encrypting password from login form
  $pword_hash = hash('sha256', $pword);

  //verifying password and setting up session data

  if($pword_hash != $db_pass) {
  echo "<h3>Incorrect password.</h3>";
}
else {
   $_SESSION['user'] = $username;
  }

  mysqli_close($conn);

  }
  ?>

   <!--Navigation bar-->

   <?php
if (isset($_SESSION['user'])) {
  require('member_nav.php');
}
else {
require('guest_nav.php');
}
?>

<br>

  <?php
  if(isset($_SESSION['user'])) {
    echo "<h1 class=\"header_center\">Welcome Back!</h1>
    <br><br>
    <p>You can create a post <a href='upload.php'>here</a> or check out other users posts in the <a href='gallery.php'>Gallery</a>.</p>";
  }
  else {
    echo "<h3>You need to <a href='../html/login.html'>login</a> again.</h3>";
  }

  //footer
 require('footer.php');
  ?>
</body>
</html>