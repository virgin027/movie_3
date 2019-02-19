<?php
include('inc/fonctions.php');
include('inc/request.php');
include('inc/pdo.php');

$success = false;
$errors = array();

$sql = "SELECT *
        FROM movies_full";
$query = $pdo->prepare($sql);
$query->execute();
$movies = $query->fetchAll();
// debug($movies);


// debug($errors);

include('inc/header.php');?>
<section id="film">
  <div class="wrap">
    <?php  foreach ($movies as $movie) {?>
      <div class="images">
        <a href="detail.php?=id <?php echo $movie['id'] ?>"><img src="posters/<?php echo $movie['id'] ?>.jpg" alt="<?php echo $movie['id'] ?>"></a>
      </div>
   <?php } ?>
  </div>
</section>




<?php include('inc/footer.php');
