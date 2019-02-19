<?php // fonctions.php
function debug($a)
{
  echo '<pre>';
  print_r($a);
  echo '<pre>';
}

// traitement de ce formulaire
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
