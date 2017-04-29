<?php
$url = $_SERVER['DOCUMENT_ROOT'] . '/projets_perso/Jeux/';
include($url . 'templates/header.php'); ?>

<section id="fiche">
<?php
	foreach (listGame() as $key => $value) {
		if ($_GET['id'] == $key) { ?>

			<h1><?= $value['nom']; ?></h1>
			<div id="content-fiche">
				<div id="image-fiche">
					<img src="/projets_perso/Jeux/images/<?= $value['image']; ?>" alt="<?= $value['nom']; ?>" />
				</div>
				<div id="text-fiche">
					<span><?= "Jeux de " . $value['type'] . ", " . $value['nbr_joueur'] . " joueurs minimum."; ?></span><br />
					<p><?= $value['regle']; ?></p>
				</div>
			</div>
		<?php }
	}
?>
</section>

<?php include ($url . 'templates/footer.php'); ?>
