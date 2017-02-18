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
      
      <!--ФИО-->
      <tr>
        <td class="voluntary-posts__title title text-bold"><?= $word[15]['name_'.$lang]; ?>, <?= $word[46]['name_'.$lang]; ?></td>
        <td class="voluntary-posts__user-name">
           <?= $currentNews[0]['user_name']; ?>
        </td>
      </tr>
      
      <!--Маршрут полёта-->
      <tr>
        <td class="voluntary-posts__title title text-bold"><?= $word[202]['name_'.$lang]; ?></td>
        <td class="voluntary-posts__route-flight">
           <?= $currentNews[0]['route_flight']; ?>
        </td>
      </tr>
      
      <!--Номер рейса-->
      <tr>
        <td class="voluntary-posts__title title text-bold"><?= $word[200]['name_'.$lang]; ?></td>
        <td class="voluntary-posts__number-flight">
           <?= $currentNews[0]['number_flight']; ?>
        </td>
      </tr>

      <!--Текст сообщения-->
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
      
      <!--Сообщение обработал-->
      <tr>
        <td class="voluntary-posts__title title text-bold"><?= $word[380]['name_'.$lang]; ?></td>
        <td class="voluntary-posts__value">
           <?= $currentNews[0]['user_last_name_'.$lang].' '.$currentNews[0]['user_name_'.$lang].'.'.$currentNews[0]['user_first_name_'.$lang].'.'; ?>
        </td>
      </tr>
  </table>

</div>