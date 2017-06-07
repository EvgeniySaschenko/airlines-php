<div class="a-pool-template-list">
  
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
      <?php foreach($allPoolTemplate as $poolTemplate): ?>
        <tr>
          <td class="a-pool-list__name">
            <div class="cut-text">
            <a href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $poolTemplate['id_section']; ?>&amp;id_subsection=<?= $poolTemplate['id_subsection']; ?>&amp;id_pool_template=<?= $poolTemplate['id']; ?>&amp;action=pool_template_edit#navBottom">
              <?= $poolTemplate['name_'.$lang]; ?>
            </a>
            </div>
          </td>
          <td class="a-pool-list__date-create text-right hidden-xs">
             <?= convertDate($poolTemplate['date_create']); ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
