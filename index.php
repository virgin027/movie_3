<?php
include('inc/combi.php');
use JasonGrimes\Paginator;
?>

<?php
//////////////////////virgin => pagination
//pagination on compter le nombre d'éléments
//et on va chercher les articles que l'on a besoin

//ok
//// le 5 corrsepond au bre d'image qui s'affichera
// $itemsPerPage = 5;
// $urlPattern = '?page=(:num)';
// $totalItems = countArticles();
// $currentPage = 1;
// $offset = 0;
// if (!empty($_GET['page'])) {
//   $currentPage = $_GET['page'];
//   $offset = ($currentPage - 1) * $itemsPerPage;
// }
//
// $sql = "SELECT * FROM articles
//         ORDER BY created_at DESC
//         LIMIT $itemsPerPage OFFSET $offset";
//
//         $query = $pdo->prepare($sql);
//         $query->execute();
//         $articles = $query->fetchAll();
//         // debug($articles);
//
//
//
// // $currentPage = 8;


// $paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);


////////// jeff=> chercher dans BDD tous les ID de movies_full
$success = false;
$errors = array();
// PROF =>  Mettre vos request separment , dans des fonctions pour réutiliser
// exemple => function getRandomMovie($count){ }
$sql = "SELECT *
        FROM movies_full
        LIMIT 5";
//JF- je prepare ma requete
$query = $pdo->prepare($sql);
//JF- j'execute
$query->execute();
$movies = $query->fetchAll();


debug($movies);
// echo imgAleatoire();

// debug($errors);
/////////jeff => afficher le simages sur la pages
include('inc/header.php');?>

<!--J Création d'une div  avec tous les films. -->
<section id="film">
  <div class="wrap">
    <?php  foreach ($movies as $movie) {
      $title = imgAleatoire($movie['id']);?>
      <div class="images">
<<<<<<< HEAD
        <a href="detail.php?=id<?php echo imgAleatoire($movie['id']) ?>"><img src="posters/<?php echo imgAleatoire($movie['id']); ?>.jpg" alt="<?php echo imgAleatoire($movie['id']) ?>"></a>
=======
        <a href="detail.php?=id<?php echo imgAleatoire($movie['id']) ?>"><img src="posters/<?php echo $movie['id']; ?>.jpg" alt="<?php echo imgAleatoire($movie['id']) ?>"></a>
>>>>>>> 8de21107f1bb120fe59e141e62c8426ce38c8cd4
      </div>
   <?php } ?>

   <div class="clear"></div>

<!-- Creation d'un bouton "plus" qui permet -->
   <div class="">
     <input class="plus" type="button" name="" value="+ de films">
   </div>

  </div>
</section>


<?php  include('inc/footer.php'); ?>
