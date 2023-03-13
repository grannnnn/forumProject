<!--Центральная часть сайта-->
	<div class=main-contaner>
		<main id=content>
			<?php
			for ($i = $GetPg['a_s']; $i < $GetPg['a_f']; $i++){
				if ($i == $GetPg['a_max']) break;
				$row = mysqli_fetch_assoc($query);
				$datem = getDateForBD($row['date']);
				$comment = commentForArticle($c, $row['id']);
				if (isset($_SESSION['id'])&&$_SESSION['login'] == "admin"||$_SESSION['id']==$row['id_user']){
				echo
					'<article>
					<div class = "desc">
					<h2>'.$row['title'].'</h2>
					<div class="info">
					<div id="circle"></div>
					<p>By '.$row['login'].' - '.$datem[1].' '.$datem[2].' ,'.$datem[0].'</p>
					</div>
					</div>
						<p>'.$row['text'].'</p>
							<a class="article-open-button article-u-button" id = "but" href="/article/open/'.$row['id'].'/">Открыть</a>
							 <a class="article-open-button article-u-button" id = "but" href="/article/delete/'.$row['id'].'/">Удалить</a>
							 <a class="article-open-button article-u-button" id = "but" href="/article/edit/'.$row['id'].'/">Редактировать</a>
					</article>';
				}
				else {
					echo
					'<article>
							<div class = "desc">
							<h2>'.$row['title'].'</h2>
							<div class="info">
							<div id="circle"></div>
							<p>By '.$row['login'].' - '.$datem[1].' '.$datem[2].' ,'.$datem[0].'</p>
							</div>
							</div>
						<p>'.$row['text'].'</p>
						<a class="article-open-button article-u-button" href="/article/open/'.$row['id'].'/">Открыть</a>
					</article>';
				}

			}

			if($GetPg['pa_max']>1){
				echo '<h1 id = "h1_page" >';
				for ($i=1; $i <= $GetPg['pa_max']; $i++) {
					echo '<a id = "page" href="/main/'.($i-1).'/">'.$i.'</a>';
				}
				echo "</h1>";
			}


			?>
		</main>
