<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include './assets/mod/meta.php';?>      
</head>

  <body>
<?php include './assets/mod/db.php';?>
<div class="container">
    <?php include("./assets/mod/header.php"); ?>
<div class="leftsignup">
<h2>Create Your Revid Account</h2>
<small>It's free and easy. Just fill out the account info below. <span style="color: red;">(All fields required)</span></small>
<div class="accdetailscreate">
    <form method="POST" action="signup.php">
    <!--    <div class="inputgroup">
        <label for="email">Email Address:</label>
        <input type="text" name="email" id="email">
</div> -->
        <br>
        <div class="inputgroup">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
</div>
<br>
<div class="inputgroup">
        <label for="username">Password:</label>
        <input type="password" name="password" id="password">
</div>
<br>
<div class="inputgroup">
        <label for="username">Confirm Password:</label>
        <input type="password" name="confirm_password" id="confirm_password">
</div>
<input type="submit" value="Sign Up" style="margin:13px;">
</div>
<?php //echo $username_err; ?>
<?php //echo $password_err; ?>
<?php //echo $confirm_password_err; ?>
</form>
<!-- <h3>revid <img src="staff.png" style="border-radius: 5px; margin-bottom: -1px;" width="16px"></h3> -->
</div>
<div class="rightsignup">
    <h2>What is Revid?</h2>
    Revid is the home for video online:
        <ul>
        <li><b>Watch</b> millions of videos</li>
        <li><b>Share favorites</b> with friends and family</li>
        <li><b>Connect with other users</b> who share your interests</li>
        <li><b>Upload your videos</b> to a worldwide audience</li>
    </ul>
    <!-- <b>Sign up now to join the Revid community!</b> -->
</div>
</div>
<br><br>
<?php include("./assets/mod/footer.php"); ?>
<?php
            if (!empty($_POST)){
                $sql = "SELECT `username` FROM `users` WHERE `username`='". htmlspecialchars($_POST['name']) ."'";
                $result = $mysqli->query($sql);
                if($result->num_rows >= 1) {
                    echo "Name already in use, try something else.";
                } else {
                    $statement = $mysqli->prepare("INSERT INTO `users` (`date`, `username`, `email`, `password`) VALUES (now(), ?, ?, ?)");
                    $statement->bind_param("sss", $username, $email, $password);
                    $username = htmlspecialchars($_POST['name']);
                    $email = htmlspecialchars($_POST['email']);
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $statement->execute();
                    $statement->close();
                    $mysqli->close();
                    $webhookurl = $webhook;
                $msg = "**$username** just registered an account";
                $json_data = array ('content'=>"$msg");
                $make_json = json_encode($json_data);
                $ch = curl_init( $webhookurl );
                curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
                curl_setopt( $ch, CURLOPT_POST, 1);
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $make_json);
                curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt( $ch, CURLOPT_HEADER, 0);
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec( $ch );
                    echo '
                           <div class="alert-message success page-alert">
                           <p>Channel creation successful! <a href="/alogin">Login here.</a></p>
                           </div>';
                }
            }
            ?>