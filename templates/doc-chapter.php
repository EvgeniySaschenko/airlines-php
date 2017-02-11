<?php if(!empty($currentBook[0]['id'])): ?>
  <h1 class="title-page text-center text-uppercase" id="docList"> <?= $currentBook[0]['name_'.$lang]; ?> </h1>
<?php endif; ?>

<div class="doc-chapter" data-anchor-pagination="#docList">
  <nav class="text-right">
    <ul class="pagination" data-page="<?= $_GET['page']; ?>">
        <li><span class="fa fa-arrows-h"></span></li>
      <?php for($i = 1; ceil($allDoc[0]['count_doc'] / 30) >= $i; $i++): ?>
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

  <table class="table table-striped">
    <thead>
      <tr>
        <th class="text-center"><span class="fa fa-info-circle" data-toggle="tooltip" title="<?= $word[50]['name_'.$lang]; ?>"></span></th>
        <th class="text-center">
          <span class="glyphicon glyphicon-download" data-toggle="tooltip" title="<?= $word[13]['name_'.$lang]; ?>"></span>
        </th>
        <th class="text-center"><?= $word[51]['name_'.$lang]; ?></th>
        <th class="text-center hidden-xs">
          <?= $word[12]['name_'.$lang]; ?>
        </th>
        <th class="text-center hidden-xs">
          <?= $word[11]['name_'.$lang]; ?>
        </th>
        <th class="text-center hidden-xs">
          <?= $word[108]['name_'.$lang]; ?>
        </th>
        <th class="text-center">
          <span class="glyphicon glyphicon-envelope" data-toggle="tooltip" title="<?= $word[93]['name_'.$lang]; ?>"></span>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($allChapter as $chapter): ?>
       <?php foreach($allDoc as $key => $doc): ?>
         <?php if($chapter['id'] == $doc['id_chapter']): ?>
            <!--Глава-->
            <?php if($chapter['id'] != $allDoc[$key - 1]['id_chapter']): ?>
            <tr class="title text-bold">
              <td colspan="7"><?= $chapter['name_'.$lang]; ?></td>
            </tr>
            <?php endif; ?>
            
            <tr class="doc-data"
              data-id-doc="<?= $doc['id']; ?>"
              data-id-section="<?= $doc['id_section']; ?>"
              data-id-subsection="<?= $doc['id_subsection']; ?>"
              data-date-uploads="<?= $doc['date_uploads']; ?>"
              data-date-end-doc="<?= $doc['date_end']; ?>"
              data-date-doc="<?= $doc['date_doc']; ?>"
              data-link-doc="<?= $doc['link']; ?>"
              data-id-sent-doc="0"
              data-name="<?= $doc['name_'.$lang]; ?>"
              data-doc-extension="<?= $doc['extension']; ?>">
              <td class="doc__info text-center">
                <span class="place-notice fa fa-file-text" data-toggle="tooltip" title="<?= $word[89]['name_'.$lang].' '.$doc['days_left'].' '.$word[90]['name_'.$lang]; ?>"></span>
              </td>
              <td class="doc__download text-center">
                <?= linkDocDownload($doc['id_section'], $doc['id_subsection'], $doc['id'], 0) ?>
              </td>
              <td class="doc__name">
                <div class="call-modal-doc cut-text" data-toggle="modal" data-target=".modal-doc">
                  <?= $doc['name_'.$lang]; ?>
                </div>
              </td>
              <td class="doc__date-uploads text-center hidden-xs">
                <?= convertDate($doc['date_uploads']); ?>
              </td>
              <td class="doc__date-doc text-center hidden-xs">
                <?= convertDate($doc['date_doc']); ?>
              </td>
              <td class="doc__date-end text-center hidden-xs">
                <?= convertDate($doc['date_end']); ?>
              </td>
              <td class="doc__send text-center sorter-false">
                <?= linkSendDoc($lang, $doc['id_section'], $doc['id_subsection'], $word[93]['name_'.$lang], $doc['id']); ?>
              </td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
            
      <!--Без Главы-->
      <?php foreach($allDoc as $doc): ?>
       <?php if($doc['id_chapter'] == 0): ?>
        <tr class="title text-bold">
          <td colspan="7"><?= $word[123]['name_'.$lang]; ?></td>
        </tr>
        <?php break; ?>
      <?php endif; ?>
     <?php endforeach; ?>
      <?php foreach($allDoc as $doc): ?>
       <?php if($doc['id_chapter'] == 0): ?>
        <tr class="doc-data"
          data-id-doc="<?= $doc['id']; ?>"
          data-id-section="<?= $doc['id_section']; ?>"
          data-id-subsection="<?= $doc['id_subsection']; ?>"
          data-date-uploads="<?= $doc['date_uploads']; ?>"
          data-date-end-doc="<?= $doc['date_end']; ?>"
          data-date-doc="<?= $doc['date_doc']; ?>"
          data-link-doc="<?= $doc['link']; ?>"
          data-id-sent-doc="0"
          data-name="<?= $doc['name_'.$lang]; ?>"
          data-doc-extension="<?= $doc['extension']; ?>">
          <td class="doc__info text-center">
            <span class="place-notice fa fa-file-text" data-toggle="tooltip" title="<?= $word[89]['name_'.$lang].' '.$doc['days_left'].' '.$word[90]['name_'.$lang]; ?>"></span>
          </td>
          <td class="doc__download text-center">
            <?= linkDocDownload($doc['id_section'], $doc['id_subsection'], $doc['id'], 0) ?>
          </td>
          <td class="doc__name">
            <div class="call-modal-doc cut-text" data-toggle="modal" data-target=".modal-doc">
              <?= $doc['name_'.$lang]; ?>
            </div>
          </td>
          <td class="doc__date-uploads text-center hidden-xs">
            <?= convertDate($doc['date_uploads']); ?>
          </td>
          <td class="doc__date-doc text-center hidden-xs">
            <?= convertDate($doc['date_doc']); ?>
          </td>
          <td class="doc__date-end text-center hidden-xs">
            <?= convertDate($doc['date_end']); ?>
          </td>
          <td class="doc__send text-center sorter-false">
            <?= linkSendDoc($lang, $doc['id_section'], $doc['id_subsection'], $word[93]['name_'.$lang], $doc['id']); ?>
          </td>
        </tr>
      <?php endif; ?>
     <?php endforeach; ?>
    </tbody>
  </table>
</div>