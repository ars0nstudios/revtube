    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand logost" href="/"><strong>revista</strong><!--<img src="./assets/navlogo.png" height="17px" width="59px">--></a>
          <ul class="nav">
            <li><a href="/">Home</a></li>
            <li><a href="/videos">Videos</a></li>
            <li><a href="/channels">Channels</a></li>
            <li><a href="/community">Community</a></li>
           <!-- <li><a href="/upload">Upload</a></li> -->
          </ul>
          	<?php
      if(!$loggedIn) {
        echo '<ul class="nav secondary-nav"><li><strong><a class="yt-button dark" href="aregister.php">Sign Up</a></li> <li><a class="yt-button dark" href="alogin.php">Login</a></strong></li></ul>';
      } else {
        $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    $statement->bind_param("s", $_SESSION['profileuser3']);
			    $statement->execute();
			    $result = $statement->get_result();
			    if($result->num_rows === 0) exit('No rows');
			    while($row = $result->fetch_assoc()) {
            if ($row["is_admin"] == 1) {
              $adminlink="<li><a href=\"admin\">Admin Panel</a></li>";
            } else {
              $adminlink="";
            }
			        echo "<ul class=\"nav secondary-nav\">
            <li class=\"dropdown\" data-dropdown=\"dropdown\">
              <a href=\"#\" class=\"dropdown-toggle\"><img style='margin-bottom:-2px;' height='12px' width='12px' src='/content/pfp/".getUserPic($row["id"])."'> ".$row["username"]."</a>
              <ul class=\"dropdown-menu\">
              <li></li>
                <li><a href=\"./profile?id=".$row["id"]."\">Your Channel</a></li>
                <li><a href=\"account\">Account Settings</a></li>
                <li><a href=\"upload\">Upload</a></li>
                <li class=\"divider\"></li>
                <li><a href=\"logout\">Logout ".$row["username"]."</a></li>
                $adminlink
              </ul>
            </li>
          </ul><!--<br><div style=\"color: white\" class=\"pull-right\"><strong><a href=\"./profile?id=".$row["id"]."\">".$row["username"]."</a></strong> - <a href=\"./account\">Manage Account</a> - <a href=\"./alogout\">Logout</a></div>-->";
			    }
			    $statement->close();
      }
    ?>
          <!--<form action="" class="pull-right">
            <input class="input-small" type="text" placeholder="Username">
            <input class="input-small" type="email" placeholder="Email">
            <input class="input-small" type="password" placeholder="Password">
            <button class="btn" type="submit">login</button>-->
          </form>
        </div>
      </div>
    </div>
    <script>
   $(function dropdown(){
      $('#topbar').dropdown()
   }); 
</script>