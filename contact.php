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







<?php


// Pour mail de Contact
function valideEmail($error){


}


 ?>

   <?php  include('inc/footer.php'); ?>
