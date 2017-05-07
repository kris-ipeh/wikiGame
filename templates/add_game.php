 <?php
  $url = $_SERVER['DOCUMENT_ROOT'] . '/projets_perso/Jeux/';
  include($url . 'templates/header.php'); ?>

<aside>
  <h3>Ajouter un jeu</h3>
  <div class="colonne">
    <form action="add_game.php" method="post">
    <fieldset class="fieldset-addGame">
    <legend>Nouveau jeu</legend>
      <div>
        <label for="gameName">Nom du jeu</label>
        <input type="text" name="gameName" id="gameName" value="<?=valueForm('gameName'); ?>">
      </div>
      <div>
        <label for="gameType">Type de jeu</label>
        <input type="text" name="gameType" id="gameType" value="<?=valueForm('gameType'); ?>">
      </div>
      <div>
        <label for="nbrJoueur">Nombre minimum de joueurs</label>
        <input type="number" name="nbrJoueur" id="nbrJoueur" value="<?=valueForm('nbrJoueur'); ?>">
      </div>
      <div>
        <label for="regleDuJeu">Régles du jeu</label>
        <textarea name="regleDuJeu" id="regleDuJeu" value="<?=valueForm('regleDuJeu'); ?>"><?=valueForm('regleDuJeu'); ?></textarea>
      </div>
      <div>
        <label for="image">Image</label>
        <input type="file" name="image" id="image" value="<?=valueForm('image'); ?>">
      </div>
      <div class="boutons">
        <input type="reset" name="reset" class="bouton" id="reset">
        <input type="submit" value="Valider" class="bouton" />
      </div>
    </fieldset>
    </form>
  </div>
</aside>


<?php include($url . 'templates/footer.php'); ?>
