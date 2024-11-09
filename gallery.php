<?php
//session info
require('session.php'); 
?>

<!--this is the gallery page that will display all the user posts from the post_info table in the database-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>

  <link href="../css/style.css" rel="stylesheet" type="text/css">

  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">

</head>
<body>

<!--Navigation bar-->
<?php
if (isset($_SESSION['user'])) {
  require('member_nav.php');
}
else {
require('guest_nav.php');
}
?>

  <br><br>

  <h1 class="header_center">User Posts</h1>

  <!--All images used came from pexels.com under the 'landscape' search, the orginal photographers' names are in the names of the images used in this gallery. Retrieved 21st Oct. 2023.-->

 <?php

//database connection
require('db_connect.php');


 //Create the query string 
 $query = "select * from post_info";

 //execute the query
 $result = mysqli_query($conn, $query);
 if ($result) {

   if (mysqli_num_rows($result) > 0) {

     while ($row = mysqli_fetch_assoc($result)) {

      //to display the gallery 
      echo "<div class=\"gallery\">

       <div class=\"pic\"><img src='$row[picture]'  alt='User Upload' width='500' height='333'></div>
       <input type='hidden' name='post_id' value='$row[post_id]'>

       <br>

       <div class=\"caption\">$row[caption]</div> 

       <div class=\"author\"><strong>$row[author]</strong></div>

       <div class=\"date\"><strong>$row[post_date]</strong></div>
       <br><br>";

       //comment form for users to write comments on posts
       include('comment_frm.php');

       //to format the comment section
       echo "<div id=\"comment_section\">";

       //to display the comments from the comment_section table in the database
       include('comment_display.php');

       //to close off the div tags from the prev. echo statements
       echo "</div>";
       
      echo "</div>";

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