<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Client</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getClientByID = getClientByID($pdo, $_GET['client_id']); ?>
	<h1>Are you sure you want to delete this client?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Client Name: <?php echo $getClientByID['client_name'] ?></h2>
		<h2>Contact Number: <?php echo $getClientByID['contact_number'] ?></h2>
		<h2>Service Date: <?php echo $getClientByID['service_date'] ?></h2>
		<h2>Number of Guests: <?php echo $getClientByID['number_of_guests'] ?></h2>
		<h2>Chef: <?php echo $getClientByID['chef_name'] ?></h2>
		<h2>Date Added: <?php echo $getClientByID['date_added'] ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">

			<form action="core/handleForms.php?client_id=<?php echo $_GET['client_id']; ?>&chef_id=<?php echo $_GET['chef_id']; ?>" method="POST">
				<input type="submit" name="deleteClientBtn" value="Delete">
			</form>			
			
		</div>	

	</div>
</body>
</html>