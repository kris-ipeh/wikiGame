<?php
  $url = $_SERVER['DOCUMENT_ROOT'] . '/WikiGame/';
  include($url . 'templates/header.php'); ?>

<section>
  <h1 id="titre-profil">Bienvenue <?= nomSession() ?></h1>
  <div class="profil">
    <div>
      <img id="logoProfil" src="../images/profil.png" alt="logo du profil">
    </div>

      <div class="option">
        <a href="update_profil.php">Modifier son profil</a>
      </div>
      <div class="option">
        <a href="add_game.php">Ajouter un jeu</a>
      </div>
      <div class="option">
        <a href="update_game.php">Modifier un jeu</a>
      </div>
      <div class="option">
        <a href="logout.php">Déconnection</a>
      </div>

  </div>
</section>

<?php include($url . 'templates/footer.php'); ?>
