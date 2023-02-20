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
          <?php
      if(empty($_GET)) {
        echo "<p style='display:none;'>no</p>";
      } else if($_GET === " ") {
        echo "<p style='display:none;'>no</p>";
      } else { echo '
          <div class="alert-message success">
        <p>'.$_GET["msg"].'</p>
      </div>';
    }
          ?>
            <?php include './assets/mod/alert.php'?>
          <h1>Admin Panel <small><div id="clockbox"></div></small></h1>
          <?php include './assets/mod/todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
            <h2>Users</h2>
            <table class="condensed-table">
            <thead>
          <tr>
            <th>#</th>
            <th>Username</th>
            <th>Email</th>
            <th>Joined</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
                    $statement = $mysqli->prepare("SELECT * FROM users ORDER BY date DESC");
                $statement->execute();
                $result = $statement->get_result();
                if($result->num_rows !== 0){
                    while($row = $result->fetch_assoc()) {
                        echo '
                        
        
            <th>'.$row['id'].'</th>
            <td>'.$row['username'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['date'].'</td>
          </tr>
                        ';
                    }
                }
                else{
                    echo "No users? Well something fucked up.";
                }
                $statement->close();
            ?>
            </tbody>
      </table>
      <hr>
      <h2>Announcements</h2>
      <p>This will put an alert on the frontpage. Friendly reminder that everyone can see what you say here.</p>
     <form action="post" method="post">
      <textarea class="xxlarge" id="textarea2" name="textarea2" rows="3"></textarea>
      <br>
      <input type="submit" class="btn primary" value="Post announcement">
            </form>
      <p>Last 5 announcements</p>
            <ul class="unstyled">
<!-- <li>ipod &bull; hello everyone i am your mother &bull; 2022-09-17 00:00:00</li> -->
<?php
                    $statement = $mysqli->prepare("SELECT * FROM announcements LIMIT 5");
                    $statement->execute();
                    $result = $statement->get_result();
                    if($result->num_rows !== 0){
                        while($row = $result->fetch_assoc()) {
                            echo '<li>' . $row['author'] . ' &bull; ' . $row['content'] . ' &bull; ' . $row['date'] . '</li>';
                        }
                    }
                    else{
                        echo "No announcements have been posted.";
                    }
                ?>
            </ul>
          </div>
          <div class="span4">
            <?php include './assets/mod/whatsnew.php'; ?>
            <hr>
            <h3>Reminders</h3>
            <ul>
                <li>Please <b>DO NOT</b> leak user data</li>
                <li>No leaking the admin panel</li>
                <li>Don't abuse the announcements</li>
          </div>
        </div>
      </div>

      <?php include './assets/mod/footer.php'; ?>

    </div> <!-- /container -->

  </body>
</html>