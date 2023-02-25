<div class="header">
    <a href="/"><img src="./assets/img/logo.png" width="193.5px" style="margin-bottom: 10px;"></a>
    <br>
    <!-- <a class="navbutton" href="/"></a>
    <a class="navbutton" href="#"></a>
    <a class="navbutton" href="#"></a>
    <a class="navbutton uploadbutton" href="#"></a>
    <a class="navbutton adminbutton" href="#">Admin</a> -->
    <a href="#" style="font-size: 15px; font-weight: bolder;margin-top: -30px;" class="uploadbutton">Upload</a>
    <div class="bar">
        <a class="baritem" href="/"><span class="baritemtext">Home</span></a>
        <a class="baritem" href="/videos"><span class="baritemtext">Videos</span></a>
        <a class="baritem" href="/channels"><span class="baritemtext">Channels</span></a>
        <a class="baritem" href="#"><span class="baritemtext">Community</span></a>
        <a class="baritem adminbutton" href="#"><span class="baritemtext">Admin</span></a>
</div>
    <?php
if(!isset($_SESSION['profileuser3'])) {
    echo '<div class="utility"><a href="signup.php">Register</a> | <a href="#">Login</a> | <a href="#">Help</a> | <a href="#">Settings</a><!-- | <a href="#" class="adminlink">Admin</a>--></div>';
  } else {
    $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
            $statement->bind_param("s", $_SESSION['profileuser3']);
            $statement->execute();
            $result = $statement->get_result();
            if($result->num_rows === 0) echo('Uh oh, something is wrong with your session:<br> The logged in user couldn&#39t be found.');
            while($row = $result->fetch_assoc()) {
                echo '<div class="utility"><b>Hello, <a href="/user/'.$_SESSION["profileuser3"].'">'.$_SESSION["profileuser3"].'</a>!</b> | <a href="#">My Account</a> | <a href="#">Help</a> | <a href="/logout">Log Out</a><!-- | <a href="#" class="adminlink">Admin</a>--></div>';
            }
            $statement->close();
  }
  ?>
    <form class="search"><input type="text" placeholder="Search for videos"><input type="submit" value="Search"></form>
</div>
<?php include("alert.php");?>