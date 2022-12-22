<?php

include '../models/ArticlesModel.php';

function openAction(){
  include "../views/main/head.php";
  include "../views/main/header.php";
  loadModel('Articles', 'openArticles');
  loadModel('User', 'indexAside');
  loadModel('Footer', 'indexFooter');
}

function deleteAction(){
  include "../views/main/head.php";
  include "../views/main/header.php";
  loadModel('Articles', 'deleteArticles');
  loadModel('User', 'indexAside');
  loadModel('Footer', 'indexFooter');
}

function editAction(){
  include "../views/main/head.php";
  include "../views/main/header.php";
  loadModel('Articles', 'editArticles');
  loadModel('User', 'indexAside');
  loadModel('Footer', 'indexFooter');
}

function addAction(){
  include "../views/main/head.php";
  include "../views/main/header.php";
  loadModel('Articles', 'addArticles');
  loadModel('User', 'indexAside');
  loadModel('Footer', 'indexFooter');
}
 ?>
