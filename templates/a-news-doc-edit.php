<div class="a-news-doc-edit">
  
  <div class="notice">
    <!--User Added-->
    <div data-notice="#noticeUploadDoc" data-ancor="docUser" class="hidden alert alert-success" role="alert">
      <?= $word[173]['name_'.$lang]; ?>
    </div>
    <!--Doc link Update-->
    <div data-notice="#noticeUpdateDocLink" data-ancor="docUser" class="hidden alert alert-success" role="alert">
      <?= $word[218]['name_'.$lang]; ?>
    </div>
    <!--User Error-->
    <div data-notice="#noticeErrorUploadDoc" data-ancor="docUser" class="hidden alert alert-danger" role="alert">
      <?= $word[145]['name_'.$lang]; ?>
    </div>
    <!--User Update-->
    <div data-notice="#noticeEditDoc" data-ancor="docUser" class="hidden alert alert-success" role="alert">
      <?= $word[176]['name_'.$lang]; ?>
    </div>
    <!--User Error-->
    <div data-notice="#noticeErrorEditDoc" data-ancor="docUser" class="hidden alert alert-danger" role="alert">
      <?= $word[145]['name_'.$lang]; ?>
    </div>
  </div>
  
<form novalidate method="post" action="update.php?lang=<?= $lang ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;id_news=<?= $getIdNews; ?>&amp;action=doc">
  <table class="table table table-striped">
    <caption class="text-bold text-center"><?= $word[82]['name_'.$lang]; ?></caption>
    <thead>
      <tr>
        <th class="text-center"><?= $word[51]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[169]['name_'.$lang]; ?></th>
        <th class="text-center"><span class="glyphicon glyphicon-eye-close" data-toggle="tooltip" title="<?= $word[73]['name_'.$lang]; ?>"></span></th>
        <th class="text-center"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="<?= $word[26]['name_'.$lang]; ?>"></span></th>
        <th class="text-center"><span class="glyphicon glyphicon-download" data-toggle="tooltip" title="<?= $word[13]['name_'.$lang]; ?>"></span></th>
      </tr>
    </thead>
    <tbody>
      
      <?php if($permissionDeleteSection)
        {
          # Права на удаление
          $permissionDocDelete = 1;
        } 
      ?>
      
      <!--Документы-->
      <?php foreach($allDoc as $doc): ?>
        <?php if($doc['extension'] != 'jpg' and $doc['extension'] != 'jpeg' and $doc['extension'] != 'png'): ?>
          <tr class="doc-data"
            data-id-doc="<?= $doc['id']; ?>"
            data-id-section="<?= $doc['id_section']; ?>"
            data-id-subsection="<?= $doc['id_subsection']; ?>"
            data-doc-extension="<?= $doc['extension'] ?>"
            data-date-end-doc="<?= $doc['date_end']; ?>"
            data-name="<?= $doc['type_'.$lang].' '.$doc['name_'.$lang]; ?>"
            data-link="<?= $doc['link']; ?>"
            data-id-sent-doc="0"
            data-action="doc_upload">
            <!--Название документа-->
            <td class="a-news-doc-edit__name">
              
              <input name="id_doc[]" type="hidden" value="<?= $doc['id']; ?>">
              <input name="extension[]" type="hidden" value="<?= $doc['extension']; ?>">
              
              <!--ru-->
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">ru</div>
                  <input name="name_ru[]" type="text" class="form-control" value="<?= $doc['name_ru'] ?>" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
                </div>
              </div> 
              <!--en-->
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-addon">en</div>
                  <input name="name_en[]" type="text" class="form-control" value="<?= $doc['name_en'] ?>" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
                </div>
              </div>
            </td>
            
            
        <!--Документ на сервере-->
        <?php if(empty($doc['link'])): ?>
          <!--Загрузить файл на сервер-->
          <td class="a-news-doc-edit__edit text-center">
            <span data-toggle="tooltip" title="<?= $word[171]['name_'.$lang]; ?>">
              <span class="call-modal-edit-doc glyphicon glyphicon-upload" data-toggle="modal" data-target=".a-modal-edit-doc">
              </span>
            </span>
          </td>
        <?php else: ?>
          <!--Ссылка на документ-->
          <td class="a-news-doc-link__edit text-center">
            <span data-toggle="tooltip" title="<?= $word[299]['name_'.$lang]; ?>">
              <span class="call-modal-edit-doc-link glyphicon glyphicon-link" data-toggle="modal" data-target=".a-modal-edit-doc-link">
              </span>
            </span>
          </td>
        <?php endif; ?>
          
            
            <!--Скрыть-->
            <td class="a-news-doc-edit__hide">
              <div class="form-group text-center">
               <div class="input-group">
                <input type="checkbox" value="1">
                <input name="hide[]" type="hidden" value="0">
               </div>
              </div>
            </td>
            
            <!--Удалить-->
            <td class="a-news-doc-edit__delete" data-permission-news-doc-delete-you="<?= $permissionDocDelete; ?>">
              <div class="form-group text-center">
               <div class="input-group">
                <input type="checkbox" value="1">
                <input name="delete[]" type="hidden" value="0">
               </div>
              </div>
            </td>
            
            <!--Скачать-->
            <td class="a-news-doc-edit__date-extension text-center">
              <?= linkDocDownload($doc['id_section'], $doc['id_subsection'], $doc['id'], 0); ?>
            </td>
          </tr>
         <?php endif; ?>
      <?php endforeach; ?>
          
      <!--Фото-->
      <?php foreach($allDoc as $img): ?>
        <?php if($img['extension'] == 'jpg' or $img['extension'] == 'jpeg' or $img['extension'] == 'png'): ?>
          <tr class="doc-data"
            data-id-doc="<?= $img['id']; ?>"
            data-id-section="<?= $img['id_section']; ?>"
            data-id-subsection="<?= $img['id_subsection']; ?>"
            data-doc-extension="<?= $img['extension'] ?>"
            data-date-end-doc="<?= $img['date_end']; ?>"
            data-name="<?= $img['type_'.$lang].' '.$img['name_'.$lang]; ?>"
            data-action="doc_upload">
            <!--Название документа-->
            <td class="a-news-doc-edit__img">
              
              <input name="id_doc[]" type="hidden" value="<?= $img['id']; ?>">
              <input name="extension[]" type="hidden" value="<?= $img['extension']; ?>">
              
              <div class="a-news-doc-edit__gallery--item">
                <a data-lightbox="example-set" href="doc.php?lang=<?= $lang; ?>&id_section=<?= $img['id_section']; ?>&id_subsection=<?= $img['id_subsection']; ?>&id_doc=<?= $img['id']; ?>&action=view">
                  <img src="doc.php?lang=<?= $lang; ?>&id_section=<?= $img['id_section']; ?>&id_subsection=<?= $img['id_subsection']; ?>&id_doc=<?= $img['id']; ?>&id_sent_doc=0&action=view">
                </a>
              </div>
              
              <!--ru-->
              <div class="form-group hidden">
                <div class="input-group">
                  <div class="input-group-addon">ru</div>
                  <input name="name_ru[]" type="text" class="form-control" value="<?= $img['name_ru'] ?>" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
                </div>
              </div> 
              <!--en-->
              <div class="form-group hidden">
                <div class="input-group">
                  <div class="input-group-addon">en</div>
                  <input name="name_en[]" type="text" class="form-control" value="<?= $img['name_en'] ?>" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
                </div>
              </div>
            </td>
            <!--Загрузить файл на сервер-->
            <td class="a-news-doc-edit__edit text-center">
              <span data-toggle="tooltip" title="<?= $word[171]['name_'.$lang]; ?>">
                <span class="call-modal-edit-doc glyphicon glyphicon-upload" data-toggle="modal" data-target=".a-modal-edit-doc">
                </span>
              </span>
            </td>
            <!--Скрыть-->
            <td class="a-news-doc-edit__hide">
              <div class="form-group text-center">
               <div class="input-group">
                <input type="checkbox" value="1">
                <input name="hide[]" type="hidden" value="0">
               </div>
              </div>
            </td>
            
            <!--Удалить-->
            <td class="a-news-doc-edit__delete" data-permission-news-doc-delete-you="<?= $permissionDocDelete; ?>">
              <div class="form-group text-center">
               <div class="input-group">
                <input type="checkbox" value="1">
                <input name="delete[]" type="hidden" value="0">
               </div>
              </div>
            </td>
            
            <!--Скачать-->
            <td class="a-news-doc-edit__date-extension text-center">
              <?= linkDocDownload($doc['id_section'], $img['id_subsection'], $img['id'], 0); ?>
            </td>
          </tr>
         <?php endif; ?>
      <?php endforeach; ?>
          <tr>
            <!--Отправить-->
            <td class="a-doc__submit text-right" colspan="5">
               <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
            </td>
          </tr>
    </tbody>
  </table>
</form>
</div>