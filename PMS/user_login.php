<?php 
    session_start();
    include('includes/connection.php');
    if(isset($_POST['userLogin'])){
        $query = "select email,password,name,uid from users where email = '$_POST[email]' AND password = '$_POST[password]'";
        $query_run = mysqli_query($connection,$query);
        if(mysqli_num_rows($query_run)){
            while($row = mysqli_fetch_assoc($query_run)){
                $_SESSION['email'] = $row['email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['uid'] = $row['uid'];
            }
            echo "<script type='text/javascript'>
            window.location.href = 'user_dashboard.php';
            </script>
            ";
        }
        else{
            echo "<script type='text/javascript'>
            alert('Please enter correct Details...');
            window.location.href = 'user_login.php';
            </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJECT MANAGEMENT TOOL || Login Page</title>
    <!-- Add Bootstrap CSS link -->
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
        <div class="col-md-3 m-auto" id="login_home_page">
            <center><h3 style="color: white; font-size: 36px; font-family: algerian"> User Login</h3></center>
            <form action="" method="post">
                <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Enter Email" required> 
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Enter Password" required> 
                </div>
                <div class="form-group">
                    <center><input type="submit" name="userLogin"  value="Login" class="btn btn-warning"> </center>
                </div>
            </form>
            <center><a href="index.php" class="btn btn-danger">Go to Home</a></center>
        </div>
    </div>
</body>
</html>
