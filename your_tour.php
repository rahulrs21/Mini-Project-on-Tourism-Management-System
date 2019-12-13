<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Tour Places</title>
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
         .footer-main-div
        {
            width: 100%;
            height: auto;
            margin: auto;
            background: #272727;
            padding: 20px 0px;

        }
        .contact1
          {
              color: #fff;
              padding: 30px;
              float: right;
              text-align: left;
          }

          .contact2
          {
              color: #fff;
              padding: 30px;

              right: 5px;
              text-align: right;

          }
        
      
    </style>
    
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="nav navbar-nav">
                <a class="navbar-brand" href="user_after_login.php">Tourism Management</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> <?php session_start(); echo "Hello, ".$_SESSION['name'];  ?></a></li>
            </ul>
        </div>

    </nav>
    <br/>
    <a href="user_after_login.php"><button class="btn btn-primary" style="float:left">Back</button></a>
    <div class="container">

        <div style="clear: both"></div>
        <h3 class="title2">Your Item Details Cart Details</h3><br /><br />
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th width="13%">Place</th>
                        <th width="10%">Date</th>
                        <th width="30%">Count</th>
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
                $email = $_SESSION['email'];
                $query = "select * from bookticket where email = '$email'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {

                        ?>
                        <tr>
                            <td><b><?php echo $row["place"]; ?></b></td>
                            <td><b><?php echo $row["date"]; ?></b></td>
                            <td><b><?php echo $row["people"]; ?></b></td>
                            <td><a href="delete_user_tour.php?action=delete&id=<?php echo $row["email"]; ?>&place=<?php echo $row["place"]; ?>"><span class="text-danger"><i class="fas fa-trash-alt fa fa-2x"></i></span></a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>

    </div>

    </div>
    
    <div class="footer-main-div">
        <div class="contact1">
            <p>&nbsp;</p>
            <p><B>Admin2 : Vikhyath</B></p>
            <p><B>contact : 8971771589</B></p>
            <p><B>email : <u>vickybangera@gmail.com</u></B></p>
        </div>
        
        <div class="contact2">
            <p><i>For more Information :</i></p>
            <p><B>Admin1 : Rahul</B></p>
            <p><B>contact : 9449721546</B></p>
            <p><B>email : <u>rahulrs@gmail.com</u></B></p>
        </div>
        
      </div>

</body>

</html>