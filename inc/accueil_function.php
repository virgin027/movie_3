<?php // fonctions.php





// fonction if file exist
function fileExist(){
  $fichier = "posters/". $movie['id'] ."jpg";
  if (file_exists($fichier)) {
    echo "Le fichier" . $fichier . "existe.";
  }else{
    echo "Le fichier". $fichier . "n'existe pas.";
  }
}



// traitement de ce formulaire
// function valideText($error,$value,$key,$content,$min = 2,$max = 100)
// {
//   if (!empty($value)) {
//     // echo 'form ok';
//     if (mb_strlen($value) < $min) {
//       $error[$key] = 'Votre ' . $content. ' est trop court. (minimum '.$min.' caractères)';
//     } elseif (mb_strlen($value) > $max) {
//       $error[$key] = 'Votre '.$content.' est trop long.';
//     }
//   } else {
//     $error[$key] = 'Veuillez entrer votre email, merci! '. $content;
//   }
//   return $error;
// }
