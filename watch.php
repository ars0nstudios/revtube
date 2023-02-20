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
            <?php include './assets/mod/alert.php'; ?>
          <h1>Watch <small><div id="clockbox"></div></small></h1>
          <?php include './assets/mod/todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
<div class="topLeft">
<?php if($debug == 'true') { ?>
<div class="alert-message warning">
    <?php echo "<p><strong>Current video ID:</strong>";
    echo var_dump($_GET['v']);
    echo "</p>";
    ?>
    </div>
    <?php } ?>
    <?php


        $stmt = $mysqli->prepare("SELECT * FROM videos WHERE vid = ?");
        $stmt->bind_param("s", $_GET['v']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0) exit('No rows');
        while($row = $result->fetch_assoc()) {
            echo '
            <h2>' . $row['videotitle'] . ' <small>by ' . $row['author'] . '</small></h2>
           <!--<iframe height="360px" width="550px" src="embed?v=' . $row["filename"] . '"></iframe>-->
           <video height="360px" width="550px" src="content/video/'.$row["filename"].'" controls></video>
                ';

            $videoembed = '\
            <iframe id="vid-player" style="border: 0px; overflow: hidden;" src="player2009/lolplayer.php?id=' . $_GET['v'] . '" height="360px" width="480px"></iframe> <br><br>
            <script>
                var vid = document.getElementById(\'vid-player\').contentWindow.document.getElementById(\'video-stream\');
                function hmsToSecondsOnly(str) {
                    var p = str.split(\':\'),
                        s = 0, m = 1;

                    while (p.length > 0) {
                        s += m * parseInt(p.pop(), 10);
                        m *= 60;
                    }

                    return s;
                }


                function setTimePlayer(seconds) {
                    var parsedSec = hmsToSecondsOnly(seconds);
                    document.getElementById(\'vid-player\').contentWindow.document.getElementById(\'video-stream\').currentTime = parsedSec;
                }
            </script>';
            $videoid = $row['vid'];
        }
        ?>

<!--<div class="topRight" style="margin-left: 500px; margin-top: -336px;">-->
<div class="videoinfo">
        <?php
            $stmt = $mysqli->prepare("SELECT * FROM videos WHERE vid = ?");
            $stmt->bind_param("s", $_GET['v']);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows === 0) exit('No rows');
            while($row = $result->fetch_assoc()) {
                $uploaddate = date('F d, Y', strtotime($row['date']));
                echo("<b>" . $row['author'] . " &bull; " . $row['views'] . " views &bull; " . $row['likes'] . " likes &bull; $uploaddate</b>");
                // echo "Uploaded on $uploaddate by " . $row['author'] . "<br><br>";
                // echo "" . $row['views'] . " views<br>";
                // echo "" . $row['likes'] . " likes<br>";
                 echo "<br>" . $row['description'] . "<br>";
                // echo "<a href='likevideo.php?id=" . $row['vid'] . "'>Like</a>";
            }

        ?> 
    </div>
        <br>
        <!-- <div class="card message"> 
        <?php
            $stmt = $mysqli->prepare("SELECT * FROM videos WHERE vid = ?");
            $stmt->bind_param("s", $_GET['v']);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows === 0) exit('Fatal error');
            while($row = $result->fetch_assoc()) {
                echo "<b>Share</b>";
                echo "URL <input value=\"http://revtube.ml/watch.php?v=" . $row["vid"] . "\"><br>
                Embed <input style=\"margin-right: 13px;\" value='<iframe style=\"border: 0px; overflow: hidden;\" src=\"http://revtube.ml/player/embed.php?id=" . $_GET['id'] . "\" height=\"360\" width=\"480\"></iframe>'>";
                echo "<br>";
                echo "Direct video link <input value=\"http://revtube.ml/videos/" . $row["filename"] . "\">";
                echo "<br>";
            }

        ?>  
    </div> -->
        </div>

</div>

        <?php
        mysqli_query($mysqli, "UPDATE videos SET views = views+1 WHERE vid = '" . $videoid . "'");
        $stmt->close();
       // echo '<hr style="
//    margin-top: 50px;
// ">';
            $stmt = $mysqli->prepare("SELECT * FROM videos WHERE vid = ?");
            $stmt->bind_param("s", $_GET['v']);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows === 0) exit('No rows');
            while($row = $result->fetch_assoc()) {
                
                if ($row['featured'] == '1') {
                    echo "<strong style='font-size:8pt;''>This video is featured on the main page!</strong>";
                }
            }

        echo '<h3 style="margin-top: 32px;">Comments &amp; Responses</h3>';
?>


<?php

        if(isset($_POST['submit'])) {
            if(!isset($_SESSION['profileuser3'])) {
                die("Please login to comment.");
            }
            else {
                $stmt = $mysqli->prepare("INSERT INTO comments (tovideoid, author, comment, date) VALUES (?, ?, ?, now())");
                $stmt->bind_param("sss", $_GET['v'], $_SESSION['profileuser3'], $comment);
    
                $comment = str_replace(PHP_EOL, "<br>", htmlspecialchars($_POST['bio']));
    
                $stmt->execute();
                $stmt->close();
                
                echo "<p>Comment published</p>";
            }
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data"><br>
        Post a comment <br><br><textarea name="bio" rows="3" cols="40" required="required"></textarea><br><br>
        <input class="yt-button primary" type="submit" value="Comment" name="submit">
        <br>
        <br>
        <small>Make sure to follow our <a href="/tos">Terms of Service</a></small>
    </form>
    <hr>
    <?php
        $stmt = $mysqli->prepare("SELECT * FROM comments WHERE tovideoid = ? ORDER BY date DESC LIMIT 4");
        $stmt->bind_param("s", $_GET['v']);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows === 0) echo('No comments.');
        while($row = $result->fetch_assoc()) {
            echo "<div class='commenttitle'>" . $row['author'] . " (" . $row['date'] . ")</div>" . $row['comment'] . "<br><br>";
        }
        $stmt->close();
    ?>
    <?php
    $stmt = $mysqli->prepare("SELECT * FROM videos WHERE vid = ?");
    $stmt->bind_param("s", $_GET['v']);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) echo('No comments.');
    while($row = $result->fetch_assoc()) {
    echo '<a href="all_comments.php?id='.$row['vid'].'">view all comments</a>';
    }
    $stmt->close();
    ?>
    <hr>
    <?php include("./assets/mod/footer.php") ?>
</div>
            <ul class="unstyled">

            </ul>
          </div>
          <!--<div class="span4">
            <h3>What's New</h3>
            <ul class="unstyled">
<li>Hopefully we will be able to replace the shitty 2009 frontend soon</li>
            </ul>
            <!--<input class="input" type="text" placeholder="Username">
            <br>
            <input class="input" type="password" placeholder="Password">
            <br>
            <button class="btn" type="submit">login</button>
          </div>-->
        </div>
      </div>

      <?php include './assets/mod/footer.php'; ?>

    </div> <!-- /container -->

  </body>
</html>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
