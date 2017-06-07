<div class="a-pool-template-add">
  <div class="notice">
    <!-- Added-->
    <div data-notice="#noticeAddedPoolTemplate" data-ancor="poolTemplateAdd" class="hidden alert alert-success" role="alert">
      <?= $word[217]['name_'.$lang]; ?>
    </div>
    <!-- Error-->
    <div data-notice="#noticeErrorAddedPoolTemplate" data-ancor="poolTemplateAdd" class="hidden alert alert-danger" role="alert">
      <?= $word[145]['name_'.$lang]; ?>
    </div>
  </div>

  <form role="form" method="post" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;id_subsection=<?= $_GET['id_subsection']; ?>&amp;action=pool_template_add">
    <table class="table table-bordered">
      <caption class="text-bold text-center"><?= $word[408]['name_'.$lang]; ?></caption>
      <tbody>
        <tr>
          <td>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"></div>
                <input name="name_ru" type="text" class="form-control" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
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