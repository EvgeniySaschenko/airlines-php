<div class="pool-list" data-anchor-pagination="#poolList">
    <h1 class="title-page text-center text-uppercase"> <?= $currentSubsection[0]['name_'.$lang]; ?> </h1>

    
  <nav class="text-right">
    <ul class="pagination" data-page="<?= $_GET['page']; ?>">
        <li><span class="fa fa-arrows-h"></span></li>
      <?php for($i = 1; ceil($allPool[0]['count_pool'] / 30) >= $i; $i++): ?>
        <li class="pagination__page" data-page="<?= $i - 1; ?>">
          <?php if(isset($_GET['page']) or $_GET['page'] === 0): ?>
            <a href="<?= substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '&page')); ?>&amp;page=<?= $i - 1; ?>"><?= $i; ?></a>
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
        <th class="title">
          <?= $word[51]['name_'.$lang]; ?>
        </th>
        <th class="title text-right">
          <?= $word[11]['name_'.$lang]; ?>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($allPoolGroupMonth as $poolMonth): ?>
       <?php foreach($allPool as $key => $pool): ?>
         <?php if(convertDateYearMonth($pool['date_doc']) == convertDateYearMonth($poolMonth['date_doc'])): ?>
            <!--Выводит год-->
            <?php if(convertDateYear($allPool[$key - 1]['date_doc']) != convertDateYear($poolMonth['date_doc'])): ?>
            <tr class="title text-bold text-center">
              <td colspan="7"><?= convertDateYear($poolMonth['date_doc']); ?></td>
            </tr>
            <?php endif; ?>
            <!--Выводит месяц-->
            <?php if(convertDateYearMonth($allPool[$key - 1]['date_doc']) != convertDateYearMonth($poolMonth['date_doc']) and $pool['date_doc'] != 0): ?>
            <tr class="title text-bold">
              <td colspan="7"><?= showNameMonth($poolMonth['date_doc']); ?></td>
            </tr>
            <?php endif; ?>
            <tr data-date-doc="<?= $pool['date_doc']; ?>">
              <td class="pool-list__name">
                <div class="cut-text">
                <a href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $pool['id_section']; ?>&amp;id_subsection=<?= $pool['id_subsection']; ?>&amp;id_pool=<?= $pool['id']; ?>&amp;action=pool_edit_user#navBottom">
                  <?= $pool['name_'.$lang]; ?>
                </a>
                </div>
              </td>
              <td class="pool-list__date-create text-right">
                 <?= convertDate($pool['date_doc']); ?>
              </td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
    
</div>
