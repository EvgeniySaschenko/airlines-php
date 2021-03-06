<div class="flight-assignment-list" data-anchor-pagination="#flightAssignmentList">
  <nav class="text-right">
    <ul class="pagination" data-page="<?= $_GET['page']; ?>">
        <li><span class="fa fa-arrows-h"></span></li>
      <?php for($i = 1; ceil($allAssignmentFlight[0]['count_flight_assignment'] / 30) >= $i; $i++): ?>
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
        <th class="title">
          <?= $word[18]['name_'.$lang]; ?>
        </th>
        <th class="title">
          <?= $word[126]['name_'.$lang]; ?>
        </th>
        <th class="title hidden-xs">
          <?= $word[127]['name_'.$lang]; ?>
        </th>
        <th class="title text-center hidden-xs">
          <?= $word[128]['name_'.$lang]; ?>
        </th>
      </tr>
    </thead>
      <?php foreach($allAssignmentFlight as $assignmentFlight): ?>
        <tr>
          <td class="flight-assignment-list__user-name text-left">
            <span class="fa fa-calendar visible-xs" data-toggle="tooltip" title="<?= $word[128]['name_'.$lang].' '.convertDate($assignmentFlight['date_departure']); ?>"></span> 
            <span class="fa fa-user hidden-xs"></span> 
            <?=fullNameUser($assignmentFlight['pic_a_last_name_'.$lang], $assignmentFlight['pic_a_name_'.$lang], $assignmentFlight['pic_a_first_name_'.$lang]);?>
          </td>
          <td class="flight-assignment-list__flight-assignment">
            <?php $NUMBER_ASSIGMENT_FLIGHT = NUMBER_ASSIGMENT_FLIGHT($GENERAL_SITE_SETTINGS[0]['numbering_flight_assignment'], $assignmentFlight['aircraft_'.$lang], $assignmentFlight['model'], $assignmentFlight['number_assignment'], $assignmentFlight['date_departure'], $assignmentFlight['num_assignment_month'], $assignmentFlight['count_flight_assignment_month'], ""); ?>
            <?= linkAssignmentForFlight($currentSubsection[0]['id_section'], $currentSubsection[0]['id'], $assignmentFlight['id'], $assignmentFlight['id_aircraft'], ($assignmentFlight['count_flight_assignment_month'] - ($assignmentFlight['num_assignment_month'] - 1)), $NUMBER_ASSIGMENT_FLIGHT); ?>
          </td>
          <td class="flight-assignment-list__aircraft hidden-xs">
            <span class="fa fa-plane"></span> 
            <?= $assignmentFlight['aircraft_'.$lang]; ?> <?= $assignmentFlight['model']; ?>
          </td>
          <td class="flight-assignment-list__date-departure text-center hidden-xs">
            <?= convertDate($assignmentFlight['date_departure']); ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>