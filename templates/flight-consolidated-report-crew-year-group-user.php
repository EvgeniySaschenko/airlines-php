<div class="flight-consolidated-report-crew-year-group-user">
<table class="table table-striped">
    <caption class="text-center text-uppercase text-bold"><?= $word[390]['name_'.$lang]; ?> </caption>
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
        <!--Часов-->
        <th class="text-center title">
          <?= $word[240]['name_'.$lang]; ?>
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
    <?php foreach($allCrewSection as $key => $crew): ?>
      
      
      <?php if($crew['count_user']): ?>
        <tr>
          <td colspan="16" class="text-bold text-uppercase">
            <?= $crew['name_'.$lang]; ?>   
          </td>
        </tr>
      <?php endif; ?>
        
        <!--Пользователи которые летали-->
        <?php foreach($allFlightConsolidatedReportCrewYearGroupUsers as $flightConsolidatedReportCrewYearGroupUsers): ?>
            <?php if($flightConsolidatedReportCrewYearGroupUsers['id_crew'] == $crew['id'] and $flightConsolidatedReportCrewYearGroupUsers['id_section'] == $currentSection[0]['id']): ?>
              <tr>
                <!--Должность-->  
                <td>
                  <?= $flightConsolidatedReportCrewYearGroupUsers['rank_'.$lang]; ?>  
                </td>
                <!--Имя-->
                <td>
                  <?= linkUser($flightConsolidatedReportCrewYearGroupUsers['id_section'], $flightConsolidatedReportCrewYearGroupUsers['id_user'], $flightConsolidatedReportCrewYearGroupUsers['last_name_'.$lang], $flightConsolidatedReportCrewYearGroupUsers['name_'.$lang], $flightConsolidatedReportCrewYearGroupUsers['first_name_'.$lang]); ?>  
                </td>
                <!--Время всего / Время ночью -->
                <td>
                  <div class="text-bold"> 
                    <?= $word[284]['name_'.$lang]; ?>
                  </div>
                  <div class="text-bold"> 
                    <?= $word[285]['name_'.$lang]; ?>
                  </div>
                </td>
                        
                    <!--Месяца-->
                    <?php $sumTimeFlight = 0; ?>
                    <?php $sumTimeNight = 0; ?>
                    <?php for($i = 1; $i <= 12; $i++): ?>
                    <?php $td = 0; ?>
                        <?php foreach($allFlightConsolidatedReportCrewYearUser as $flightConsolidatedReportCrewYearUser): ?>
                            <?php if($flightConsolidatedReportCrewYearUser['id_user'] == $flightConsolidatedReportCrewYearGroupUsers['id_user'] and convertDateMonth($flightConsolidatedReportCrewYearUser['date_shipping']) == $i): ?>
                                <?php $td = 1; ?>
                                <td class="text-center">
                                  <div class="flight-consolidated-report-crew-year__time-flight"> 
                                    <?= convertNumberToTime($flightConsolidatedReportCrewYearUser['time_flight']); ?>
                                  </div>
                                  <div class="flight-consolidated-report-crew-year__time-night"> 
                                    <?= convertNumberToTime($flightConsolidatedReportCrewYearUser['time_night']); ?>
                                  </div>
                                </td>
                                 <?php $sumTimeFlight = $sumTimeFlight + $flightConsolidatedReportCrewYearUser['time_flight']; ?> 
                                 <?php $sumTimeNight = $sumTimeNight + $flightConsolidatedReportCrewYearUser['time_night']; ?> 
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
                <td class="text-center">
                  <div class="flight-consolidated-report-crew-year__time-flight-total"> 
                    <?= convertNumberToTime($sumTimeFlight); ?>
                  </div>
                  <div class="flight-consolidated-report-crew-year__time-night-total"> 
                    <?= convertNumberToTime($sumTimeNight); ?>
                  </div>
                </td>
              </tr>
            <?php endif; ?>
          <?php endforeach; ?>
    <?php endforeach; ?>
              
      <!--Без экипажа-->        
        <tr>
          <td colspan="16" class="text-bold text-uppercase">
            --- 
          </td>
        </tr>

        
        
        <!--Пользователи которые летали-->
        <?php foreach($allFlightConsolidatedReportCrewYearGroupUsers as $flightConsolidatedReportCrewYearGroupUsers): ?>
            <?php if($flightConsolidatedReportCrewYearGroupUsers['id_crew'] == 0): ?>
              <tr>
                <!--Должность-->  
                <td>
                  <?= $flightConsolidatedReportCrewYearGroupUsers['rank_'.$lang]; ?>  
                </td>
                <!--Имя-->
                <td>
                  <?= linkUser($flightConsolidatedReportCrewYearGroupUsers['id_section'], $flightConsolidatedReportCrewYearGroupUsers['id_user'], $flightConsolidatedReportCrewYearGroupUsers['last_name_'.$lang], $flightConsolidatedReportCrewYearGroupUsers['name_'.$lang], $flightConsolidatedReportCrewYearGroupUsers['first_name_'.$lang]); ?>  
                </td>
                <!--Время всего / Время ночью -->
                <td>
                  <div class="text-bold"> 
                    <?= $word[284]['name_'.$lang]; ?>
                  </div>
                  <div class="text-bold"> 
                    <?= $word[285]['name_'.$lang]; ?>
                  </div>
                </td>
                        
                    <!--Месяца-->
                    <?php $sumTimeFlight = 0; ?>
                    <?php $sumTimeNight = 0; ?>
                    <?php for($i = 1; $i <= 12; $i++): ?>
                    <?php $td = 0; ?>
                        <?php foreach($allFlightConsolidatedReportCrewYearUser as $flightConsolidatedReportCrewYearUser): ?>
                            <?php if($flightConsolidatedReportCrewYearUser['id_user'] == $flightConsolidatedReportCrewYearGroupUsers['id_user'] and convertDateMonth($flightConsolidatedReportCrewYearUser['date_shipping']) == $i): ?>
                                <?php $td = 1; ?>
                                <td class="text-center">
                                  <div class="flight-consolidated-report-crew-year__time-flight"> 
                                    <?= convertNumberToTime($flightConsolidatedReportCrewYearUser['time_flight']); ?>
                                  </div>
                                  <div class="flight-consolidated-report-crew-year__time-night"> 
                                    <?= convertNumberToTime($flightConsolidatedReportCrewYearUser['time_night']); ?>
                                  </div>
                                </td>
                                 <?php $sumTimeFlight = $sumTimeFlight + $flightConsolidatedReportCrewYearUser['time_flight']; ?> 
                                 <?php $sumTimeNight = $sumTimeNight + $flightConsolidatedReportCrewYearUser['time_night']; ?> 
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
                <td class="text-center">
                  <div class="flight-consolidated-report-crew-year__time-flight-total"> 
                    <?= convertNumberToTime($sumTimeFlight); ?>
                  </div>
                  <div class="flight-consolidated-report-crew-year__time-night-total"> 
                    <?= convertNumberToTime($sumTimeNight); ?>
                  </div>
                </td>
              </tr>
            <?php endif; ?>
          <?php endforeach; ?>
        
        
        
              
    </tbody>
  </table>
</div>