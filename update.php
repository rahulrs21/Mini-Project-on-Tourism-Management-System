<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if($_SERVER["REQUEST_METHOD"] == "POST")
{
   
        $name = $_GET['id'];
        
 
        $price = $_POST['price'];

        $route = $_POST['place'];
        $image = $_POST['image'];
        $day = $_POST['day'];
        $ext1 = explode(",", $route);
        $routes = implode(" --> ",$ext1);
    
    $query1 = "DELETE FROM tour where name = '$name'";
    $query2 = "INSERT INTO tour VALUES ('$name' , '$day' , '$price' , '$image' , '$routes')";
    if (($conn->query($query1) === TRUE) && ($conn->query($query2) === TRUE)) {
        ?>
        <script>
            alert("Item Updated Successfully!!");
            window.location = "http://localhost/vicky_rahul/admin_main_page.php";
        </script>
        <?php
        } 
        else 
        {
        ?>
        <script>
            alert("Failed to Updated Item!!");
            window.location = "http://localhost/vicky_rahul/update_delete.php";
        </script>
        <?php
        }
            $conn->close();
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <title>Add item</title>
</head>

<body style="background-color: #475d62;">

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="nav navbar-nav">
        <a class="navbar-brand" href="admin_main_page.php">Tourism Management</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="add_place.php">Add New Item</a></li>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li><a href="update_delete.php">Update / Delete</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon glyphicon-user"></span> <?php  echo "Hello, Admin" ?></a></li>
        <li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>

  </nav>

    <div class="container">
        <br />
        <div style="text-align: center; color: white; text-shadow: 3px 3px black;">
            <h2>Update Item Here</h2>
        </div>
        <?php


                $na = $_GET['id'];
                $query = "select * from tour where name = '$na'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);
        ?>
        <br />
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">Please Fill Below Form</div>
                    <div class="panel-body">
                        <form role="Form" method="post" action="#" accept-charset="UTF-8" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fname">Place</label>
                                <input type="text" id="fname" class="form-control" name="place" value="<?php  echo $row['name'];?>">
                            </div>
                            <div class="form-group">
                                <label for="lname">Price</label>
                                <input type="text" id="lname" class="form-control" name="price" value="<?php  echo $row['price'];?>">
                            </div>
                            <?php
                            $lo = $row['routes'];
                            $ex = explode("-->" , $lo);
                            $ip = implode("," , $ex);
                            ?>
                            <div class="form-group">
                                <label for="mname">Routes</label>
                                <input type="text" id="mname" class="form-control" name="routes" value="<?php  echo $ip;?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="image" class="form-control" name="image" value="<?php  echo $row['image'];?>">
                            </div>
                            <div class="form-group">
                                <label for="mname">Days</label>
                                <input type="text" id="day" class="form-control" name="day" value="<?php  echo $row['day'];?>">
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-lg" id="submitbtn" name="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>