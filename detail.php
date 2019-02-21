<?php
include('inc/combi.php');


// debug($_GET);
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];
  $film = array();

  foreach ($movies as $movie) {
    if ($id == $movie['id'])
    {
      $film= $movie;
      // debug($film);
    };
  }
  if (!empty($film)) {

  }else {
    die ('404');
  }
}else{
  die ('404');
}
 include('inc/header.php'); ?>
 <div class="wrap">
     <h1><?php echo $film['title']; ?></h1>
     <h3>Anné: <?php echo $film['year'] ?></h3>
   </div>

  <?php
  include('inc/footer.php');

  ?>
</div>
