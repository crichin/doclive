<?php
// Démarrer la session
session_start();

// Supprimer les cookies en les définissant à une date passée
setcookie("user_id", "", time() - 3600, "/");
setcookie("user_name", "", time() - 3600, "/");

// Détruire toutes les variables de session
$_SESSION = array();
session_destroy();

// Rediriger vers la page de connexion
header("Location: connexion.php");
exit();
?>
