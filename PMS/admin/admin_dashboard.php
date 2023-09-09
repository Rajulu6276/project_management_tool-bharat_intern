<?php
    session_start();
	include('../includes/connection.php');
	if(isset($_POST['create_task'])){
		$query = "insert into tasks values(null,$_POST[id],'$_POST[description]','$_POST[start_date]','$_POST[end_date]','Not Started')";
		$query_run = mysqli_query($connection,$query);
		if($query_run){
			echo "<script type= 'text/javascript'>
			alert('Task created successfully...');
			window.location.href = 'admin_dashboard.php';
			</script>";
		}
		else{
			echo "<script type= 'text/javascript'>
			alert('Error Please try again...');
			window.location.href = 'admin_dashboard.php';
			</script>";	
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin DashBoard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../bootstrap/index.css">
    <!-- jQuery code -->
    <script type="text/javascript">
        $(document).ready(function(){
            $("#create_task").click(function(){
                $("#right_sidebar").load("create_task.php");
            });
        });
        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#right_sidebar").load("manage_task.php");
            });
        });
    </script>
</head>
<body>
    <div class="row" id="header">
        <div class="col-md-12">
            <div class="col-md-4" style="display: inline-block;">
                <h3>Project Management Tool</h3>
            </div>
            <div class="col-md-6" style="display: inline-block; text-align: right;">
                <b>Email: </b> <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'Email not available'; ?>
                <span style="margin-left: 25px"><b>Name:</b><?php echo $_SESSION['name']; ?></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2" id="left_sidebar">
            <table class="table">
                <tr>
                    <td style="text-align: center;">
                        <a href="admin_dashboard.php" type="button" id="logout_link">Dashboard</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a type="button" style="text-decoration: none; color: white" class="link" id="create_task">Create Project</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a type="button" style="text-decoration: none; color: white" class="link" id="manage_task">Manage Project</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="../logout.php" type="button" id="logout_link">Logout</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-10" id="right_sidebar">
            <h2><b><u>Instructions for Admins :</u></b></h2><br>
            <ul style="line-height: 3em; font-size: 1.2em; list-style-type: none;">
                <li><h4>1. All Employees should mark their attendance daily.</h4></li>
                <li><h4>2. Everyone should complete the assigned task.</h4></li>
                <li><h4>3.Kindly maintain decorum of the office.</h4></li>

                <li><h4>4. Keep the office and your area clean.</h4></li>
            </ul>
        </div>
    </div>
</body>
</html>
