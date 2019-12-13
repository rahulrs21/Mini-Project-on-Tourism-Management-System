<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tour Places</title>
    <script src="https://kit.fontawesome.com/a2d9fe4007.js" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        * {
            font-family: 'Titillium Web', sans-serif;
        }

        .product {
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }

        table,
        th,
        tr {
            text-align: center;
        }

        .title2 {
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }

        h2 {
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }

        table th {
            background-color: #efefef;
        }

        .img-responsive {
            height: 100px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="nav navbar-nav">
                <a class="navbar-brand" href="admin_main_page.php">Tourism Management</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="add_place.php">Add New Item</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> <?php echo "Hello, Admin"  ?></a></li>
            </ul>
        </div>

    </nav>
    <div class="container">

        <div style="clear: both"></div>
        <h3 class="title2">Your Item Details Cart Details</h3><br /><br />
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th width="13%">Place</th>
                        <th width="10%">Amout Per Person</th>
                        <th width="30%">Routes</th>
                        <th width="10%">Update</th>
                        <th width="17%">Delete</th>
                    </tr>
                </thead>

                <?php

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tourism";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $query = "select * from tour ";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {

                        ?>
                        <tr>
                            <td><b><?php echo $row["name"]; ?></b></td>
                            <td><b><?php echo $row["price"]; ?></b></td>
                            <td><b><?php echo $row["routes"]; ?></b></td>
                            <td><a href="update.php?action=update&id=<?php echo $row["name"]; ?>"><span class="text-danger"><i class="fas fa-pencil fa fa-2x"></i></span></a></td>
                            <td><a href="delete_place.php?action=delete&id=<?php echo $row["name"]; ?>"><span class="text-danger"><i class="fas fa-trash-alt fa fa-2x"></i></span></a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>

    </div>

    </div>

</body>

</html>