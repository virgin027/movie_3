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
};
 include('inc/header.php'); ?>
 <div class="wrap">

   <h1><?php echo $film['title']; ?>
   <p class="annee"><?php echo$film['year'];?></p>
   <p class="real"><?php echo $film['slug']; ?></p>
   <p class="real"><?php echo $film['genres']; ?></p>
   <p class="real"><?php echo $film['directors']; ?></p>
   <p class="real"><?php echo $film['popularity']; ?></p>
   <p class="real"><?php echo $film['plot']; ?></p>
   <?php echo imageMovie($film);
   ?>

  <?php
  include('inc/footer.php');

  ?>
</div>
