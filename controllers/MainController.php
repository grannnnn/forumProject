<?php

function indexAction(){
  include "../views/main/head.php";
  include "../views/main/header.php";
  loadModel('Articles', 'articles');
  loadModel('Aside', 'indexAside');
  loadModel('Footer', 'indexFooter');
}

function logoutAction(){
  unset($_SESSION['id']);
  $_SESSION['login']="";
  unset($_SESSION['a_u']);
  echo "<script>self.location='/';</script>";
}

function registerAction(){
  include "../views/main/head.php";
  include "../views/main/header.php";

  loadModel('Articles', 'articles');

  if(isset($_POST['rlogin']))  $rl = clear($_POST['rlogin']); else $rl = '';
  if(isset($_POST['rpassword']))  $rp = clear($_POST['rpassword']); else $rp = '';
  if(isset($_POST['rpassword2']))  $rp2 = clear($_POST['rpassword2']); else $rp2 = '';
  if(isset($_POST['email']))  $re = clear($_POST['email']); else $re =  '';

  if ($rl == ''){
    $_SESSION['massage'] = ' ';
  }
  elseif ($rp == $rp2){
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
  else  $_SESSION['massage'] = 'Пароли не совпадают';


  

  loadModel('Aside', 'indexAside');
  loadModel('Footer', 'indexFooter');
 }



 ?>
