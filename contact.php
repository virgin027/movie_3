<?php  include('inc/combi.php');


//////////////////////////// ---- Etpae 10 ----//////////////////

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$error = array();

if(!empty($_POST['submitcontact'])) {
  // faille xss
  $name    = trim(strip_tags($_POST['name']));
  $email   = trim(strip_tags($_POST['email']));
  $message = trim(strip_tags($_POST['message']));
  // validation form
  $error = valideText($error,$name,'name','nom', 2,100);
  $error = valideText($error,$message,'message','message', 5,500);
  $error = valideEmail($error,$email,'email');

  if(count($error)== 0) {  // envoie d'un email


    echo 'mail ok';
    die();

  }

}


include('inc/header.php'); ?>

<form action="contact.php" method="post">
  <div class="form-group">
    <label for="title">Name*</label>
    <input type="text" class="form-control" name="name" value="<?php if(!empty($_POST['name'])){ echo $_POST['name']; } ?>">
    <span class="error"><?php if(!empty($error['name'])) { echo $error['name']; } ?></span>
  </div>
  <div class="form-group">
    <label for="title">Email*</label>
    <input type="text" class="form-control" name="email" value="<?php if(!empty($_POST['email'])){ echo $_POST['email']; } ?>">
    <span class="error"><?php if(!empty($error['email'])) { echo $error['email']; } ?></span>
  </div>
  <div class="form-group">
    <label for="title">message*</label>
    <textarea name="message" class="form-control" rows="8" cols="80"><?php if(!empty($_POST['message'])){ echo $_POST['message']; } ?></textarea>
    <span class="error"><?php if(!empty($error['message'])) { echo $error['message']; } ?></span>
  </div>
  <input type="submit" name="submitcontact" value="envoyer">
</form>

$error = array();
// Soumettre le formulaire
if (!empty($_POST['submitted'])) {
  //faille xxs
  $nom = trim(strip_tags($_POST['nom']));
  $message = trim(strip_tags($_POST['mail']));
  $message = trim(strip_tags($_POST['message']));
// validation
  $error = textValidation($error,$nom,'nom', 2,20);
  $error = valideEmail($error,$mail,'mail', 'mail');
  $error = textValidation($error,$message,'message','message', 5,1500);
  debug($error);

// Si pas d'erreur
if(count($error)== 0) {  // envoie d'un email


    echo 'mail ok';
    die();

?>



<?php  include('inc/header.php'); ?>


<h1>Contact</h1>
   <form method="post">
      <div class="form-group">
         <label for ="nom">Votre nom</label><br>
         <span class="error"><?php if(!empty($error['nom'])) { echo $error['nom']; } ?></span>
         <input type="tex" id="nom" name="nom"><br>
       </div>
      <div class="form-group">
         <label for="mail">Votre mail</label><br>
         <span class="error"><?php if(!empty($error['mail'])) { echo $error['mail']; } ?></span>
         <input type="email" id="mail" name="email" class="form-control"><br>
       </div>
      <div class="form-group">
         <label for = "message">Message</label><br>
         <span class="error"></span>
         <textarea name="message"><?php if(!empty($error['message'])) { echo $error['message']; } ?></textarea><br>
         <input type="submit" id="message" name="submitted" value="envoyer">
       </div>
   </form>


<?php


// Pour mail de Contact
function valideEmail($error){


}


 ?>

   <?php  include('inc/footer.php'); ?>
