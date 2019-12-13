<html>
    
<head>
<title>View Booked Ticket</title>  
    <script src="https://kit.fontawesome.com/a2d9fe4007.js" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "tourism";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
        $place = $_POST['place'];
        $date = $_POST['date'];
        ?>
        
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th width="20%">Place Name</th>
                        <th width="20%">Date</th>
                        <th width="20%">Client Name</th>
                        <th width="20%">Phone_Number</th>
                        <th width="20%">People Comming</th>
                    </tr>
                </thead>

                

                <?php
        
                
                    
                    
                        
                        $query = "select * from bookticket where date='$date' ";
                        $result = mysqli_query($conn, $query);
        
                        if(isset($_POST['all']))
                        {
                            if (mysqli_num_rows($result) > 0) {
                                
                            while ($row = mysqli_fetch_array($result)) 
                                {
                                $email1 = $row['email'];
                                $query1 = "select * from user where email='$email1' ";
                                $result1 = mysqli_query($conn, $query1);
                                $re1 = mysqli_fetch_array($result1);
                                ?>
                                <tr>
                                    <td><b><?php echo $row["place"]; ?></b></td>
                                    <td><b><?php echo $row["date"]; ?></b></td>
                                    <td><b><?php echo $re1["name"]; ?></b></td>
                                    <td><b><?php echo $re1["phone_number"]; ?></b></td>
                                    <td><b><?php echo $row["people"]; ?></b></td>
                                </tr>
                            <?php
                                }
                            }
                            else
                            {
                                echo "<h1>No one booked ticket on $date for $place </h1>";
                            }
                            
                        }
                        
                        else
                        {
                            
                                $query = "select * from bookticket where place='$place' and date='$date' ";
                                $result = mysqli_query($conn, $query);
                                if (mysqli_num_rows($result) > 0) {
                                    echo "<h1>Ticket booked on $date for $place is</h1>";
                                    while ($row = mysqli_fetch_array($result)) 
                                        {
                                        $email1 = $row['email'];
                                        $query1 = "select * from user where email='$email1' ";
                                        $result1 = mysqli_query($conn, $query1);
                                        $re1 = mysqli_fetch_array($result1);
                                        ?>
                                        <tr>
                                            <td><b><?php echo $row["place"]; ?></b></td>
                                            <td><b><?php echo $row["date"]; ?></b></td>
                                            <td><b><?php echo $re1["name"]; ?></b></td>
                                            <td><b><?php echo $re1["phone_number"]; ?></b></td>
                                            <td><b><?php echo $row["people"]; ?></b></td>
                                        </tr>
                                <?php
                                    }
                                }
                                else
                                {
                                    echo "<h1>No one booked ticket on $date for $place </h1>";
                                }
                            
                            
                        }
                                  
                        
                       





                ?>
            </table>
        </div>

    </div>
<?php
}
?>
    </body>
</html>
    