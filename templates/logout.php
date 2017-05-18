<?php

$url = $_SERVER['DOCUMENT_ROOT'] . '/WikiGame/';
include($url . 'templates/header.php');

// On détruit les variables de notre session
session_unset ();

// On détruit notre session
session_destroy ();

// On redirige le visiteur vers la page d'accueil
header ('location: ../index.php');

?>
