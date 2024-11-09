<?php

//functioning search bar code comes from:

//YouTube. (2017). 57: How to create a search field with PHP and MySQLi | PHP tutorial | Learn PHP programming. YouTube. Retrieved December 16, 2023, from https://www.youtube.com/watch?v=lwgG_uIJYQM. 


require('session.php');

require('db_connect.php');
?>

<!--search results page that will display information from the post_info table in the database-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results</title>

  <link href="../css/style.css" rel="stylesheet" type="text/css">

  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
</head>
<body>

<?php
  //navigation bar
if (isset($_SESSION['user'])) {
  require('member_nav.php');
}
else {
require('guest_nav.php');
}
?>

  <h1 class="header_center">Results</h1>

    <?php
    if(isset($_POST["search_btn"])) {
      $search = mysqli_real_escape_string($conn, $_POST["search"]);

      //query string, which includes the mysql wildcard 
      $qry = "select * from post_info where caption like '%$search%' or author like '%$search%';";

      $result = mysqli_query($conn, $qry);

      if($result) {
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            //displaying search results
            echo " <div class=\"gallery\">
            <img src='$row[picture]'  alt='User Upload' width='500' height='333'> 

            <br>

            <div class=\"caption\">$row[caption]</div> 

            <div class=\"author\"><strong>$row[author]</strong></div>

            <div class=\"date\"><strong>$row[post_date]</strong></div>
            
            </div>";

          } //end while loop
        } //end 3rd if statement
        else
          echo "No results found.";

      } //end 2nd if statement
  mysqli_close($conn);

    } //end 1st if statement
    ?>
</body>
</html>