<!--Подвал сайта-->
	<footer>
		<div class=footer-contaner>
			<div class=footer-block>
				<section>
					<h1>Popular Posts</h1>
					<ul class=links>
						<?php
						 $query = PopPostFooter();
						for ($i = 0; $i < 5; $i++){
					    $row = mysqli_fetch_assoc($query);
							echo '<li><a href="index.php?p=article&id_art='.$row['id_ar'].'">'.$row['title'].'</a></li>';
						}
						?>
					</ul>
				</section>
			</div>
			<div class=footer-block>
				<section>
					<h1>Recent Comments</h1>
					<ul id=comments>
						<li>
							<a href="">Tincidunt justo sed feugiat eget ligula nec, porta luctus&hellip;</a>
							<br>
							<span class=newLine><strong>Comment Author</strong>, 20. 04. 2010.</span>
						</li>
						<li>
							<a href="">Primis suspendisse tellus facilisis&hellip;</a>
							<br>
							<span class=newLine><strong>Comment Author</strong>, 5. 04. 2010.</span>
						</li>
						<li>
							<a href="">Sed vestibulum, ut pulvinar iaculis nam ullamcorper pharetra&hellip;</a>
							<br>
							<span class=newLine><strong>Comment Author</strong>, 28. 03. 2010.</span>
						</li>
					</ul>
				</section>
			</div>
			<div class=footer-block>
				<section>
					<h1>Company Bio</h1>
					<p>Nisl vestibulum ex, quis lectus elit consequatur, per lobortis ipsum, sit in id nunc vitae felis. Ut quae pellentesque vitae vel ligula, non quis quis quam, ante orci lectus tortor sapien sed aliquam, neque nam vehicula.</p>
					<p>Iaculis et quis, sociosqu aenean pulvinar metus, sed quis, sagittis a, at volutpat tempor.</p>
				</section>
			</div>
		</div>
		<div class=footer-down>
			(с)2022. Сайт компании "ООО"
		</div>
	</footer>


</body>
</html>
