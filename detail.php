<?php
include('inc/fonctions.php');
include('inc/request.php');
include('inc/pdo.php');
include('inc/fonction_detail.php');

if (!empty($_GET['id'] && is_numeric($_GET['id']))) {
$id= trim(strip_tags($_GET['id']));
$year= trim(strip_tags($_GET['year']));
$slug= trim(strip_tags($_GET['slug']));
$genres= trim(strip_tags($_GET['genres']));
$directors= trim(strip_tags($_GET['directors']));
$popularity= trim(strip_tags($_GET['popularity']));
$plot = trim(strip_tags($_GET['plot']));

$slug = urldecode($_GET['id']);
$sql = "SELECT * FROM movies_full
        WHERE id = :id";
$query=$pdo->prepare($sql);
$query->bindValue(':id',$id,PDO::PARAM_INT);
$query->bindValue(':year',$year,PDO::PARAM_STR);
$query->bindValue(':slug',$slug,PDO::PARAM_STR);
$query->bindValue(':genres',$genres,PDO::PARAM_STR);
$query->bindValue(':directors',$directors,PDO::PARAM_STR);
$query->bindValue(':popularity',$popularity,PDO::PARAM_STR);
$query->bindValue(':plot',$plot,PDO::PARAM_STR);
$query->execute();
$films=$query->fetchAll();

}
debug($films);



debug($_GET);
 // else{
 //   die('Erreur 404');
 // }

 include('inc/header.php'); ?>
 <div class="wrap">

   <h1><?php echo $film['title']; ?>
   <p class="annee" name="annee"><?php echo$movie['year'];?></p>
   <p class="real" name="slug"><?php echo $movie['slug']; ?></p>
   <p class="real" name="genres"><?php echo $movie['genres']; ?></p>
   <p class="real" name="directors"><?php echo $movie['directors']; ?></p>
   <p class="real" name="popularity"><?php echo $movie['popularity']; ?></p>
   <p class="real" name="plot"><?php echo $movie['plot']; ?></p>
   <?php echo imageMovie($film);
   ?>

  <?php
  include('inc/footer.php');

  ?>
</div>
