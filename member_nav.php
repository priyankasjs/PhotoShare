<!--this will display on the index.php page for the members (egistered users) who wish to navigate photoshare-->
  <div class="nav1">
    <ul>
      <li><a href="../index.php"><img src="../images/camera.png" height="32" width="32"> | PhotoShare</a></li>
       <!--camera icon: 
    Flaticon. (2019, July 24). Camera free icons designed by Freepik. Flaticon. https://www.flaticon.com/free-icon/camera_1998342 -->

      <li id="log_out"><form action='../index.php' method='get'>
	<input type=submit value='logout' name='logout' id='logout'>
	</form></li>
  
      <li id="profile">

      <!--dropdown code:
    W3Schools. (n.d.). How to - hoverable dropdown. How To Create a Hoverable Dropdown Menu. https://www.w3schools.com/howto/howto_css_dropdown.asp -->
        <div class="dropdown">
          <button class="dropbtn">
            <?php echo $_SESSION['user']; ?>
            <i class="fa fa-ceret-down"></i>
          </button>
          <div class="drp_content">
            <a href="profile.php">Profile</a>
            <a href="edit_profile.php">Edit Profile</a>
          </div>
        </div>
      </li>
    </ul>
  </div>
  
  <div class="nav2">
    <ul>
      <li><a href="gallery.php">Gallery</a></li>
      <li><a href="upload.php">New Post</a></li>
      <li><a href="../html/contact.html">Contact</a></li>
    </ul>
    <form method="post" action="search.php">

    <input type="text" placeholder="Search PhotoShare" name="search" id="search">

    <input type="submit" name="search_btn" value="Search" id="search_btn">
</form>
  </div>