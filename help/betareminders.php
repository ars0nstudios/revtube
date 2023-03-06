<!DOCTYPE html>
<html lang="en">
  <head>
  <?php include '../assets/mod/meta.php';?>      
</head>

  <body>
<?php include '../assets/mod/db.php';?>
<?php include '../assets/mod/header.php';?>
    <div class="container">
 <div class="content">
        <div class="page-header">
        <?php include '../assets/mod/alert.php';?>
          <h1><small>Help / </small>Revista Public Beta <small>Last updated March 6, 2023</small></h1>
        </div>
        <div class="row">
          <div class="span10">
            <h2>What <em>isn't</em> finished?</h2>
            <ul class="unstyled">
<li>Likes and subscribing are NOT yet implemented. Do not go complain to the devs about these things.<del><br>Additionally, view counts aren't that accurate yet.</del> <em>(fixed)</em></li>
</ul>
            <h2>What <em>is</em> finished?</h2>
            <ul class="unstyled">
                <li>Most basic functions, such as video uploading, commenting, profile pictures, profile editing, account login and creation are all finished. Find any bugs? Tell us on our Discord server (redst0ne.xyz/discord)</li>
                </ul>
                <h2>I want [insert feature] and it isn't added!</h2>
                <ul class="unstyled"><li>If it's one of the things gone over at the beginning of this article, do not bother asking us. We'll probably get to it soon. If it isn't, you can tell me on Discord, Twitter (@asphaltk1cker or @revidpw), or on GitHub (jkosixtyfour).</li></ul>
                    <h2>I want to help!</h2>
                <ul class="unstyled"><li>Great! You can make any changes desired and create a pull request on our <a href="//github.com/cosmixcode/revtube">GitHub repo</a>.</li></ul>
          </div>
          <div class="span4">
<?php include '../assets/mod/whatsnew.php'; ?>
      </div>

      <?php include '../assets/mod/footer.php'; ?>
    </div> <!-- /container -->

  </body>
</html>
