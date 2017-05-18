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


// Fonction qui retient les valeurs du formulaire
function valueForm($field) {
	if (!empty($_POST[$field])) {
		return $_POST[$field];
	}
}


//	CONNEXION	//
// Redirection ou message d'erreur après validation du formulaire
$erreurLogin="";
$erreurName="";
$erreurPassword="";

	if (!empty($_POST['connectName']) && (!empty($_POST['connectPassword']))) {
			$name = $_POST['connectName'];
			$motdepasse = $_POST['connectPassword'];
			$requete = $db->query('SELECT * FROM utilisateurs WHERE name = "'.$name.'" AND password = "'.sha1($motdepasse).'"');

		if (!empty($result = $requete->fetch())) {
			$_SESSION['auth'] = $result;
			header("Location: profil.php");
			die;
		} else {
			$erreurLogin = "Vous n'êtes pas inscrit.";
		}
	}
	elseif (isset($_POST['connectName']) && empty($_POST['connectName']) && empty($_POST['connectPassword'])) {
		$erreurLogin = "Renseignez le nom et le mot de passe";
	}
	elseif (isset($_POST['connectName']) && empty($_POST['connectName'])) {
	 $erreurName ="Renseignez un nom ";
	}
	elseif (isset($_POST['connectPassword']) && empty($_POST['connectPassword'])) {
	$erreurPassword = "Entrez un mot de passe ";
	}


//  INSCRIPTION  //
	if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
		$sql = 'INSERT INTO utilisateurs (name, email, password, ville, date_inscription) VALUES (:name, :email, :password, :ville , NOW())';
		$request = $db->prepare($sql);
		$result = $request->execute(array(
			"name" 			=> $_POST['name'],
			"email"			=> $_POST['email'],
			"password" 	=> sha1($_POST['password']),
			"ville" 		=> $_POST['ville']
		));
		$name = $_POST['name'];
		$requete = $db->query('SELECT * FROM utilisateurs WHERE name = "'.$name.'"');
		if (!empty($result = $requete->fetch())) {
			$_SESSION['auth'] = $result;
			header("Location: profil.php");
			unset($_POST);
			die;
		} else {
			$erreurLogin = "Vous n'êtes pas inscrit, veuillez vérifiez vos informations.";
		}
	}



	// PSEUDO SESSION //
	function nomSession() {
		if(!empty($_SESSION['auth'])){
			$result = $_SESSION['auth'];
			if(!empty($result)) {
		  	foreach ($result as $key => $value) {
		    return $result['name'];
		  	}
			}
		}
	}

	function mdpSession() {
		if(!empty($_SESSION['auth'])){
			$result = $_SESSION['auth'];
			if(!empty($result)) {
		  	foreach ($result as $key => $value) {
		    return $result['password'];
		  	}
			}
		}
	}



//	SUPPRESSION PROFIL  //
$user = nomSession();
$mdp = mdpSession();
if (!empty($_SESSION) && !empty($_POST['supprCompte']) && !empty(sha1($_POST['mdp']) == $mdp)) {
		$requete = $db->prepare('DELETE FROM utilisateurs WHERE name = "'.$user.'"');
		$requete->execute();
		session_unset ();
		session_destroy();
		header('location: ../index.php');
		echo "Votre compte a bien été supprimé.";
		die;
} elseif (!empty($_SESSION) && !empty($_POST['supprCompte']) && !empty(sha1($_POST['mdp']) != $mdp)) {
	echo "Nous n'avons pas pu supprimer votre compte.";
}



	//	ADD GAME  //
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

	//on récupère l'id de l'utilisateur
	$nomUser = nomSession();
	$sql =  'SELECT id FROM utilisateurs WHERE name ="'.$nomUser.'"';
	$request = $db->query($sql);
	if (!empty($result = $request->fetch())) {
		$id_uploader = $result['id'];
	}


	//insertion des données dans la table jeux
	$sql = 'INSERT INTO jeux
						(nom, regle, nbr_joueur, id_type, image, date_creation, id_uploader)
					VALUES
						(:nom, :regle, :nbr_joueur, :id_type, :image, NOW(), :id_uploader)';
	$request = $db->prepare($sql);
	$result = $request->execute(array(
		"nom" 				=> $_POST['gameName'],
		"regle"				=> $_POST['regleDuJeu'],
		"nbr_joueur" 	=> $_POST['nbrJoueur'],
		"id_type" 		=> $id_type,
		"image" 			=> $_POST['image'],
		"id_uploader" => $id_uploader ));

	//on récupère la clé du jeu ajouter pour rediriger l'utilisateur sur sa fiche
	$request = $db->query('SELECT COUNT(*)-1 AS id_game FROM jeux');
	$result = $request->fetch();
	$id_game = $result['id_game'];

  header("Location: fiche.php?id=".($id_game));
	unset($_POST);
	die;
}

?>
