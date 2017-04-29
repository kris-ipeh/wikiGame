<?php
  $url = $_SERVER['DOCUMENT_ROOT'] . '/projets_perso/Jeux/';
  include($url . 'templates/header.php');
?>

<section>
  <h1 id="titre-profil">Bienvenue <?= nomSession() ?></h1>
  <div class="profil">
    <div>
      <img id="logoProfil" src="/projets_perso/Jeux/images/profil.png" alt="logo du profil">
    </div>
    <div>
      <a href="/projets_perso/Jeux/templates/add_game.php">Ajouter un jeu</a>
    </div>
    <div>
      <a href="/projets_perso/Jeux/templates/logout.php">Déconnection</a>
    </div>
  </div>
</section>

<?php include($url . 'templates/footer.php'); ?>




