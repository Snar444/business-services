<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Chef</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Are you sure you want to delete this chef?</h1>
	<p>All clients of this chef will be deleted too.</p>
	<?php $getChefByID = getChefByID($pdo, $_GET['chef_id']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>FirstName: <?php echo $getChefByID['first_name']; ?></h2>
		<h2>LastName: <?php echo $getChefByID['last_name']; ?></h2>
		<h2>Specialty: <?php echo $getChefByID['specialty']; ?></h2>
		<h2>Years of Experience: <?php echo $getChefByID['years_experience']; ?></h2>
		<h2>Email: <?php echo $getChefByID['email']; ?></h2>
		<h2>Date Added: <?php echo $getChefByID['date_added']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?chef_id=<?php echo $_GET['chef_id']; ?>" method="POST">
				<input type="submit" name="deleteChefBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>