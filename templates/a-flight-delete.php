<div class="notice" id="deleteFlightAssignment">
  <!-- Added-->
  <div data-notice="#noticeDeleteFlightAssignment" data-ancor="deleteFlightAssignment" class="hidden alert alert-success" role="alert">
    <?= $word[250]['name_'.$lang]; ?>
  </div>
</div>

<div class="a-flight-delete">
  <form role="form" method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>&amp;action=delete">
    <table class="table table-bordered table-1">
      <caption class="text-bold text-center"><?= $word[26]['name_'.$lang]; ?></caption>
      <tbody>
        <tr>
          <td class="text-bold">
            <?= $word[124]['name_'.$lang]; ?>
            <?= $currentAssignmentFlight[0]['aircraft_'.$lang].'-'.$currentAssignmentFlight[0]['number_assignment'].'-'.convertDateMonth($currentAssignmentFlight[0]['date_departure']).'-'.convertDateYear($currentAssignmentFlight[0]['date_departure']); ?>
          </td>
          <td class="text-right">
            <form role="form" method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>&amp;action=delete">
              <button type="submit" class="btn btn-danger"><?= $word[26]['name_'.$lang]; ?></button>
            </form>
          </td>
        </tr>
     </tbody>
   </table>
 </form>
</div>