 <?php
  $url = $_SERVER['DOCUMENT_ROOT'] . '/WikiGame/';
  include($url . 'templates/header.php'); ?>

<aside>
  <h3>Modifier votre profil</h3>
  <div class="colonne">
    <form action="update_profil.php" method="post">
    <fieldset class="fieldset-addGame">
      <div class="boutons">
        <input type="reset" name="reset" class="bouton" id="reset">
        <input type="submit" value="Valider" class="bouton" />
      </div>
    </fieldset>
    </form>
  </div>

  <h3>Supprimer votre profil</h3>
  <div class="colonne">
    <form action="update_profil.php" method="post">
    <fieldset class="fieldset-addGame">
      <div class="boutons">
        <input type="submit" value="Valider" class="bouton" />
      </div>
    </fieldset>
    </form>
  </div>
</aside>


<?php include($url . 'templates/footer.php'); ?>
