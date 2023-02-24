<?php
$result = mysql_query("SELECT * FROM users");
$rows = mysql_num_rows($result);
echo "There are " . $rows . " registered channels.";
?>
<?php
$result1 = mysql_query("SELECT * FROM users");
$rows1 = mysql_num_rows($result);
echo "There are " . $rows1 . " uploaded videos.";
?>