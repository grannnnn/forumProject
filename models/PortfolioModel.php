<?php


function indexPortfolioAction() {
    include '../config/db.php';

    $u_page = isset($_GET["page"]) ? clear($_GET["page"]) : 0;

    //считаем сначала кол-во статей в базе, которые написал пользователь
    $rez = $mysqli->query("SELECT COUNT(*) as art_count FROM article WHERE id_user = '$_SESSION[id]'");
    $u_a_max = $rez->fetch_object()->art_count;
    $rez->free();

    //кол-во статей на главном экране, которые написал пользователь
    $u_a_u = isset($_SESSION['id']) ? $_SESSION['a_u'] : 5;

    //рассчитываем кол-во страниц
    $GetPg = Getpage($u_a_max, $u_a_u, $u_page);
    $query = $mysqli->query("SELECT article.*, user.login FROM article JOIN user on (user.id=article.id_user) WHERE id_user = '$_SESSION[id]' ORDER BY article.id LIMIT $GetPg[a_s],$GetPg[a_f] ");
    $qquery = $mysqli->query("SELECT article.id, count(comment.id) FROM `article` join comment on (article.id=comment.id_art) GROUP BY article.id ORDER BY article.id");
    $c = createRsArray($qquery);
    include '../views/header/portfolio.php';
}
function commentForArticle($c, $id){
  include '../config/db.php';
  $countComm = 0;
  foreach ($c as $key) {
      if ($key['id']==$id) {
        return $key['count(comment.id)'];
    }
  }
  return $countComm;
}
 ?>
