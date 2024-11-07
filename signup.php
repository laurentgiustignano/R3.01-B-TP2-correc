<?php

require_once 'header.php';
require_once 'identity.php';
//require_once 'debug.php';

createTrousseau($trousseau);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  //debugForm($_POST, "post");

  $account['civilite'] = $_POST['civilite'] === '1' ? 'M' : 'Mme';
  $account['name'] = $_POST['name'];
  $account['email'] = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
  $account['password'] = $_POST['password'];


  if(filter_var($account['email'], FILTER_VALIDATE_EMAIL)) {
    if(checkEmail($trousseau, $account)) {
      echo "<div class='alert alert-warning'>Un compte existe avec cet email</div>";
    }
    else {
      addAccount($trousseau, $account);
      echo "<div class='alert alert-success'>Votre compte est créé</div>";
    }
    echo "<a class='text-primary' href='index.html'>Vous pouvez vous authentifier</a>";
  }
  else {
    echo "<div class='alert alert-warning'>Email non valide</div>";
    echo "<a class='text-primary' href='index.html'>Recommencer l'enregistrement</a>";
  }
}

require_once 'footer.php';