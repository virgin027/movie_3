<?php // fonctions.php
<<<<<<< HEAD

=======
>>>>>>> 8de21107f1bb120fe59e141e62c8426ce38c8cd4

function imgAleatoire(){
  $min = 4238;
  $max = 13315;
  $image = rand($min,$max);
  if(!empty($image)){
    if($image < $min || $image > $max){
      echo "Pas d'images associées";
    }else {
      echo $image;
    }
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
