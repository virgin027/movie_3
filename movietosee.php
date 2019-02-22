<?php
include('inc/combi.php');

if (isLogged()) {
  $id_user = $_SESSION['users']['id'];
  $movies = voirFilmFavoris($id_user);

}else {
  die('403');
}

include('inc/header.php');

foreach($movies as $movie) { ?>

  <h1><?php echo $movie['title']; ?> </h1>
  <p class="info"name="info"><?php echo $movie['year'] . $movie['directors']; ?><img src="posters/<?php echo $movie['id']; ?>.jpg" alt="; ?>"></a>
<?php } ?>
<?php
include('inc/footer.php');
?>
