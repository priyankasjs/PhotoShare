<?php
require('php/session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <link href="css/style.css" rel="stylesheet" type="text/css">

  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
  <!--favicon was made by Priyanka Jagdipsingh using Adobe logo maker-->
</head>
<body>

<!--Navigation bar-->

<?php
if (isset($_SESSION['user'])) {
  require('php/home_member_nav.php');
}
else {
require('php/home_guest_nav.php');
}
?>

<div class="header_center"> <h1>Welcome to PhotoShare</h1> </div>

<div class="about">

 <!--All images used came from pexels.com-->

 <!--Wheeler, J. (2013, September 2). Symmetrical Photography of clouds covered blue sky - pexels. https://www.pexels.com/photo/symmetrical-photography-of-clouds-covered-blue-sky-1486974/ . Retrieved 15th Oct. 2023.-->

 <img src="images/pexels-james-wheeler.jpg" width="200" height="250" id="img1" alt="A shot of a lake with the sky reflected in it. The sky has clouds and a pinkish colour to it. In the backgroud grassy fields and trees can be seen.">

  <div id="paragraph1">
  <p>PhotoShare aims to build a community for aspiring photographers.
  </p>

  </div>

  <div id="paragraph2">

  <!--Lastovich, T. (2017, March 4). Brown wooden dock surrounded with green grass near mountain under white ... https://www.pexels.com/photo/brown-wooden-dock-surrounded-with-green-grass-near-mountain-under-white-clouds-and-blue-sky-at-daytime-808465/ . Retrieved 15th Oct. 2023.-->

  <img src="images/pexels-tyler-lastovich.jpg" width="200" height="250" id="img2" alt="A shot of a mountainous trail, with dried grass on both sides of the wooden trail.">

  <p>We want to foster talent in a safe environment and inspire photographers to aim high.</p>

  </div>

  <br>

  <div id="paragraph3">

    <p>On PhotoShare you will be able to make posts, comment, and interact with other photographers.</p>

  <!--Gould, D. (2016, November 21). Scenic view of river · Free Stock Photo - PEXELS. https://www.pexels.com/photo/scenic-view-of-river-325807/ . Retrieved 15th Oct. 2023.-->

  <img src="images/pexels-dom-gould.jpg" width="400" height="250" id="img3" alt="A shot of a crystal blue lake in between rocky land and it is surrounded by trees.">

  <!--Berger, S. (2015, June 7). Scenic view of mountains during Dawn · free stock photo - PEXELS. https://www.pexels.com/photo/scenic-view-of-mountains-during-dawn-1266810/ . Retrieved 15th Oct. 2023.-->

  <img src="images/pexels-simon-berger.jpg" width="200" height="250" id="img4" alt="A shot at the top of a mountain, in the foreground flowers growing from its surface can be seen, the middle ground shows mountains and the background is the sun hidden behind cloud coverage.">

  <!--Bartus, D. (2018, June 12). Photo lavender flower field under Pink Sky · free stock photo - PEXELS. https://www.pexels.com/photo/photo-lavender-flower-field-under-pink-sky-1166209/ . Retrieved 15th Oct. 2023.-->

  <img src="images/pexels-david-bartus.jpg" width="400" height="250" id="img5" alt="A shot of a lavender field, showing rows and rows and bright purple lavender, set with the pinkish clounds and blue sky.">

  </div>

</div>

<!--Footer
will turn this into a incl. php file!-->

<div class="footer">
<footer>
  <p>&copy; 2023 PhotoShare</p>
</footer>
</div>

</body>
</html>