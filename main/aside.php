	<aside>
		<?php
			if ($p == "register") include "service/reg.php";
			elseif ($p == "logout") include "service/logout.php";

			if(isset($_POST['login']))  $l = $_POST['login']; else $l = '';
			if(isset($_POST['password']))  $p = $_POST['password']; else $p = '';

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
			}
			else {
				$_SESSION['massage'] = 'Неверный логин или пароль';
			}

			if(!isset($_SESSION['id']))
			echo '<div class = forma1>
				<form id="Autorize" method="POST" class = "formra">
					<input id = "lp" type="text" placeholder="Логин" maxlength="25" size="auto" name="login"></p>
					<input id = "lp" type="password" placeholder="Пароль" maxlength="25" size="auto" name="password"></p>
					<button id = "lpb" type="submit" form="Autorize">Войти</button>
					<p class = "massage">'.$_SESSION['massage'].'</p>
					<p >У вас нет аккаунта? - <a id = "reg" href="index.php?p=register">зарегистрируйтесь!</a></p>
				</form>
				</div>';

			else {
				if ($_SESSION['login'] == 'admin'){
					echo $_SESSION['login'];
					echo '<div class="user_info">
					<br>
						<a id = "lpb" href="index.php?p=logout">Выход</a>
					</div>
					<nav>
						<h1>Blogroll</h1>
						<ul class=links>
							<li><a href=#>A List of</a></li>
							<li><a href=#>Friendly Blogs</a></li>
							<li><a href=#>That have Exchanged</a></li>
							<li><a href=#>Links with Us</a></li>
						</ul>
					</nav>';
					}
				else {
					//подсчет статей и комментариев пользователя
					$rez = $mysqli->query("SELECT COUNT(*) as count FROM article WHERE author = '$_SESSION[login]'");
					$u_articles = $rez->fetch_object()->count;
					$rez->free();
					$rez = $mysqli->query("SELECT SUM(comment) as sum FROM article WHERE author = '$_SESSION[login]'");
					$u_comment = $rez->fetch_object()->sum;
					$rez->free();
					echo $_SESSION['login'];
					echo '<div class="user_info">
						<div class="u_articles">
							<p style="text-align: left; margin-left: 9px;" >Статьи:</p>
							<p>'.$u_articles.'</p>
						</div>
						<div class="u_articles">
							<p style="margin-top: 10px;margin-bottom: 20px;padding-bottom: 40px;">Комментарии:</p>
							<p>'.$u_comment.'</p>
						</div>
						<a id = "lpb" href="index.php?p=logout">Выход</a>
					</div>
					<nav>
						<h1>Blogroll</h1>
						<ul class=links>
							<li><a href=#>A List of</a></li>
							<li><a href=#>Friendly Blogs</a></li>
							<li><a href=#>That have Exchanged</a></li>
							<li><a href=#>Links with Us</a></li>
						</ul>
					</nav>';
				}
				}

		?>


	</aside>
</div>
