<?php include('templates/header.php'); ?>

<section>
	<div id="container">
		<!-- LISTING DES JEUX -->
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
									<a href="/WikiGame/templates/fiche.php?id=<?= $key; ?>" title="<?= $value['nom']; ?>">
									<img src="/WikiGame/images/<?= $value['image']; ?>" alt="<?= $value['nom']; ?>" /><br />
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


		<div id="aside">
			<!-- Météo de la ville et proposition -->
			<div id="meteo">
				<div id="imagemeteo">
					<img :src="image" class="iconeMeteo" />
				</div>
				<div id="textemeteo">
					<h3>{{ ville }}</h3>
					<p>
						{{ meteo }}	{{ temps }}<br />
	      		{{ message }}
	      	</p>
	      </div>
			</div>

			<!-- IMAGE DE LA SIDEBAR -->
			<img src="/WikiGame/images/snatch_franky.png" alt="Franky four finger - Snatch" class="francky">
		</div>
	</div>
</section>

<?php include('templates/footer.php');?>
