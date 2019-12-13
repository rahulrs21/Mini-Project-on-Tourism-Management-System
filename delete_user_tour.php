<?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tourism";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                }

                $id = $_GET['id'];
                $place = $_GET['place'];
                $sql = "DELETE from bookticket where email = '$id' and Place = '$place' ";

                if ($conn->query($sql) === TRUE) {
                ?>
                <script>
                    alert("Booking Deleted Successfully!!");
                    window.location = "http://localhost/vicky_rahul/user_after_login.php";
                </script>
                <?php
                } 
                else 
                {
                ?>
                <script>
                    alert("Failed to Delete Bookings!!");
                    window.location = "http://localhost/vicky_rahul/user_after_login.php";
                </script>
                <?php
                }
                    $conn->close();

?>
