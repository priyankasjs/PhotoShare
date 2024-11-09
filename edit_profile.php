<?php
//session info
require('session.php');
?>

<!--this is a member's only page to edit their profile-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>

  <link href="../css/style.css" rel="stylesheet" type="text/css">

  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
</head>
<body>
  <?php
  //navigation bar
    require('member_nav.php');

  //initalizing php variables to hold form data

$username = $email = $pword = $fname = $lname = $age = $phone = "";

$userErr = $emailErr = $pwordErr = $fnErr = $lnErr = $ageErr = $phoneErr = "";



//database connection  
require('db_connect.php');

  //creating query string
  $query = "select * from user_info where username = '$_SESSION[user]'";

  //execute the query
 $result = mysqli_query($conn, $query);
 if ($result) {

   if (mysqli_num_rows($result) > 0) {

     while ($row = mysqli_fetch_assoc($result)) {

      //storing database info to input it into the form 
      $username = $row['username'];
       $email = $row['email'];
       $fname = $row['fname'];
       $lname = $row['lname'];
       $age = $row['age'];
       $phone = $row['phone_num'];

     } 
     //end while loop

   } 
   //end if 1 or more rows

   else
     echo "<br>No posts avaliable.";
 }
 mysqli_close($conn); 
  ?>
  <br>
  
  <h1 class="header_center">Edit Profile</h1>

  <div class="update_form">
    <form 
    id="update" 
    action="update_form.php"
    onsubmit="return validate();" 
    method="post">

      <fieldset>
        <legend><strong>Account Information:</strong></legend>

        <input type="text" name="user_name" id="user_name" placeholder="Username" value="<?php echo $username; ?>">

        <span id="userErr" class="error"> <?php echo $userErr; ?> </span>

        <br><br>

        <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>">

        <span id="emailErr" class="error"><?php echo $emailErr; ?></span>

        <br><br>

        <input type="text" name="pword" id="pword" placeholder="Password" value="<?php echo $pword; ?>">

        <span id="pwordErr" class="error"> <?php echo $pwordErr; ?> </span>

      </fieldset>

      <br>

      <fieldset>
        <legend><strong>Personal Information:</strong></legend>
        
        <input type="text" name="fname" id="fname" placeholder="First Name" value="<?php echo $fname; ?>">

        <span id="fnErr" class="error"> <?php echo $fnErr; ?> </span>

        <br><br>

        <input type="text" name="lname" id="lname" placeholder="Last Name" value="<?php echo $lname; ?>">

        <span id="lnErr" class="error"> <?php echo $lnErr; ?> </span>

        <br><br>

        <input type="text" name="age" id="age" placeholder="Age" value="<?php echo $age; ?>">

        <span id="ageErr" class="error"> <?php echo $ageErr; ?> </span>

        <br><br>

        <input type="text" name="phone" id="phone" placeholder="Phone Number" value="<?php echo $phone; ?>">

        <span id="phoneErr" class="error"> <?php echo $phoneErr; ?> </span>
      </fieldset>

      <br>

      <input type="submit" name="update" value="UPDATE">

    </form>
  </div>

  <?php
 //footer
 require('footer.php');
 ?>

  <script type="text/javascript" src="../javascript/myJS.js" ></script>

</body>
</html>