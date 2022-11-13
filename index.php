<?php
	session_start();
	$p = $_GET['p'];
	if(isset($_GET['id_art']))  $id_art = $_GET['id_art']; else $id_art = '';
	if(isset($_GET['s']))  $s = $_GET['s']; else $s = 0;
		if(isset($_GET['page']))  $page = $_GET['page']; else $page = 0;
	$mysqli = new mysqli('localhost', 'root', '', 'site_web');
	if(mysqli_connect_errno()){
		printf("Соединение не установлено,", mysqli_connect_errno());
		exit();
	}

	include "main/head.php";
	include "main/header.php";


	if ($p == "main") include "header/articles.php";
	elseif ($p == "about") include "header/about.php";
	elseif ($p == "portfolio") include "header/portfolio.php";
	elseif ($p == "service") include "header/service.php";
	elseif ($p == "service&1") include "header/services/service1.php";
	elseif ($p == "service&2") include "header/services/service2.php";
	elseif ($p == "service&3") include "header/services/service3.php";
	elseif ($p == "contact") include "header/contact.php";
	elseif ($p == "article_add") include "service/article_add.php";
	elseif ($p == "article_edit") include "service/article_edit.php";
	elseif ($p == "article_del") include "service/article_del.php";
	else include "header/articles.php";


	include "main/aside.php";
	include "main/footer.php";

	$mysqli->close();
?>
