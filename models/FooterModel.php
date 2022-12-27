<?php


function indexFooterAction(){
  include '../config/db.php';
   $query = $mysqli->query("SELECT article.*, count(comment.id)  FROM `article` join comment on (article.id=comment.id_art) GROUP BY article.id ORDER BY count(comment.id) LIMIT 5");

  include '../config/db.php';
  include '../views/main/footer.php';
}


 ?>
