<?php include('inc/combi.php') ?>

<?php

if (!empty($_POST['note'])) {
   $note= trim(strip_tags($_POST['note']));
    $sql = "SELECT note FROM user_note ";
    $query= $pdo->prepare($sql);
    $query->bindValue(':note',$note, PDO::PARAM_STR);
    $query->execute();
    $notes = $query->fetchAll();
    //Affichez les étoiles
    // debug ($notes);
    // die();
    if ($note  <= 20) { echo "";}
    elseif ($note  <= 40) { echo "donner40";}
    elseif ($note  <= 60) { echo "donner60";}
    elseif ($note  <= 80) { echo "donner80";}
    elseif ($note  <= 100) { echo "donner100";}
}
else {
    echo "donner 0";
}


?>

<?php include('inc/header.php'); ?>

  <div class="star">

  <span><?php if(!empty($note['note'])) { ?> <i class="far fa-star"><?php } ?> </span>

  </div>

<?php  include('inc/footer.php'); ?>
