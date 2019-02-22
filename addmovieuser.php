<?php
include('inc/combi.php');
if(isLogged()) {
  $id_user = $_SESSION['users']['id'];
  if(!empty($_POST['submitted']) && !empty( $_POST['idmovie'])) {
    $id_movie = trim(strip_tags($_POST['idmovie']));
    $movie = getMovieById($id_movie);
    if(!empty($movie)) {
      // INSERT INTO

      $sql = "INSERT INTO user_note (id_movie,id_user,note,created_at)
      VALUES (:idm,:idu,NULL, NOW())";
      $query = $pdo->prepare($sql);
      $query->bindValue(':idm',$id_movie,PDO::PARAM_INT);
      $query->bindValue(':idu',$id_user,PDO::PARAM_INT);
      $query->execute();

    } else {
      die('404');
    }
  }
} else {
  die('403');
}

header('Location: index.php');
