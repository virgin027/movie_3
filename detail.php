<?php
include('inc/combi.php');

if (!empty($_GET['slug']) ) {
  $slug = $_GET['slug'];
  $movie = getMovieBySlug($slug);
  if(!empty($movie)) {

  } else {
    die('404');
  }
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
   <img src="posters/<?php echo $movie['id']; ?>.jpg">


  <?php
  include('inc/footer.php');

  ?>
</div>
