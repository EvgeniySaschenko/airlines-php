<div class="doc-list-voluntary-posts">
<table class="table table-striped">
    <caption class="text-center text-uppercase text-bold"><?= $word[186]['name_'.$lang]; ?></caption>
    <thead>
      <tr>
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
      </tr>
    </thead>
    <tbody>
      <?php foreach($allDoc as $doc): ?>
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
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>