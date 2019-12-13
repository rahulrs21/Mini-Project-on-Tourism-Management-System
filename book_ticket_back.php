<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}







if($_SERVER["REQUEST_METHOD"] == "POST")
{
      
    $email = $_SESSION['email'];
	$place = $_POST["place"];
	$date = $_POST["date"];
    $count = $_POST["people"];
    $sql1 = "select * FROM bookticket WHERE place='$place' and date='$date'";
    $result = mysqli_query($conn, $sql1);
    if (( mysqli_num_rows($result) + $count ) <= 54)
    {
        $sql = "INSERT INTO bookticket VALUES ('$email' , '$place' , '$date' , '$count')";
        if ($conn -> query($sql) === TRUE) {
        ?>
        <script>
            var res = "";
            
            res = <?php echo $count;?> * 5000;
            alert("Ticket Booked Successfully!!\nSo Total amount is "+res+"\nFor more detail Contact : 9449721546\nEmail : rahul9449766@gmail.com");
            
            window.location = "http://localhost/vicky_rahul/user_after_login.php";
        </script>
        <?php
        } 
    }
    else 
    {
        ?>
        <script>
            alert("Booking is Full For Requested Date Please try again with diffrent date");
            window.location = "http://localhost/vicky_rahul/user_after_login.php";
        </script>
        <?php
    } 
    
}



?>