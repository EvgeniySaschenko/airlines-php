<div class="control__pool-user-control" data-anchor-pagination="#riskAssessment">
 
<nav class="text-right">
  <ul class="pagination" data-page="<?= $_GET['page']; ?>">
      <li><span class="fa fa-arrows-h"></span></li>
    <?php for($i = 1; ceil($countPpoolUserControl[0]['count_records'] / 30) >= $i; $i++): ?>
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
    
    
    
  <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th class="title text-bold"><?= $word[15]['name_'.$lang]; ?></td>
        <th class="title text-bold"><?= $word[18]['name_'.$lang]; ?></td>
        <th class="title text-bold"><?= $word[453]['name_'.$lang]; ?></td>
        <th class="title text-bold"><?= $word[11]['name_'.$lang]; ?></td> 
      </tr>
    </thead>
    <tbody>
    <?php foreach($allPpoolUserControl as $poolUserControl): ?>
        <tr>
          <td><?= $poolUserControl['user_rank_'.$lang]; ?></td>
          <td>
            <?= linkUser($poolUserControl['id_section_user'], $poolUserControl['id_user'], $poolUserControl['user_last_name_'.$lang], $poolUserControl['user_name_'.$lang], $poolUserControl['user_first_name_'.$lang]); ?>
          </td>
          <td class="text-center">
            <?= $poolUserControl['count_no_answer']; ?>
          </td>
          <td class="text-bold">
            <?= convertDateYear($poolUserControl['date_doc']).' / '.showNameMonth($poolUserControl['date_doc']); ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>