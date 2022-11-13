<!--Центральная часть сайта-->
	<div class=main-contaner>
		<main id=content>
			<?php
			//считаем сначала кол-во статей в базе
			$rez = $mysqli->query('SELECT COUNT(*) as art_count FROM article');
			$a_max = $rez->fetch_object()->art_count;
			$rez->free();

			//кол-во статей на главном экране
			if (!isset($_SESSION['id'])) $a_u = 5; else $a_u = $_SESSION['a_u'];

			//рассчитываем кол-во страниц
			$pa_max = ceil($a_max/$a_u);
			$a_s = 1 + $page * $a_u;
			$a_f = $a_u +  $page;

			if(isset($_GET["s"])) $u_page = $_GET["s"]; else $u_page=0;

			//достаем статьи из базы
			$query = $mysqli->query("SELECT * FROM article LIMIT $a_s,$a_f");
			//if (!isset($_SESSION['id'])){
				for ($i = $a_s; $i <= $a_f; $i++){
					$row = mysqli_fetch_assoc($query);
					if (isset($_SESSION['id'])&&$_SESSION['login'] = "admin"){
					echo
						'<article>
              <header class="article-head">
                <div class = "time">
                  <div class = year>'.$row['year'].'</div>
                  <div class = date>'.$row['date'].'<span>'.$row['date_2'].'</span></div>
                </div>
                 <h2>'.$row['title'].'</h2>
                 <button type=button class="article-button" onclick="delArticle(1)">'.$row['comment'].'</button>
              </header>
              <p>'.$row['text'].'</p>
              <footer class="article-foot_u">
							<p style = "color:black;" class="author-article">Автор: '.$row['author'].'</p>
                <button type=button class="article-open-button article-u-button" onclick="openArticle(1)">Открыть статью</button>
                 <a class="article-open-button article-u-button" href="index.php?p=article_del&id_art='.$row['id_ar'].'">Удалить</a>
                 <a class="article-open-button article-u-button" href="index.php?p=article_edit">Редактировать</a>

              </footer>
            </article>';
					}
					else {
						echo
						'<article>
							<header class="article-head">
								<div class = "time">
									<div class = year>'.$row['year'].'</div>
									<div class = date>'.$row['date'].'<span>'.$row['date_2'].'</span></div>
								</div>
							   <h2>'.$row['title'].'</h2>
							   <button type=button class="article-button" onclick="delArticle(1)">'.$row['comment'].'</button>
							</header>
							<p>'.$row['text'].'</p>
							<footer class="article-foot">
							   <p style = "color:black;" class="author-article">Автор: '.$row['author'].'</p>
							   <button type=button class="article-open-button" onclick="openArticle(1)">Открыть статью</button>
							</footer>
						</article>';
					}
					if ($i == $a_max) break;
				}

				if($pa_max>1){
					echo '<h1 id = "h1_page" >';
					for ($i=1; $i <=$pa_max ; $i++) {
						echo '<a id = "page" href=index.php?p=main&s='.($i-1).'>'.$i.'</a>';
					}
					echo "</h1>";
				}
			?>
		</main>
