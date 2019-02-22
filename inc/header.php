<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="utf-8" />
   <title>Exercixe formulaires</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
   <link href="asset/css/style.css" rel="stylesheet">
</head>

<body>

    <header>
      <?php //print_r($_SESSION) ?>
       <div class="wrap">
           <h1><a class="logo" href="index.php">MOVIE 3</a></h1>
           <div class="clear"></div>
           <nav>
               <ul>
                   <li><a href="index.php">Accueil</a></li>
                   <li><a href="contact.php">Contact</a></li>
                  <?php if(!isLogged()) { ?>
                       <li><a href="inscription.php">Inscription</a></li>

                       <li><a href="login.php">Connexion</a></li>
                    <?php }else{ ?>
                      <li><a href="profil.php">Profil</a></li>
                      <li style="color:white;">bonjour <?php echo $_SESSION['users']['pseudo']; ?></li>
                      <li><a href="deconnexion.php">Deconnexion</a></li>
                      <li><a href="movietosee.php">Film à voir</a></li>
                      <?php if(isAdmin()) { ?>
                        <li><a href="admin/index.php">Back-office</a></li>
                      <?php } ?>
                  <?php } ?>

               </ul>
           </nav>
       </div>
    </header>
