<?php
include('inc/combi.php');

if (isLogged()) {
  $id_user = $_SESSION['users']['id'];
  $movies = voirFilmFavoris($id_user);

}else {
  die('403');
}

include('inc/header.php');

foreach($movies as $movie) { ?>

  <h2><?php echo $movie['title']; ?></h2>
  <p class="info"><?php echo $movie['year'] . '-'. $movie['directors']; ?></p>
  <img src="posters/<?php echo $movie['id']; ?>.jpg" alt="<?php echo $movie['title']; ?>">
<form action="addmovinote.php" method="post">
  <select name="note">
      <?php for ($i=1; $i <=100 ; $i++) { ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
      <?php } ?>
  </select>

  <input type="hidden" name="movieid" value="<?php echo $movie['id']; ?>">
  <input type="submit" name="submitted" value="notez">
</form>

<?php } ?>
<?php
include('inc/footer.php');
?>
