<?php
include('../vendor/autoload.php');
include('../inc/pdo.php');
include('../inc/fonctions.php');
include('../inc/request.php');
use JasonGrimes\Paginator;

// ICI METTRE EN PLACE PAGINATION
$itemsPerPage = 100;
$urlPattern = '?page=(:num)';
//$totalItems => request count le nombre total de film
$sql = "SELECT count(id) FROM movies_full";
$query = $pdo->prepare($sql);
$query->execute();
$totalItems = $query->fetchColumn();

$currentPage = 1;
$offset = 0;
if(!empty($_GET['page'])) {
  $currentPage = $_GET['page'];
  $offset = ($currentPage - 1) * $itemsPerPage;
}
// on recupère les films dans la BDD
$sql = "SELECT * FROM movies_full
        ORDER BY title ASC
        LIMIT $itemsPerPage OFFSET $offset";
$query = $pdo->prepare($sql);
$query->execute();
$allmovie = $query->fetchAll();

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);

include('inc/header-back.php'); ?>

<!-- On affiche la liste de films "$allmovie" dans une table -->
<a href="addmovie.php">Add movie</a>
<?php echo $paginator; ?>
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
<?php echo $paginator; ?>



<?php include('inc/footer-back.php');
