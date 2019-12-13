<?php
session_start();

include "sql.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username = $_POST['email'];
    $password = $_POST['password'];
    $querry="select * from user where email= '$username' and password = '$password'";
    $user_authentication_result=mysqli_query($conn,$querry) or die(mysqli_error($conn));
    $rows_fetched=mysqli_num_rows($user_authentication_result);
    if($rows_fetched==0)
    {
        ?>
        <script>
            window.alert("Wrong username or password");
            window.location = "http://localhost/vicky_rahul/login.php"
        </script>
        <?php
    }
    else
    {
        $row=mysqli_fetch_array($user_authentication_result);
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        ?>
        <script>
        window.alert("Hi There! Welcome To My Page");
        window.location = "http://localhost/vicky_rahul/user_after_login.php" ;
        </script>
        <?php
    }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Travel Management System</title>
    <style type="text/css">
        body, html 
        {
            height: 100%;
        }
        .bg 
        {
            background-image:url("Images/background.png");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        body 
        {
            margin: 0;
            padding: 0;
            background: url(https://picsum.photos/2500/1500?image=1041);
            background-size: cover;
            font-family: sans-serif;
        }

        .box
        {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 25rem;
            padding: 2.5rem;
            box-sizing: border-box;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 0.625rem;
        }

        .box h2 
        {
            margin: 0 0 1.875rem;
            padding: 0;
            color: #fff;
            text-align: center;
        }

        .box .inputBox 
        {
            position: relative;
        }

        .box .inputBox input 
        {
            width: 100%;
            padding: 0.625rem 0;
            font-size: 1rem;
            color: #fff;
            letter-spacing: 0.062rem;
            margin-bottom: 1.875rem;
            border: none;
            border-bottom: 0.065rem solid #fff;
            outline: none;
            background: transparent;
        }

        .box .inputBox label 
        {
            position: absolute;
            top: 0;
            left: 0;
            padding: 0.625rem 0;
            font-size: 1rem;
            color: #fff;
            pointer-events: none;
            transition: 0.5s;
        }

        .box .inputBox input:focus ~ label,
        .box .inputBox input:valid ~ label,
        .box .inputBox input:not([value=""]) ~ label {
            top: -1.125rem;
            left: 0;
            color: #03a9f4;
            font-size: 0.75rem;
        }

        .box input[type="submit"] {
            border: none;
            outline: none;
            color: #fff;
            background-color: #03a9f4;
            padding: 0.625rem 1.25rem;
            cursor: pointer;
            border-radius: 0.312rem;
            font-size: 1rem;
        }

        .box input[type="submit"]:hover {
            background-color: #1cb1f5;
        }
        
    </style>
  </head>
  <body class="bg">
      &nbsp;
      <center><h1 style="color:#fff"><u>Tourism Management System</u></h1></center>
      
        
    <div class="box">
    <h2>Login Page</h2>
    <form action="" method="post">
        <div class="inputBox">  
        <input type="email" name="email"  required value="">
        <label>Username</label>
        </div>
        <div class="inputBox">
        <input type="password" name="password" required value="">
        <label>Password</label>
        </div>
        <center><button class="btn btn-success">Log In</button><br/><br/><a style="color:white" href="new_user.php">New User?</a></center>
    </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>