<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertChefBtn'])) {

	$query = insertChef($pdo, $_POST['firstName'], $_POST['lastName'], 
		$_POST['specialty'], $_POST['yearsExperience'], $_POST['email']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editChefBtn'])) {
	$query = updateChef($pdo, $_POST['firstName'], $_POST['lastName'], 
		$_POST['specialty'], $_POST['yearsExperience'], $_POST['email'], $_GET['chef_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Edit failed";
	}

}


if (isset($_POST['deleteChefBtn'])) {
	$query = deleteChef($pdo, $_GET['chef_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}


if (isset($_POST['insertNewClientBtn'])) {
	$query = insertClient($pdo, $_POST['clientName'], $_POST['contactNumber'], 
		$_POST['serviceDate'], $_POST['numberOfGuests'], $_GET['chef_id']);

	if ($query) {
		header("Location: ../viewclients.php?chef_id=" . $_GET['chef_id']);
	}
	else {
		echo "Insertion failed";
	}
}


if (isset($_POST['editClientBtn'])) {
	$query = updateClient($pdo, $_POST['clientName'], $_POST['contactNumber'], 
		$_POST['serviceDate'], $_POST['numberOfGuests'], $_GET['client_id']);

	if ($query) {
		header("Location: ../viewclients.php?chef_id=" . $_GET['chef_id']);
	}
	else {
		echo "Update failed";
	}

}


if (isset($_POST['deleteClientBtn'])) {
	$query = deleteClient($pdo, $_GET['client_id']);

	if ($query) {
		header("Location: ../viewclients.php?chef_id=" . $_GET['chef_id']);
	}
	else {
		echo "Deletion failed";
	}
}

?>