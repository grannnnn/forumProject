<?php
	$mysqli = new mysqli('localhost', 'root', '', 'site_web');

if(mysqli_connect_errno()){
  printf("Соединение не установлено,", mysqli_connect_errno());
  exit();
}
 ?>
