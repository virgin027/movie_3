<?php // fonctions.php
function debug($a)
{
  echo '<pre>';
  print_r($a);
  echo '<pre>';
}

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

/////// pour le MP enregistrer dans base de donnée
function generateRandomString($length = 100) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//////// Pagination
function getArticlespaginate($itemsPerPage,$offset)
{
  global $pdo;
  $sql = "SELECT *FROM getArticlespaginate
          WHERE status = 1
          ORDER BY created_at fann_descale_input
          LIMIT $itemsPerPage OFFEST $offset";
  $query = $pdo->prepare($sql);
  $query->execute();
  $articles = $query->fetchAll();
  return $articles;
}
