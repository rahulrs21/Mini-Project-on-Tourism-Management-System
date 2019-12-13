<?php
    include "sql.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n1 = (rand(10, 5000));
        $n2 = date("Ymd");
        $n4 = time();
        $id = $n1 . $n2 . $n4;
        
        $na = $_FILES["image"]["name"];
        $ext = explode(".", $na);
        $_FILES['image']['name'] = $id . "." . end($ext);
        $filepath = "uploads/" . $_FILES['image']['name'];

        
        $name = $_POST['name'];
        $day = $_POST['days'];
 
        $price = $_POST['price'];

        $route = $_POST['place'];
        $ext1 = explode(",", $route);
        $routes = implode(" --> ",$ext1);
  


        move_uploaded_file($_FILES['image']['tmp_name'], $filepath);
    
        $sql = "INSERT INTO tour VALUES ('$name' , '$day' , '$price' , '$filepath' , '$routes')";

        if ($conn -> query($sql) === TRUE) {
            ?>
            <script>
                alert("Item Added Successfully!!");
                window.location = "http://localhost/vicky_rahul/admin_main_page.php";
            </script>
        <?php
            } else {
                ?>
            <script>
                alert("Failed to Add Item!!");
                window.location = "http://localhost/vicky_rahul/add_place.php";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Add Place</title>
    <style>
    body
    {

		color: #fff;
		background: #63738a;
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}  

    </style>
      
      
      
      
      
  </head>
  <body><br/>
  <a href="admin_main_page.php"><button class="btn btn-primary" style="float:left"> Back</button></a>
  <br/><br/><br/>
  <div class="signup-form">
      
      

      
      
      
      
      
    <form action="" enctype="multipart/form-data" method="POST">
		<h2>Add Tour Details</h2>
		<p class="hint-text">Note <span style="color:red">*</span>Enter Place Covered in Comma(,) Seperated Manner</p>
        <div class="form-group">
			<div class="col-xs-6"><input type="text" class="form-control" name="name" placeholder="Tour Name" required="required"></div>       	
        </div>
        <div class="form-group">
            <input type="radio" name="days" value="three day" checked> 3 Days
            <input type="radio" name="days" value="five day"> 5 Days
            <input type="radio" name="days" value="seven day"> 7 Days
            <input type="radio" name="days" value="ten day"> 10 Days         	
        </div>
        <div class="form-group">
			<div class="col-xs-6">
                <input type="text" class="form-control" name="price" placeholder="Enter Price Per Person" required="required">
            </div>       	
        </div>
        <div class="form-group">
            <input type="file" name="image" id="pic">
        </div>
		<div class="form-group">
            <input type="text" class="form-control" name="place" placeholder="Enter Places" required="required">
        </div>
        <center><button class="btn btn-primary" name="submit" value="submit">Add Place</button></center>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>