<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Clients</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="index.php">Return to home</a>
	<?php $getChefByID = getChefByID($pdo, $_GET['chef_id']); ?>
	<h1>Chef: <?php echo $getChefByID['first_name'] . " " . $getChefByID['last_name']; ?></h1>
	<h1>Add New Client</h1>
	<form action="core/handleForms.php?chef_id=<?php echo $_GET['chef_id']; ?>" method="POST">
		<p>
			<label>Client Name</label> 
			<input type="text" name="clientName" required>
		</p>
		<p>
			<label>Contact Number</label> 
			<input type="text" name="contactNumber" required>
		</p>
		<p>
			<label>Service Date</label> 
			<input type="date" name="serviceDate" required>
		</p>
		<p>
			<label>Number of Guests</label> 
			<input type="number" name="numberOfGuests" min="1" required>
			<input type="submit" name="insertNewClientBtn">
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Client ID</th>
	    <th>Client Name</th>
	    <th>Contact Number</th>
	    <th>Service Date</th>
	    <th>Number of Guests</th>
	    <th>Chef</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  <?php $getClientsByChef = getClientsByChef($pdo, $_GET['chef_id']); ?>
	  <?php foreach ($getClientsByChef as $row) { ?>
	  <tr>
	  	<td><?php echo $row['client_id']; ?></td>	  	
	  	<td><?php echo $row['client_name']; ?></td>	  	
	  	<td><?php echo $row['contact_number']; ?></td>	  	
	  	<td><?php echo $row['service_date']; ?></td>	  	
	  	<td><?php echo $row['number_of_guests']; ?></td>	  	
	  	<td><?php echo $row['chef_name']; ?></td>	  	
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="editclient.php?client_id=<?php echo $row['client_id']; ?>&chef_id=<?php echo $_GET['chef_id']; ?>">Edit</a>

	  		<a href="deleteclient.php?client_id=<?php echo $row['client_id']; ?>&chef_id=<?php echo $_GET['chef_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>