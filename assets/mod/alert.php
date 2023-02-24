<!-- <div class="alert-message warning">
  <p><strong>Revista is in development. </strong>Please note, this is still unfinished.</p>
</div> -->
<?php
                    include("assets/mod/time.php");
                    $statement = $mysqli->prepare("SELECT * FROM announcements ORDER BY date DESC LIMIT 1 ");
                    $statement->execute();
                    $result = $statement->get_result();
                    if($result->num_rows !== 0){
                        while($row = $result->fetch_assoc()) {
                          $humandate = time_elapsed_string(''.$row['date'].'');
                            echo '<div class="alert-message info"><p><b>' . $row['author'] . ' said:</b> ' . $row['content'] . ' ('.$humandate.')</p></div>';
                        }
                    }
                    else{
                        echo "";
                    }
                ?>