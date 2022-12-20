<?php
	//error_reporting(0);
	session_start();
	include '../config/config.php';          //инициализация настроек
	include '../library/mainFunctions.php';  // основные функции

	//определяем с каким контроллером будем работать
	$controllerName = isset($_GET['p']) ? ucfirst($_GET['p']) : 'Main';
	echo $controllerName;
	// определяем с какой функцией будем работать
	$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';
	echo $actionName;
	//загружаем нужную страницу
	loadPage($controllerName, $actionName);



?>
