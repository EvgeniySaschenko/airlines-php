<h1 class="title-page text-center text-uppercase"> <?= $currentSection[0]['name_'.$lang]; ?> </h1>
<div class="statistics">

  <table class="table table-striped statistics">
    <thead>
      <tr>
        <th class="title text-bold">
          <?= $word[18]['name_'.$lang]; ?>
        </th>
        <th class="title text-bold hidden-xs">
          <?= $word[101]['name_'.$lang]; ?>
        </th>
        <th class="title text-bold text-center hidden-xs">
          <?= $word[110]['name_'.$lang]; ?>
        </th>
        <th class="title text-bold text-center">
          <?= $word[109]['name_'.$lang]; ?>
        </th>
        <th class="title text-bold text-right hidden-xs">
          <?= $word[111]['name_'.$lang]; ?>
        </th>
      </tr>
    </thead>
    
    <?php foreach($allDateVisit as $dateVisit): ?>  
			<tr class="title text-bold text-right">
				<td colspan="5"><?= convertDate($dateVisit['date_visit']) ?></td>
			</tr>
      <?php foreach($allVisitors as $visitor): ?>
        <?php if(convertDate($dateVisit['date_visit']) == convertDate($visitor['date_visit'])): ?>
        <tr>
          <td class="statistics__user-name">
            <?= linkUser($visitor['id_section_user'], $visitor['id_user'], $visitor['last_name_'.$lang], $visitor['name_'.$lang], $visitor['first_name_'.$lang]); ?>
          </td>
          <td class="statistics__ip hidden-xs">
            <?= $visitor['ip']; ?>
          </td>
          <td class="statistics__browser text-center hidden-xs">
            <span class="icon-browser fa fa-<?= definingBrowser($visitor['user_agent']); ?>" data-toggle="tooltip" title="<?= definingBrowser($visitor['user_agent']); ?>"></span>
          </td>
          <td class="statistics__cout-visits text-center">
            <?= $visitor['cout_visits']; ?>
          </td>
          <td class="statistics__date-visit text-right hidden-xs">
            <?= convertDate($visitor['date_visit']); ?>
          </td>
        </tr>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
