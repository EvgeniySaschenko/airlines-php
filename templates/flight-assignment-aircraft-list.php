<div class="flight-takeoff-approach-airports-list" data-anchor-pagination="#flightTakeoffApproachAirports">
  <table class="table table-striped">
    <caption class="text-center text-uppercase text-bold">
      <?= $word[124]['name_'.$lang]; ?>
    </caption>
    <thead>
      <tr>
        <th class="title">
          <?= $word[127]['name_'.$lang]; ?>
        </th>
      </tr>
    </thead>
     <?php foreach($allAircraft as $aircraft): ?>
        <tr>
          <td> 
            <a href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $currentSubsection[0]['id_section']; ?>&amp;id_subsection=<?= $currentSubsection[0]['id']; ?>&amp;id_aircraft=<?= $aircraft['id']; ?>&amp;action=flight_assignment_aircraft_list#navBottom">
              <?= $aircraft['name_'.$lang].' '.$aircraft['model']; ?>
            </a>
          </td>
        </tr>
     <?php endforeach; ?>
    </tbody>
  </table>
</div>