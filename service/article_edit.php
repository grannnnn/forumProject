<?php
function getNameMouth($m){
  $nMoth ='';
  $rusMonthNames = [
    1 => 'Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек',];

    foreach ($rusMonthNames  as $key => $value) {
      if($value==$m){
        return $key;
      }
    }
}

function getDateForSite($year, $date_2, $date){
  $o = array('1','2','3','4','5','6','7','8','9');
  $datem[0] = $year; $datem[1] = $date_2; $datem[2] = $date;
  $datem[1] = getNameMouth($datem[1]);
  if(in_array($datem[1], $o)&&in_array($datem[2], $o)){
    $date = implode("-0", $datem);
  }
  else if(in_array($datem[1], $o)){
    $date = $datem[0].'-0'.$datem[1].'-'.$datem[2];
  }
  elseif (in_array($datem[2], $o)) {
    $date = $datem[0].'-'.$datem[1].'-0'.$datem[2];
  }
  else {
    $date = implode("-", $datem);
  }
  return $date;
}

if (isset($_SESSION['id'])){
  $_SESSION['massage2'] = ' ';
  $rez = $mysqli->query("SELECT * FROM article WHERE author = '$_SESSION[login]' AND id_ar= '$id_art'");
  if(isset($rez)||$_SESSION['login']=='admin'){
    $row = mysqli_fetch_assoc($rez);
    $date = getDateForSite($row['year'], $row['date_2'], $row['date']);
    echo '
    <form id="article_edit" method="post">
            <p>Дата написания статьи:</p>
            <input id = "lp" type="date"  maxlength="25" size="auto" name="date" value ='.$date.'></p>
            <p>Заголовок:</p>
            <input id = "lp" type="text" maxlength="25" size="auto" name="title" value="'.$row['title'].'"></p>
            <p>Текст статьи:</p>
            <textarea  id = "lp" cols="70" rows="3">'.$row['text'].'</textarea>
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
