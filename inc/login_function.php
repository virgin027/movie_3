<?php

////////fonction de $login page login.php
//isLogged
// @return bool

function isLogged() {
  if (!empty($_SESSION['users']['id'])) {
    if (is_numeric($_SESSION['users']['id'])) {
      if (!empty($_SESSION['users']['pseudo'])) {
        if (!empty($_SESSION['users']['email'])) {
          if (!empty($_SESSION['users']['roles'])) {
            if (!empty($_SESSION['users']['ip'])) {
              if ($_SESSION['users']['ip'] == $_SERVER['REMOTE_ADDR']) {
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
    if ($_SESSION['users']['roles'] == 'admin') {
      return true;
    }
  }
  return false;
}
