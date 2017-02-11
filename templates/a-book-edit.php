<div class="notice">
  <!-- Added-->
  <div data-notice="#noticeEditBook" data-ancor="bookList" class="hidden alert alert-success" role="alert">
    <?= $word[195]['name_'.$lang]; ?>
  </div>
</div>

<div class="a-book-edit">
  <form role="form" method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;action=book_edit">
    <table class="table table-bordered table-align-middle">
      <caption class="text-bold text-center"><?= $word[194]['name_'.$lang]; ?></caption>
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
      <?php foreach($allBook as $book): ?>
        <input name="id_book[]" type="hidden" value="<?= $book['id']; ?>">
        <tr>
          <!--Название-->
          <td>
            <div class="row">
              
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">ru</div>
                    <input type="text" required="required" class="form-control" placeholder="<?= $word[150]['name_'.$lang]; ?>" value="<?= $book['name_ru']; ?>">
                    <input name="name_ru[]" type="hidden" value="<?= $book['name_ru']; ?>">
                  </div>
                </div>
              </div>
              
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">en</div>
                    <input type="text" required="required" class="form-control" placeholder="<?= $word[150]['name_'.$lang]; ?>" value="<?= $book['name_en']; ?>">
                    <input name="name_en[]" type="hidden" value="<?= $book['name_en']; ?>">
                  </div>
                </div>
              </div>
              
            </div>
          </td>
          <!--Приоритет-->
          <td>
            <div class="form-group">
               <div class="input-group">
                <input type="text" class="form-control" value="<?= $book['priority']; ?>" pattern="[0-9]+$"  data-toggle="tooltip" title="<?= $word[153]['name_'.$lang]; ?>">
                <input name="priority[]" required="required" type="hidden" value="<?= $book['priority']; ?>">
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