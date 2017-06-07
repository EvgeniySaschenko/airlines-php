<div class="a-pool-template-edit">
   <h1 class="title-page text-center text-uppercase"> <?= $currentPool[0]['name_'.$lang]; ?> </h1>    
  <div class="notice">
    <!-- Added-->
    <div data-notice="#noticeAddedPoolTemplateQuestion" data-ancor="noticeAddedPoolTemplateQuestion" class="hidden alert alert-success" role="alert">
      <?= $word[217]['name_'.$lang]; ?>
    </div>
    <!-- Update-->
    <div data-notice="#noticeUpdatePoolTemplateQuestion" data-ancor="noticeUpdatePoolTemplateQuestion" class="hidden alert alert-success" role="alert">
      <?= $word[218]['name_'.$lang]; ?>
    </div>
    <!-- Error-->
    <div data-notice="#noticeErrorAddedPoolTemplateQuestion" data-ancor="noticeErrorAddedPoolTemplateQuestion" class="hidden alert alert-danger" role="alert">
      <?= $word[145]['name_'.$lang]; ?>
    </div>
  </div>

  <form role="form" method="post" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;id_subsection=<?= $_GET['id_subsection']; ?>&amp;id_pool_template=<?= $_GET['id_pool_template']; ?>&amp;action=pool_template_question_add">
    <table class="table table-bordered a-pool-template-edit__table-add">
      <caption class="text-bold text-center"><?= $word[401]['name_'.$lang]; ?></caption>
      <tbody>
        <tr>
          <td>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"></div>
                <input name="name_ru" type="text" class="form-control" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
              </div>
            </div> 
            <div class="form-group">
                <input name="name_departament" type="text" class="form-control" placeholder="<?= $word[372]['name_'.$lang]; ?>">
            </div> 
            <div class="form-group">
                <input name="priority" type="text" class="form-control" placeholder="<?= $word[53]['name_'.$lang]; ?>">
            </div> 
            <div class="form-group">
                 <?= dropDownListUsers('id_user', $allUser); ?>
            </div> 
            <div class="form-group text-right">
              <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
   
   
   
<form method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;id_subsection=<?= $_GET['id_subsection']; ?>&amp;id_pool_template=<?= $_GET['id_pool_template']; ?>&amp;action=pool_template_question_edit">
  <table class="table table-striped table-align-middle a-pool-template-edit__table-edit">
  <caption class="text-bold text-center"><?= $word[404]['name_'.$lang]; ?></caption>
    <thead>
      <tr>
        <th class="text-center a-pool-edit__table-edit_name"><?= $word[51]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[372]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[53]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[103]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[26]['name_'.$lang]; ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($allPoolTempleateQuestion as $poolTempleateQuestion): ?>
      <tr>
        <!--Название-->
        <td>
          <input name="id_pool_template_question[]" type="hidden" class="form-control" value="<?= $poolTempleateQuestion['id'] ?>">
            
          <!--ru-->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-addon"></div>
              <input name="name_ru[]" type="text" class="form-control" value="<?= $poolTempleateQuestion['name_ru'] ?>" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
            </div>
          </div> 
        </td>
        <!--Ответственный департамент-->
        <td>
          <div class="form-group">
              <input name="name_departament[]" type="text" class="form-control" value="<?= $poolTempleateQuestion['name_departament'] ?>" placeholder="<?= $word[372]['name_'.$lang]; ?>">
          </div> 
        </td>
        <!--Приоритет-->
        <td>
          <div class="form-group">
              <input name="priority[]" type="text" class="form-control" value="<?= $poolTempleateQuestion['priority'] ?>" placeholder="<?= $word[53]['name_'.$lang]; ?>">
          </div> 
        </td>
        <!--Пользователь-->
        <td>
          <?= dropDownListUsers('id_user[]', $allUser, $poolTempleateQuestion['id_user']); ?>
        </td>
        <!--Удалить-->
        <td>
          <div class="form-group text-center">
           <div class="input-group">
            <input type="checkbox" value="1">
            <input name="hide[]" type="hidden" value="0">
           </div>
          </div>
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