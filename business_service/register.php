<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<?php 
if (isset($_SESSION['user_id'])) {
	header("Location: index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Create an Account</h1>
	<?php showMessage(); ?>
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
			<label>Address</label> 
			<input type="text" name="address" required>
		</p>
		<p>
			<label>Age</label> 
			<input type="number" name="age" min="1" max="120" required>
		</p>
		<p>
			<label>Email</label> 
			<input type="email" name="email" required>
		</p>
		<p>
			<label>Username</label> 
			<input type="text" name="username" required>
		</p>
		<p>
			<label>Password</label> 
			<input type="password" name="password" minlength="8" placeholder="min. 8 chars" required>
		</p>
		<p>
			<label>Confirm Password</label> 
			<input type="password" name="confirmPassword" minlength="8" required>
			<input type="submit" name="registerBtn" value="Register">
		</p>
	</form>
	<p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>
