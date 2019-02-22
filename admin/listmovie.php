<?php
include('../vendor/autoload.php');
include('../inc/pdo.php');
include('../inc/fonctions.php');
include('../inc/request.php');
use JasonGrimes\Paginator;


// ICI METTRE EN PLACE PAGINATION


// on recupère les films dans la BDD
$sql = "SELECT * FROM movies_full
        ORDER BY id ASC";
$query = $pdo->prepare($sql);
$query->execute();
$allmovie = $query->fetchAll();



include('inc/header-back.php'); ?>

<!-- On affiche la liste de films "$allmovie" dans une table -->
<a href="addmovie.php">Add movie</a>
<table class="table">
  <thead>
    <tr>
      <th>id</th>
      <th>Title</th>
      <th>Year</th>
      <th>Rating</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($allmovie as $movie) { ?>
      <tr>
          <td><?php echo $movie['id'] ?></td>
          <td><?php echo $movie['title'] ?></td>
          <td><?php echo $movie['year'] ?></td>
          <td><?php echo $movie['rating'] ?></td>
          <td>
            <a href="editmovie.php?id=<?php echo $movie['id']; ?>">Edit</a>
            <a href="deletemovie.php?id=<?php echo $movie['id']; ?>">Delete</a>
          </td>
       </tr>
    <?php } ?>
  </tbody>
</table>



<?php include('inc/footer-back.php');
