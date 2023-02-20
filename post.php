<?php
include("./assets/mod/db.php");
    if (isset($_POST['textarea2'])){
        if(!isset($_SESSION['profileuser3'])) {
            die("Login to post announcements...");
        } else if(1 === 1)  {
        $statement = $mysqli->prepare("INSERT INTO announcements (author, content, date) VALUES (?, ?, now())");
        $statement->bind_param("ss", $author, $content);
        $content = htmlspecialchars($_POST['textarea2']);
        $author = htmlspecialchars($_SESSION['profileuser3']);
        $statement->execute();
        $statement->close();
        echo('<script>
      window.location.href = "index.php?msg=Your announcement has been posted!";
      </script>');
    } 
     } 
    ?>