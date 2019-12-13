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
        
        body{
            background-image: url(Images/3.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            
            
        }
        
        .heading{
            text-align:center;
            color:#fff;
            font-size: 25px;
            font-style: italic;
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
    <br><br>
    
    <h1 class="heading">View the tickets</h1><br>
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
	  
    
      $query = "SELECT name FROM tour";
      $result = mysqli_query($conn, $query);
	?>
    <form action="display_ticket.php" method="POST" align="center">
    <input type="date" name="date" placeholder="select date">
    
        
        
    <select name="place">
    
<!--    <option name="all" >All place</option>-->
    <option selected disabled >Select the place</option>
     
    <?php while ($row = mysqli_fetch_array($result)) { ?>
    <option value="<?php echo $row['name']; ?> "><?php echo $row['name'];?></option>
	<?php } ?>
	</select>
        <button class="btn btn-success">View</button>
    </form>
    
</body>

</html>