<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include './assets/mod/meta.php';?>
    </head>

  <body>
<?php include './assets/mod/db.php';?>
    <div class="container">
    <?php include './assets/mod/header.php';?>
 <div class="content">
        <!--end header-->
<div class="leftside">
<h2>Promoted Videos</p></h2>

<div class="fvidcont">

<div class="fvid">
<img src="default.png" class="vimg90">
<br>
<a href="#">video</a>
<br>
<a href="#" style="color: darkgray;"><small>revid</small></a>
</div>

<div class="fvid">
<img src="default.png" class="vimg90">
<br>
<a href="#">video</a>
<br>
<a href="#" style="color: darkgray;"><small>revid</small></a>
</div>

<div class="fvid">
<img src="default.png" class="vimg90">
<br>
<a href="#">video</a>
<br>
<a href="#" style="color: darkgray;"><small>revid</small></a>
</div>

<div class="fvid">
<img src="default.png" class="vimg90">
<br>
<a href="#">video</a>
<br>
<a href="#" style="color: darkgray;"><small>revid</small></a>
</div>

<div class="fvid">
<img src="default.png" class="vimg90">
<br>
<a href="#">video</a>
<br>
<a href="#" style="color: darkgray;"><small>revid</small></a>
</div>

</div>

<h2>Featured Videos</h2>
<div class="listing">
<img src="default.png" class="vimg120">
<div class="listingtext">
<a href="#" style="">this is a video</a>
<br>
<small>This is a description.</small>
<br><br>
<small style="vertical-align: bottom;">Views: <span href="#" style="color: gray;">100</span></small><br>
<small style="vertical-align: bottom;">From: <a href="#" style="color: gray;">revid</a></small>
</div>
</div>
<br>
<div class="listing">
<img src="default.png" class="vimg120">
<div class="listingtext">
<a href="#" style="">this is a video</a>
<br>
<small>This is a description.</small>
<br><br>
<small style="vertical-align: bottom;">Views: <span href="#" style="color: gray;">100</span></small><br>
<small style="vertical-align: bottom;">From: <a href="user?n=revid" style="color: gray;">revid</a></small>
</div>
</div>
<br>
<div class="listing">
<img src="default.png" class="vimg120">
<div class="listingtext">
<a href="#" style="">this is a video</a>
<br>
<small>This is a description.</small>
<br><br>
<small style="vertical-align: bottom;">Views: <span href="#" style="color: gray;">100</span></small><br>
<small style="vertical-align: bottom;">From: <a href="#" style="color: gray;">revid</a></small>
</div>
</div>




</div>
<div class="rightside">
    <br>
    <?php
      if(isset($_SESSION["profileuser3"])) {
       // echo "";
      } else if(!isset($_SESSION["profileuser3"])) {
        echo '
    <div class="box">
        <div class="boxheader">
        <h3>Login</h3>
        </div>
        <form method="post" action="login.php">
        <label for="username">Username</label>
        <input type=text name=username>
        <label for="password">Password</label>
        <input type=password name=password>
        <input type="submit" value="Login" style="float: right;">   
</form>  
    </div>
    <br>'; }
    ?>
    <div class="box">
        <div class="boxheader">
        <h3>What's New</h3>
        </div>
        <!-- <img src="cog.gif"> -->
        <p><b>Porting Revid</b><br><small>Yes. I am porting Revid UI to VistaTube.</small></p>
        <p><b>Join our Discord!</b><br><small>Report any bugs or issues to our Discord server (link in footer).</small></p>
        <p><b>revid balling</b><br><small>wtf revid balling</small></p>
    </div>
    <br>
    <div class="box">
        <div class="boxheader">
        <h3>Blog</h3>
        </div>
        <!-- <img src="cog.gif"> -->
        <p><b>No posts</b><br><small>Check back later.</small></p>
  </div>
    <br>
    <div class="box">
        <div class="boxheader">
        <h3>Featured Videos</h3>
        </div>
        <div class="listing">
<img src="default.png" style="width:38px;float: right;margin-left:10px;">
<div class="listingtext">
<a href="#" style="">this is a video</a>
<br>
<small>description...</small>
</div>
</div>
</div>
</div>
<?php include("./assets/mod/footer.php"); ?> <!-- /container -->

  </body>
</html>