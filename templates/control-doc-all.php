<div class="control__doc-all" data-anchor-pagination="#docAll">
  <nav class="text-right">
    <ul class="pagination" data-page="<?= $_GET['page']; ?>">
        <li><span class="fa fa-arrows-h"></span></li>
      <?php for($i = 1; ceil($allDocControl[0]['count_doc'] / 30) >= $i; $i++): ?>
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
        <th class="text-center"><span class="fa fa-info-circle" data-toggle="tooltip" title="<?= $word[75]['name_'.$lang]; ?>"></span></th>
        <th class="title text-bold"><?= $word[51]['name_'.$lang]; ?></td>
        <th class="title text-bold text-center hidden-xs"><?= $word[89]['name_'.$lang].' '.$word[90]['name_'.$lang]; ?></td>
        <th class="title text-bold text-center hidden-xs"><?= $word[108]['name_'.$lang]; ?></td>
        <th class="title text-bold text-center hidden-xs"><?= $word[91]['name_'.$lang]; ?></td>
      </tr>
    </thead>
    <tbody>
    <?php foreach($allDocControl as $docControl): ?>
      <tr data-date-end-doc="<?= $docControl['date_end']; ?>"
          data-id-section="<?= $docControl['id_section']; ?>">
        <td class="text-center">
          <span class="place-notice fa fa-file-text" data-toggle="tooltip" title="<?= $word[89]['name_'.$lang].' '.$docControl['days_left'].' '.$word[90]['name_'.$lang]; ?>"></span>
        </td>
        <td>  
          <div class="cut-text">
            <a href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $docControl['id_section']; ?>&amp;id_subsection=<?= $docControl['id_subsection']; ?>&amp;id_book=<?= $docControl['id_book']; ?>#navBottom">
              <?= $docControl['name_'.$lang]; ?>
            </a>
          </div>
        </td>
        <td class="text-center hidden-xs"><?= $docControl['days_left']; ?></td>
        <td class="text-center hidden-xs"><?= $docControl['date_end']; ?></td>
          <td class="text-center hidden-xs">
            <span class="icon-section" data-toggle="tooltip" title="<?= $docControl['section_'.$lang]; ?>"></span>
          </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
