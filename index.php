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
// exemple =>function getRandomMovie($count){}
$sql = "SELECT id, title
        FROM movies_full
        LIMIT 5";
//JF- je prepare ma requete
$query = $pdo->prepare($sql);
//JF- j'execute
$query->execute();
$movies = $query->fetchAll();
imgAleatoire($movies);

debug($movies);
debug($errors);
/////////jeff => afficher les images sur la pages
include('inc/header.php');?>

<!--J Création d'une div  avec tous les films. -->
<section id="film">
  <div class="wrap">
    <?php foreach ($movies as $movie) { $movie['id'] = imgAleatoire($movie);?>
      <div class="images">

        <a href="detail.php?id=<?php echo $movie['id'];?>"><img src="posters/<?php echo $movie['id'];?>.jpg" alt="<?php echo $movie['title']; ?>"></a>

      </div>
   <?php } ?>

   <div class="clear"></div>

<!-- Creation d'un bouton "plus" qui permetde réactualiser la page -->
   <div class="">
     <a href="index.php"><input type="submit" value="+ de films"></a>
   </div>

   <div class="recherche">
     <input type="text" name="" value="Categorie">
     <input type="text" name="" value="Année">
     <input type="text" name="" value="Popularité">
   </div>

  </div>
</section>


<?php  include('inc/footer.php'); ?>
