<?php
include('inc/fonctions.php');
include('inc/request.php');
// include('inc/pdo.php');
include('inc/header.php');

if (!empty($_GET['id'])) {
  echo $_GET['id'];
} else{
  die ('Erreur 404');
};

$id = $_GET['id'];
$film = array();

foreach($movies as $movie){

  if ($id == $movie['id']){
    $film = $movie;
  }
};
  if(!empty($film)) {

  } else{
   die('Erreur 404');
 };
 include('include/header.php'); ?>
 <div class="wrap">

   <h1><?php echo $movie['title']; ?>
   <p class="annee"><?php echo $movie['year'];?></p>
   <p class="real"><?php echo $movie['slug']; ?></p>
   <p class="real"><?php echo $movie['genres']; ?></p>
   <p class="real"><?php echo $movie['directors']; ?></p>
   <p class="real"><?php echo $movie['popularity']; ?></p>
   <p class="real"><?php echo $movie['plot']; ?></p>

   <?php $movie; ?>
  <?php
  include('inc/footer.php');

  ?>
</div>
