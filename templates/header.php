<?php
//$url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$url = $_SERVER['DOCUMENT_ROOT'] . '/projets_perso/Jeux/';
//var_dump($url);

include($url . 'libs/database.php');
include($url . 'libs/functions.php'); ?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<title>jeux</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="/projets_perso/Jeux/images/favicon.png" />
	<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="/projets_perso/Jeux/images/favicon.png" /><![endif]-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="/projets_perso/Jeux/css/style.css">
</head>

<body class="container-fluid">

			<!-- HEADER -->
	<header>
		<div id="title">
			<a href="/projets_perso/Jeux/index.php"><h1>Le temps d'un jeu</h1></a>
		</div>
		<div id="login">
			<?php
			if(!empty($_SESSION['auth'])) { ?>
				<a href="/projets_perso/Jeux/templates/profil.php"><img src="/projets_perso/Jeux/images/profil.png" alt="profil" />Profil de <?= nomSession(); ?></a>
			<?php } else { ?>
				<a href="/projets_perso/Jeux/templates/login.php"><img src="/projets_perso/Jeux/images/logoLogin.svg" alt="login" /></a>
			<?php } ?>
		</div>
	</header>


			<!-- MENU TYPE DE JEUX -->
	<nav>
		<ul>
			<li<?= (empty($_GET['type']) && empty($_GET['search'])) ? ' class="type-current"' : ''; ?>>
				<a href="/projets_perso/Jeux/index.php" title="Tous">Tous</a>
			</li>
			<?php foreach (displayType() as $key => $value) {?>
				<?php $value = $value['type']; ?>
				<li<?= (!empty($_GET['type']) && $_GET['type'] == $value) ? ' class="type-current"' : ''; ?>>
					<a href="/projets_perso/Jeux/index.php?type=<?php echo $value; ?>" title="<?php echo $value; ?>"><?php echo $value; ?></a>
				</li>
			<?php } ?>
		</ul>


			<!-- MOTEUR DE RECHERCHE PAR NOM DE JEU -->
		<div id="search">
			<form action="/projets_perso/Jeux/index.php" method="get" autocomplete="off">
				<div class="input-search">
					<input type="text" name="search" placeholder="Rechercher par nom de jeux" />
				</div>
				<div class="input-validate">
					<input type="submit" value="Rechercher" />
				</div>
			</form>
		</div>
	</nav>


			<!-- AFFICHAGE DU PROFIL SI CONNECTE
	<div>
		<h2><?
			if (connexion() = true) {
				echo $result;
			} ; ?></h2>
	</div>-->
