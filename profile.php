<?php
//session info
require('session.php');
?>

<!--a member's only page to view their profile which will pull all their posts from the post_info table on the database with the help of the session information-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>

  <link href="../css/style.css" rel="stylesheet" type="text/css">

  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">

</head>
<body class="box">

<!--Navigation bar-->
<?php
  require('member_nav.php');
?>

<h1 class="header_center"><?php echo $_SESSION['user']; ?></h1>

<?php

//database connection
require('db_connect.php');

//query string
$qry = "select * from post_info where author = '$_SESSION[user]'";

//execute the query
$result = mysqli_query($conn, $qry);

if ($result) {

  if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      
      //displays all the user's posts
      echo "<div class=\"gallery\">

      <img src='$row[picture]'  alt='User Upload' width='500' height='333'> 

      <br>

      <div class=\"caption\">$row[caption]</div> 

      <div class=\"author\"><strong>$row[author]</strong></div>

      <div class=\"date\"><strong>$row[post_date]</strong></div>
      
      </div>";

      //put comment section after post date

    } 
    //end while loop

  } 
  //end if 1 or more rows

  else
    echo "<br>No posts avaliable.";
}
mysqli_close($conn);
?>

<?php
 //footer
 require('footer.php');
 ?>
  
</body>
</html>