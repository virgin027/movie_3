<?php

////////fonction de $login page login.php
//isLogged
// @return bool

function isLogged() {
  if (!empty($_SESSION['user']['id'])) {
    if (is_numeric($_SESSION['user']['id'])) {
      if (!empty($_SESSION['user']['pseudo'])) {
        if (!empty($_SESSION['user']['email'])) {
          if (!empty($_SESSION['user']['roles'])) {
            if (!empty($_SESSION['user']['ip'])) {
              if ($_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
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


/////suite
///isAdmin

function isAdmin() {
  if (isLogged()) {
    if ($_SESSION['user']['roles'] == 'admin') {
      return true;
    }
  }
  return false;
}
