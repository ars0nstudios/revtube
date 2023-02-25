<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include './assets/mod/meta.php';?>      
</head>

  <body>
<?php include './assets/mod/db.php';?>
    <?php include("./assets/mod/header.php"); ?>
<div class="container-flex">
   <?php
    if (isset($_POST['submit'])){
        if(!isset($_SESSION['profileuser3'])) {
            die("Login to upload videos...");
        }
        $v_id = randstr(11);
        $target_dir = "./content/video/";
       // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        rename("basename($_FILES['fileToUpload']['name'])","$v_id.mp4");
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        if(!is_dir($target_dir)){
            mkdir($target_dir);
        }
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (file_exists($target_file)) {
            echo "
            <div class='alert-message error page-alert'>
            Video with the same filename already exists.
            </div>
            ";
            $uploadOk = 0;
        }
        if($imageFileType != "mp4") {
            echo "
            <div class='alert-message error page-alert'>
            MP4 files only.
            </div>
            ";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "
            <div class='alert-message error page-alert'>
            Unknown error.
            </div>
            ";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $video = $_POST['videotitle'];
                $user = $_SESSION['profileuser3'];
                function randstr($len, $charset = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-"){
                    return substr(str_shuffle($charset),0,$len);
                }
              //  $v_id = randstr(11);
                $statement = $mysqli->prepare("INSERT INTO videos (videotitle, vid, description, author, filename, date) VALUES (?, ?, ?, ?, ?, now())");
                $statement->bind_param("sssss", $videotitle, $v_id, $description, $author, $filename);
                $videotitle = htmlspecialchars($_POST['videotitle']);
                $description = str_replace(PHP_EOL, "<br>", htmlspecialchars($_POST['bio']));
                $author = htmlspecialchars($_SESSION['profileuser3']);
                $filename = basename($_FILES["fileToUpload"]["name"]);
                $statement->execute();
                $statement->close();
                $webhookurl = $webhook;
                $msg = "**$user** just uploaded **$video** http://rv.redst0ne.xyz/watch?v=$v_id";
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
                echo('<script>
              window.location.href = "index.php?msg=Your video has been uploaded!";
              </script>');
            } else {
                echo "error!!!!!!!!!!!!!!!!!! error code: ";
                echo $_FILES["fileToUpload"]["error"];
            }
        }
    }
    ?>
    <center>
        <div class="col-2-3">
            <div class="card blue">
                            <br>
            <br>
            <br>
            <br>
            <?php
            if(!isset($_SESSION['profileuser3'])) {
              echo('<script>
              window.location.href = "/alogin";
              </script>');
          }
          ?>
                <h3>Upload Video</h3>
               <!-- <h3><i>Please check if you're logged in, if you're not, you need to sign in to upload videos.</i></h3>
                <small>This will be fixed in a later update.</small> -->
                <br>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                       <!-- <label for="videofile">File </label>-->
                        <input type="file" accept=".mp4" name="fileToUpload" id="fileToUpload">
                    </div>
                     <br>
                    <div class="input-group">
                       <!-- <label for="videotitle">Title </label>-->
                        <input type="text" id="videotitle" placeholder="Title" name="videotitle">
                    </div>
                     <br>
                    <div class="input-group">
                 <!--       <label for="bio">Description </label> -->
                        <textarea style="background-color: var(--inputlol);" name="bio" placeholder="Enter a description for your video here" rows="4" cols="50" required="required"></textarea>
                    </div>
                    <div class="input-group">
                         <br>
                        <div></div>
                        <div><input type="submit" class="yt-button primary" value="Upload" name="submit"></div>
                    </div>
                </form>
            </div>
        </div>
    </div> </center>
    <hr>
    <?php include("./assets/mod/footer.php") ?>
</body>
</html>
<?php $mysqli->close();?>