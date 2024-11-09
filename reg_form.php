<?php
//session info
require('session.php');
?>

<!--registration page to sign up for photoshare-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register on PhotoShare</title>

  <link href="../css/style.css" rel="stylesheet" type="text/css">

  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">

</head>
<body>

<?php

//database connection
require("db_connect.php");

//server-side validation
//fixed the validation (i forgot a ; in my javascript file so i added it in) and added in the verify password input

//initalizing php variables to hold form data

$username = $email = $pword = $vpass = $fname = $lname = $age = $phone = "";

$userErr = $emailErr = $pwordErr = $vpass = $fnErr = $lnErr = $ageErr = $phoneErr = "";

$valid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["submit"])) {

 $vpass = $_POST["vpass"];
 $pword = $_POST["pword"];
 
  if(!($pword===$vpass)) {
    die("The passwords do not match. Please return to <a href='reg_form.php'>registration page</a>");
  }

  //testing username

  //testing if username field is empty
  if(empty($_POST["user_name"])) {
    //error message will display if field is empty
    $userErr = "Username is required.";
    $valid = false;
  }
  //further assessment if field is not empty
  else {
    //retrieves username data
    $username = $_POST["user_name"];
    //cleans up username data
    $username = test_input($username);

    //test data type and format using regular expression
    if (!preg_match("/^[a-zA-Z0-9_-]{4,30}$/", $username)) {
      $userErr = "Username must only contain no less than 4 characters, letters, numbers, _, and -.";

      $valid = false;
    }
  }

  //testing email

  //testing if email field is empty
  if(empty($_POST["email"])) {
    //error msg will display if field is empty
    $emailErr = "Email is required.";
    $valid = false;
}
//further assesment if field is not empty
else {
//retrieves email data
$email = $_POST["email"];
//clean up the email data
$email = test_input($email);

//test data type and format using regular expression
if(!preg_match("/^[a-zA-Z0-9.]{2,30}@[a-zA-Z0-9.]{2,20}.[a-zA-Z]{2,4}$/", $email)) {
    //error msg will display if data doesn't match regex
    $emailErr = "Invalid email address entered.";
    $valid = false;

}
}

//testing password

//testing if password field is empty
if(empty($_POST["pword"])) {
  //an error msg will dispay if field is empty
  $pwordErr = "Password is required.";
  $valid = false;
}
//futher assesssment if field is not empty
else {
  //retrives password data
  $pword = $_POST["pword"];
  //cleans up password data
  $pword = test_input($pword);

  //test data type and format using regular expression
  if(!preg_match("/^[a-zA-Z0-9@&!*%$]{10,60}$/", $pword)) {
    //error msg will display if data doesn't match regex
    $pwordErr = "Password must only contain letters, numbers, @, &, !, *, %, and $.";
    $valid = false;
  }
}

//testing first name

//testing if fname field is empty
if(empty($_POST["fname"])) {
  //an error msg will dispay if field is empty
  $fnErr = "First Name is required.";
  $valid = false;
}
//further assessment if fname field isn't empty
else {
  //retrieves fname data
  $fname = $_POST["fname"];
  //clean up the fname data
  $fname = test_input($fname);

  //test data type and format using regular expression
  if(!preg_match("/^[a-zA-Z'!-]{2,30}$/", $fname)) {
      //error msg will display if data doesn't match regex
      $fnErr = "First name must only contain letters, ', !, and -.";
      $valid = false;
  }
}

//testing last name
//testing if lname field is empty
if(empty($_POST["lname"])) {
  //an error msg will dispay if field is empty
  $lnErr = "Last Name is required.";
  $valid = false;
}


//testing if lname field isn't empty
if(!empty($_POST["lname"])) {
  //retrives form data
  $lname = $_POST["lname"];
  //clean up lname data
  $lname = test_input($lname);

  //test data type and format using regular expression
  if(!preg_match("/^[a-zA-Z'!-]{2,50}$/", $lname)) {
    //error msg will display if data doesn't match regex
    $lnErr = "Last name must only contain letters, ', !, and -.";
    $valid = false;
}
}

//testing age 

//testing if the age field is empty
if (empty($_POST["age"])) {
  //error msy will display if age field is empty
  $ageErr = "Age is required.";
}
//futher assessment if age field isn't empty
else {
  //retrieves age data from form
  $age = $_POST["age"];
  //cleans up age data
  $age = test_input($age);

  //test data type and format using regular expression
  if(!preg_match("/^[0-9]{2,3}$/", $age)) {
      $ageErr = "Age must only contain numbers.";
      $valid = false;
    }
    else {
      //test if age is above 15 but under 100 years
  if($age < 15 && $age > 100) {
    $ageErr = "You must be over 15 to sign up.";
    $valid = false;
  }
    }
}

//testing phone number

//testing if the phone num field is empty
if (empty($_POST["phone"])) {
  //error msy will display if age field is empty
  $phoneErr = "Phone number is required.";
}
//futher assessment if age field isn't empty
else {
  //retrieves age data from form
  $phone = $_POST["phone"];
  //cleans up age data
  $phone = test_input($phone); 

  //test data type and format using regular expression
  if(!preg_match("/^\([0-9]{3}\)[0-9]{3}\-[0-9]{4}$/", $phone)) {
    $phoneErr = "Phone number must be in the format: (000)000-0000.";
    $valid = false;
  }
}

//for all valid data
if($valid) {
  //once all data is valid, it will insert the data into the database

  //encrypting password before it enters the database
  $pword_hash = hash('sha256', $pword);

   //use PHP variables as input to MySQL query. 
$qry = "INSERT INTO user_info (username, email, pword, fname, lname, age, phone_num) VALUES ('$username', '$email', '$pword_hash', '$fname', '$lname', '$age', '$phone');";  

//execute the query     
$result = mysqli_query($conn, $qry);

//check on the success of the query 
 if(!$result) echo 'Error occurred: ' . mysqli_error($conn) . '<br><br>';   
 //close the connection 
 mysqli_close($conn); 

 //once all the info is validated, the user will be sent to the login page to log into their profile
 header("Location: ../html/login.html");
}
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
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

  <!--Banner-->

  <div class="banner">
    <img src="../images/photoshare_banner.png" width="1099" alt="An image of the PhotoShare logo.">
  </div>

  <br>

  <div id="reg_sign">
    <h1 class="header_center">Sign Up Today!</h1>
  </div>

  <br>

  <!--Registration form-->

  <div class="reg_form">
    <form 
    id="register" 
    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
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

        <input type="password" name="pword" id="pword" placeholder="Password" value="<?php echo $pword; ?>">

        <span id="pwordErr" class="error"> <?php echo $pwordErr; ?> </span>

        <br><br>

        <input type="password" name="vpass" id="vpass" placeholder="Verify Password">

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

      <input type="submit" name="submit" value="REGISTER">

    </form>
  </div>

  <p class="form_para">Already have an account? Login in <a href="../html/login.html">here.</a></p>

  <?php
 //footer
 require('footer.php');
 ?>

<!--javascript link for client side validation-->
<script type="text/javascript" src="../javascript/myJS.js" ></script>

</body>
</html>