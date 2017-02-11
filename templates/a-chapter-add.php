<div class="notice">
  <!-- Added-->
  <div data-notice="#noticeAddedChapter" data-ancor="chapterList" class="hidden alert alert-success" role="alert">
    <?= $word[191]['name_'.$lang]; ?>
  </div>
  <!-- Error-->
  <div data-notice="#noticeErrorAddedChapter" data-ancor="chapterList" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
</div>
<div class="a-chapter-add">
  <form role="form" method="post" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;action=chapter_add">
    <table class="table table-bordered">
      <caption class="text-bold text-center"><?= $word[57]['name_'.$lang]; ?></caption>
      <tbody>
        <tr>
          <td>
            <input name="id_book" type="hidden" value="<?= $getIdBook; ?>">
            <!--ru-->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">ru</div>
                <input name="name_ru" type="text" class="form-control" required="required" placeholder="<?= $word[150]['name_'.$lang]; ?>">
              </div>
            </div> 
            <!--en-->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">en</div>
                <input name="name_en" type="text" class="form-control" placeholder="<?= $word[150]['name_'.$lang]; ?>">
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