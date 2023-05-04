<div class="guide">
    <ul>
        <a href="/"><li class="guide-item"><i class="bi bi-house-door-fill"></i> Home</li></a>    
    <span>My mail</span>
    <?php
      if(!isset($_SESSION['profileuser3'])) {
        echo '
        <script>
             window.location.href = "../alogin";
             </script>';
      } else {
        $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
			    $statement->bind_param("s", $_SESSION['profileuser3']);
			    $statement->execute();
			    $result = $statement->get_result();
			    if($result->num_rows === 0) exit('No rows');
			    while($row = $result->fetch_assoc()) {
			        echo '
                    <a href="/inbox/index"><li class="guide-item"><i class="bi bi-envelope-fill"></i> Inbox</li></a>
                    <a href="/inbox/sent"><li class="guide-item"><i class="bi bi-send-fill"></i> Sent</li></a>
                    <a href="/inbox/contacts"><li class="guide-item"><i class="bi bi-people-fill"></i> Contacts</li></a>';
			    }
			    $statement->close();
      }
    ?>
    </ul>
</div>