<h1 class="doc-data title-page text-center text-uppercase"
    data-id-doc="<?= $currentDoc[0]['id']; ?>"
    data-id-section="<?= $currentDoc[0]['id_section']; ?>"
    data-id-subsection="<?= $currentDoc[0]['id_subsection']; ?>"
    data-link-doc="<?= $currentDoc[0]['link']; ?>"
    data-id-sent-doc="0"
    data-name="<?= $doc['name_'.$lang]; ?>"
    data-doc-extension="<?= $currentDoc[0]['extension']; ?>">
    <?= $word[99]['name_'.$lang]; ?>
    <?= linkDocDownload($currentDoc[0]['id_section'], $currentDoc[0]['id_subsection'], $currentDoc[0]['id'], 0); ?>
   <div class="call-modal-doc" data-toggle="modal" data-target=".modal-doc">
     <?= $currentDoc[0]['name_'.$lang]; ?>
   </div>
</h1>
<div class="sent-doc" data-anchor-pagination="#sentDoc">
  
  <nav class="text-right">
    <ul class="pagination" data-page="<?= $_GET['page']; ?>">
        <li><span class="fa fa-arrows-h"></span></li>
      <?php for($i = 1; ceil($allSentDoc[0]['count_doc_sent'] / 30) >= $i; $i++): ?>
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
  
    <form method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $currentDoc[0]['id_section']; ?>&amp;id_subsection=<?= $currentDoc[0]['id_subsection']; ?>&amp;id_section_user=<?= $section['id']; ?>&amp;id_doc=<?= $currentDoc[0]['id']; ?>&amp;action=sent_doc#navBottom">
      <table class="table table-striped">
        <tbody>
          <caption class="text-uppercase text-bold"><?= $allSentDoc[0]['section_'.$lang]; ?></caption>
          <tr>
            <th class="title text-center">
              <span class="fa fa-info-circle" data-toggle="tooltip" title="<?= $word[102]['name_'.$lang]; ?>"></span>
            </th>
            <th class="title text-center text-bold hidden-xs"><?= $word[15]['name_'.$lang]; ?></th>
            <th class="title text-center text-bold"><?= $word[18]['name_'.$lang]; ?></th>
            <th class="title text-center text-bold hidden-xs"><?= $word[101]['name_'.$lang]; ?></th>
            <th class="title text-center text-bold hidden-xs"><?= $word[60]['name_'.$lang]; ?></th>
            <th class="title text-center text-bold hidden-xs"><?= $word[29]['name_'.$lang]; ?></th>
            <th class="title text-center text-bold"><?= $word[30]['name_'.$lang]; ?></th>
            <th class="title text-center text-bold"><span class="glyphicon glyphicon-trash" data-toggle="tooltip" title="<?= $word[26]['name_'.$lang]; ?>"></span></th>
          </tr>
            <?php foreach($allSentDoc as $sentDoc): ?>
              <?php if($user['hide'] == 0 and $user['id_section'] == $section['id']): ?>
                <tr class="doc-data"
                    data-date-studied="<?= $sentDoc['date_studied']; ?>"
                    data-date-end="<?= $sentDoc['date_end']; ?>">
                  <td class="sent-doc__user-info">
                    <span class="place-notice fa fa-file-text"></span>
                    <input type="hidden" name="id_sent_doc[]" value="<?= $sentDoc['id']; ?>">
                  </td>
                  
                  <td class="sent-doc__user-rank hidden-xs">
                    <div class="cut-text"><?= $sentDoc['rank_'.$lang]; ?></div>
                  </td>
                  
                  <td class="sent-doc__user-name">
                    <?= linkUser($sentDoc['id_section'], $sentDoc['id_user'], $sentDoc['last_name_'.$lang], $sentDoc['name_'.$lang], $sentDoc['first_name_'.$lang]); ?>
                  </td>
                  
                  <td class="sent-doc__ip hidden-xs">
                    <?= $sentDoc['ip']; ?>
                  </td>
                  
                  <td class="sent-doc__date-sent text-center hidden-xs">
                    <?= convertDate($sentDoc['date_sent']); ?>
                  </td>
                  
                  <td class="sent-doc__date-studied text-center hidden-xs">
                    <?= convertDate($sentDoc['date_studied']); ?>
                  </td>
                  
                  <td class="sent-doc__date-end text-center">
                    <div class="input-group date date-picker sent-doc__form-date-end">
                      <div class="date-input-group">
                        <input type="text" class="form-control date-input" value="<?= convertDate2($sentDoc['date_end']); ?>">
                        <input type="hidden" name="date_end[]" value="<?= convertDate3($sentDoc['date_end']); ?>">
                      </div>
                      <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                    </div>
                  </td>
                  
                  <td class="sent-doc__checkbox-delete text-center">
                    <div class="input-group">
                      <input type="checkbox" data-checkbox-select="<?= $sentDoc['id_section_user']; ?>" value="1">
                      <input type="hidden" name="hide[]" value="0">
                    </div>
                  </td>
                  
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
            <tr>
              <td class="sent-doc__checkbox-all text-bold text-right" colspan="8">
                <?= $word[92]['name_'.$lang]; ?>
                  <input type="checkbox" data-checkbox-select-all="<?= $allSentDoc[0]['id_section_user']; ?>" data-toggle="tooltip" title="<?= $word[92]['name_'.$lang]; ?>">
              </td>
            </tr>
            <tr>
              <td class="text-right sent-doc__bottom" colspan="8">
                <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
              </td>
            </tr>
        </tbody>
      </table>
      </form>
</div>
