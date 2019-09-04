<?php

header('location: /');

function dbConnect() {
	$host = 'localhost';
	$database = 'supershop';
	$user = 'root';
	$password = '';

	try {
		$dsn = 'mysql:host=' . $host . ';dbname=' . $database;
		$connection = new PDO( $dsn, $user, $password );
		$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$connection->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		$connection->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
		return $connection;
	} catch ( \PDOException $e ) {
		echo 'There is occured error while connecting to SQL: ' . $e->getMessage();
	}
}

$database = dbConnect();
$query = $database->prepare("INSERT INTO `winkelwaggie`(`id`) VALUES (:id)");
$query->execute(array('id' => $_GET['id']));


?>