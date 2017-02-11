<div class="doc-user">
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="text-center"><span class="fa fa-info-circle" data-toggle="tooltip" title="<?= $word[50]['name_'.$lang]; ?>"></span></th>
        <th class="text-center"><?= $word[10]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[51]['name_'.$lang]; ?> / <?= $word[42]['name_'.$lang]; ?></th>
        <th class="text-center hidden-xs"><?= $word[11]['name_'.$lang]; ?></th>
        <th class="text-center hidden-xs"><?= $word[43]['name_'.$lang]; ?></th>
        <th class="text-center hidden-xs"><?= $word[12]['name_'.$lang]; ?></th>
        <th class="text-center"><span class="glyphicon glyphicon-download" data-toggle="tooltip" title="<?= $word[13]['name_'.$lang]; ?>"></span></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($allDoc as $doc): ?>
      <tr class="doc-data"
        data-id-doc="<?= $doc['id']; ?>"
        data-id-section="<?= $doc['id_section']; ?>"
        data-id-subsection="<?= $doc['id_subsection']; ?>"
        data-doc-extension="<?= $doc['extension'] ?>"
        data-date-end-doc="<?= $doc['date_end']; ?>"
        data-link-doc="<?= $doc['link']; ?>"
        data-id-sent-doc="0"
        data-name="<?= $doc['type_'.$lang].' '.$doc['name_'.$lang]; ?>">
        <td class="user-doc__info">
          <span class="place-notice fa fa-file-text" data-toggle="tooltip" title="<?= $word[89]['name_'.$lang].' '.$doc['days_left'].' '.$word[90]['name_'.$lang]; ?>"></span>
        </td>
        <td class="user-doc__type"><?= $doc['type_'.$lang]; ?></td>
        <td class="user-doc__name">
          <span class="call-modal-doc" data-toggle="modal" data-target=".modal-doc">
            <?= $doc['name_'.$lang]; ?>
          </span>
        </td>
        <td class="user-doc__date-doc text-center hidden-xs"><?= convertDate($doc['date_doc']); ?></td>
        <td class="user-doc__date-end text-center hidden-xs"><?= convertDate($doc['date_end']); ?></td>
        <td class="user-doc__date-uploads text-center hidden-xs"><?= convertDateTime($doc['date_uploads']); ?></td>
        <td class="user-doc__date-extension text-center">
          <?= linkDocDownload($doc['id_section'], $doc['id_subsection'], $doc['id'], 0); ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
