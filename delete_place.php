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
                $sql = "DELETE from tour where name = '$id' ";

                if ($conn->query($sql) === TRUE) {
                $sql1 = "DELETE from bookticket where place = '$id' ";
                $result = mysqli_query($conn, $sql1);
                ?>
                <script>
                    alert("Place Deleted Successfully!!");
                    window.location = "http://localhost/vicky_rahul/admin_main_page.php";
                </script>
                <?php
                } 
                else 
                {
                ?>
                <script>
                    alert("Failed to Delete Place!!");
                    window.location = "http://localhost/vicky_rahul/admin_main_page.php";
                </script>
                <?php
                }
                    $conn->close();

?>
