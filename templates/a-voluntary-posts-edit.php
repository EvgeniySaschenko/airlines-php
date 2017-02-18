<div class="a-voluntary-posts">
  <div class="notice">
    <!--User Added-->
    <div data-notice="#noticeUpdateVoluntaryPostsSend" class="hidden alert alert-success" role="alert">
      <?= $word[218]['name_'.$lang]; ?>
    </div>
    <!--User Error-->
    <div data-notice="#noticeErrorUpdateVoluntaryPostsSend" class="hidden alert alert-danger" role="alert">
      <?= $word[145]['name_'.$lang]; ?>
    </div>
  </div>
  <div>
  <table class="table table-bordered table-align-middle">
    <form method="post" enctype="multipart/form-data" action="update.php?lang=<?= $lang ?>&amp;id_section=<?= $getIdSection ?>&amp;id_subsection=<?= $getIdSubsection ?>&amp;id_news=<?= $currentNews[0]['id'] ?>&amp;action=voluntary_posts">
    <caption class="text-center text-uppercase text-bold"><?= $word[377]['name_'.$lang]; ?></caption>
      <!--Дата получения-->
      <tr>
        <td class="title text-bold a-voluntary-posts-edit__title"><?= $word[374]['name_'.$lang]; ?></td>
        <td>
           <?= convertDate($currentNews[0]['date_create']); ?> : <?= convertTime($currentNews[0]['date_create']); ?>
        </td>
      </tr>
      
      <!--Дата внесения информации о корректирующих действиях-->
      <tr>
        <td class="title text-bold a-voluntary-posts-edit__title"><?= $word[375]['name_'.$lang]; ?></td>
        <td>
           <?= convertDate($currentNews[0]['date_update']); ?>
        </td>
      </tr>
        
      <!--Тема сообщения-->
      <tr>
        <td class="title text-bold a-voluntary-posts-edit__title"><?= $word[365]['name_'.$lang]; ?></td>
        <td class="title text-bold">
           <?= $currentNews[0]['name_'.$lang]; ?>
        </td>
      </tr>
      
      <!--ФИО-->
      <tr>
        <td class="title text-bold a-voluntary-posts-edit__title"><?= $word[46]['name_'.$lang]; ?></td>
        <td>
           <?= $word[15]['name_'.$lang]; ?>, <?= $currentNews[0]['user_name']; ?>
        </td>
      </tr>
      
      <!--Маршрут полёта-->
      <tr>
        <td class="title text-bold a-voluntary-posts-edit__title"><?= $word[202]['name_'.$lang]; ?></td>
        <td>
           <?= $currentNews[0]['route_flight']; ?>
        </td>
      </tr>
      
      <!--Номер рейса-->
      <tr>
        <td class="title text-bold a-voluntary-posts-edit__title"><?= $word[200]['name_'.$lang]; ?></td>
        <td>
           <?= $currentNews[0]['number_flight']; ?>
        </td>
      </tr>
      

      <!--Текст сообщения-->
      <tr>
        <td class="title text-bold a-voluntary-posts-edit__title"><?= $word[366]['name_'.$lang]; ?></td>
        <td class="title">
          <?= addParagraph($currentNews[0]['content_'.$lang]) ?>  
        </td>
      </tr>
      
      <!--Корректирующие действия-->
      <tr>
        <td class="title text-bold a-voluntary-posts-edit__title"><?= $word[373]['name_'.$lang]; ?>*</td>
        <td class="title">
          <div class="form-group">
            <textarea name="comment_corrective_actions" class="a-voluntary-posts__comment-corrective-actions form-control"  required="required" placeholder="<?= $word[373]['name_'.$lang]; ?>"><?= newline($currentNews[0]['comment_corrective_actions']) ?></textarea>
          </div> 
        </td>
      </tr>
      
      <!--Ответственный департамент-->
      <tr>
        <td class="title text-bold a-voluntary-posts-edit__title"><?= $word[372]['name_'.$lang]; ?>*</td>
        <td class="title">
          <div class="form-group form-inline">
            <select class="form-control" name="id_department" data-selected-option="<?= $currentNews[0]['id_department']; ?>">
              <?php foreach($allSections as $section): ?> 
                <?php if($section['type'] == "department"): ?> 
                  <option value="<?= $section['id']; ?>"><?= $section['name_'.$lang]; ?></option>
                <?php endif; ?> 
              <?php endforeach; ?> 
            </select>
          </div>
        </td>
      </tr>
      <!--Сообщение обработал-->
      <tr>
        <td class="title text-bold a-voluntary-posts-edit__title"><?= $word[380]['name_'.$lang]; ?></td>
        <td>
          <?= $currentNews[0]['user_last_name_'.$lang].' '.$currentNews[0]['user_name_'.$lang].'.'.$currentNews[0]['user_first_name_'.$lang].'.'; ?>
        </td>
      </tr>
      <!--Отправить-->
      <tr>
        <td class="a-crew-generate__submit text-right" colspan="2">
           <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
        </td>
      </tr>
    </form>	
  </table>
    
  </div>
</div>