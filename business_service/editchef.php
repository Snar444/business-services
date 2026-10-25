<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Chef</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="index.php">Return to home</a>
	<?php $getChefByID = getChefByID($pdo, $_GET['chef_id']); ?>
	<h1>Edit the chef!</h1>
	<form action="core/handleForms.php?chef_id=<?php echo $_GET['chef_id']; ?>" method="POST">
		<p>
			<label>First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getChefByID['first_name']; ?>" required>
		</p>
		<p>
			<label>Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getChefByID['last_name']; ?>" required>
		</p>
		<p>
			<label>Specialty</label> 
			<input type="text" name="specialty" value="<?php echo $getChefByID['specialty']; ?>" required>
		</p>
		<p>
			<label>Years of Experience</label> 
			<input type="number" name="yearsExperience" min="0" value="<?php echo $getChefByID['years_experience']; ?>" required>
		</p>
		<p>
			<label>Email</label> 
			<input type="email" name="email" value="<?php echo $getChefByID['email']; ?>" required>
			<input type="submit" name="editChefBtn">
		</p>
	</form>
</body>
</html>