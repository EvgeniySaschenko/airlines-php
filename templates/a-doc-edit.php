<div class="a-doc-edit" data-anchor-pagination="#docList">
<div class="notice">
  <!--User Added-->
  <div data-notice="#noticeUploadDoc" data-ancor="docList" class="hidden alert alert-success" role="alert">
    <?= $word[173]['name_'.$lang]; ?>
  </div>
  <!--Doc link Update-->
  <div data-notice="#noticeUpdateDocLink" data-ancor="docList" class="hidden alert alert-success" role="alert">
    <?= $word[218]['name_'.$lang]; ?>
  </div>
  <!--User Error-->
  <div data-notice="#noticeErrorUploadDoc" data-ancor="docList" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
  <!--User Update-->
  <div data-notice="#noticeEditDoc" data-ancor="docList" class="hidden alert alert-success" role="alert">
    <?= $word[176]['name_'.$lang]; ?>
  </div>
  <!--User Error-->
  <div data-notice="#noticeErrorEditDoc" data-ancor="docList" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
</div>
 <!--Навигация-->
<nav class="text-right">
  <ul class="pagination" data-page="<?= $_GET['page']; ?>">
      <li><span class="fa fa-arrows-h"></span></li>
    <?php for($i = 1; ceil($allDoc[0]['count_doc'] / 30) >= $i; $i++): ?>
      <li class="pagination__page" data-page="<?= $i - 1; ?>">
        <?php if(isset($_GET['page']) or $_GET['page'] === 0): ?>
          <a href="<?= substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '&page')); ?>&amp;page=<?= $i - 1; ?>"><?= $i;  ?></a>
        <?php else: ?>
          <a href="<?= $_SERVER['REQUEST_URI']; ?>&amp;page=<?= $i - 1; ?>"><?= $i; ?></a>
        <?php endif; ?>
      </li>
    <?php endfor; ?>
  </ul>
</nav>
<form method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;id_book=<?= $getIdBook; ?>&amp;action=doc">
  <table class="table table-striped table-align-middle">
  <caption class="text-bold text-center"><?= $word[82]['name_'.$lang]; ?></caption>
    <thead>
      <tr>
        <th class="text-center"><span class="fa fa-info-circle" data-toggle="tooltip" title="<?= $word[50]['name_'.$lang]; ?>"></span></th>
        <th class="text-center"><?= $word[51]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[193]['name_'.$lang]; ?> / <?= $word[113]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[11]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[43]['name_'.$lang]; ?></th>
        <th class="text-center"><span class="glyphicon glyphicon-sort-by-order" data-toggle="tooltip" title="<?= $word[53]['name_'.$lang]; ?>"> </th>
        <th class="text-center"><span class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="<?= $word[169]['name_'.$lang]; ?>"> </th>
        <th class="text-center"><span class="glyphicon glyphicon-eye-close" data-toggle="tooltip" title="<?= $word[73]['name_'.$lang]; ?>"></span></th>
        <th class="text-center"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="<?= $word[26]['name_'.$lang]; ?>"></span></th>
        <th class="text-center"><span class="glyphicon glyphicon glyphicon-eye-open" data-toggle="tooltip" title="<?= $word[70]['name_'.$lang]; ?>"></span></th>
        <th class="text-center"><span class="glyphicon glyphicon-download" data-toggle="tooltip" title="<?= $word[13]['name_'.$lang]; ?>"></span></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($allDoc as $doc): ?>
      <tr class="doc-data"
        data-id-doc="<?= $doc['id']; ?>"
        data-id-section="<?= $doc['id_section']; ?>"
        data-id-subsection="<?= $doc['id_subsection']; ?>"
        data-doc-extension="<?= $doc['extension'] ?>"
        data-date-end-doc="<?= $doc['date_end']; ?>"
        data-name="<?= $doc['type_'.$lang].' '.$doc['name_'.$lang]; ?>"
        data-link="<?= $doc['link']; ?>"
        data-link-doc="<?= $doc['link']; ?>"
        data-id-sent-doc="0"
        data-name="<?= $doc['name_'.$lang]; ?>"
        data-action="doc_user_upload">
        <td class="a-doc__info text-center">
          <span class="place-notice fa fa-file-text" data-toggle="tooltip" title="<?= $word[89]['name_'.$lang].' '.$doc['days_left'].' '.$word[90]['name_'.$lang]; ?>"></span>
        </td>
        <input name="id_doc[]" type="hidden" value="<?= $doc['id']; ?>">
        <input name="extension[]" type="hidden" value="<?= $doc['extension']; ?>">
        <!--Название документа-->
        <td class="a-doc__name">
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
        <!--Главы | Папки-->
        <td class="a-doc__chapter a-doc__book">
          <!--Главы-->
          <div class="input-group a-doc__chapter-container">
            <span class="input-group-addon">
              <span class="fa fa-header"></span>
            </span>
            <?= dropDownList('id_chapter[]', $allChapter, $doc['id_chapter']); ?>
          </div>
          <!--Папки-->
          <div class="input-group a-doc__book-container">
            <span class="input-group-addon">
              <span class="fa fa-folder-open"></span>
            </span>
            <?= dropDownList('id_book[]', $allBook, $doc['id_book']); ?>
          </div>
        </td>
        <!--Дата документа-->
        <td class="a-doc__date-doc">
          <div class="form-group text-center">
            <div class="input-group date date-picker">
                <input value="<?= convertDateEmpty($doc['date_doc']); ?>" type="text" class="form-control">
                <input name="date_doc[]" type="hidden" value="<?= convertDate3($doc['date_doc']); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </td>
        <!--Дата окончания-->
        <td class="a-doc__date-end">
          <div class="form-group text-center">
            <div class="input-group date date-picker">
                <input value="<?= convertDateEmpty($doc['date_end']); ?>" type="text" class="form-control">
                <input name="date_end[]" type="hidden" value="<?= convertDate3($doc['date_end']); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </td>
        
        <td class="a-doc__priority">
          <!--Priority-->
          <input name="priority[]" type="text" class="form-control" value="<?= $doc['priority'] ?>" placeholder="<?= $word[53]['name_'.$lang]; ?>">
        </td>
        
        <!--Документ на сервере-->
        <?php if(empty($doc['link'])): ?>
          <!--Загрузить файл на сервер-->
          <td class="a-doc__edit text-center">
            <span data-toggle="tooltip" title="<?= $word[171]['name_'.$lang]; ?>">
              <span class="call-modal-edit-doc glyphicon glyphicon-upload" data-toggle="modal" data-target=".a-modal-edit-doc">
              </span>
            </span>
          </td>
        <?php else: ?>
          <!--Ссылка на документ-->
          <td class="a-doc-link__edit text-center">
            <span data-toggle="tooltip" title="<?= $word[299]['name_'.$lang]; ?>">
              <span class="call-modal-edit-doc-link glyphicon glyphicon-link" data-toggle="modal" data-target=".a-modal-edit-doc-link">
              </span>
            </span>
          </td>
        <?php endif; ?>
        
        <!--Скрыть-->
        <td class="a-doc__hide">
          <div class="form-group text-center">
           <div class="input-group">
            <input type="checkbox" value="1">
            <input name="hide[]" type="hidden" value="0">
           </div>
          </div>
        </td>
        
        
        <?php if($getIdSubsection != 0) {
          # Права на удаление
          $permissionDocDelete = $permissionDeleteSubsection;
        } else {
          $permissionDocDelete = $permissionDeleteSection;
        } ?>
        
        <!--Удалить-->
        <td class="a-doc__delete" data-permission-doc-delete-you="<?= $permissionDocDelete; ?>">
          <div class="form-group text-center">
           <div class="input-group">
            <input type="checkbox" value="1">
            <input name="delete[]" type="hidden" value="0">
           </div>
          </div>
        </td>
        
        <!--Просмотр документа-->
        <td class="a-doc__view text-center">
          <div class="call-modal-doc cut-text" data-toggle="modal" data-target=".modal-doc">
            <span class="glyphicon glyphicon glyphicon-eye-open"></span>
          </div>
        </td>
        
        <!--Скачать-->
        <td class="a-doc__date-extension text-center">
          <?= linkDocDownload($doc['id_section'], $doc['id_subsection'], $doc['id'], 0); ?>
        </td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <!--Отправить-->
        <td class="a-doc__submit text-right" colspan="11">
           <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
        </td>
      </tr>
    </tbody>
  </table>
</form>
</div>