<h1 class="title-page text-center text-uppercase" id="newsEdit"><?= $word[277]['name_'.$lang]; ?></h1>
<div class="notice">
  <!-- Added-->
  <div data-notice="#noticeUpdateNews" data-ancor="newsEdit" class="hidden alert alert-success" role="alert">
    <?= $word[264]['name_'.$lang]; ?>
  </div>
  <!--Delete-->
  <div data-notice="#noticeDeleteNews" data-ancor="newsEdit" class="hidden alert alert-danger" role="alert">
    <?= $word[265]['name_'.$lang]; ?>
  </div>
</div>

<div class="a-news-edit">
  <table class="table table-bordered table-align-middle">
    <form method="post" enctype="multipart/form-data" action="update.php?lang=<?= $lang ?>&amp;id_section=<?= $getIdSection ?>&amp;id_subsection=<?= $getIdSubsection ?>&amp;id_news=<?= $currentNews[0]['id'] ?>&amp;action=news">
      <!--Обложка-->
      <?php if($currentSection[0]['type'] != 'links'): ?> 
      <tr>
        <td class="title text-bold"><?= $word[259]['name_'.$lang]; ?> (JPG)</td>
        <td>
          <!--Показать фото если оно есть-->
          <?php if(!empty($currentNews[0]['extension'])): ?> 
            <div class="a-news-edit__gallery--item">
              <a data-lightbox="example-set" href="images/news/<?=$currentNews[0]['id'].'.'.$currentNews[0]['extension']?>">
                <img src="images/news/<?=$currentNews[0]['id'].'.'.$currentNews[0]['extension']?>">
              </a>
            </div>
          <?php endif; ?>
  
          <input type="file" name="uploadfile" accept="image/jpeg">
          
           <!--Удалить Обложку-->
          <div class="form-group a-news__cover--delete">
           <div class="input-group">
            <input type="checkbox" value="1">
            <input name="delete_cover" type="hidden" value="0">
            <span> <?= $word[26]['name_'.$lang]; ?></span>
           </div>
          </div>
          
        </td>
      </tr>
      <?php endif; ?>
      
       
      <!--Приоритет-->
      <?php if($currentSection[0]['type'] == 'department'): ?>
      <tr>
        <td class="title text-bold"><?= $word[53]['name_'.$lang]; ?></td>
        <td>
           <div class="form-group a-news__priority">
            <div class="input-group">
              <input name="priority" value="<?= $currentNews[0]['priority'] ?>" class="form-control" type="text" placeholder="<?= $word[53]['name_'.$lang]; ?>">
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
              <input name="name_ru" value="<?= $currentNews[0]['name_ru'] ?>" class="form-control" type="text" placeholder="<?= $word[51]['name_'.$lang]; ?>" required="required">
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
              <input name="name_en" value="<?= $currentNews[0]['name_en'] ?>" class="form-control" type="text" placeholder="<?= $word[51]['name_'.$lang]; ?>">
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
              <input name="link" value="<?= $currentNews[0]['link'] ?>" class="form-control" type="text" placeholder="<?= $word[257]['name_'.$lang]; ?>">
            </div>
          </div>
        </td>
      </tr>
      <?php endif; ?>
      <!--Содержание ru-->
      <tr>
        <td class="title text-bold"><?= $word[258]['name_'.$lang]; ?> (ru)</td>
        <td>
          <div class="form-group">
            <textarea name="content_ru" class="form-control" placeholder="<?= $word[258]['name_'.$lang]; ?> RU"><?= newline($currentNews[0]['content_ru']) ?></textarea>
          </div> 
        </td> 
      </tr>	
      <!--Содержание ru-->
      <tr>
        <td class="title text-bold"><?= $word[258]['name_'.$lang]; ?> (en)</td>
        <td>
          <div class="form-group">
            <textarea name="content_en" class="form-control" placeholder="<?= $word[258]['name_'.$lang]; ?> EN"><?= newline($currentNews[0]['content_en']) ?></textarea>
          </div> 
        </td> 
      </tr>
      <!--Удалить новость-->
      <?php if($currentSection[0]['type'] != 'home'): ?>
      <tr>
        <td class="title text-bold"><?= $word[262]['name_'.$lang]; ?></td>
        <td>
          <div class="form-group">
           <div class="input-group">
            <input type="checkbox" value="1">
            <input name="hide" type="hidden" value="0">
           </div>
          </div>
        </td>
      </tr>
      <?php endif; ?>
      <!--Отправить-->
      <tr>
        <td class="a-crew-generate__submit text-right" colspan="2">
           <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
        </td>
      </tr>
    </form>	
  </table>
</div>