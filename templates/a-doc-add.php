<div class="a-doc-add" id="docUser">
  <div class="notice">
    <!--User Added-->
    <div data-notice="#noticeAddedAddDoc" data-ancor="docUser" class="hidden alert alert-success" role="alert">
      <?= $word[178]['name_'.$lang]; ?>
    </div>
    <!--User Error-->
    <div data-notice="#noticeErrorAddDoc" data-ancor="docUser" class="hidden alert alert-danger" role="alert">
      <?= $word[145]['name_'.$lang]; ?>
    </div>
  </div>
  
  <!--Документ-->
  <form method="post" enctype="multipart/form-data" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection ?>&amp;id_user=<?= $getIdUser; ?>&amp;id_news=<?= $getIdNews; ?>&amp;id_book=<?= $getIdBook; ?>&amp;action=doc#navBottom">
    <table class="table table-striped table-align-middle">
    <caption class="text-bold text-center"><?= $word[40]['name_'.$lang]; ?></caption>
      <tbody>
        <tr>
          <td class="text-center">
            <input type="file"  multiple="true" name="uploadfile[]" class="form-control">
            
            <div>
              <h5>
                <?= $word[177]['name_'.$lang]; ?>
              </h5>
            </div>
            
            <div>
              <h5>
                <?= $word[172]['name_'.$lang]; ?>
              </h5>
              <?php foreach($allowExtension as $extension): ?>
                <span class="label label-default"><?= $extension; ?>;</span>
              <?php endforeach; ?>
            </div>
            
            <div class="text-right">
              <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
            </div>
          </td>
        </tr>
      </tbody>
     </table>
  </form>
</div>


<!--Ссылка-->
<div class="a-doc-link-add">
  <form method="post" enctype="multipart/form-data" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection ?>&amp;id_user=<?= $getIdUser; ?>&amp;id_news=<?= $getIdNews; ?>&amp;id_book=<?= $getIdBook; ?>&amp;action=doc_link#navBottom">
    <table class="table table-bordered">
      <caption class="text-bold text-center"><?= $word[299]['name_'.$lang]; ?></caption>
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
            <!--link-->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-link"></span></div>  
                <input name="link" type="text" class="form-control" placeholder="<?= $word[257]['name_'.$lang]; ?>">
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
        