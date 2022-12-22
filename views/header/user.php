<div class=main-contaner>
<div class="about all_box">
    <?php
    echo '
    <form id="user_edit"  method="post">
    <table>
    <tr>
      <td>Email:</td>
      <td>'.$_SESSION['email'].'</td><br>
    </tr>
    <tr>
      <td>Login:</td>
      <td><input  id = "lp" type="text" name="login" value="'.$_SESSION['login'].'"><br></td>
    </tr>
    <tr>
      <td>Колличесто статей на экране:</td>
      <td><input id = "lp" type="text" name="uu_art" value="'.$_SESSION['a_u'].'"></td>
    </tr>
    <tr>
      <td>Новый пароль</td>
      <td><input id = "lp" type="password"  name="upwd1" value=""></td>
    </tr>
    <tr>
      <td>Повтор пароля</td>
      <td><input id = "lp" type="password"  name="upwd2" value=""></td>
    </tr>
    <tr>
      <td>Для того чтобы сохранить данные введите текущий пароль</td>
      <td><input id = "lp" type="password" name="curPwd" value=""></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <button id = "lpb" type="submit" form="user_edit">Сохранить</button>
    </tr>
      </table>
      <p class = "massage">'.$_SESSION['massage'].'</p>
      </form>';
     ?>
</div>
