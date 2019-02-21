<?php include('inc/combi.php');


//print_r($_SESSION);===> mettre cession start dans pdo pour avoir array()

$error = array();
$users = array();
///formulaire soumis

if (!empty($_POST['submitided'])) {
  //tjs vérifiez====> echo 'form soumi';

    $login  = trim(strip_tags($_POST['login']));
    $password= trim(strip_tags($_POST['password']));
    if (empty($login) OR empty($password)) {
      $error['login'] = 'Veuillez renseigner les deux champs';
    }
    if(count($error) == 0){
      /// verifier si il existe un user avec ce mail ou ce pseudo => login
      $sql = "SELECT * FROM users WHERE pseudo = :login OR email = :login";
      $query = $pdo->prepare($sql);
      $query->bindValue(':login',$login, PDO::PARAM_STR);
      $query->execute();
      $users = $query->fetch();
      if (!empty($users)) {
        //debug($user);
        // die();
        if(password_verify($password,$users['password'])) {
          //ok tout est verifié ===> création de la cession start dans pdo
          $_SESSION['users'] = array(
            'id' => $users['id'],
            'email' => $users['email'],
            'pseudo' => $users['pseudo'],
            'roles' => $users['roles'],
            'ip' => $_SERVER['REMOTE_ADDR'],
          );
          header('Location: index.php');
          die();
///////fonction login ==>fonction
          echo $paginator;
        }
      }else {
        $error['login'] = 'Erreur de connexion';
      }

    }

}


 include('inc/header.php'); ?>


<form  action="" method="post">
  <div class="form-group">
        <label for="login">Pseudo ou email*</label>
        <span class="error"><?php if(!empty($error['login'])) { echo $error['login']; } ?></span>
        <input type="text" name="login" id="login" class="form-control" value="<?php if(!empty($_POST['login'])) { echo $_POST['login']; } ?>" />
  </div>
  <div class="form-group">
        <label for="password">Password*</label>
        <input type="password" name="password" id="password" class="form-control" value="<?php if(!empty($_POST['password'])) { echo $_POST['password']; } ?>" />
  </div>

  <input type="submit" name="submitided" value="Connexion !" />
</form>

<a href="modified_password.php">Mot de passe oublié</a>
















<?php  include('inc/footer.php'); ?>
