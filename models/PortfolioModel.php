<?php


function indexPortfolioAction() {
    include '../config/db.php';
    $u_page = isset($_GET["page"]) ? clear($_GET["page"]) : 0;

    //считаем сначала кол-во статей в базе, которые написал пользователь
    $rez = $mysqli->query("SELECT COUNT(*) as art_count FROM article WHERE author = '$_SESSION[login]'");
    $u_a_max = $rez->fetch_object()->art_count;
    $rez->free();

    //кол-во статей на главном экране, которые написал пользователь
    $u_a_u = isset($_SESSION['id']) ? $_SESSION['a_u'] : 5;

    //рассчитываем кол-во страниц
    $GetPg = Getpage($u_a_max, $u_a_u, $u_page);
$query = $mysqli->query("SELECT * FROM article WHERE author = '$_SESSION[login]' LIMIT $u_page,$u_a_u");
    include '../views/header/portfolio.php';
}
 ?>
