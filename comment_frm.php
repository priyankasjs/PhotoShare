<!--file to be included on gallery.php-->
<?php
//if statement to ensure only users who are logged in will be allowed to view and use the post comment form
if(isset($_SESSION['user'])) {
  //echo statement to display the comment form
  echo "<form id='comment_frm' 
  action='comment_upload.php' 
  method='post'>

    <textarea name='comment'></textarea>

    <input type='hidden' name='post_id' id='post_id' value='".$row['post_id']. "'>

    <input type='submit' name='submit' value='Comment'>
  </form>";
}
?>