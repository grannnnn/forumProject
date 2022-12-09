<!--Центральная часть сайта-->
	<div class=main-contaner>
				<main class="all_box">

<?php

$rez = $mysqli->query("SELECT * FROM article WHERE  id_ar= '$id_art'");
$row = mysqli_fetch_assoc($rez);
echo '
        <p>'.$row['date'].'</p>
        <p>'.$row['title'].'</p>
        <p>'.$row['text'].'</p>';
 ?>
		</main>
