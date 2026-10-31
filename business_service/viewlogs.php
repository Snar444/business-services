<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<?php requireLogin(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Activity Log</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php include 'navbar.php'; ?>
	<h1>Activity Log</h1>

	<table style="width:100%;">
	  <tr>
	    <th>Time</th>
	    <th>User</th>
	    <th>Action</th>
	    <th>Table</th>
	    <th>Record ID</th>
	    <th>Details</th>
	  </tr>
	  <?php $getAllLogs = getAllLogs($pdo); ?>
	  <?php foreach ($getAllLogs as $row) { ?>
	  <tr>
	  	<td><?php echo e($row['log_time']); ?></td>
	  	<td><?php echo e($row['username']); ?></td>
	  	<td><?php echo e($row['action']); ?></td>
	  	<td><?php echo e($row['table_name']); ?></td>
	  	<td><?php echo e($row['record_id']); ?></td>
	  	<td><?php echo e($row['details']); ?></td>
	  </tr>
	  <?php } ?>
	</table>
</body>
</html>
