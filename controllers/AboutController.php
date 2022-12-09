<?php
function indexAction(){
  include "../views/main/head.php";
  include "../views/main/header.php";
  include "../views/header/about.php";
  loadModel('Aside', 'indexAside');
  loadModel('Footer', 'indexFooter');
}

 ?>
