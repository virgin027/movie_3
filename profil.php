<?php include('inc/combi.php');
 use \Gumlet\ImageResize; ?>

<?php

///afficher le profil utilisateur + image
$error = [];
if (!isLogged()) {
  // die('403');
}
//récupérer l'utilisateur
//$id_user = $_SESSION['user']['id'];
// $id_user = $_SESSION['user']['id'];
if (!empty($_POST['submitided'])) {
  if ($_FILES['image']['error'] > 0)  {
    $error['image'] = 'problème !';
  }else {
  // ici que je vais continuer le code
    $file_name = $_FILES['image']['name']; // Le nom du fichier
    $file_size = $_FILES['image']['size']; // La taille (peu fiable depend du )
    $file_tmp = $_FILES['image']['tmp_name']; // Le chemin du fichier temporaire
    $file_type = $_FILES['image']['type']; // tyme MIME

    $sizeMax = 2000000;
    if ($file_size > $sizeMax || filesize($file_tmp) > $sizeMax) {
      $error['image'] = 'image trop volumineuse, max 2 Mo';
    }else {
      $goodExtension = array('image/gif', 'image/x-icon', 'image/jpeg', 'image/jpg', 'image/png');
      $finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type
      $mime = finfo_file($finfo, $file_tmp);
      finfo_close($finfo);
      if (!in_array($mime,$goodExtension)) {
        $errors['image'] = 'error mime type';
      }else {
        $fichierExtension = strtolower(strrchr($file_name, '.'));
        $newFichier = 'user-' .$_SESSION['user']['id'].$fichierExtension;
        $newFichier2 = 'user-' .$_SESSION['user']['id'].'-200x200'.$fichierExtension;

        if (move_uploaded_file($file_tmp,'upload/avatar/'.$newFichier)) {
          echo 'bravo';
          $image = new ImageResize('upload/avatar/'.$newFichier);
          $image->crop(200, 200);
          $image->save('upload/avatar/'.$newFichier2);
        }else {
          echo 'pas bravo';
        }
      }
    }
  }
}
?>
<?php include('inc/header.php'); ?>

<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="image" value="">
  <span class="error" style="color:red"><?php if (!empty($errors['image'])) { echo $errors['image']; } ?></span>
  <input type="submit" name="submitided" value="Importer">
</form>

<img src="upload/avatar/user-<?php echo $_SESSION['user']['id']; ?>-200x200.jpg" alt="">

<?php

?>

<?php include('inc/footer.php');
