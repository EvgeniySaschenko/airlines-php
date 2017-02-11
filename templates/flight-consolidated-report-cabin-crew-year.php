<div class="flight-consolidated-report-cabin-crew-year">
<table class="table table-striped">
    <caption class="text-center text-uppercase text-bold"><?= $word[279]['name_'.$lang].' - '.$getYear; ?> </caption>
    <thead>
      <tr>
        <!--Должность-->
        <th class="text-center title">
          <?= $word[15]['name_'.$lang]; ?>
        </th>
        <!--Имя-->
        <th class="text-center title">
          <?= $word[18]['name_'.$lang]; ?>
        </th>
        <!--Месяца-->
            <?= showNameMonthTableTH(); ?>
       <!--Год-->
        <th class="text-center title">
            <?= $word[280]['name_'.$lang]; ?>
        </th> 
      </tr>
    </thead>
    <tbody>
    <?php foreach($allCabinCrewSection as $key => $crew): ?>
      <tr>
        <td colspan="14" class="text-bold text-uppercase">
          <?= $crew['name_'.$lang]; ?>   
        </td>
      </tr>
        <!--Пользователи которые летали-->
        <?php foreach($allFlightConsolidatedReportCrewYearGroupUsers as $flightConsolidatedReportCrewYearGroupUsers): ?>
            <?php if($flightConsolidatedReportCrewYearGroupUsers['id_crew'] == $crew['id'] and $flightConsolidatedReportCrewYearGroupUsers['id_section'] == 4): ?>
              <tr>
                <!--Должность-->  
                <td>
                  <?= $flightConsolidatedReportCrewYearGroupUsers['rank_'.$lang]; ?>  
                </td>
                <!--Имя-->
                <td>
                  <?= linkUser($flightConsolidatedReportCrewYearGroupUsers['id_section'], $flightConsolidatedReportCrewYearGroupUsers['id_user'], $flightConsolidatedReportCrewYearGroupUsers['last_name_'.$lang], $flightConsolidatedReportCrewYearGroupUsers['name_'.$lang], $flightConsolidatedReportCrewYearGroupUsers['first_name_'.$lang]); ?>  
                </td>
                
                        
                    <!--Месяца-->
                    <?php $sumTimeFlight = 0; ?>
                    <?php for($i = 1; $i < 12; $i++): ?>
                    <?php $td = 0; ?>
                        <?php foreach($allFlightConsolidatedReportCrewYear as $flightConsolidatedReportCrewYear): ?>
                            <?php if($flightConsolidatedReportCrewYear['id_user'] == $flightConsolidatedReportCrewYearGroupUsers['id_user'] and convertDateMonth($flightConsolidatedReportCrewYear['date_shipping']) == $i): ?>
                                <?php $td = 1; ?>
                                <td>
                                  <?= convertNumberToTime($flightConsolidatedReportCrewYear['time_flight']); ?> 
                                </td>
                                 <?php $sumTimeFlight = $sumTimeFlight + $flightConsolidatedReportCrewYear['time_flight']; ?> 
                                <?php break; ?>
                            <?php endif; ?>
                            <!--Если в этом месяце налета нет-->    
                        <?php endforeach; ?>
                        <?php if($td == 0): ?>
                            <td>

                            </td>
                        <?php endif; ?>
                    <?php endfor; ?>
                
               

                <!--Год-->
                <td>
                    <?= convertNumberToTime($sumTimeFlight); ?>
                </td>
              </tr>
            <?php endif; ?>
          <?php endforeach; ?>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>