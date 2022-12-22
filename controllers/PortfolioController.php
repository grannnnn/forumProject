<?php
function indexAction(){
  include "../views/main/head.php";
  include "../views/main/header.php";
  loadModel('Portfolio', 'indexPortfolio');
  loadModel('User', 'indexAside');
  loadModel('Footer', 'indexFooter');
}



 ?>
