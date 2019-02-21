<?php
include('../inc/pdo.php');
include('../inc/fonctions.php');
include('../inc/request.php');

$error = array();
// si le formulaire n'est pas vide
if(!empty($_POST['submitted'])) {
    // faille xss
    $title      = trim(strip_tags($_POST['title']));
    $year       = trim(strip_tags($_POST['year']));
    $genres     = trim(strip_tags($_POST['genres']));
    $plot       = trim(strip_tags($_POST['plot']));
    $directors  = trim(strip_tags($_POST['directors']));
    $cast       = trim(strip_tags($_POST['cast']));
    $writers    = trim(strip_tags($_POST['writers']));
    $runtime    = trim(strip_tags($_POST['runtime']));
    $pmaa       = trim(strip_tags($_POST['mpaa']));
    $rating     = trim(strip_tags($_POST['rating']));
    $popularity = trim(strip_tags($_POST['polularity']));









}


include('inc/header-back.php'); ?>
<section id="addmovie-page">
    <div class="wrap">
        <form class="" action="" method="post">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" class="form-control" id="year" name="year">
            </div>
            <div class="form-group">
                <label for="genres">genres</label>
                <input type="text" class="form-control" id="genres" name="genres">
            </div>
            <div class="form-group">
                <label for="plot">plot</label>
                <input type="text" class="form-control" id="plot" name="plot">
            </div>
            <div class="form-group">
                <label for="directors">directors</label>
                <input type="text" class="form-control" id="directors" name="directors">
            </div>
            <div class="form-group">
                <label for="cast">cast</label>
                <input type="text" class="form-control" id="cast" name="cast">
            </div>
            <div class="form-group">
                <label for="writers">writers</label>
                <input type="text" class="form-control" id="writers" name="writers">
            </div>
            <div class="form-group">
                <label for="runtime">runtime</label>
                <input type="text" class="form-control" id="runtime" name="runtime">
            </div>
            <div class="form-group">
                <label for="mpaa">mpaa</label>
                <input type="text" class="form-control" id="mpaa" name="mpaa">
            </div>
            <div class="form-group">
                <label for="rating">rating</label>
                <input type="text" class="form-control" id="rating" name="rating">
            </div>
            <div class="form-group">
                <label for="popularity">popularity</label>
                <input type="text" class="form-control" id="popularity" name="popularity">
            </div>
            <input type="submit" class="btn btn-primary" name="submitted" value="VALIDER" />
        </form>
    </div> <!-- end wrap -->
</section>

<?php include('inc/footer-back.php');
