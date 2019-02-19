<?php
include('inc/accueil_function.php');
include('inc/request.php');
include('inc/pdo.php');

//JF- je séléctionne dans la BDD tous les "id" de "mivies_full"
$sql = "SELECT *
        FROM movies_full
        LIMIT 5";
//JF- je prepare ma requete
$query = $pdo->prepare($sql);
//JF- j'execute
$query->execute();
$movies = $query->fetchAll();
// debug($movies);
// echo imgAleatoire();

// debug($errors);
include('inc/header.php');?>

<!--J Création d'une div  avec tous les films. -->
<section id="film">
  <div class="wrap">
    <?php  foreach ($movies as $movie) {?>
      <div class="images">
        <a href="detail.php?=id <?php echo imgAleatoire($movie['id']) ?>"><img src="posters/<?php echo imgAleatoire($movie['id']); ?>.jpg" alt="<?php echo imgAleatoire($movie['id']) ?>"></a>
      </div>
   <?php } ?>

   <div class="clear"></div>

<!-- Creation d'un bouton "plus" qui permet -->
   <div class="">
     <input class="plus" type="button" name="" value="+ de films">
   </div>

  </div>
</section>





<?php include('inc/footer.php');
