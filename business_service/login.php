<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<?php 
// Already logged in? No need to see the login page.
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
	<title>Login</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Personal Chef Booking System - Login</h1>
	<?php showMessage(); ?>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label>Username</label> 
			<input type="text" name="username" required>
		</p>
		<p>
			<label>Password</label> 
			<input type="password" name="password" required>
			<input type="submit" name="loginBtn" value="Login">
		</p>
	</form>
	<p>No account yet? <a href="register.php">Register here</a></p>
</body>
</html>
