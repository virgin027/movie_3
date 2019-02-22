<?php // fonctions.php
function debug($a)
{
  echo '<pre>';
  print_r($a);
  echo '<pre>';
}

function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);
  // trim
  $text = trim($text, '-');
  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);
  // lowercase
  $text = strtolower($text);
  if (empty($text)) {
    return 'n-a';
  }
  return $text;
}

function valideText($error,$value,$key,$text,$min = 2,$max = 100,$empty = true)
{
  if (!empty($value)){
      if(mb_strlen($value) < $min ) {
        $error[$key] = 'Votre '.$text.' est trop court. (minimum '.$min.' caractères)';
      } elseif(mb_strlen($value) > $max) {
        $error[$key] = 'Votre '.$text.' est trop long.';
      }
  } else {
      if($empty) {
         $error[$key] = 'Veuillez entrer un '.$text;
      }
  }

  return $error;

}


/////// pour le MP enregistrer dans base de donnée===> inscription hachage du mot de passe
function generateRandomString($length = 100) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
