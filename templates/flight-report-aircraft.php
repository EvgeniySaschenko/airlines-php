<div class="flight-report-aircraft">
<table class="table table-striped">
    <caption class="text-center text-uppercase text-bold"><?= $word[252]['name_'.$lang]; ?></caption>
    <thead>

    </thead>
    <tbody>
        
    <?php foreach($allAircraft as $aircraft): ?>
      <tr>
        <td class="text-bold flight-report-aircraft__name">
          <?= $aircraft['name_'.$lang].' '.$aircraft['model']; ?>
        </td>
        <?php foreach($allFlightReportGroupYear as $flightReportYear): ?>
          <?php foreach($allFlightReportGroupYearGroupAircraft as $flightReportGroupYearGroupAircraft): ?>
            <?php if(convertDateYear($flightReportYear['date_shipping']) == convertDateYear($flightReportGroupYearGroupAircraft['date_shipping']) and $flightReportGroupYearGroupAircraft['id_aircraft'] == $aircraft['id']): ?>
            <td class="text-bold">
              <a href="index.php?lang=<?= $lang ;?>&id_section=<?= $getIdSection ;?>&id_subsection=<?= $getIdSubsection ;?>&id_aircraft=<?= $aircraft['id'];?>&year=<?= convertDateYear($flightReportYear['date_shipping']); ?>&action=flight_consolidated_report_aircraft_year#navBottom">
                <?= convertDateYear($flightReportYear['date_shipping']); ?>
              </a> 
            </td>
            <?php $flightReportAircraftTD = 1; ?>
            <?php break; ?>
            <?php endif; ?>
          <?php endforeach; ?>
          <!--Если полётов в году небыо-->    
          <?php if($flightReportAircraftTD != 1): ?>
            <td class="text-center"> </td>
          <?php endif; ?>    
          <?php unset($flightReportAircraftTD); ?>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>

    </tbody>
  </table>
</div>