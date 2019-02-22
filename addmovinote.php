<?php
include('inc/combi.php');

if (isLogged()) {
  $id_user = $_SESSION['users']['id'];
  print_r($_POST);
  if(!empty($_POST['submitted'])) {
    $note = trim(strip_tags($_POST['note']));
    $movie_id = trim(strip_tags($_POST['movieid']));

    $sql = "SELECT id FROM user_note
            WHERE id_movie = $movie_id
            AND id_user = $id_user";
    $query = $pdo->prepare($sql);
    $query->execute();
    $ligne = $query->fetch();
    if(!empty($ligne)) {
      $id = $ligne['id'];
      $sql = "UPDATE user_note SET note = $note
              WHERE id = $id";
          $query = $pdo->prepare($sql);
          $query->execute();
            die ('good');
    } else {
      die('404');
    }
  }else {
    die('404');
  }

}else {
  die('403');
}

header('Location: index.php');
