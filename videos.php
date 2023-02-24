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
          <h1>Uploads <small><div id="clockbox"></div></small></h1>
          <?php include './assets/mod/todaysdate.php'; ?>
        </div>
        <div class="row">
          <div class="span10">
            <h2>Most Viewed</h2>
                            <?php
                    $statement = $mysqli->prepare("SELECT * FROM videos ORDER BY views DESC");
                //$statement->bind_param("s", $_POST['fr']); i have no idea what this is but we don't need it
                $statement->execute();
                $result = $statement->get_result();
                if($result->num_rows !== 0){
                    while($row = $result->fetch_assoc()) {
                        echo '
                            <div class="video container-flex">
                                <div class="col-1-3 video-thumbnail">
                                <a href="/watch?v='.$row['vid'].'">
                                    <video>
                                        <source src="/content/video/'.$row['filename'].'" type="video/mp4">
                                        Thumbnail could not be loaded :(
                                    </video> 
                                </a>
                                </div>
                                <div class="col-1-3 video-title"><a href="/watch?id='.$row['vid'].'">'.$row['videotitle'].'</a></div>
                                <div class="col-1-3 video-info">
                                    <div><a href="profile.php?id='.$row['author'].'">'.$row['author'].'</a></div>
                                    <div><span>'.$row['views'].'</span> views</div>
                                    <div><span>'.$row['likes'].'</span> likes</div>
                                </div>
                            </div>
                            <hr>';
                    }
                }
                else{
                    echo "Hm. Interesting. Either nobody has uploaded yet or we have a serious problem o_o";
                }
                $statement->close();
            ?>
            <ul class="unstyled">

            </ul>
          </div>
          <div class="span4">
        <?php include './assets/mod/whatsnew.php'; ?>
      </div>

      <?php include './assets/mod/footer.php'; ?>

    </div> <!-- /container -->

  </body>
</html>