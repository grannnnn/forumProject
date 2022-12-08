<div class=main-contaner>
  <div class="contact all_box">
    <?php
    function getMouthName($m){
      $rusMonthNames = [
        1 => 'Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек',];
        return   $rusMonthNames[$m];
    }

    function getDateForBD($date){
      $datem = explode("-", $date);
      $datem[1] = getMouthName($datem[1]);
      return $datem;
    }

    if(isset($_POST['date']))  $date = $_POST['date']; else $date = '';
    if(isset($_POST['title']))  $title = $_POST['title']; else $title = '';
    if(isset($_POST['text']))  $text = $_POST['text']; else $text = '';
    $dateforDB = getDateForBD($_POST['date']);

    if($date == '' && $title == '' && $text == ''){
        $_SESSION['massage2'] = ' ';
    }
    else {
      $comm = rand(5, 50);
      $rez = $mysqli->query("INSERT INTO `article` (`id_ar`, `year`, `date`, `date_2`,
        `title`, `comment`, `text`, `author`) VALUES (NULL,'$dateforDB[0]', '$dateforDB[2]', '$dateforDB[1]',
        '$title', '$comm', '$text', '$_SESSION[login]'); ");
        $_SESSION['massage2'] = 'Статья добавлена';

    }

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
  </div>
