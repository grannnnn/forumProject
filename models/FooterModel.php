<?php

function PopPostFooter(){
  include '../config/db.php';
  $query = $mysqli->query("SELECT * FROM `article` order by `comment` limit 5");
  return $query;
}

function indexFooterAction(){
  include '../config/db.php';
  include '../views/main/footer.php';
}


 ?>
