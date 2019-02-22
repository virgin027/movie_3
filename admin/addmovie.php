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
    $mpaa       = trim(strip_tags($_POST['mpaa']));
    $rating     = trim(strip_tags($_POST['rating']));
    $popularity = trim(strip_tags($_POST['popularity']));

    // validation des champs
    $error = valideText($error,$title,'title','titre', 1,100);
    $error = valideText($error,$genres,'genres','genres', 1,100,false);
    $error = valideText($error,$plot,'plot','plot', 1,100,false);
    $error = valideText($error,$directors,'directors','Réalisateur', 1,100,false);
    $error = valideText($error,$cast,'cast','cast', 1,100,false);
    $error = valideText($error,$writers,'writers','Auteur', 1,100,false);
    $error = valideText($error,$mpaa,'mpaa','mpaa', 1,100,false);
    if(!empty($year)) {
        if(!is_numeric($year) || strlen($year) != 4 ) {
            $error['year'] = "Veuillez entrer une année avec 4 chiffres.";
        }
    }
    if(!empty($runtime)) {
        if(!is_numeric($runtime) || strlen($runtime) > 3 ) {
            $error['runtime'] = "Veuillez entrer un temps en minutes et max 3 chiffres.";
        }
    }
    if(!empty($rating)) {
        if(!is_numeric($rating) || strlen($rating) > 3 ) {
            $error['rating'] = "Veuillez entrer une note entre 0 et 100.";
        }
    }
    if(!empty($_POST['popularity'])) {
        if(!is_numeric($popularity) || strlen($popularity) > 3 ) {
            $error['popularity'] = "Veuillez entrer une note du popularité entre 0 et 100.";
        }
    }
    // s'il n'y a pas d'erreurs
    if (count($error) == 0) {
        // creation du slug
        $slug = slugify($title) . '-' . $year;
        // preparation de l'insert into
        $sql = "INSERT INTO movies_full (slug,title,year,genres,plot,directors,cast,writers,runtime,mpaa,rating,popularity,created,poster_flag)
                VALUES (:slug, :title, :year, :genres, :plot, :directors, :cast, :writers, :runtime, :mpaa, :rating, :popularity, NOW(), '0')";
        // preparation de la requete
        $query = $pdo->prepare($sql);
        // protection injection SQL
        $query->bindValue(':slug',$slug, PDO::PARAM_STR);
        $query->bindValue(':title',$title, PDO::PARAM_STR);
        $query->bindValue(':year',$year, PDO::PARAM_INT);
        $query->bindValue(':genres',$genres, PDO::PARAM_STR);
        $query->bindValue(':plot',$plot, PDO::PARAM_STR);
        $query->bindValue(':directors',$directors, PDO::PARAM_STR);
        $query->bindValue(':cast',$cast, PDO::PARAM_STR);
        $query->bindValue(':writers',$writers, PDO::PARAM_STR);
        $query->bindValue(':runtime',$runtime, PDO::PARAM_INT);
        $query->bindValue(':mpaa',$mpaa, PDO::PARAM_STR);
        $query->bindValue(':rating',$rating, PDO::PARAM_INT);
        $query->bindValue(':popularity',$popularity, PDO::PARAM_INT);
        // execution de la requete
        $query->execute();
        // redirection
        header('location: listmovie.php');
    }
}

include('inc/header-back.php'); ?>
<section id="addmovie-page">
    <div class="wrap">
        <form class="" action="" method="post">
            <div class="form-group">
                <label for="title">Title: </label>
                <span class="error"><?php if(!empty($error['title'])) { echo $error['title']; } ?></span>
                <input type="text" class="form-control" id="title" name="title" value="<?php if(!empty($_POST['title'])){ echo $_POST['title']; } ?>">
            </div>
            <div class="form-group">
                <label for="year">Year: </label>
                <span class="error"><?php if(!empty($error['year'])) { echo $error['year']; } ?></span>
                <input type="text" class="form-control" id="year" name="year" value="<?php if(!empty($_POST['year'])){ echo $_POST['year']; } ?>">
            </div>
            <div class="form-group">
                <label for="genres">genres: </label>
                <span class="error"><?php if(!empty($error['genres'])) { echo $error['genres']; } ?></span>
                <input type="text" class="form-control" id="genres" name="genres" value="<?php if(!empty($_POST['genres'])){ echo $_POST['genres']; } ?>">
            </div>
            <div class="form-group">
                <label for="plot">plot: </label>
                <span class="error"><?php if(!empty($error['plot'])) { echo $error['plot']; } ?></span>
                <input type="text" class="form-control" id="plot" name="plot" value="<?php if(!empty($_POST['plot'])){ echo $_POST['plot']; } ?>">
            </div>
            <div class="form-group">
                <label for="directors">directors: </label>
                <span class="error"><?php if(!empty($error['directors'])) { echo $error['directors']; } ?></span>
                <input type="text" class="form-control" id="directors" name="directors" value="<?php if(!empty($_POST['directors'])){ echo $_POST['directors']; } ?>">
            </div>
            <div class="form-group">
                <label for="cast">cast: </label>
                <span class="error"><?php if(!empty($error['cast'])) { echo $error['cast']; } ?></span>
                <input type="text" class="form-control" id="cast" name="cast" value="<?php if(!empty($_POST['cast'])){ echo $_POST['cast']; } ?>">
            </div>
            <div class="form-group">
                <label for="writers">writers: </label>
                <span class="error"><?php if(!empty($error['writers'])) { echo $error['writers']; } ?></span>
                <input type="text" class="form-control" id="writers" name="writers" value="<?php if(!empty($_POST['writers'])){ echo $_POST['writers']; } ?>">
            </div>
            <div class="form-group">
                <label for="runtime">runtime: </label>
                <span class="error"><?php if(!empty($error['runtime'])) { echo $error['runtime']; } ?></span>
                <input type="text" class="form-control" id="runtime" name="runtime" value="<?php if(!empty($_POST['runtime'])){ echo $_POST['runtime']; } ?>">
            </div>
            <div class="form-group">
                <label for="mpaa">mpaa: </label>
                <span class="error"><?php if(!empty($error['mpaa'])) { echo $error['mpaa']; } ?></span>
                <input type="text" class="form-control" id="mpaa" name="mpaa" value="<?php if(!empty($_POST['mpaa'])){ echo $_POST['mpaa']; } ?>">
            </div>
            <div class="form-group">
                <label for="rating">rating: </label>
                <span class="error"><?php if(!empty($error['rating'])) { echo $error['rating']; } ?></span>
                <input type="text" class="form-control" id="rating" name="rating" value="<?php if(!empty($_POST['rating'])){ echo $_POST['rating']; } ?>">
            </div>
            <div class="form-group">
                <label for="popularity">popularity: </label>
                <span class="error"><?php if(!empty($error['popularity'])) { echo $error['popularity']; } ?></span>
                <input type="text" class="form-control" id="popularity" name="popularity" value="<?php if(!empty($_POST['popularity'])){ echo $_POST['popularity']; } ?>">
            </div>
            <input type="submit" class="btn btn-primary" name="submitted" value="VALIDER" />
        </form>
    </div> <!-- end wrap -->
</section>

<?php include('inc/footer-back.php');
