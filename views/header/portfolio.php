<div class=main-contaner>
  <div class="">
    <?php
    if(!isset($_SESSION['id']))
    echo '<p class = "about all_box">Тут могли располагаться ваши статьи. Войдите чтобы начать!</p>';
    else {
      echo '<a style="bottom: 10px;" class="art-create article-open-button article-u-button" href="/article/add">Создать статью</a>';
      if ($GetPg['a_max']>0){

          for ($i = $GetPg['a_s']; $i < $GetPg['a_f']; $i++){
            if ($i == $GetPg['a_max']) break;
            $row = mysqli_fetch_assoc($query);
            $datem = getDateForBD($row['date']);
            $comment = commentForArticle($c, $row['id']);
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
                  <a class="article-open-button article-u-button" id = "but" href="/article/open/'.$row['id'].'/">Открыть статью</a>
                  <a class="article-open-button article-u-button" id = "but" href="/article/delete/'.$row['id'].'/">Удалить</a>
   							 <a class="article-open-button article-u-button" id = "but" href="/article/edit/'.$row['id'].'/">Редактировать</a>
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
