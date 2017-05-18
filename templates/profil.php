<?php
  $url = $_SERVER['DOCUMENT_ROOT'] . '/WikiGame/';
  include($url . 'templates/header.php'); ?>

<section>
  <h1 id="titre-profil">Bienvenue <?= nomSession() ?></h1>
  <div class="profil">
    <div>
      <img id="logoProfil" src="../images/profil.png" alt="logo du profil">
    </div>
    <div>
      <a href="add_game.php">Ajouter un jeu</a>
    </div>
    <div>
      <a href="logout.php">Déconnection</a>
    </div>
  </div>
</section>

<?php include($url . 'templates/footer.php'); ?>
