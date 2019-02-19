<?php
include('inc/combi.php');
use JasonGrimes\Paginator;

////////// jeff=> chercher dans BDD tous les ID de movies_full
$success = false;
$errors = array();

$sql = "SELECT *
        FROM movies_full";
$query = $pdo->prepare($sql);
$query->execute();
$movies = $query->fetchAll();
// debug($movies);


// debug($errors);
/////////jeff => afficher le simages sur la pages
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




<?php
//////////////////////virgin => pagination
//pagination on compter le nombre d'éléments
//et on va chercher les articles que l'on a besoin


//ok
//// le 5 corrsepond au bre d'image qui s'affichera
$itemsPerPage = 5;
$urlPattern = '?page=(:num)';
$totalItems = countArticles();
$currentPage = 1;
$offset = 0;
if (!empty($_GET['page'])) {
  $currentPage = $_GET['page'];
  $offset = ($currentPage - 1) * $itemsPerPage;
}

$sql = "SELECT * FROM articles
        ORDER BY created_at DESC
        LIMIT $itemsPerPage OFFSET $offset";

        $query = $pdo->prepare($sql);
        $query->execute();
        $articles = $query->fetchAll();
        // debug($articles);



// $currentPage = 8;


$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
 ?>




<?php echo $paginator; ?>



<?php  include('inc/footer.php'); ?>
