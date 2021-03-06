<div class="flight-consolidated-report-year">
  <table class="table table-striped">
    <caption class="text-center text-uppercase text-bold">
      <?= $word[251]['name_'.$lang].' '.$_GET['year'].' - '.$currentAircraft[0]['name_'.$lang].' '.$currentAircraft[0]['model']; ?>
    </caption>
    <thead>
      <tr>
        <!--Месяц-->
        <th>
          <?= $word[253]['name_'.$lang]; ?>
        </th>
        <!--Растояние-->
        <th>
          <?= $word[220]['name_'.$lang]; ?> (<?= $word[239]['name_'.$lang]; ?>)
        </th>
        <!--Время полета-->
        <th>
          <?= $word[222]['name_'.$lang]; ?> (<?= $word[240]['name_'.$lang]; ?>)
        </th>
        <!--Топливо
        <th>
          <?//= $word[225]['name_'.$lang]; ?> (T)
        </th>-->
        <!--Масло
        <th>
          <?//= $word[226]['name_'.$lang]; ?> (kg)
        </th>-->
        <!--Груз--> 
        <th>
          <?= $word[237]['name_'.$lang]; ?> + <?= $word[238]['name_'.$lang]; ?> (<?= $word[241]['name_'.$lang]; ?>)
        </th>
        <!--КПД Т / КМ--> 
        <th>
          <?= $word[267]['name_'.$lang]; ?> 
        </th>
        <th>
          <?= $word[389]['name_'.$lang]; ?> 
        </th>
      </tr>
    </thead>
    
    <tbody>
      <?php foreach($allFlightConsolidatedReportAircraftYear as $flightConsolidatedReportAircraftYear): ?>
        <!--Месяц-->
        <?php $takeoffWeight = convertKgToT($flightConsolidatedReportAircraftYear['weight_aircraft']) + convertKgToT($flightConsolidatedReportAircraftYear['curb_weight_aircraft']) + $flightConsolidatedReportAircraftYear['fuel_balance'] + $flightConsolidatedReportAircraftYear['fuel_fueled'] + convertKgToT($flightConsolidatedReportAircraftYear['oil_balance'] + $flightConsolidatedReportAircraftYear['oil_fueled']) + $flightConsolidatedReportAircraftYear['weight_cargo'] + ($flightConsolidatedReportAircraftYear['weight_passenger'] * 80) / 1000; ?>
        <tr>
          <td class="text-bold">
             <a href="index.php?lang=<?= $lang ;?>&id_section=<?= $getIdSection ;?>&id_subsection=<?= $getIdSubsection ;?>&id_aircraft=<?= $flightConsolidatedReportAircraftYear['id_aircraft'];?>&year=<?= convertDateYear($flightConsolidatedReportAircraftYear['date_shipping']); ?>&month=<?= convertDateMonth($flightConsolidatedReportAircraftYear['date_shipping']); ?>&action=flight_consolidated_report_aircraft_year_month#navBottom">  
               <?= showNameMonth($flightConsolidatedReportAircraftYear['date_shipping']); ?>
             </a>
          </td>
            <!--Растояние-->
          <td><?= $flightConsolidatedReportAircraftYear['distance']; ?></td>
            <!--Время полета-->
          <td><?= convertNumberToTime($flightConsolidatedReportAircraftYear['time_flight']); ?></td>
            <!--Топливо
              <td><?//= round($flightConsolidatedReportAircraftYear['fuel_spent'], 2); ?></td>
            -->
            <!--Масло
              <td><?//= round($flightConsolidatedReportAircraftYear['oil_spent'], 2); ?></td>
            -->
            <!--Груз-->
          <td><?= round($flightConsolidatedReportAircraftYear['weight_cargo'] + $flightConsolidatedReportAircraftYear['weight_passenger'] / 1000, 2); ?></td>
            <!-- КПД Т / КМ = (Время полета * Груз * Ср. скорость * 24) / 1000 --> 
          <td><?= round(($flightConsolidatedReportAircraftYear['weight_cargo'] + $flightConsolidatedReportAircraftYear['weight_passenger']) / $flightConsolidatedReportAircraftYear['distance'] * 10, 2); ?></td>
          <td><?= $flightConsolidatedReportAircraftYear['count_flight']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

