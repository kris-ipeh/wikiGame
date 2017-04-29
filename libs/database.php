<?php
	$debug = 1;

//Database connect infos
	$host		= 'localhost';
	$name		= 'jeux';
	$user		= 'root';
	$password	= '';

//Try connect to database
try {
	//connect database
	$db = new PDO('mysql:host=' . $host . ';dbname=' . $name, $user, $password);

	//config PDO
	$db->setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE, PDO:: FETCH_ASSOC);
	$db->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_WARNING);

	//encodage
	$db->exec("SET CHARACTER SET utf8");
}
catch (Exception $e) {
	if ($debug == 1) {
		echo $e->getMessage();
	}
	else {
		echo 'Erreur de connexion à la base de données.';
	}
	die();
}
?>