<?php
////// Virgin

// traitement du formulaire
function valideText($error,$value,$key,$content,$min = 2,$max = 100)
{
  if (!empty($value)) {
    // echo 'form ok';
    if (mb_strlen($value) < $min) {
      $error[$key] = 'Votre ' . $content. ' est trop court. (minimum '.$min.' caractères)';
    } elseif (mb_strlen($value) > $max) {
      $error[$key] = 'Votre '.$content.' est trop long.';
    }
  } else {
    $error[$key] = 'Veuillez entrer votre email, merci! '. $content;
  }
  return $error;
}

/////// pour le MP enregistrer dans base de donnée ===> hachage pour mp base de donnée
function generateRandomString($length = 100) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


//////////fonction de $login page login.php
////isLogged
//@return bool

function isLogged() {
  if (!empty($_SESSION['user']['id'])) {
    if (is_numeric($_SESSION['user']['id'])) {
      if (!empty($_SESSION['user']['pseudo'])) {
        if (!empty($_SESSION['user']['email'])) {
          if (!empty($_SESSION['user']['roles'])) {
            if (!empty($_SESSION['user']['ip'])) {
              if ($_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
                return true;
              }
            }
          }
        }
      }
    }
  }
  return false;
}
