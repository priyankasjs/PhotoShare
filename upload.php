<?php
require('session.php');
?>

<!--a member's only page, allows users to upload their pictures to the website and store it in the post_info table in the database-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Post</title>

  <link href="../css/style.css" rel="stylesheet" type="text/css">

  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
</head>
<body class="box">

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
  
<?php

//database connection
require('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["submit"])) {



//inputs from the form upload.html
$caption = $_POST["caption"];

/*
Code for the image upload comes from:
  W3Schools. (n.d.). PHP File Upload. PHP file upload. https://www.w3schools.com/php/php_file_upload.asp 
Retrieved 21st Oct. 2023.*/

  //upload image
$target_dir = "../user_images/";
$target_file = $target_dir . basename($_FILES["user_upload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check file size
if ($_FILES["user_upload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["user_upload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["user_upload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

//insert into database
//use PHP variables as input to MqSQL query. 

$qry = "INSERT INTO post_info (picture, caption, author) VALUES ('$target_file', '$caption', '$_SESSION[user]')";

//execute the query     
$result = mysqli_query($conn, $qry);

//check on the success of the query 
if($result) echo 'record successfully inserted.<br><br>'; 
else echo 'Error occurred: ' . mysqli_error($conn) . '<br><br>'; 

//close the connection 
mysqli_close($conn);

//after info is inserted into the database, the user will be directed to the gallery page to view their post
header("Location: gallery.php");

}
?>

<form id="postfrm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
      <fieldset>
        <legend><strong>Upload Picture</strong></legend>

        <input type="file" name="user_upload" id="user_upload" required>
      </fieldset>

      <fieldset>
        <legend><strong>Post Information</strong></legend>

        <textarea name="caption" rows="5" cols="30" placeholder="Type your caption here" maxlength="300"></textarea>
      </fieldset>

      <br><br>

      <input type="submit" name="submit" value="POST">
    </form>

    <?php
 //footer
 require('footer.php');
 ?>
  
</body>
</html>