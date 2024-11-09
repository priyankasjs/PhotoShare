<!--this will display on all the php files for the guest (non-registered users) who wish to navigate photoshare-->
  <div class="nav1">
    <ul>
      <li id="home"><a href="../index.php"><img src="../images/camera.png" height="32" width="32" alt="camera icon"> | PhotoShare</a></li>
      <!--camera icon: 
    Flaticon. (2019, July 24). Camera free icons designed by Freepik. Flaticon. https://www.flaticon.com/free-icon/camera_1998342 -->
      <li id="log"><a href="../html/login.html">Login</a></li>
      <li id="reg"><a href="reg_form.php">Sign Up</a></li>
    </ul>
  </div>
  
  <div class="nav2">
    <ul>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="../html/contact.html">Contact</a></li>
    </ul>
    <form method="post" action="search.php">

    <input type="text" placeholder="Search PhotoShare" name="search" id="search">

    <input type="submit" name="search_btn" value="Search" id="search_btn">
</form>
  </div>