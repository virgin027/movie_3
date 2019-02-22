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

if(!empty($_POST['submitted'])) {
$sql = "SELECT * FROM movies_full WHERE 1 = 1";
  // genres
  if(!empty($_POST['genres'])) {
    $genres = $_POST['genres'];
    $i = 1;
      foreach ($genres as $genre) {
        if($i == 1) {
            $sql .= " AND genres LIKE '%".$genre."%'";
        } else {
          $sql .= " OR genres LIKE '%".$genre."%'";
        }

        $i++;
      }
  }

  if (!empty($_POST['annee'])) {
    $annees = $_POST['annee'];
    $ann = explode ('-',$annees);
    // print_r($ann);
    // die();

    $sql .= " AND year BETWEEN $annees";

    // debug($sql);
    // die();

  }

  $sql .= " ORDER BY RAND() LIMIT 5";

  // echo $sql;die();

  $query = $pdo->prepare($sql);
  //JF- j'execute
  $query->execute();
  $movies = $query->fetchAll();


} else {
  $sql = "SELECT *
         FROM movies_full
         ORDER BY RAND()
         LIMIT 5";
     $query = $pdo->prepare($sql);
     //JF- j'execute
     $query->execute();
     $movies = $query->fetchAll();
}

//JF- je prepare ma requete

// imgAleatoire($movies);
// debug($errors);====>afficher tableau
/////////jeff => afficher les images sur la pages
include('inc/header.php');?>

<!--J Création d'une div  avec tous les films. -->
<section id="film">
 <div class="wrap">
   <?php foreach ($movies as $movie) { ?>
     <div class="images">

       <a href="detail.php?slug=<?php echo $movie['slug']; ?>"><img src="posters/<?php echo $movie['id']; ?>.jpg" alt="<?php echo $movie['title']; ?>"></a>

     </div>
  <?php } ?>

  <div class="clear"></div>

<!-- Creation d'un bouton "plus" qui permetde réactualiser la page -->
  <div class="">
    <a href="index.php"><input type="submit" value="+ de films"></a>
  </div>


<!-- checkbox -->
<?php
$gennnres = array('Drama','Fantasy', 'Romance', 'Acion', 'Thriller', 'Comedy', 'Family', 'Crime', 'Sci_Fi', 'Mistery', 'Adventure', 'Horror', 'War', 'Biography', 'Animation');
 ?>
 <form class="" action="" method="post">


  <div class="recherche">
    <div class="">
      <h3>Genres</h3>
      <?php foreach ($gennnres as $g) { ?>
        <input type="checkbox" name="genres[]" value="<?php echo $g; ?>"><span><?php echo $g; ?></span>
      <?php } ?>
    </div>

    <div class="">
      <select class="" name="annee">
        <option value=""></option>
        <option value="1880-1900">1980 - 1900</option>
        <option value="1900-1910">1900 - 1910</option>
        <option value="1910-1930">1910 - 1930</option>
        <option value="1930-1950">1930 - 1950</option>
      </select>
    </div>


    <!-- <select class="" name="popularite">
      utilisation de explode avec between
      <option value=""></option>
      <option value="0-20">de 0 à 20</option>
      <option value="20-50">de 20 à 50</option>
      <option value="50-100">de 50 à 100</option>
    </select> -->
  </div>
  <input type="submit" name="submitted" value="recherche">
  </form>

 </div>
</section>


<?php  include('inc/footer.php'); ?>
