<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/a2d9fe4007.js" crossorigin="anonymous"></script>
  <title>Welcome Admin</title>
  <style>
    hr {
      position: relative;
      top: 20px;
      border: none;
      height: 2px;
      background: red;
      margin-bottom: 50px;
    }
  </style>
</head>

<body style="background-color:skyblue">

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="nav navbar-nav">
        <a class="navbar-brand" href="admin_main_page.php">Tourism Management</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="add_place.php">Add New Place</a></li>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li><a href="update_delete.php">Update / Delete</a></li>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li><a href="view_ticket_booked.php">Booked Details</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> <?php echo "Hello, Admin" ?></a></li>
        <li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>

  </nav>
  <div class="container" style="background-color:white">

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

    ?>
    <div class="container" style="width: 65%">
      <h2 style="text-align:center">Tour Details</h2>
      <hr /><br />
      <?php
      $query = "SELECT * FROM tour";
      $result = mysqli_query($conn, $query);
      if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while ($row = mysqli_fetch_array($result)) {

          $count += 1;
          ?>
        <form method="GET" action="book_ticket.php?place=<?php echo $row["name"]; ?>">
          <div class="row" style="background-color:thistle">
            <div class="col-md-6">
                <div class="product">
                  <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="product">
                  <h5 style="color:black">Tour Name : <?php echo $row["name"]; ?></h5>
                  <h5 style="color:black">Price Per Person : <?php echo $row["price"]; ?></h5>
                  <h5 class="text-danger">Routes : <?php echo $row["routes"]; ?></h5>
                </div>
              </div>
              
            </div>
        </form>
      <?php
          echo "<hr/><br/><br/>";
        }
      }

      else
      {

        ?><center><i class="fas fa-poop fa fa-9x"></i><br/> Oops! No Data Found<br/></center><?php
      }
      ?>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
</body>

</html>