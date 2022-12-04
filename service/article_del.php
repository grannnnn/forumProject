<div class=main-contaner>
  <div class="">
    <?php
    if (isset($_SESSION['id'])){
      $rez = $mysqli->query("SELECT * FROM article WHERE author = '$_SESSION[login]' AND id_ar= '$id_art'");
      if (!isset($rez)||$_SESSION['login']=='admin'){
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

    ?>
  </div>
