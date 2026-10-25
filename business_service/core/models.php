<?php  

function insertChef($pdo, $first_name, $last_name, 
	$specialty, $years_experience, $email) {

	$sql = "INSERT INTO chefs (first_name, last_name, 
		specialty, years_experience, email) VALUES(?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, 
		$specialty, $years_experience, $email]);

	if ($executeQuery) {
		return true;
	}
}



function updateChef($pdo, $first_name, $last_name, 
	$specialty, $years_experience, $email, $chef_id) {

	$sql = "UPDATE chefs
				SET first_name = ?,
					last_name = ?,
					specialty = ?, 
					years_experience = ?,
					email = ?
				WHERE chef_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$first_name, $last_name, 
		$specialty, $years_experience, $email, $chef_id]);
	
	if ($executeQuery) {
		return true;
	}

}


function deleteChef($pdo, $chef_id) {
	$deleteChefClients = "DELETE FROM clients WHERE chef_id = ?";
	$deleteStmt = $pdo->prepare($deleteChefClients);
	$executeDeleteQuery = $deleteStmt->execute([$chef_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM chefs WHERE chef_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$chef_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}




function getAllChefs($pdo) {
	$sql = "SELECT * FROM chefs";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getChefByID($pdo, $chef_id) {
	$sql = "SELECT * FROM chefs WHERE chef_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$chef_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}





function getClientsByChef($pdo, $chef_id) {
	
	$sql = "SELECT 
				clients.client_id AS client_id,
				clients.client_name AS client_name,
				clients.contact_number AS contact_number,
				clients.service_date AS service_date,
				clients.number_of_guests AS number_of_guests,
				clients.date_added AS date_added,
				CONCAT(chefs.first_name,' ',chefs.last_name) AS chef_name
			FROM clients
			JOIN chefs ON clients.chef_id = chefs.chef_id
			WHERE clients.chef_id = ?
			ORDER BY clients.service_date;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$chef_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function insertClient($pdo, $client_name, $contact_number, 
	$service_date, $number_of_guests, $chef_id) {

	$sql = "INSERT INTO clients (client_name, contact_number, 
		service_date, number_of_guests, chef_id) VALUES (?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$client_name, $contact_number, 
		$service_date, $number_of_guests, $chef_id]);
	if ($executeQuery) {
		return true;
	}

}

function getClientByID($pdo, $client_id) {
	$sql = "SELECT 
				clients.client_id AS client_id,
				clients.client_name AS client_name,
				clients.contact_number AS contact_number,
				clients.service_date AS service_date,
				clients.number_of_guests AS number_of_guests,
				clients.date_added AS date_added,
				CONCAT(chefs.first_name,' ',chefs.last_name) AS chef_name
			FROM clients
			JOIN chefs ON clients.chef_id = chefs.chef_id
			WHERE clients.client_id = ?";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$client_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateClient($pdo, $client_name, $contact_number, 
	$service_date, $number_of_guests, $client_id) {

	$sql = "UPDATE clients
			SET client_name = ?,
				contact_number = ?,
				service_date = ?,
				number_of_guests = ?
			WHERE client_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$client_name, $contact_number, 
		$service_date, $number_of_guests, $client_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteClient($pdo, $client_id) {
	$sql = "DELETE FROM clients WHERE client_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$client_id]);
	if ($executeQuery) {
		return true;
	}
}




?>