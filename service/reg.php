<?php
  if(isset($_POST['rlogin']))  $rl = $_POST['rlogin']; else $rl = '';
  if(isset($_POST['rpassword']))  $rp = $_POST['rpassword']; else $rp = '';
  if(isset($_POST['rpassword2']))  $rp2 = $_POST['rpassword2']; else $rp2 = '';
  if(isset($_POST['artcl']))  $ra = $_POST['artcl']; else $ra = 5;

  if ($rl == ''){
    $_SESSION['massage'] = ' ';
  }
  elseif ($rp == $rp2){
      $rez = $mysqli->query("SELECT * FROM user WHERE login = '$rl'");
      if(mysqli_num_rows($rez))  {
          $_SESSION['massage'] = 'Логин уже существует';
        }
      else {
        $rez = $mysqli->query("INSERT INTO `user` (`id_user`, `login`, `password`, `articles`)
        				VALUES (NULL, '$rl', '$rp', '$ra');");
        $_SESSION['massage'] = 'Регистрация прошла успешно!';
      }

  }
  else  $_SESSION['massage'] = 'Пароли не совпадают';


  echo '<div class = forma2>
    <form  class = "formra" id="Register" method="POST">
      <p>Регистрация</p>
      <input id = "lp" type="text" placeholder="Логин" maxlength="25" size="auto" name="rlogin"></p>
        <input id = "lp" type="text" placeholder="Статьи на странице" maxlength="2" size="auto" name="artcl"></p>
      <input id = "lp" type="password" placeholder="Пароль" maxlength="25" size="auto" name="rpassword"></p>
      <input id = "lp" type="password" placeholder="Повторите пароль" maxlength="25" size="auto" name="rpassword2"></p>
      <button id = "lpb" type="submit" form="Register">Зарегистрироваться</button>
      <p class = "massage">'.$_SESSION['massage'].'</p>
      <p >У вас есть аккаунт? - <a id = "reg" href="index.php?p=main">авторизируйтесь!</a></p>
    </form>
  </div>';
 ?>
