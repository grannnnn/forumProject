<?php

function getMouthName($m){
  $rusMonthNames = [
    '01' => 'Янв',  '02' => 'Фев',  '03' => 'Мар',  '04' => 'Апр',   '05' => 'Май',
    '06' => 'Июн',  '07' => 'Июл',  '08' => 'Авг',  '09' => 'Сен',
    '10' => 'Окт',  '11' => 'Ноя',  '12' => 'Дек'];
    return $rusMonthNames[$m];
}

function getDateForBD($date){
  $datem = explode("-", $date);
  $datem[1] = getMouthName($datem[1]);
  return $datem;
}

function loadPage($controllerName, $actionName){
  include_once PathPerfix.$controllerName.PathPostfix;  //подключаем контроллер
  $function = $actionName.'Action';  //формируем название функции
  $function();
}

function loadModel($modelName, $actionModelName){
  include_once PathPerfixM.$modelName.PathPostfixM;  //подключаем контроллер
  $function = $actionModelName.'Action';  //формируем название функции
  $function();
}


function Getpage($a_max, $a_u, $u_page){
  //рассчитываем начальную и конечную статью на странице
  $arr[]= array();
  $arr['a_max'] = $a_max;
  $arr['pa_max'] = ceil($a_max/$a_u);
  $arr['a_s'] = $u_page * $a_u;
  $arr['a_f'] = $a_u +  $u_page * $a_u;
  return  $arr;
}

function clear($value){
  $value = trim($value);
  $value = stripslashes($value);
  $value = strip_tags($value);
  $value = htmlspecialchars($value);

  return $value;
}



 ?>
