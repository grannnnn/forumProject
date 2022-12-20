<?php

function indexAsideAction(){
  include '../config/db.php';

  $l = isset($_POST['login']) ? clear($_POST['login']) : '';
  $p = isset($_POST['password']) ? clear($_POST['password']) : '';

  echo $l;
  $rez = $mysqli->query("SELECT * FROM user WHERE login = '$l' AND password = '$p'");

  if($l == '' && $p == ''){
   $_SESSION['massage'] = ' ';
  }
  elseif(isset($rez)){
   $user = mysqli_fetch_assoc($rez);
   $rez->free();
   $_SESSION['id'] = $user['id_user'];
   $_SESSION['login'] = $user['login'];
   $_SESSION['a_u'] = $user['articles'];
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
 ?>
