<?php
  unset($_SESSION['id']);
  $_SESSION['login']="";
  unset($_SESSION['a_u']);
  echo "<script>self.location='../index.php';</script>";
 ?>
