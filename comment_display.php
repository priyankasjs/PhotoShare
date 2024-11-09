<!--file to be included on the gallery.php file-->
  <?php
  //database connection
  require('db_connect.php');


  //Create the query string 
  $query1 = "select * from comment_section";
 
  //execute the query
  $result1 = mysqli_query($conn, $query1);
  if ($result1) {
 
    if (mysqli_num_rows($result1) > 0) {
 
      while ($row1 = mysqli_fetch_assoc($result1)) {

        //comparing the post_id in the comment_section table to the post_info table to ensure the comments are being displayed on the correct post
        if($row1['post_id'] == $row['post_id']) {
 
        //echo statement to output the comments and how it will be formatted in html+css
          echo "
        <div id=\"comment\">
        <div class=\"author\"><strong>$row1[username]</strong></div>
        <br>
        <div class=\"caption\">$row1[comment]</div>
        <br>

        <div class=\"date\"><strong>$row1[comment_date]</strong></div>
        </div>
        <br><br>";
 
      } 
    }
      //end while loop
 
    } 
    //end if 1 or more rows
 
    else
      echo "<br>No comments avaliable.";
  }
  ?>