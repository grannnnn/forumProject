<div class=main-contaner>
  <div class="">
    <?php
    if(!isset($_SESSION['id']))
    echo '<p class = "about all_box">Тут могли располагаться ваши статьи. Войдите чтобы начать!</p>';
    else {
      echo '<a style="bottom: 10px;" class="art-create article-open-button article-u-button" href="index.php?p=index&action=add">Создать статью</a>';
      if ($GetPg['a_max']>0){

          for ($i = $GetPg['a_s']; $i < $GetPg['a_f']; $i++){
            if ($i == $GetPg['a_max']) break;
            $row = mysqli_fetch_assoc($query);
            $datem = getDateForBD($row['date']);
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
              <footer class="article-foot_u">
                  <a class="article-open-button article-u-button" id = "but" href="index.php?p=index&action=open&id_art='.$row['id_ar'].'">Открыть статью</a>
                  <a class="article-open-button article-u-button" id = "but" href="index.php?p=index&action=delete&id_art='.$row['id_ar'].'">Удалить</a>
   							 <a class="article-open-button article-u-button" id = "but" href="index.php?p=index&action=edit&id_art='.$row['id_ar'].'">Редактировать</a>
              </footer>
            </article>';

          }
          if($GetPg['pa_max']>1){
            echo "<h1>";
            for ($i=1; $i <=$GetPg['pa_max']; $i++) {
              echo '<a href=index.php?p=portfolio&page='.($i-1).'>'.$i.'</a>';
            }
            echo "</h1>";
          }
      }
    else {
    echo '<p class = "about all_box">Тут могли располагаться ваши статьи. Создайте!!</p>';
    }


    }
     ?>
  </div>
