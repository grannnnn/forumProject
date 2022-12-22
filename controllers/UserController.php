<?php
function logoutAction(){
  unset($_SESSION['id']);
  $_SESSION['login']="";
  unset($_SESSION['a_u']);
  echo "<script>self.location='/';</script>";
}

function registerAction(){
  include "../views/main/head.php";
  include "../views/main/header.php";
  loadModel('User', 'registerA');
  loadModel('Footer', 'indexFooter');
}

function indexAction(){
  include "../views/main/head.php";
  include "../views/main/header.php";

  loadModel('User', 'updateUserData');
  loadModel('User', 'indexAside');
  loadModel('Footer', 'indexFooter');
}
 ?>
