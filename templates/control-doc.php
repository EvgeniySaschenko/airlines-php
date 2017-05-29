<div class="control__doc" data-anchor-pagination="#doc">
  <div class="alert alert-warning" role="alert">
    <?= $word[385]['name_'.$lang]; ?>
  </div>
  <nav class="text-right">
    <ul class="pagination" data-page="<?= $_GET['page']; ?>">
        <li><span class="fa fa-arrows-h"></span></li>
      <?php for($i = 1; ceil($allDocSectionControl[0]['count_doc'] / 30) >= $i; $i++): ?>
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
      </tr>
    </thead>
    <tbody>
    <?php foreach($allDocSectionControl as $doc): ?>
      <tr data-date-end-doc="<?= $doc['date_end']; ?>">
        <td class="text-center">
          <span class="place-notice fa fa-file-text" data-toggle="tooltip" title="<?= $word[89]['name_'.$lang].' '.$doc['days_left'].' '.$word[90]['name_'.$lang]; ?>"></span>
        </td>
        <td>  
          <div class="cut-text">
            <a href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $doc['id_section']; ?>&amp;id_subsection=<?= $doc['id_subsection']; ?>&amp;id_book=<?= $doc['id_book']; ?>#navBottom">
              <?= $doc['name_'.$lang]; ?>
            </a>
          </div>
        </td>
        <td class="text-center hidden-xs"><?= $doc['days_left']; ?></td>
        <td class="text-center hidden-xs"><?= $doc['date_end']; ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
