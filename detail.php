<?php
include('inc/combi.php');


// debug($_GET);
if (!empty($_GET['id'])) {
  echo $_GET['id'];
// } else{
//   die ('Erreur 404');
// };

$id = $_GET['id'];
$film = array();

foreach($movies as $movie){

  if ($id == $movie['id']){
    $film = $movie;
  }
};
  if(!empty($film)) {

  }
 // else{
 //   die('Erreur 404');
 // }

 include('inc/header.php'); ?>
 <div class="wrap">

   <h1><?php echo $film['title']; ?>
   <p class="annee" name="annee"><?php echo$movie['year'];?></p>
   <p class="real" name="slug"><?php echo $movie['slug']; ?></p>
   <p class="real" name="genres"><?php echo $movie['genres']; ?></p>
   <p class="real" name="directors"><?php echo $movie['directors']; ?></p>
   <p class="real" name="popularity"><?php echo $movie['popularity']; ?></p>
   <p class="real" name="plot"><?php echo $movie['plot']; ?></p>
   <?php echo imageMovie($film);
   ?>

  <?php
  include('inc/footer.php');

  ?>
</div>
