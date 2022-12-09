<div class=main-contaner>
  <div class="contact all_box">
    <?php
    function getMouthName($m){
      $rusMonthNames = [
        '01' => 'Янв',  '02' => 'Фев',  '03' => 'Мар',  '04' => 'Апр',   '05' => 'Май',
        '06' => 'Июн',  '07' => 'Июл',  '08' => 'Авг',  '09' => 'Сен',
        '10' => 'Окт',  '11' => 'Ноя',  '12' => 'Дек'];
        return $rusMonthNames[$m];
    }

    function getDateForBD($date){
      echo $date;
      $datem = explode("-", $date);
      $datem[1] = getMouthName($datem[1]);
      return $datem;
    }
  //  unset($_POST['text'], $_POST['date'], $_POST['text']);

    if(isset($_POST['date']))  $date = $_POST['date']; else $date = '';
    if(isset($_POST['title']))  $title = $_POST['title']; else $title = '';
    if(isset($_POST['text']))  $text = $_POST['text']; else $text = '';


    if($date == '' && $title == '' && $text == ''){
        $_SESSION['massage2'] = ' ';
    }
    else {
      $dateforDB = getDateForBD($date);
      echo $_POST['date'];
      $comm = rand(5, 50);
      $rez = $mysqli->query("INSERT INTO `article` (`id_ar`, `date`,
        `title`, `comment`, `text`, `author`) VALUES (NULL,'$date',
        '$title', '$comm', '$text', '$_SESSION[login]'); ");
      $_SESSION['massage2'] = 'Статья добавлена';
    //  unset($_POST['text1'], $_POST['date1'], $_POST['text1']);
    }

    echo '
    <form id="article_add" method="post">
            <p>Дата написания статьи:</p>
            <input id = "lp" type="date"  maxlength="25" size="auto" name="date"></p>
            <p>Заголовок:</p>
            <input id = "lp" type="text" maxlength="25" size="auto" name="title"></p>
            <p>Текст статьи:</p>
            <textarea  id = "lp" cols="70" rows="3" name="text"></textarea>
            <button id = "lpb" type="submit" form="article_add">Добавить</button>
            <p class = "massage">'.$_SESSION['massage2'].'</p>
      </form>
<script>
		var tx = document.getElementsByTagName("textarea");
		for (var i = 0; i < tx.length; i++) {
		tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;");
		tx[i].addEventListener("input", OnInput, false);
		}

		function OnInput() {
		this.style.height = "auto";
		this.style.height = (this.scrollHeight) + "px";//console.log(this.scrollHeight);
		}
	</script>';
     ?>
  </div>
