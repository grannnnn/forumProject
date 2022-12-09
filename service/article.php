<?php

$rez = $mysqli->query('SELECT COUNT(*) as art_count FROM article ');
echo '
<form id="article_add" method="post">
        <p>Дата написания статьи:</p>
        <input id = "lp" type="date"  maxlength="25" size="auto" name="date"></p>
        <p>Заголовок:</p>
        <input id = "lp" type="text" maxlength="25" size="auto" name="title"></p>
        <p>Текст статьи:</p>
        <input id = "lp" type="text" maxlength="255" size="auto" name="text"></p>
        <button id = "lpb" type="submit" form="article_add">Добавить</button>
        <p class = "massage">'.$_SESSION['massage2'].'</p>
  </form>';
 ?>
