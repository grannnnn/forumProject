<?php

$_SESSION['massage2'] = ' ';
unset($_POST['text1'], $_POST['date1'], $_POST['text1']);
if (isset($_SESSION['id'])){
  if(isset($_POST['date1']))  $date = $_POST['date']; else $date = '';
  if(isset($_POST['title1']))  $title = $_POST['title']; else $title = '';
  if(isset($_POST['text1']))  $text = $_POST['text']; else $text = '';

  if(isset($_POST['date1']) && isset($_POST['title1']) && isset($_POST['text1'])){
      $rez = $mysqli->query("UPDATE `article` SET `date` = '$date',`title` = '$title1',
        `text` = '$text1' WHERE `article`.`id_ar` = '$id_art'; ");
      $_SESSION['massage2'] = 'Статья отредактирована';
      unset($_POST['text1'], $_POST['date1'], $_POST['text1']);
  }



  $rez = $mysqli->query("SELECT * FROM article WHERE author = '$_SESSION[login]' AND id_ar= '$id_art'");
  if(isset($rez)||$_SESSION['login']=='admin'){
    $row = mysqli_fetch_assoc($rez);
    echo '
    <form id="article_edit" method="post">
            <p>Дата написания статьи:</p>
            <input id = "lp" type="date"  maxlength="25" size="auto" name="date1" value ='.$row['date'].'></p>
            <p>Заголовок:</p>
            <input id = "lp" type="text" maxlength="25" size="auto" name="title1" value="'.$row['title'].'"></p>
            <p>Текст статьи:</p>
            <textarea  id = "lp" cols="70" rows="3" name = "text1">'.$row['text'].'</textarea>
            <button id = "lpb" type="submit" form="article_edit">Добавить</button>
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

  //  echo '<p class = "massage">Статья отредактирована</p>';
  }
  else {
  //  echo '<p class = "massage">Отно в доступе</p>';
  }
  $rez->free();
}
else {
    echo '<p class = "massage">Отказано в доступе</p>';
}


 ?>
