<?php
include("assets/lib/admin.php");
include("assets/mod/db.php");
                    $statement = $mysqli->prepare("SELECT * FROM users WHERE username = ? ");
                    $statement->bind_param("s", $_SESSION['profileuser3']);
                    $statement->execute();
                    $result = $statement->get_result();
                    if($result->num_rows !== 0){
                        while($row = $result->fetch_assoc()) {
                        if ($row["is_admin"] == 1) {
                            if (isset($_POST["submit"])){
                                banUser($_POST['banusern'], $_POST['reason'], $mysqli);
                                echo('<script>window.location.href = "index.php?msg='.$_POST['banusern'].' banned successfully!";</script>');
                            }
                        }
                    }
                }
                ?>