	<aside>
		<?php

			if(!isset($_SESSION['id'])){
			echo '<div id="autorizeBox"class = forma1>
			 <form id="Autorize" method="POST" class = "formra">
				 <input id = "lp" type="text" placeholder="Логин" maxlength="25" size="auto" name="login"></p>
				 <input id = "lp" type="password" placeholder="Пароль" maxlength="25" size="auto" name="password"></p>
				 <button id = "lpb" type="submit" form="Autorize">Войти</button>
				 <p class = "massage">'.$_SESSION['massage'].'</p>
				 <p >У вас нет аккаунта? - <div id = "reg" onclick="showRegisterBox();">зарегистрируйтесь!</div></p>
			 </form>
			 </div>';
			 echo '<div id = "registerBox" class = "forma2 asside">
		     <form  class = "formra" id="Register" method="POST">
		       <p>Регистрация</p>
		       <input id = "lp" type="text" placeholder="Логин" maxlength="25" size="auto" name="rlogin"></p>
		         <input id = "lp" type="text" placeholder="Email" maxlength="2" size="auto" name="email"></p>
		       <input id = "lp" type="password" placeholder="Пароль" maxlength="25" size="auto" name="rpassword"></p>
		       <input id = "lp" type="password" placeholder="Повторите пароль" maxlength="25" size="auto" name="rpassword2"></p>
		       <button id = "lpb" type="submit" form="Register">Зарегистрироваться</button>
		       <p class = "massage">'.$_SESSION['massage'].'</p>
		       <p >У вас есть аккаунт? - <a id = "reg" href="/main/">авторизируйтесь!</a></p>
		     </form>
		   </div>';
		 }
			else {
			 if ($_SESSION['login'] == 'admin'){
				 echo '<p>'.$_SESSION['login'].'</p>';
				 echo '<div class="user_info">
				 <br>
					 <a id = "lpb" href="/main/logout/">Выход</a>
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
				 $user_info = userAside();
				 echo '<p>'.$_SESSION['login'].'</p>';
				 echo '<div class="user_info">
					 <div class="u_articles">
						 <p style="text-align: left; margin-left: 9px;" >Статьи:</p>
						 <p>'.$user_info['u_articles'].'</p>
					 </div>
					 <div class="u_articles">
						 <p style="margin-top: 10px;margin-bottom: 20px;padding-bottom: 40px;">Комментарии:</p>
						 <p>'.$user_info['u_comment'].'</p>
					 </div>
					 <a id = "lpb" href="/main/logout/">Выход</a>
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
