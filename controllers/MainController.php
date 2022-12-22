<?php

function indexAction(){
  include "../views/main/head.php";
  include "../views/main/header.php";
  loadModel('Articles', 'articles');
  loadModel('User', 'indexAside');
  loadModel('Footer', 'indexFooter');
}




 ?>
