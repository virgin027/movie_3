<?php
include('inc/combi.php');


// debug($_GET);
if (!empty($_GET['slug']) ) {
  $slug = $_GET['slug'];
  $sql = "SELECT * FROM movies_full
          WHERE slug = :slug";
  $query = $pdo->prepare($sql);
  $query->bindValue(':slug',$slug,PDO::PARAM_STR);
  $query->execute();
  $movie = $query->fetch();
} else {
  die('404');
}

 include('inc/header.php'); ?>
 <div class="wrap">

   <h1><?php echo $movie['title']; ?>
   <p class="annee" name="annee"><?php echo $movie['year'];?></p>
   <p class="real" name="slug"><?php echo $movie['slug']; ?></p>
   <p class="real" name="genres"><?php echo $movie['genres']; ?></p>
   <p class="real" name="directors"><?php echo $movie['directors']; ?></p>
   <p class="real" name="popularity"><?php echo $movie['popularity']; ?></p>
   <p class="real" name="plot"><?php echo $movie['plot']; ?></p>
   <?php echo imageMovie($movie); // a reparer 
   ?>

  <?php
  include('inc/footer.php');

  ?>
</div>
