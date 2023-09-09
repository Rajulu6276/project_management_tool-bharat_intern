<?php 
	include('includes/connection.php');
	if(isset($_POST['update'])){
		$query = "update tasks set status ='$_POST[status]' where tid = $_GET[id]";
		$query_run = mysqli_query($connection,$query);
		if($query_run){
			echo "<script type= 'text/javascript'>
			alert('Status updated successfully...');
			window.location.href = 'user_dashboard.php';
			</script>";
		}
		else{
			echo "<script type= 'text/javascript'>
			alert('Error Please try again...');
			window.location.href = 'user_dashboard.php';
			</script>";
		}
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/index.css">
	<title>Update Status</title>
</head>
<body>
	<div class="row" id="header">
		<div class="col-md-12">
			<h3><i class="fa fa-solid fa-list" style="padding-right: 15px;"></i>
			Project Management System</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 m-auto" style="color: white;"><br>
			<h3 style="color: white;">Update the Project</h3><br>
			<?php
				$query = "select * from tasks where tid = $_GET[id]";
				$query_run = mysqli_query($connection,$query);
				while($row = mysqli_fetch_assoc($query_run)) {
					?>
				<form action="" method="post">
					<div class="form-group">
						<input type="hidden" name="id" class="form-control" value="<?php echo $row['tid']; ?>" required>
					</div>
					<div class="form-group">
						<select class="form-control" name="status">
							<option>-Select-</option>
							<option>In-Progress</option>
							<option>Complete</option>
						</select>
					</div>
					<input type="submit" class="btn btn-warning" name="update" value="Update">
				</form>
				<?php 
				}
			?>
		</div>
	</div>
</body>
</html>