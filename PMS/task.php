<?php
	session_start(); 
	include('includes/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/index.css">
</head>
<body>
	<center><h3>Your Tasks</h3></center><br>
	<table class="table" style="background-color: whitesmoke;width: 75vw">
		<tr>
			<th>S.No</th>
			<th>Task ID</th>
			<th>Description</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		<?php 
			$query = "select * from tasks where uid = $_SESSION[uid]";
			$sno = 1;
			$query_run = mysqli_query($connection,$query);
			while($row = mysqli_fetch_assoc($query_run)){
				?>
				<tr>
					<td><?php echo $sno ?></td>
					<td><?php echo $row['tid']; ?></td>
					<td><?php echo $row['description']; ?></td>
					<td><?php echo $row['start_date']; ?></td>
					<td><?php echo $row['end__date']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td><a href="update_status.php?id=<?php echo $row['tid'];
					?>">Update</a></td>
				</tr>
				<?php
				$sno = $sno + 1;
			}
		?>
	</table>
</body>
</html>