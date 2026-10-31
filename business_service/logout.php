<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

if (isset($_SESSION['user_id'])) {
	logActivity($pdo, $_SESSION['user_id'], 'LOGOUT', 'users', 
		$_SESSION['user_id'], 'User logged out');
}

session_unset();
session_destroy();

session_start();
flash("You have been logged out.", "success");

header("Location: login.php");
exit;
?>
