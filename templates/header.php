<?php
$url = $_SERVER['DOCUMENT_ROOT'] . '/WikiGame/';
include($url . 'libs/database.php');
include($url . 'libs/functions.php');
?>



<!DOCTYPE html>
<html lang="fr">
<head>
	<title>wikiGame</title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="/WikiGame/images/favicon.png" />
	<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="/WikiGame/images/favicon.ico" /><![endif]-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="/WikiGame/css/style.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.js"></script>
</head>



<body class="container-fluid">
	<!--      HEADER      -->
	<header>
		<div id="title">
			<a href="/WikiGame/index.php"><h1>wikiGame</h1></a>
		</div>
		<div id="login">
			<?php
			if(!empty($_SESSION['auth'])) { ?>
				<a href="/WikiGame/templates/profil.php"><img src="/WikiGame/images/profil.png" alt="profil" />Profil de <?= nomSession(); ?></a>
			<?php } else { ?>
				<a href="/WikiGame/templates/login.php"><img src="/WikiGame/images/logoLogin.svg" alt="login" /></a>
			<?php } ?>
		</div>
	</header>


	<!--    MENU TYPE DE JEUX    -->
	<nav>
		<ul>
			<li<?= (empty($_GET['type']) && empty($_GET['search'])) ? ' class="type-current"' : ''; ?>>
				<a href="/WikiGame/index.php" title="Tous">Tous</a>
			</li>
			<?php foreach (displayType() as $key => $value) {?>
				<?php $value = $value['type']; ?>
				<li<?= (!empty($_GET['type']) && $_GET['type'] == $value) ? ' class="type-current"' : ''; ?>>
					<a href="/WikiGame/index.php?type=<?php echo $value; ?>" title="<?php echo $value; ?>"><?php echo $value; ?></a>
				</li>
			<?php } ?>
		</ul>

		<!--  MOTEUR DE RECHERCHE PAR NOM DE JEU  -->
		<div id="search">
			<form action="/WikiGame/index.php" method="get" autocomplete="off">
				<div class="input-search">
					<input type="text" name="search" placeholder="Rechercher par nom de jeux" />
				</div>
				<div class="input-validate">
					<input type="submit" value="Rechercher" />
				</div>
			</form>
		</div>
	</nav>
