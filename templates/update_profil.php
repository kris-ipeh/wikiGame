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
    <p>
      Attention cette action effacera toutes vos données personnelles, vous ne pourrez plus récupérer votre compte. En revanche toutes vos contributions seront maintenues.<br />
    </p>
    <form action="update_profil.php" method="post">
    <fieldset class="fieldset-addGame">
      <div class="checkbox">
        <p>Etes vous bien sûr de vouloir supprimer votre compte ?</p>
        <label>
          <input type="checkbox" name="supprCompte"> Supprimer mon compte.
        </label>
      </div>
      <div>
        <label for="mdp">Saisissez votre mot de passe</label>
        <input type="password" name="mdp" id="mdp">
      </div>
      <div class="boutons">
        <input type="submit" value="Valider" class="bouton" />
      </div>
    </fieldset>
    </form>
  </div>
</aside>


<?php include($url . 'templates/footer.php'); ?>
