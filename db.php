<?php

$databaseHost = 'localhost';
$databaseUsername = 'root';
$databasePassword = '';
$databaseName = 'crud-php-pdo';

try {
	// http://php.net/manual/en/pdo.connections.php
	$db = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword);

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
	// Lebih lanjut tentang setAttribute: http://php.net/manual/en/pdo.setattribute.php
	// echo "database konek";
} catch (PDOException $e) {
	echo $e->getMessage();
}
