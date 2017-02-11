<div class="flight-takeoff-approach-airports-list" data-anchor-pagination="#flightTakeoffApproachAirports">
  <table class="table table-striped">
    <caption class="text-center text-uppercase text-bold">
      <?= $word[125]['name_'.$lang]; ?>
    </caption>
    <thead>
      <tr>
        <th class="title">
          <?= $word[18]['name_'.$lang]; ?>
        </th>
      </tr>
    </thead>
      <?php foreach($allPicFlightReportTakeoffApproach as $key => $picFlightReportTakeoffApproach): ?>
        <?php if(convertDateYear($allPicFlightReportTakeoffApproach[$key - 1]['date_shipping']) != convertDateYear($picFlightReportTakeoffApproach['date_shipping'])): ?>
        <tr class="title text-bold text-center">
          <td><?= convertDateYear($picFlightReportTakeoffApproach['date_shipping']); ?></td>
        </tr>
        <?php endif; ?>
        <tr>
          <td class="flight-takeoff-approach-airports-list__user-name text-left">
            <span class="fa fa-user"></span> 
            <a href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $currentSubsection[0]['id_section']; ?>&amp;id_subsection=<?= $currentSubsection[0]['id']; ?>&amp;id_user=<?= $picFlightReportTakeoffApproach['id_user']; ?>&amp;year=<?= convertDateYear($picFlightReportTakeoffApproach['date_shipping']); ?>&amp;action=flight_takeoff_approach_list_quarter#navBottom">
              <?=fullNameUser($picFlightReportTakeoffApproach['last_name_'.$lang], $picFlightReportTakeoffApproach['name_'.$lang], $picFlightReportTakeoffApproach['first_name_'.$lang]);?>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>