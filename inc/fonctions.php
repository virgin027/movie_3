<?php // fonctions.php
function debug($a)
{
  echo '<pre>';
  print_r($a);
  echo '<pre>';
}

function valideText($error,$value,$key,$text,$min = 2,$max = 100)
{
  if (!empty($value)){
      if(mb_strlen($value) < $min ) {
        $error[$key] = 'Votre '.$text.' est trop court. (minimum '.$min.' caractères)';
      } elseif(mb_strlen($value) > $max) {
        $error[$key] = 'Votre '.$text.' est trop long.';
      }
  } else {
    $error[$key] = 'Veuillez entrer votre '.$text;
  }
  return $error;
}

function valideEmail($error,$email,$key)
{
  if(!empty($email)) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error[$key] = 'Veuillez renseigner un email valide';
    }
  } else {
    $error[$key] = 'Veuillez renseigner un email';
  }
  return $error;
}

function abort404()
{
  header('Location: 404.php');
  die();
}

function abort403()
{
  header('Location: 403.php');
  die();
}


function viewOneArticle($article)
{ ?>
  <div>
    <h3><a href="single.php?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h3>
    <p>Par <?php echo $article['auteur']; ?> le <?php echo date('d-m-Y', strtotime($article['created_at'])); ?></p>
  </div>
<?php }

function newName($name){
	if ($name != "") {
	return date('Y-m-d').'_'.sha1($name).'_'.$name;
	} else {
		return false;
	}
}

function generateRandomString($lengh){
	$token = bin2hex(random_bytes($lengh));
	return $token;
}

function isLogged(){
    if(!empty($_SESSION['user']['id'])) {
        if(is_numeric($_SESSION['user']['id'])) {
            if(!empty($_SESSION['user']['pseudo'])) {
                if(!empty($_SESSION['user']['email'])) {
                    if(!empty($_SESSION['user']['role'])) {
                        if(!empty($_SESSION['user']['ip'])) {
                            if($_SESSION['user']['ip']  == $_SERVER['REMOTE_ADDR']) {
                                return true;
                            }
                        }
                    }
                }
            }
        }
    }
    return false;
}

function isAdmin() {
    if(isLogged()) {
        if($_SESSION['user']['role'] == 'admin') {
            return true;
        }
    }
    return false;
}
