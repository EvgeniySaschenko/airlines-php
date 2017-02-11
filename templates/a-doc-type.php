<div class="notice">
  <!--User Added-->
  <div data-notice="#noticeAddedTypeDoc" data-ancor="docType" class="hidden alert alert-success" role="alert">
    <?= $word[151]['name_'.$lang]; ?>
  </div>
  <!--User Update-->
  <div data-notice="#noticeUpdateTypeDoc" data-ancor="docType" class="hidden alert alert-success" role="alert">
    <?= $word[175]['name_'.$lang]; ?>
  </div>
  <!--User Error-->
  <div data-notice="#noticeErrorTypeDoc" data-ancor="docType" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
</div>

<div class="a-user-type-doc-add">
  <form role="form" method="post" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;action=type_doc">
    <table class="table table-bordered">
      <caption class="text-bold text-center"><?= $word[143]['name_'.$lang]; ?></caption>
      <tbody>
        <tr>
          <td>
            <div class="form-group">
              <input name="name_ru" type="text" class="form-control" placeholder="<?= $word[150]['name_'.$lang]; ?> ru">
            </div> 
            <div class="form-group">
              <input name="name_en" type="text" class="form-control" placeholder="<?= $word[150]['name_'.$lang]; ?> en">
            </div>
            <div class="form-group text-right">
              <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>

<div class="a-user-type-doc-edit">
  <form role="form" method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;action=type_doc">
    <table class="table table-bordered table-align-middle">
      <caption class="text-bold text-center"><?= $word[174]['name_'.$lang]; ?></caption>
      <thead>
        <tr>
          <th class="title text-bold"><?= $word[51]['name_'.$lang]; ?></th>

          <th class="title text-bold text-center">
            <?= $word[53]['name_'.$lang]; ?>
          </th>

          <th class="title text-bold text-center">
            <span class="glyphicon glyphicon-trash visible-xs" data-toggle="tooltip" title="<?= $word[26]['name_'.$lang]; ?>"></span>
            <span class="hidden-xs"><?= $word[26]['name_'.$lang]; ?></span>
          </th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($allTypeDoc as $typeDoc): ?>
        <input name="id_rank[]" type="hidden" value="<?= $typeDoc['id']; ?>">
        <tr>
          <!--Название-->
          <td>
            <div class="row">
              
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">ru</div>
                    <input type="text" required="required" class="form-control" placeholder="<?= $word[150]['name_'.$lang]; ?>" value="<?= $typeDoc['name_ru']; ?>">
                    <input name="name_ru[]" type="hidden" value="<?= $typeDoc['name_ru']; ?>">
                  </div>
                </div>
              </div>
              
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">en</div>
                    <input type="text" required="required" class="form-control" placeholder="<?= $word[150]['name_'.$lang]; ?>" value="<?= $typeDoc['name_en']; ?>">
                    <input name="name_en[]" type="hidden" value="<?= $typeDoc['name_en']; ?>">
                  </div>
                </div>
              </div>
              
            </div>
          </td>
          <!--Приоритет-->
          <td>
            <div class="form-group">
               <div class="input-group">
                <input type="text" class="form-control" value="<?= $typeDoc['priority']; ?>" pattern="[0-9]+$"  data-toggle="tooltip" title="<?= $word[153]['name_'.$lang]; ?>">
                <input name="priority[]" required="required" type="hidden" value="<?= $typeDoc['priority']; ?>">
              </div>
            </div> 
          </td>
          <!--Удалить-->
          <td>
            <div class="form-group">
               <div class="input-group">
                <input type="checkbox" value="1">
                <input name="hide[]" type="hidden" value="0">
              </div> 
            </div> 
          </td>
        </tr>
      <?php endforeach; ?>
          <!--Отправить-->
        <tr>
          <td colspan="3">
            <div class="form-group text-right">
              <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>