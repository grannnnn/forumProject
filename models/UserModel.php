<?php

function indexAsideAction(){
  include '../config/db.php';

  $l = isset($_POST['login']) ? clear($_POST['login']) : '';
  $p = isset($_POST['password']) ? clear($_POST['password']) : '';

      $rez = $mysqli->query("SELECT * FROM user WHERE (login = '$l' or email ='$l')  AND password = '$p'");
      $rez =createRsArray($rez);
      if($l == '' && $p == ''){
       $_SESSION['massage'] = ' ';
      }
            elseif(isset($rez[0])){
             $_SESSION['id'] = $rez[0]['id_user'];
             $_SESSION['email'] = $rez[0]['email'];
             $_SESSION['login'] = $rez[0]['login'];
             $_SESSION['a_u'] = $rez[0]['articles'];
             echo "<script>self.location='/';</script>";
            }
      else {
       $_SESSION['massage'] = 'Неверный логин или пароль';

      }

include '../views/main/aside.php';
}

function userAside(){
  include '../config/db.php';
  $user_info[] = array();
  //подсчет статей и комментариев пользователя
  $rez = $mysqli->query("SELECT COUNT(*) as count FROM article WHERE author = '$_SESSION[login]'");
  $user_info['u_articles'] = $rez->fetch_object()->count;
  $rez->free();
  $rez = $mysqli->query("SELECT SUM(comment) as sum FROM article WHERE author = '$_SESSION[login]'");
  $user_info['u_comment'] = $rez->fetch_object()->sum;
  $rez->free();
    return $user_info;
  }

function registerAAction(){
 if(isset($_POST['rlogin']))  $rl = clear($_POST['rlogin']); else $rl = '';
  if(isset($_POST['rpassword']))  $rp = clear($_POST['rpassword']); else $rp = '';
  if(isset($_POST['rpassword2']))  $rp2 = clear($_POST['rpassword2']); else $rp2 = '';
  if(isset($_POST['email']))  $re = clear($_POST['email']); else $re =  '';

  if ($rl == ''){
    $_SESSION['massage'] = ' ';
  }
  elseif ($rp == $rp2&&($rp != '')){
            $rez = $mysqli->query("SELECT * FROM user WHERE login = '$rl'");
            if(mysqli_num_rows($rez))  {
                $_SESSION['massage'] = 'Логин уже существует';
              }
            else {
              $rez = $mysqli->query("INSERT INTO `user` ( `login`, `password`, `articles`, `email`)
                      VALUES ( '$rl', '$rp', '5', '$re');");
              $_SESSION['massage'] = 'Регистрация прошла успешно!';
            }

  }
  else{
    $_SESSION['massage'] = 'Пароли не совпадают';
  }
  include '../views/main/register.html';
}

function updateUserDataAction(){
  include '../config/db.php';


  $_SESSION['massage'] = 'Введите пароль';
  if(!isset( $_SESSION['id'])){
    echo "<script>self.location='/';</script>";
  }
  $login = isset($_POST['ulogin']) ? $_POST['ulogin'] : $_SESSION['login'];
  $curPwd =isset($_POST['curPwd']) ? $_POST['curPwd'] : '1';
  $pwd1 = isset($_POST['upwd1']) ? $_POST['upwd1'] : '';
  $pwd2 = isset($_POST['upwd2']) ? $_POST['upwd2'] : '';
  $u_art = isset($_POST['uu_art']) ? $_POST['uu_art'] : $_SESSION['a_u'];
  $email = $_SESSION['email'];
$_SESSION['massage'] = '';
  if ($curPwd == ' '){
    $_SESSION['massage'] = '';
  }
  if ($curPwd == '1'){
    $_SESSION['massageU'] = 'Введите пароль';
  }
  else {
    $rez = $mysqli->query("SELECT * FROM user WHERE login = '$login'");
    if(mysqli_num_rows($rez)&&$login!='')  {
        $_SESSION['massage'] = 'Логин уже существует';
      }
      $rez->free();

    $newPwd = null;
    if ($pwd1 && ($pwd1 == $pwd2)) { //если есть первый пароль и первый равен второму
      $newPwd = $pwd1;
    }

    $rez = $mysqli->query("SELECT password FROM user WHERE email = '$email'");
    $pass=$rez->fetch_object()->password;

    if($pass != $curPwd)  {
        $rez->free();
        $_SESSION['massage'] = 'Неверный пароль';
    }
    else {
      $sql = "UPDATE user SET ";

      if ($newPwd) {
        $sql .= "password = '{$newPwd}',";
      }

      $sql .= "  login = '$login', articles = '$u_art'  WHERE email = '$email' and password ='$curPwd' LIMIT 1";

      $rs = $mysqli->query($sql);
      $_SESSION['login'] = $login;
      $_SESSION['a_u'] = $u_art;
      $_SESSION['massage'] = 'Данные сохранены';
    }
  }
include '../views/header/user.php';

}



 ?>
