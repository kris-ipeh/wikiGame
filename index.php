<?php include('templates/header.php'); ?>


		<!-- LISTING DES JEUX -->
<section>
	<div id="container">
		<div id="article">
			<h3>Liste des jeux</h3>
			<div id="list-jeux">
				<ul>
					<?php foreach(listGame() as $key => $value) { ?>
						<?php if (
							empty(searchGame(listGame(), 'search', 'nom')) &&
							empty(searchGame(listGame(), 'type', 'type')) ||
							searchGame(listGame(), 'search', 'nom') == $value['nom'] ||
							searchGame(listGame(), 'type', 'type') == $value['type']
						) { ?>
							<li>
								<div class="game">
									<a href="/projets_perso/Jeux/templates/fiche.php?id=<?= $key; ?>" title="<?= $value['nom']; ?>">
									<img src="/projets_perso/Jeux/images/<?= $value['image']; ?>" alt="<?= $value['nom']; ?>" /><br />
									<strong class="nom"><?= $value['nom']; ?></strong><br />
									<span id="nbr_joueur"><?= $value['nbr_joueur'] . ' joueurs minimum, '; ?></span><br />
									<blockquote id="type"><?= 'jeu de ' . $value['type'] . '.'; ?></blockquote></a>
								</div>
							</li>
						<?php } ?>
					<?php } ?>
				</ul><br />
			</div>
		</div>


		<!-- IMAGE DE LA SIDEBAR -->
		<div id="aside">
			<img src="images/snatch_franky.png" alt="Franky four finger - Snatch">
		</div>
	</div>
</section>


<?php
include('templates/footer.php');?>
