<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap/index.css">
</head>
<body>
	<h1><u> Create a New Project</u></h1>
	<div class="row">
		<div class="col-md-6">
			<form action="" method="post">
				<div class="form-group">
					<label><h2>Select User:</h2></label>
					<select class="form-control" name="id">
						<option>-Select-</option>
						<<?php 
							 include('../includes/connection.php');
							 $query = "select uid,name from users";
							 $query_run = mysqli_query($connection,$query);
							 if(mysqli_num_rows($query_run)){
							 	while($row = mysqli_fetch_assoc($query_run)){
							 		?>
							 		<option value="<?php echo $row['uid']; ?>"><?php echo $row['name']; ?></option>
							 		<?php 
							 	}
							 }
						?>
					</select>
				</div>
					<div class="form-group">
						<label><h2>Description:</h2></label>
						<textarea class="form-control" rows="3" cols="50" name="description" placeholder="Mention the Project details"></textarea>
					</div>
					<div class="form-group">
						<label><h2>Start Date:</h2></label>
						<input type="date" class="form-control" name="start_date">
					</div>
					<div class="form-group">
						<label><h2>End Date:</h2></label>
						<input type="date" class="form-control" name="end_date">
					</div>
					<input type="submit" class="btn btn-warning" name="create_task" value="Create">
			</form>
		</div>
	</div>
</body>
</html>