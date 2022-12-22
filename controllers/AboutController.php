<?php
function indexAction(){
  include "../views/main/head.php";
  include "../views/main/header.php";
  include "../views/header/about.html";
  loadModel('User', 'indexAside');
  loadModel('Footer', 'indexFooter');
}

 ?>
