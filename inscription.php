<?php
include('inc/fonctions.php');
include('inc/request.php');
include('inc/pdo.php');
// include('vendor/autoload.php';

//////////////////////////////inscription sit + mots de passe
$error = array();

if (!empty($_POST['submitided'])) {
        // echo 'good';
        // faille xss
  $pseudo = trim(strip_tags($_POST['pseudo']));
  $email = trim(strip_tags($_POST['email']));
  $password = trim(strip_tags($_POST['password']));
  $password2 = trim(strip_tags($_POST['password2']));

  //verification champ pseudo
  if (!empty($pseudo)) {
    //si inscrit que 3....
    if (mb_strlen($pseudo) < 2) {
      $error['pseudo'] = 'inscrire 3 caractères minimum';
      //si inscrit 80 ....
    } elseif (mb_strlen($pseudo) > 80) {
      $error['pseudo'] = 'inscrire 80 caractères maximum';
    } //sinon il respecte tout ce que je lui ai demandé donc ok
    else {
      // ici requete
      $sql = "SELECT pseudo FROM users WHERE pseudo = :pseudo";
      $query= $pdo->prepare($sql);
      $query->bindValue(':pseudo',$pseudo, PDO::PARAM_STR);
      $query->execute();
      $sqlpseudoexiste = $query->fetch();
      if (!empty($pseudoexiste)) {
        $error['pseudo'] =' Désolé pseudo déjà utilisé!';
      }
    }
  } else {
      $error['pseudo'] = 'Veuillez renseigner ce champ, merci.';
  }
  //if not error ===> vérifiez que ca fonctionne et trouver ses erreurs
  // if (count($error)== 0) {
  //   echo $pseudo;
  // }

   //vérification mail
  if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $error['email'] = 'Adresse mail non valide, remplir le champs.';
   //sinon il respecte tout ce que je lui ai demandé donc ok
  }
   else {
     // ici requête
       $sql = "SELECT email FROM users WHERE email = :email";
       $query= $pdo->prepare($sql);
       $query->bindValue(':email',$email, PDO::PARAM_STR);
       $query->execute();
       $emailexiste = $query->fetch();
       if (!empty($emailexiste)) {
        $error['email'] = 'Désolé ce mail existe déjà!';
      }
  }

   //if not error ===> vérifiez que ca fonctionne et trouver ses erreurs
  // if (count($error)== 0) {
  // echo $email;
  //  }

  //verification champ passeword
  if (!empty($password) OR! (!empty($password2))) {
    if ($password != $password2) {
    $error['password'] ='Vos Passewords sont différents';
  }
    elseif(mb_strlen($password) < 4) {
    $error['password'] = 'Inscrire 3 caractères minimum';
    }
  }
     else {
    $error['password'] = 'Veuillez renseigner ce champ, merci.';
  }
   if (count($error)== 0) {
  // echo $password;
  //  }

  /////// mot de passe
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $token = generateRandomString(100);
  $role = 'user';
  //INSERT INTO
  $sql = "INSERT INTO users
          (pseudo,email, password,token,created_at,roles)
          VALUES (:pseudo,:email, :password,'$token',NOW(),'$role')";
  $query= $pdo->prepare($sql);
  $query->bindValue(':email',$email,PDO::PARAM_STR);
  $query->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
  $query->bindValue(':password',$hashedPassword,PDO::PARAM_STR);
  // // execution de la requête
   $query->execute();
   //redirection vers la page dashboard
  // header('Location: login.php');
   exit;

    }

}
///////// dans fichier fonction ====> fonction base de donnée





include('inc/header.php');?>

<h1 align="center">Inscription</h1>

   <form class="" action="" method="post" >

      <div class="form-group">
            <label for="pseudo">Pseudo*</label>
            <span class="error"><?php if(!empty($error['pseudo'])) { echo $error['pseudo']; } ?></span>
            <input type="text" name="pseudo" id="pseudo" class="form-control" value="<?php if(!empty($_POST['pseudo'])) { echo $_POST['pseudo']; } ?>" />
      </div>

      <div class="form-group">
          <label for="email">Email*</label>
          <span class="error"><?php if(!empty($error['email'])) { echo $error['email']; } ?></span>
          <input type="text" name="email" id="email" class="form-control" value="<?php if(!empty($_POST['email'])) { echo $_POST['email']; } ?>" />
      </div>

      <div class="form-group">
          <label for="password">Password*</label>
          <span class="error"><?php if(!empty($error['password'])) { echo $error['password']; } ?></span>
          <input type="password" name="password"id="password" class="form-control" value="<?php if(!empty($_POST['password'])) { echo $_POST['password']; } ?>" />
      </div>
      <div class="form-group">
          <label for="password2">Répéter votre Passeword</label>
          <input type="password" name="password2" id="password2" class="form-control" value="<?php if(!empty($_POST['password2'])) { echo $_POST['password2']; } ?>" />
      </div>

      <input type="submit" name="submitided" class="btn btn-primary" value="Envoyer !" />

   </form>



<?php include('inc/footer.php');
