<?php

require_once 'header.php';
require_once 'identity.php';
//require_once 'debug.php';

createTrousseau($trousseau);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  //  debugForm($_POST, "post");

  $user['email'] = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
  $user['password'] = $_POST['password'];

  if(checkAccount($trousseau, $user)) {
    echo "<div class='alert alert-info'>Vous êtes authentifié</div>";
    echo "<h1>Site sécurisé</h1>";
    echo "<p>Lorem ipsum dolor sit amet.</p>";
  } else {
    echo "<div class='alert alert-danger'>Identifiants non valides</div>";
    echo "<a class='text-primary' href='index.html'>Recommencer l'authentification</a>";
  }
}

require_once 'footer.php';