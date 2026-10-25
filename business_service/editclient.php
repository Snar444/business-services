<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Client</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewclients.php?chef_id=<?php echo $_GET['chef_id']; ?>">
	View The Clients</a>
	<h1>Edit the client!</h1>
	<?php $getClientByID = getClientByID($pdo, $_GET['client_id']); ?>
	<form action="core/handleForms.php?client_id=<?php echo $_GET['client_id']; ?>&chef_id=<?php echo $_GET['chef_id']; ?>" method="POST">
		<p>
			<label>Client Name</label> 
			<input type="text" name="clientName" 
			value="<?php echo $getClientByID['client_name']; ?>" required>
		</p>
		<p>
			<label>Contact Number</label> 
			<input type="text" name="contactNumber" 
			value="<?php echo $getClientByID['contact_number']; ?>" required>
		</p>
		<p>
			<label>Service Date</label> 
			<input type="date" name="serviceDate" 
			value="<?php echo $getClientByID['service_date']; ?>" required>
		</p>
		<p>
			<label>Number of Guests</label> 
			<input type="number" name="numberOfGuests" min="1" 
			value="<?php echo $getClientByID['number_of_guests']; ?>" required>
			<input type="submit" name="editClientBtn">
		</p>
	</form>
</body>
</html>