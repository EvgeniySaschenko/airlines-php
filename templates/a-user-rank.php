<div class="notice">
  <!--Rank Added-->
  <div data-notice="#noticeAddedUserRank" data-ancor="userRank" class="hidden alert alert-success" role="alert">
    <?= $word[148]['name_'.$lang]; ?>
  </div>
  <!--Rank Error-->
  <div data-notice="#noticeErrorUserRank" data-ancor="userRank" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
  <!--Rank Update-->
  <div data-notice="#noticeUpdateUserRank" data-ancor="userRank" class="hidden alert alert-success" role="alert">
    <?= $word[154]['name_'.$lang]; ?>
  </div>
</div>
<div class="a-user-rank-add">
  <form role="form" method="post" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;action=rank">
    <table class="table table-bordered">
      <caption class="text-bold text-center"><?= $word[142]['name_'.$lang]; ?></caption>
      <tbody>
        <tr>
          <td>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">ru</div>
                <input name="name_ru" type="text" class="form-control" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
              </div>
            </div> 
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">en</div>
                <input name="name_en" type="text" class="form-control" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
              </div>
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


<div class="a-user-rank-edit">
  <form role="form" method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;action=rank">
    <table class="table table-bordered table-align-middle">
      <caption class="text-bold text-center"><?= $word[152]['name_'.$lang]; ?></caption>
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
      <?php foreach($allRank as $rank): ?>
        <input name="id_rank[]" type="hidden" value="<?= $rank['id']; ?>">
        <tr>
          <!--Название-->
          <td>
            <div class="row">
              
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">ru</div>
                    <input type="text" required="required" class="form-control" placeholder="<?= $word[150]['name_'.$lang]; ?>" value="<?= $rank['name_ru']; ?>">
                    <input name="name_ru[]" type="hidden" value="<?= $rank['name_ru']; ?>">
                  </div>
                </div>
              </div>
              
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon">en</div>
                    <input type="text" required="required" class="form-control" placeholder="<?= $word[150]['name_'.$lang]; ?>" value="<?= $rank['name_en']; ?>">
                    <input name="name_en[]" type="hidden" value="<?= $rank['name_en']; ?>">
                  </div>
                </div>
              </div>
              
            </div>
          </td>
          
          <!--Приоритет-->
          <td>
            <div class="form-group">
               <div class="input-group">
                <input type="text" class="form-control" value="<?= $rank['priority']; ?>" pattern="[0-9]+$"  data-toggle="tooltip" title="<?= $word[153]['name_'.$lang]; ?>">
                <input name="priority[]" required="required" type="hidden" value="<?= $rank['priority']; ?>">
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