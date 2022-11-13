<div class=main-contaner>
  <div class="contact all_box">
    <?php

    if(isset($_POST['year']))  $year = $_POST['year']; else $year = '';
    if(isset($_POST['date']))  $date = $_POST['date']; else $date = '';
    if(isset($_POST['date_2']))  $date_2 = $_POST['date_2']; else $date_2 = '';
    if(isset($_POST['title']))  $title = $_POST['title']; else $title = '';
    if(isset($_POST['text']))  $text = $_POST['text']; else $text = '';

    if($year == '' && $date == '' && $date_2 == '' && $title == '' && $text == ''){
      $_SESSION['massage2'] = 'Статья добавлена';
    }
    else {
      $comm = rand(5, 50);
      $rez = $mysqli->query("INSERT INTO `article` (`id_ar`, `year`, `date`, `date_2`,
        `title`, `comment`, `text`, `author`) VALUES (NULL,'$year', '$date', '$date_2',
        '$title', '$comm', '$text', '$_SESSION[login]'); ");
      $_SESSION['massage2'] = ' ';
    }

    echo '
    <form id="article_add" method="post">
            <p>Год написания статьи:</p>
            <input id = "lp" type="text"  maxlength="25" size="auto" name="year"></p>
            <p>Число:</p>
            <input id = "lp" type="text"  maxlength="25" size="auto" name="date"></p>
            <p>Месяц (например, Апр):</p>
            <input id = "lp" type="text"  maxlength="25" size="auto" name="date_2"></p>
            <p>Заголовок:</p>
            <input id = "lp" type="text" maxlength="25" size="auto" name="title"></p>
            <p>Текст статьи:</p>
            <input id = "lp" type="text" maxlength="255" size="auto" name="text"></p>
            <button id = "lpb" type="submit" form="article_add">Добавить</button>
            <p class = "massage">'.$_SESSION['massage2'].'</p>
      </form>';
     ?>
  </div>
