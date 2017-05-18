<?php
  $url = $_SERVER['DOCUMENT_ROOT'] . '/WikiGame/';
  include($url . 'templates/header.php'); ?>


<section id="corps">

<!-- INSCRIPTION -->
	<div id="inscription" class="colonne">
		<h2>Inscris toi vite!!</h2>
		<div class="form">
			<form action="login.php" method="post">
				<div class="champs">
					<fieldset>
						<legend>Infos obligatoires</legend>
						<!--name-->
						<div class="form-field">
							<label for="name">Nom : </label>
							<input type="text" name="name" id="name" placeholder="Nom" value="<?=valueForm('name'); ?>" required="" />
						</div>

						<!--email-->
						<div class="form-field">
							<label for="email">Adresse mail : </label>
							<input type="email" name="email" id="email" placeholder="pseudo@monsite.com"  value="<?=valueForm('email'); ?>" required="" />
						</div>

						<!--password-->
						<div class="form-field">
							<label for="password">Mot de passe : </label>
							<input type="password" name="password" id="password" placeholder="Mon mot de passe" required="" />
						</div>
					</fieldset>

					<fieldset>
	       				<legend>Pour mieux te connaitre</legend>
	       				<!--adresse-->
	       				<div class="form-field">
	       					<label for="adresse">Ville / Village : </label>
	       					<input type="text" name="ville" id="adresse"  value="<?=valueForm('ville'); ?>" placeholder="Baiona">
	       				</div>
					</fieldset>
				</div>

				<!--boutons-->
				<div class="boutons">
					<input type="reset" name="reset" class="bouton" id="reset">
					<input type="submit" name="inscription" value="Envoyer" class="bouton" id="submit">
				</div>
			</form>
		</div>
	</div>

<!-- CONNEXION  -->
	<div id="connexion" class="colonne">
		<h2>Connecte toi sur ton profil</h2>
		<div class="form">
			<form action="login.php" method="post">
				<fieldset>
					<legend>Login</legend>
					<div class="champs">
						<div class="form-field">
							<span class="erreur"><?= $erreurLogin ;?></span><br />
							<label for="connectName">Nom : </label>
							<input type="name" name="connectName" id="connectName" value="<?=valueForm('connectName'); ?>"><span class="erreur"><?= $erreurName ;?></span>
						</div>
						<div class="form-field">
							<label for="connectPassword">Mot de passe : </label>
							<input type="password" name="connectPassword" id="connectPassword" ><span class="erreur"><?= $erreurPassword ;?></span>
						</div>
					</div>
				</fieldset>
				<div class="boutons">
					<input type="submit" name="connexion" value="Valider" class="bouton" />
				</div>
			</form>
		</div>
		<div>
			<img src="/projets_perso/Jeux/images/monkey.png" id="monkey" alt="Tête de singe" />
		</div>
	</div>
</section>


<?php include($url . 'templates/footer.php'); ?>
