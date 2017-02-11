<div class="notice">
  <!-- Added-->
  <div data-notice="#noticeAddedNews" data-ancor="addNews" class="hidden alert alert-success" role="alert">
    <?= $word[261]['name_'.$lang]; ?>
  </div>
  <!-- Error-->
  <div data-notice="#noticeErrorAddedNews" data-ancor="addNews" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
</div>

<div class="a-news-add">
  <table class="table table-bordered table-align-middle">
    <caption class="text-center text-uppercase text-bold"><?= $word[213]['name_'.$lang]; ?></caption>
    <form method="post" enctype="multipart/form-data" action="insert.php?lang=<?= $lang ?>&amp;id_section=<?= $getIdSection ?>&amp;id_subsection=<?= $getIdSubsection ?>&amp;action=news">
     
      <!--Обложка-->
      <?php if($currentSection[0]['type'] != 'links'): ?> 
      <tr>
        <td class="title text-bold"><?= $word[259]['name_'.$lang]; ?></td>
        <td><input type="file" name="uploadfile" accept="image/jpeg" onchange="checkJPG(this)"></td>
      </tr>
      <?php endif; ?>
      
      <!--Приоритет-->
      <?php if($currentSection[0]['type'] == 'department'): ?>
      <tr>
        <td class="title text-bold"><?= $word[53]['name_'.$lang]; ?></td>
        <td>
           <div class="form-group a-news__priority">
            <div class="input-group">
              <input name="priority" lass="form-control" type="text" placeholder="<?= $word[53]['name_'.$lang]; ?>">
            </div>
          </div>
        </td>
      </tr>
      <?php endif; ?>
      
      <!--Название ru-->
      <tr>
        <td class="title text-bold"><?= $word[51]['name_'.$lang]; ?>*</td>
        <td>
           <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">ru</div>
              <input name="name_ru" class="form-control" type="text" placeholder="<?= $word[51]['name_'.$lang]; ?>" required="required">
            </div>
          </div>
        </td>
      </tr>
      <!--Название en-->
      <tr>
        <td class="title text-bold"><?= $word[51]['name_'.$lang]; ?></td>
        <td>
           <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon">en</div>
              <input name="name_en" class="form-control" type="text" placeholder="<?= $word[51]['name_'.$lang]; ?>">
            </div>
          </div>
        </td>
      </tr>
      <!--Ссылка-->
      <?php if($currentSection[0]['type'] == 'links'): ?> 
      <tr>
        <td class="title text-bold"><?= $word[257]['name_'.$lang]; ?></td>
        <td>
           <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"><span class="glyphicon glyphicon-link"></span></div>
              <input name="link" class="form-control" type="text" placeholder="<?= $word[257]['name_'.$lang]; ?>">
            </div>
          </div>
        </td>
      </tr>
      <?php endif; ?>
      <!--Содержание ru-->
      <tr>
        <td class="title text-bold"><?= $word[258]['name_'.$lang]; ?></td>
        <td>
          <div class="form-group">
            <textarea name="content_ru" class="form-control" placeholder="<?= $word[258]['name_'.$lang]; ?> RU"></textarea>
          </div> 
        </td> 
      </tr>	
      <!--Содержание ru-->
      <tr>
        <td class="title text-bold"><?= $word[258]['name_'.$lang]; ?></td>
        <td>
          <div class="form-group">
            <textarea name="content_en" class="form-control" placeholder="<?= $word[258]['name_'.$lang]; ?> EN"></textarea>
          </div> 
        </td> 
      </tr>
      <!--Подсказка-->
      <tr>
        <td colspan="2">
          <div class="alert alert-warning" role="alert">
            <?= $word[260]['name_'.$lang]; ?>
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