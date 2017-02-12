<h1 class="title-page text-center text-uppercase"> <?= $currentSection[0]['name_'.$lang]; ?> </h1>

<div class="voluntary-posts-send">
  <div class="notice">
    <!--User Added-->
    <div data-notice="#noticeAddVoluntaryPostsSend" class="hidden alert alert-success" role="alert">
      <?= $word[370]['name_'.$lang]; ?>
    </div>
    <!--User Error-->
    <div data-notice="#noticeErrorAddVoluntaryPostsSend" class="hidden alert alert-danger" role="alert">
      <?= $word[145]['name_'.$lang]; ?>
    </div>
  </div>
    
    
  <form method="post" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;action=voluntary_posts">
    <!--Тема сообщения-->     
     <div class="form-group text-center">
        <input name="name_ru" type="text" class="voluntary-posts-send__name form-control" required="required" placeholder="*<?= $word[365]['name_'.$lang]; ?>">
     </div>
    <!--Подразделения-->     
    <div class="form-group form-inline">
      <?= $word[372]['name_'.$lang]; ?>
      <select class="voluntary-posts-send__departments form-control" name="id_department">
        <?php foreach($allSections as $section): ?> 
          <?php if($section['type'] == 'department'): ?> 
            <option value="<?= $section['id']; ?>"><?= $section['name_'.$lang]; ?></option>
          <?php endif; ?> 
        <?php endforeach; ?> 
      </select>
    </div>
    <!--Текст сообщения-->     
     <div class="form-group text-center">
         <input name="mail" type="text" class="voluntary-posts-send__mail form-control" placeholder="E-mail (<?= $word[369]['name_'.$lang]; ?>)">
     </div>
    <!--E-mail-->     
     <div class="form-group text-center">
        <textarea name="content_ru" class="voluntary-posts-send__content form-control" required="required" placeholder="*<?= $word[366]['name_'.$lang]; ?>"></textarea>
     </div>
    <!--Приложыть файлы   
     <div class="text-center">
       <input type="file"  multiple="true" name="uploadfile[]" class="form-control">
       <div>
         <h5>
           <?//= $word[177]['name_'.$lang]; ?>
         </h5>
       </div>

       <div>
         <h5>
           <?//= $word[172]['name_'.$lang]; ?>
         </h5>
         <?//php foreach($allowExtension as $extension): ?>
           <span class="label label-default"><?//= $extension; ?>;</span>
         <?//php endforeach; ?>
       </div>
     </div>-->  
     <!--Кнопка отправить-->  
     
     <div class="captcha-maskedinput-form-group">
         <?= $word[378]['name_'.$lang]; ?>: <span class="captcha-maskedinput-text" onselectstart="return false;"></span>
         <input name="capcha" type="text" class="voluntary-posts-send__capcha captcha-maskedinput-input form-control" required="required" placeholder="*<?= $word[379]['name_'.$lang]; ?>">

        <?php if(empty($currentUser)): ?> 
         <button type="submit" class="btn btn-warning voluntary-posts-send__btn-send" disabled><?= $word[367]['name_'.$lang]; ?></button>
        <?php else: ?> 
          <div class="alert alert-danger" role="alert">
            <?= $word[368]['name_'.$lang]; ?>
          </div>
        <?php endif; ?>
     </div>
  </form>
</div>