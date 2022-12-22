<?php

function indexAction(){
  include "../views/main/head.php";
  include "../views/main/header.php";
  include "../views/header/service.html";
  loadModel('User', 'indexAside');
  loadModel('Footer', 'indexFooter');

}

 ?>
