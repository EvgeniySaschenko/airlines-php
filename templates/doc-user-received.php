<div class="alert alert-success" role="alert">
  <?= $word[306]['name_'.$lang]; ?>
</div>
<div class="alert alert-warning">
  <?= $word[95]['name_'.$lang]; ?>
</div>
<div class="alert alert-warning">
  <?= $word[381]['name_'.$lang]; ?>
</div>

<div class="doc-user-received" data-anchor-pagination="#docUserReceived">

  <nav class="text-right">
    <ul class="pagination" data-page="<?= $_GET['page']; ?>">
        <li><span class="fa fa-arrows-h"></span></li>
      <?php for($i = 1; ceil($sentDocUser[0]['count_doc'] / 30) >= $i; $i++): ?>
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
        <th class="text-center"><span class="fa fa-info-circle" data-toggle="tooltip" title="<?= $word[102]['name_'.$lang]; ?>"></span></th>
        <th><?= $word[51]['name_'.$lang]; ?></th>
        <th class="text-center hidden-xs"><?= $word[91]['name_'.$lang]; ?></th>
        <th class="text-center hidden-xs"><?= $word[60]['name_'.$lang]; ?></th>
        <th class="text-center hidden-xs"><?= $word[29]['name_'.$lang]; ?></th>
        <th class="text-center hidden-xs"><?= $word[30]['name_'.$lang]; ?></th>
        <th class="text-center"><span class="glyphicon glyphicon-download" data-toggle="tooltip" title="<?= $word[13]['name_'.$lang]; ?>"></span></th>
        <th class="text-center"><?= $word[29]['name_'.$lang]; ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($sentDocUser as $sentDoc): ?>
        <tr class="doc-data"
          data-id="<?= $sentDoc['id']; ?>"
          data-id-section="<?= $sentDoc['id_section']; ?>"
          data-id-user="<?= $sentDoc['id_user']; ?>"
          data-date-studied="<?= $sentDoc['date_studied']; ?>"
          data-id-doc="<?= $sentDoc['id_doc']; ?>"
          data-link-doc="<?= $sentDoc['link_doc']; ?>"
          data-id-sent-doc="<?= $sentDoc['id']; ?>"
          data-date-view="<?= $sentDoc['date_view']; ?>"
          data-name="<?= $sentDoc['name_'.$lang]; ?>"
          data-doc-extension="<?= $sentDoc['extension']; ?>">
            <td class="doc-user-received__info text-center">
              <span class="place-notice fa fa-file-text" data-toggle="tooltip" title="<?= $word[89]['name_'.$lang].' '.$sentDoc['days_left'].' '.$word[90]['name_'.$lang]; ?>"></span>
            </td>

            <!--Полная версия - Название-->
            <td class="doc-user-received__name">
              <div class="call-modal-doc cut-text" data-toggle="modal" data-target=".modal-doc">
                <?= $sentDoc['name_'.$lang]; ?>
              </div>
            </td>

            <td class="doc-user-received__section text-center hidden-xs">
              <span class="icon-section" data-toggle="tooltip" title="<?= $sentDoc['section_'.$lang]; ?>"></span>
            </td>
      		<td class="doc-user-received__date-sent text-center hidden-xs"><?= convertDate($sentDoc['date_sent']); ?></td>
      		<td class="doc-user-received__date-studied text-center hidden-xs"><?= convertDate($sentDoc['date_studied']); ?></td>
      		<td class="doc-user-received__date-end text-center hidden-xs"><?= convertDate($sentDoc['date_end']); ?></td>
      		<td class="doc-user-received__download text-center">
              <?= linkDocDownload($sentDoc['id_section'], $sentDoc['id_subsection'], $sentDoc['id_doc'], $sentDoc['id']) ?>
            </td>
      		<td class="doc-user-received__checkbox text-center">
            <form action="update.php?lang=<?= $lang; ?>&amp;id_doc=<?= $sentDoc['id_doc']; ?>&amp;id_sent_doc=<?= $sentDoc['id']; ?>&amp;action=studied_doc" method="get">
              <input class="send-form checkbox-study" type="checkbox">
            </form>
            </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
