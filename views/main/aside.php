	<aside>
		<?php

			if(!isset($_SESSION['id'])){
				 echo '<div id="autorizeBox"class = forma1>
 				 <form id="Autorize" method="POST" class = "formra">
 					 <input id = "lp" type="text" placeholder="Логин или Email" maxlength="25" size="auto" name="login"></p>
 					 <input id = "lp" type="password" placeholder="Пароль" maxlength="25" size="auto" name="password"></p>
 					 <button id = "lpb" type="submit" form="Autorize">Войти</button>
 					 <p class = "massage">'.$_SESSION['massage'].'</p>
 					 <p >У вас нет аккаунта? - <a id = "reg" href="/user/register/">зарегистрируйтесь!</a></p>
 				 </form>
 				 </div>';
		 }
			else {
			 if ($_SESSION['login'] == 'admin'){
				 echo '<p>ADMINKA</p>';
				 echo '<div class="user_info">
				 <br>
					 <a id = "lpb" href="/user/logout/">Выход</a>
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
				 $user_name = isset($_SESSION['login']) ? $_SESSION['login'] : $_SESSION['email'];
				 echo '<div class="user_info">
				 <a href="/user/">'.$user_name.'</a>
					 <div class="u_articles">

						 <p style="text-align: left; margin-left: 9px;" >Статьи:</p>
						 <p>'.$user_info['u_articles'].'</p>
					 </div>
					 <div class="u_articles">
						 <p style="margin-top: 10px;margin-bottom: 20px;padding-bottom: 40px;">Комментарии:</p>
						 <p>'.$user_info['u_comment'].'</p>
					 </div>
					 <a id = "lpb" href="/user/logout/">Выход</a>
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
