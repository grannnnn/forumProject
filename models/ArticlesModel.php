<?php

function ArticlesAction(){
  include '../config/db.php';
  //считаем сначала кол-во статей в базе
  $rez = $mysqli->query('SELECT COUNT(*) as art_count FROM article');
  $a_max = $rez->fetch_object()->art_count;
  $rez->free();

  //кол-во статей на главном экране
  $a_u = isset($_SESSION['id']) ? $_SESSION['a_u'] : 5;
  $u_page = isset($_GET["s"]) ? $_GET["s"] : 0;

  $GetPg = Getpage($a_max, $a_u, $u_page);

  //достаем статьи из базы
  $query = $mysqli->query("SELECT * FROM article LIMIT $GetPg[a_s],$GetPg[a_f]");
  include '../views/header/articles.php';
}

function openArticlesAction(){
  include '../config/db.php';
  	$id_art = isset($_GET['id_art']) ? $_GET['id_art'] : '';
    echo'  <!--Центральная часть сайта-->
  	<div class=main-contaner>
  				<main class="all_box">
          ';
  $rez = $mysqli->query("SELECT * FROM article WHERE  id_ar= '$id_art'");
  $row = mysqli_fetch_assoc($rez);
  echo '
          <p>'.$row['date'].'</p>
          <p>'.$row['title'].'</p>
          <p>'.$row['text'].'</p>';

  	echo	"</main>";

}

function editArticlesAction(){
  include '../config/db.php';
  $id_art = isset($_GET['id_art']) ? $_GET['id_art'] : '';
  $_SESSION['massage2'] = ' ';

  if (isset($_SESSION['id'])){
    if(isset($_POST['date1']))  $date = $_POST['date1']; else $date = '';
    if(isset($_POST['title1']))  $title = $_POST['title1']; else $title = '';
    if(isset($_POST['text1']))  $text = $_POST['text1']; else $text = '';

    if(isset($_POST['date1']) && isset($_POST['title1']) && isset($_POST['text1'])){
        $rez = $mysqli->query("UPDATE `article` SET `date` = '$date',`title` = '$title',
          `text` = '$text' WHERE `article`.`id_ar` = '$id_art'; ");
        $_SESSION['massage2'] = 'Статья отредактирована';
        unset($_POST['text1'], $_POST['date1'], $_POST['text1']);
    }

    $rez = $mysqli->query("SELECT * FROM article WHERE author = '$_SESSION[login]' AND id_ar= '$id_art'");
    if(isset($rez)||$_SESSION['login']=='admin'){
      $row = mysqli_fetch_assoc($rez);
      echo'  <!--Центральная часть сайта-->
    	<div class=main-contaner>
    				<main class="all_box">
            ';
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
    	echo	"</main>";
    }
    else {
      $_SESSION['massage2'] = 'Отказано в доступе';
    }
    $rez->free();
  }
}

function deleteArticlesAction(){
  include '../config/db.php';
  $id_art = isset($_GET['id_art']) ? $_GET['id_art'] : '';
  if (isset($_SESSION['id'])){
    $rez = $mysqli->query("SELECT * FROM article WHERE author = '$_SESSION[login]' AND id_ar= '$id_art'");
    if (isset($rez)||$_SESSION['login']=='admin'){
      $mysqli->query("DELETE FROM article WHERE id_ar= $id_art ");
      echo '<p class = "massage">Статья удалена</p>';
    }
    else {
      echo '<p class = "massage">Отказано в доступе</p>';
    }
    $rez->free();
  }
  else {
      echo '<p class = "massage">Отказано в доступе</p>';
  }
}

function addArticlesAction(){
  include '../config/db.php';
  $date = isset($_POST['date']) ? $_GET['date'] : '';
  $title = isset($_POST['title']) ? $_GET['title'] : '';
  $text = isset($_POST['text']) ? $_GET['text'] : '';

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
  }
  echo'  <!--Центральная часть сайта-->
  <div class=main-contaner>
        <main class="all_box">
        ';
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
  echo	"</main>";
}


 ?>
