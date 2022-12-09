<!--Центральная часть сайта-->
	<div class=main-contaner>
		<main id=content>
			<?php
			for ($i = $GetPg['a_s']; $i < $GetPg['a_f']; $i++){
				if ($i == $GetPg['a_max']) break;
				$row = mysqli_fetch_assoc($query);
				$datem = getDateForBD($row['date']);
				if (isset($_SESSION['id'])&&$_SESSION['login'] == "admin"||$_SESSION['login']==$row['author']){
				echo
					'<article>
						<header class="article-head">
							<div class = "time">
								<div class = year>'.$datem[0].'</div>
								<div class = date>'.$datem[1].'<span>'.$datem[2].'</span></div>
							</div>
							 <h2>'.$row['title'].'</h2>
							 <button type=button class="article-button" onclick="delArticle(1)">'.$row['comment'].'</button>
						</header>
						<p class = "article-text">'.$row['text'].'</p>
						<footer class="article-foot_u">
						<p style = "color:black;" class="author-article">Автор: '.$row['author'].'</p>
							<a class="article-open-button article-u-button" id = "but" href="index.php?p=index&action=open&id_art='.$row['id_ar'].'">Открыть статью</a>
							 <a class="article-open-button article-u-button" id = "but" href="index.php?p=index&action=delete&id_art='.$row['id_ar'].'">Удалить</a>
							 <a class="article-open-button article-u-button" id = "but" href="index.php?p=index&action=edit&id_art='.$row['id_ar'].'">Редактировать</a>

						</footer>
					</article>';
				}
				else {
					echo
					'<article>
						<header class="article-head">
							<div class = "time">
								<div class = year>'.$datem[0].'</div>
								<div class = date>'.$datem[1].'<span>'.$datem[2].'</span></div>
							</div>
							 <h2>'.$row['title'].'</h2>
							 <button type=button class="article-button" onclick="delArticle(1)">'.$row['comment'].'</button>
						</header>
						<p>'.$row['text'].'</p>
						<footer class="article-foot">
							 <p style = "color:black;" class="author-article">Автор: '.$row['author'].'</p>
								 <a class="article-open-button article-u-button" id = "but" href="index.php?p=index&action=open&id_art='.$row['id_ar'].'">Открыть статью</a>
						</footer>
					</article>';
				}

			}

			if($GetPg['pa_max']>1){
				echo '<h1 id = "h1_page" >';
				for ($i=1; $i <= $GetPg['pa_max']; $i++) {
					echo '<a id = "page" href=index.php?p=index&s='.($i-1).'>'.$i.'</a>';
				}
				echo "</h1>";
			}


			?>
		</main>
