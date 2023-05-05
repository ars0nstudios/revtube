<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include './assets/mod/meta.php';?>      
</head>

  <body>
<?php include './assets/mod/db.php';?>
<?php include './assets/mod/header.php';?>
    <div class="container">
 <div class="content">
        <div class="page-header">
        <?php include './assets/mod/alert.php';?>
          <h1>Account Status <small>BETA</small></h1>
        </div>
        <div class="row">
          <div class="span10">
		    <h3>Terms of Service Strikes</h3>
			<?php
			if(isset($_SESSION['profileuser3'])){
			    $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    $statement->bind_param("s", $_SESSION['profileuser3']);
			    $statement->execute();
			    $result = $statement->get_result();
			    if($result->num_rows === 0) exit('No rows');
			    while($row = $result->fetch_assoc()) {
					if($row['strikes'] == 0) {
						$strikestyle = "color: green; font-weight: bold;";
						$msg = "You are eligible to apply for the Partner Program.<br><a href='#'>Apply</a>";
						$etc = "strikes";
					}
					if($row['strikes'] == 1) {
						$strikestyle = "color: orange; font-weight: bold;";
						$msg = "You are eligible to apply for the Partner Program.<br><a href='#'>Apply</a>";
						$etc = "strike";
					}
					if($row['strikes'] == 2) {
						$strikestyle = "color: red; font-weight: bold;";
						$msg = "You are <b>NOT</b> eligible to apply for the Partner Program.";
						$etc = "strikes";
					}
					if($row['strikes'] == 3) {
						$strikestyle = "color: red; font-weight: bold;";
						$msg = "Your account has been terminated.";
						$etc = "strikes";
					}
			        echo 'You currently have <span style="'.$strikestyle.'">'.$row['strikes'].' '.$etc.'</span><h3>Partner Program</h3>'.$msg.'';
			    }
			    $statement->close();
			}
			?>
				</div><div class="span4">
			<h3>Your Account Details</h3>
			<?php
			if(isset($_SESSION['profileuser3'])){
			    $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    $statement->bind_param("s", $_SESSION['profileuser3']);
			    $statement->execute();
			    $result = $statement->get_result();
			    if($result->num_rows === 0) exit('No rows');
			    while($row = $result->fetch_assoc()) {
					$rows = getSubscribers($_SESSION['profileuser3'], $mysqli);
			        echo "
			        <div class=\"user-info\">
				        <a href=\"./profile?user=".$row["username"]."\"><img width=\"225px\" height=\"225px\" src=\"/content/pfp/".getUserPic($row["id"])."\"></a>
				        <div class=\"user-stats\">
					        <div class=\"username\"><a href=\"./profile?user=".$row["username"]."\">".$row["username"]."</a></div>
					        <div><span class=\"subscribers black\">".$rows."</span> subscribers</div>
					        <div>Your E-mail: <span class=\"black\">".$row["email"]."</span></div>
					        <div>Joined: <span class=\"black\">".$row["date"]."</span></div>
				        </div>
			        </div>
			        <hr>
			        <h3>Your Current Description</h3>
			        <textarea class=\"current-description\" readonly>".$row["description"]."</textarea>";
			    }
			    $statement->close();
			}
			?>
            </div>
        </div>
      </div>

    </div> <!-- /container -->

  </body>
</html>