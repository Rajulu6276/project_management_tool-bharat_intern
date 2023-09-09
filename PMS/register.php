<?php
    include('includes/connection.php');
    if(isset($_POST['userRegistration'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];

        // Use prepared statements to prevent SQL injection
        $query = "INSERT INTO users (name, email, password, mobile) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $password, $mobile);

        if(mysqli_stmt_execute($stmt)){
            echo "<script type='text/javascript'>
            alert('User registered successfully....');
            window.location.href = 'index.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Error...Please try again....');
            window.location.href = 'register.php';
            </script>";
        }

        mysqli_stmt_close($stmt);
        mysqli_close($connection);
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Project Management System || Register Page</title>
    <link
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- jQuery file-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/index.css">
  </head>
  <body>
    <CENTER><h1 style="background: linear-gradient(to bottom, #000000, #FFD700); font-size: 75px;color: white; font-family: algerian">PROJECT MANAGEMENT SYSTEM</h1></CENTER>
    <div class="row">
      <div class="col-md-3 m-auto" id="register_home_page">
        <center><h3 style="color: white; font-size: 40px; font-family: algerian"> User Registration</h3></center>
        <form action="" method="post">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required> 
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required> 
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Password" required> 
          </div>
          <div class="form-group">
            <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile NO." required> 
          </div>
          <div class="form-group">
            <center><input type="submit" name="userRegistration"  value="Register" class="btn btn-warning"> </center>
          </div>
        </form>
        <center><a href="index.php" class="btn btn-danger">Go to Home</a></center>
      </div>
    </div>
  </body>
</html>
