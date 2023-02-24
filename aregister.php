<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include './assets/mod/meta.php';?>      
</head>

  <body>
<?php include './assets/mod/db.php';?>
    <?php include("./assets/mod/header.php"); ?>
    <div class="container-flex">
            <hr>
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
                    echo '
                           <div class="alert-message success page-alert">
                           <p>Channel creation successful! <a href="/alogin">Login here.</a></p>
                           </div>';
                }
            }
            ?>
        </div>
       <center><div class="col-1-2" style=".labelcenter {textalign: center;}">
            <h3>Create Your Channel</h1>
            <p>It's free and easy. Just fill out the signup form below. <span class="red">All fields are required!</span></p>
            <div class="card blue">
                <form method='post' action=''>
                    <div class="input-group">
                      <!--  <label for="username">Username: </label>-->
                        <input type="text" name="name" pattern="[^()/><\][\\\x22,;|]+" placeholder="Channel Name" required>
                    </div>
                    <br>
                    <div class="input-group">
                   <!--    <label class="labelcenter" for="email">Email: </label>-->
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <!--<label for="password">Password: </label>-->
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="input-group">
                        <div></div>
                        <br>
                        <div><button type="submit" class="btn" name="reg_user" class="button">Create Channel</button></div>
                    </div>
                </form>
            </div>
            <div class="card message">
                Never give your password to a stranger! You could get hacked, or worse.
            </div>
        </div>
    </div></center> 
    <hr>
    <?php include("./assets/mod/footer.php") ?>
</body>
</html>
<?php $mysqli->close();?>