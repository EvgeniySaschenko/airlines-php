<div class="a-doc-user">
  <div class="notice">
    <!--User Added-->
    <div data-notice="#noticeUploadDoc" data-ancor="docUser" class="hidden alert alert-success" role="alert">
      <?= $word[173]['name_'.$lang]; ?>
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
  
<form method="post" action="update.php?lang=<?= $lang ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;id_subsection=0&amp;action=doc">
  <table class="table table-striped table-align-middle">
  <caption class="text-bold text-center"><?= $word[82]['name_'.$lang]; ?></caption>
    <thead>
      <tr>
        <th class="text-center"><span class="fa fa-info-circle" data-toggle="tooltip" title="<?= $word[50]['name_'.$lang]; ?>"></span></th>
        <th class="text-center"><?= $word[10]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[51]['name_'.$lang]; ?> / <?= $word[42]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[11]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[43]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[169]['name_'.$lang]; ?></th>
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
        data-link-doc="<?= $doc['link']; ?>"
        data-id-sent-doc="0"
        data-action="doc_user_upload">
        <td class="a-user-doc__info text-center">
          <span class="place-notice fa fa-file-text" data-toggle="tooltip" title="<?= $word[89]['name_'.$lang].' '.$doc['days_left'].' '.$word[90]['name_'.$lang]; ?>"></span>
        </td>
        <input name="id_doc[]" type="hidden" value="<?= $doc['id']; ?>">
        <input name="extension[]" type="hidden" value="<?= $doc['extension']; ?>">
        <!--Типы документов-->
        <td class="a-user-doc__type">
          <?= dropDownList('id_type[]', $allTypeDoc, $doc['id_type']); ?>
        </td>
        <!--Название документа-->
        <td class="a-user-doc__name">
          <div class="form-group text-center">
            <div class="input-group">
              <input name="name_ru[]" type="text" required="required" value="<?= $doc['name_ru'] ?>" placeholder="<?= $word[51]['name_'.$lang]; ?>">
            </div>
          </div>
        </td>
        <!--Дата документа-->
        <td class="a-user-doc__date-doc">
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
        <td class="a-user-doc__date-end">
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
        <!--Загрузить файл на сервер-->
        <td class="a-user-doc__edit text-center">
          <span data-toggle="tooltip" title="<?= $word[171]['name_'.$lang]; ?>">
            <span class="call-modal-edit-doc glyphicon glyphicon-upload" data-toggle="modal" data-target=".a-modal-edit-doc">
            </span>
          </span>
        </td>
        
        <!--Скрыть-->
        <td class="a-user-doc__hide">
          <div class="form-group text-center">
           <div class="input-group">
            <input type="checkbox" value="1">
            <input name="hide[]" type="hidden" value="0">
           </div>
          </div>
        </td>
        
        <?php if($permissionDeleteSection and $permissionManageUsers)
          {
            # Права на удаление
            $permissionDocDelete = 1;
          } 
        ?>
        
        <!--Удалить-->
        <td class="a-user-doc__delete" data-permission-user-doc-delete-you="<?= $permissionDocDelete; ?>">
          <div class="form-group text-center">
           <div class="input-group">
            <input type="checkbox" value="1">
            <input name="delete[]" type="hidden" value="0">
           </div>
          </div>
        </td>
        
        <!--Просмотр документа-->
        <td class="a-user-doc__view text-center">
          <div class="call-modal-doc cut-text" data-toggle="modal" data-target=".modal-doc">
            <span class="glyphicon glyphicon glyphicon-eye-open"></span>
          </div>
        </td>
        
        <!--Скачать-->
        <td class="a-user-doc__date-extension text-center">
          <?= linkDocDownload($doc['id_section'], $doc['id_subsection'], $doc['id'], 0); ?>
        </td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <!--Отправить-->
        <td class="a-user-doc__submit text-right" colspan="10">
           <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
        </td>
      </tr>
    </tbody>
  </table>
</form>
</div>
