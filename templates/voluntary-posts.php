<h1 class="title-page text-center text-uppercase"> <?= $word[377]['name_'.$lang]; ?> </h1>
<div class="voluntary-posts">


  <table class="table table-bordered table-align-middle">
  
      <!--Дата получения-->
      <tr>
        <td class="voluntary-posts__title title text-bold"><?= $word[374]['name_'.$lang]; ?></td>
        <td class="voluntary-posts__value">
           <?= convertDate($currentNews[0]['date_create']); ?> : <?= convertTime($currentNews[0]['date_create']); ?>
        </td>
      </tr>
      
      <!--Дата внесения информации о корректирующих действиях-->
      <tr>
        <td class="voluntary-posts__title title text-bold"><?= $word[375]['name_'.$lang]; ?></td>
        <td class="voluntary-posts__value">
           <?= convertDate($currentNews[0]['date_update']); ?>
        </td>
      </tr>
        
      <!--Тема сообщения-->
      <tr>
        <td class="voluntary-posts__title title text-bold"><?= $word[365]['name_'.$lang]; ?></td>
        <td class="voluntary-posts__value">
           <?= $currentNews[0]['name_'.$lang]; ?>
        </td>
      </tr>

      <!--Тема сообщения-->
      <tr>
        <td class="voluntary-posts__title title text-bold"><?= $word[366]['name_'.$lang]; ?></td>
        <td class="voluntary-posts__value">
          <?= addParagraph($currentNews[0]['content_'.$lang]) ?>  
        </td>
      </tr>
      
      <!--Корректирующие действия-->
      <tr>
        <td class="voluntary-posts__title title text-bold"><?= $word[373]['name_'.$lang]; ?></td>
        <td class="voluntary-posts__value">
            <?= addParagraph($currentNews[0]['comment_corrective_actions']) ?> 
        </td>
      </tr>
      
      <!--Ответственный департамент-->
      <tr>
        <td class="voluntary-posts__title title text-bold"><?= $word[372]['name_'.$lang]; ?></td>
        <td class="voluntary-posts__value">
          <?= addParagraph($currentNews[0]['section_name_'.$lang]) ?>
        </td>
      </tr>
     
  </table>

</div>