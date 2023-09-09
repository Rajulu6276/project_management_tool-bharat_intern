<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/index.css">
    <script type="text/javascript">
        $(document).ready(function(){
            $("#manage_task").click(function(){
                $("#right_sidebar").load("task.php");
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
                <b>Email: </b>
                <?php
                if (isset($_SESSION['email'])) {
                    echo $_SESSION['email'];
                } else {
                    echo "Not logged in"; // Display a message if not logged in
                }
                ?>
                <span style="margin-left: 25px"><b>Name:</b>
                <?php
                if (isset($_SESSION['name'])) {
                    echo $_SESSION['name'];
                } else {
                    echo "Not logged in"; // Display a message if not logged in
                }
                ?>
                </span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2" id="left_sidebar">
            <table class="table">
                <tr>
                    <td style="text-align: center;">
                        <a href="user_dashboard.php" type="button" id="logout_link">Dashboard</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a type="button" class="link" id="manage_task" style="color: white">Update Task</a>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;">
                        <a href="logout.php" type="button" id="logout_link">Logout</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-10" id="right_sidebar">
            <h2><u>Instructions for Employees</u></h2><br>
            <ul style="line-height: 3em; font-size: 1.2em; list-style-type: none;">
                <li><h4>1. All Employees should mark their attendance daily.</h4></li><br>
                <li><h4>2. Everyone should complete the assigned task.</h4></li><br>
                <li><h4>3. Kindly maintain decorum of the office.</h4></li><br>
                <li><h4>4. Keep the office and your area clean.</h4></li><br>
            </ul>
        </div>
    </div>
</body>
</html>
