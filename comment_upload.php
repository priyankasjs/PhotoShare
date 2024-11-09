<?php
//session info
require('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comment Posted</title>

  <link href="../css/style.css" rel="stylesheet" type="text/css">

<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
</head>
<body>
<?php
//navigation bar
require('member_nav.php');

//database connection
require('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["submit"])) {

  $comment = $_POST["comment"];
  $post_id = $_POST["post_id"];

//insert into database
//use PHP variables as input to MqSQL query. 

$qry = "INSERT INTO comment_section (comment, username, post_id) VALUES ('$comment', '$_SESSION[user]', '$post_id')";

//execute the query     
$result2 = mysqli_query($conn, $qry);

//check on the success of the query 
if(!$result2) {
echo 'Error occurred: ' . mysqli_error($conn) . '<br><br>'; 
}

//close the connection 
mysqli_close($conn);
}
?>

<h1 class="header_center">Your Comment has been posted.</h1>

<p>You can view your comment <a href="gallery.php">here</a>.</p>

<?php
 //footer
 require('footer.php');
 ?>
</body>
</html>