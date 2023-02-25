<!-- <div class="alert-message warning">
  <p><strong>VistaTube is in development. </strong>Please note, this is still unfinished.</p>
</div> -->
<?php
                    $statement = $mysqli->prepare("SELECT * FROM announcements ORDER BY date DESC LIMIT 1 ");
                    $statement->execute();
                    $result = $statement->get_result();
                    if($result->num_rows !== 0){
                        while($row = $result->fetch_assoc()) {
                          $humandate = time_elapsed_string(''.$row['date'].'');
                            echo '<div class="ticker"><img src="./assets/img/asterisk.png" width=16px> <b>' . $row['author'] . ' said:</b> ' . $row['content'] . ' ('.$humandate.')</div>';
                        }
                    }
                    else{
                        echo "";
                    }
                ?>