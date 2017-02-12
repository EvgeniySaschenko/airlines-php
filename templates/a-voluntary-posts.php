<h1 class="title-page text-center text-uppercase"> <?= $currentSection[0]['name_'.$lang]; ?> </h1>
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

      <!--Дата-->
      <tr>
        <td class="title text-bold"><?= $word[130]['name_'.$lang]; ?></td>
        <td>
           <?= convertDate($currentNews[0]['date_create']); ?> : <?= convertTime($news['date_create']); ?>
        </td>
      </tr>
        
      <!--Тема сообщения-->
      <tr>
        <td class="title text-bold"><?= $word[365]['name_'.$lang]; ?></td>
        <td class="title text-bold">
           <?= $currentNews[0]['name_'.$lang]; ?>
        </td>
      </tr>

      <!--Тема сообщения-->
      <tr>
        <td class="title text-bold"><?= $word[366]['name_'.$lang]; ?></td>
        <td class="title">
          <?= addParagraph($currentNews[0]['content_'.$lang]) ?>  
        </td>
      </tr>
      
      <!--Корректирующие действия-->
      <tr>
        <td class="title text-bold"><?= $word[373]['name_'.$lang]; ?>*</td>
        <td class="title">
          <div class="form-group">
            <textarea name="comment_corrective_actions" class="a-voluntary-posts__comment-corrective-actions form-control"  required="required" placeholder="<?= $word[373]['name_'.$lang]; ?>"><?= newline($currentNews[0]['comment_corrective_actions']) ?></textarea>
          </div> 
        </td>
      </tr>
      
      <!--Ответственный департамент-->
      <tr>
        <td class="title text-bold"><?= $word[372]['name_'.$lang]; ?>*</td>
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