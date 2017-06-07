<div class="a-pool-list">
  
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="title">
          <?= $word[51]['name_'.$lang]; ?>
        </th>
        <th class="title text-right hidden-xs">
          <?= $word[71]['name_'.$lang]; ?>
        </th>
      </tr>
    </thead>
    <caption class="text-bold text-center"><?= $word[409]['name_'.$lang]; ?></caption>
    <tbody>
      <?php foreach($allPool as $pool): ?>
        <tr>
          <td class="a-pool-list__name">
            <div class="cut-text">
            <a href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $pool['id_section']; ?>&amp;id_subsection=<?= $pool['id_subsection']; ?>&amp;id_pool=<?= $pool['id']; ?>&amp;action=pool_edit#navBottom">
              <?= $pool['name_'.$lang]; ?>
            </a>
            </div>
          </td>
          <td class="a-pool-list__date-create text-right hidden-xs">
             <?= convertDate($pool['date_create']); ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
