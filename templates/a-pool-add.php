<div class="a-pool-add">
  <div class="notice">
    <!-- Added-->
    <div data-notice="#noticeAddedPool" data-ancor="poolAdd" class="hidden alert alert-success" role="alert">
      <?= $word[217]['name_'.$lang]; ?>
    </div>
    <!-- Error-->
    <div data-notice="#noticeErrorAddedPool" data-ancor="poolAdd" class="hidden alert alert-danger" role="alert">
      <?= $word[145]['name_'.$lang]; ?>
    </div>
  </div>

  <form role="form" method="post" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;id_subsection=<?= $_GET['id_subsection']; ?>&amp;action=pool_add">
    <table class="table table-bordered">
      <caption class="text-bold text-center"><?= $word[400]['name_'.$lang]; ?></caption>
      <tbody>
        <!--Название-->
        <tr>
            <td class="text-bold">
                <?= $word[51]['name_'.$lang]; ?>
            </td>
            <td>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon"></div>
                    <input name="name_ru" type="text" class="form-control" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
                  </div>
                </div>
            </td>
        </tr>
        <!--Шаблон опроса-->
        <tr>
            <td class="text-bold">
                <?= $word[406]['name_'.$lang]; ?>
            </td>
            <td>
               <?= dropDownListRquired('id_pool_template', $allPoolTemplate); ?>
            </td>
        </tr>
        <!--Дата документа-->
        <tr>
            <td class="text-bold">
                <?= $word[11]['name_'.$lang]; ?>
            </td>
            <td>
                <div class="input-group date date-picker has-success">
                    <input name="date_doc" type="text" class="form-control" required="required" placeholder="<?= $word[11]['name_'.$lang]; ?>">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
            </td>
        </tr>
        <!--Дата конечный срок-->
        <tr>
            <td class="text-bold">
                <?= $word[30]['name_'.$lang]; ?>
            </td>
            <td>
                <div class="input-group date date-picker has-success">
                    <input name="date_end" type="text" class="form-control" required="required" placeholder="<?= $word[30]['name_'.$lang]; ?>">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
            </td>
        </tr>
        <!--Примечание-->
        <tr>
            <td class="text-bold">
                <?= $word[34]['name_'.$lang]; ?>
            </td>
            <td>
                <div class="form-group">
                  <textarea name="remark" class="form-control"></textarea>
                </div>
            </td>
        </tr>
        <!--Название-->
        <tr>
            <td colspan="2">
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
                </div>
            </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>