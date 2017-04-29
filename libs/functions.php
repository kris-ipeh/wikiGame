<?php
session_start();

function displayType() {
		global $db;
		$sql = 'SELECT DISTINCT type FROM genre';
		$request = $db->query($sql);
		return $request->fetchall();
	}


function searchGame($jeux, $element, $valueElement) {
	$result = false;

	if (!empty($_GET[$element])) {
		foreach($jeux as $key => $value) {
			if (stristr($value[$valueElement], $_GET[$element])) {
				$result = $value[$valueElement];
			}
		}
	}
	return $result;
}


function listGame() {
		global $db;
		$sql = 'SELECT * FROM jeux INNER JOIN genre ON genre.id = jeux.id_type';
		$request = $db->query($sql);
		return $request->fetchall();
	}


	//	CONNEXION	//
// Redirection ou message d'erreur après validation du formulaire
$erreurLogin="";
$erreurMail="";
$erreurPassword="";

	if (!empty($_POST['connectEmail']) && (!empty($_POST['connectPassword']))) {
			$email = $_POST['connectEmail'];
			$motdepasse = $_POST['connectPassword'];
			$requete = $db->query('SELECT * FROM utilisateurs WHERE email = "'.$email.'" AND password = "'.sha1($motdepasse).'"');

		if (!empty($result = $requete->fetch())) {
			$_SESSION['auth'] = $result;
			header("Location: profil.php");
			die;
		} else {
			$erreurLogin = "Vous n'êtes pas inscrit.";
		}
	}
	elseif (isset($_POST['connectEmail']) && empty($_POST['connectEmail']) && empty($_POST['connectPassword'])) {
		$erreurLogin = "Renseignez l'email et le mot de passe";
	}
	elseif (isset($_POST['connectEmail']) && empty($_POST['connectEmail'])) {
	 $erreurMail ="Renseignez un email ";
	}
	elseif (isset($_POST['connectPassword']) && empty($_POST['connectPassword'])) {
	$erreurPassword = "Entrez un mot de passe ";
	}


//  INSCRIPTION  //
	if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
		$sql = 'INSERT INTO utilisateurs (name, email, password, ville) VALUES (:name, :email, :password, :ville)';
		$request = $db->prepare($sql);
		$result = $request->execute(array(
			"name" 			=> $_POST['name'],
			"email"			=> $_POST['email'],
			"password" 	=> sha1($_POST['password']),
			"ville" 		=> $_POST['ville'] ));
		$name = $_POST['name'];
		$requete = $db->query('SELECT * FROM utilisateurs WHERE name = "'.$name.'"');
		if (!empty($result = $requete->fetch())) {
			$_SESSION['auth'] = $result;
			header("Location: profil.php");
			unset($_POST);
			die;
		} else {
			$erreurLogin = "Vous n'êtes pas inscrit.";
		}
	}


// PSEUDO SESSION //
function nomSession() {
	$result = $_SESSION['auth'];
	if(!empty($result)) {
  	foreach ($result as $key => $value) {
    return $result['name'];
  	}
	}
}


	//	ADD GAME  //
	//	EN CHANTIER
	// Probleme d'ajout de type de jeu dans une table secondaire

if (!empty($_SESSION) && !empty($_POST['gameName']) && !empty($_POST['gameType']) && !empty($_POST['nbrJoueur']) && !empty($_POST['regleDuJeu'])) {
	//checker si la catégorie existe, sinon la rajouter
	$sql = 'SELECT DISTINCT genre.type FROM jeux JOIN genre WHERE id_type = genre.id';
	$request = $db->query($sql);
	$resultType = $request->fetch();

	if ($_POST['gameType'] != $resultType['type']) {
		$gameType = $_POST['gameType'];
		$sql = 'INSERT INTO genre (type) VALUES (:type)';
		$request = $db->prepare($sql);
		$result = $request->execute(array(
			"type" => $gameType));

		$requete = $db->query('SELECT id FROM genre WHERE type = "'.$gameType.'"');
		if (!empty($result = $requete->fetch())) {
		$id_type = $result['id'];
		}
	}
	$sql = 'INSERT INTO jeux (nom, regle, nbr_joueur, id_type, image) VALUES (:nom, :regle, :nbr_joueur, :id_type, :image)';
	$request = $db->prepare($sql);
	$result = $request->execute(array(
		"nom" 				=> $_POST['gameName'],
		"regle"				=> $_POST['regleDuJeu'],
		"nbr_joueur" 	=> $_POST['nbrJoueur'],
		"id_type" 		=> $id_type,
		"image" 			=> $_POST['image']));
}



// Fonction qui retient les valeurs du formulaire
function valueForm($field) {
	if (!empty($_POST[$field])) {
		return $_POST[$field];
	}
}
?>
