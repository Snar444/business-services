<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Personal Chef Booking System</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Welcome To Personal Chef Booking System. Add new Chefs!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label>First Name</label> 
			<input type="text" name="firstName" required>
		</p>
		<p>
			<label>Last Name</label> 
			<input type="text" name="lastName" required>
		</p>
		<p>
			<label>Specialty</label> 
			<input type="text" name="specialty" required>
		</p>
		<p>
			<label>Years of Experience</label> 
			<input type="number" name="yearsExperience" min="0" required>
		</p>
		<p>
			<label>Email</label> 
			<input type="email" name="email" required>
			<input type="submit" name="insertChefBtn">
		</p>
	</form>
	<?php $getAllChefs = getAllChefs($pdo); ?>
	<?php foreach ($getAllChefs as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>FirstName: <?php echo $row['first_name']; ?></h3>
		<h3>LastName: <?php echo $row['last_name']; ?></h3>
		<h3>Specialty: <?php echo $row['specialty']; ?></h3>
		<h3>Years of Experience: <?php echo $row['years_experience']; ?></h3>
		<h3>Email: <?php echo $row['email']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>


		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewclients.php?chef_id=<?php echo $row['chef_id']; ?>">View Clients</a>
			<a href="editchef.php?chef_id=<?php echo $row['chef_id']; ?>">Edit</a>
			<a href="deletechef.php?chef_id=<?php echo $row['chef_id']; ?>">Delete</a>
		</div>


	</div> 
	<?php } ?>
</body>
</html>