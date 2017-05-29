<div class="flight-consolidated-report-crew-year-group-aircraft-type">
<table class="table table-striped">
    <caption class="text-center text-uppercase text-bold"><?= $word[392]['name_'.$lang]; ?> </caption>
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
    <?php foreach($aircraftGroupName as $key => $aircraft): ?>
      
      

        <tr>
          <td colspan="16" class="text-bold text-uppercase">
            <?= $aircraft['name_'.$lang]; ?>   
          </td>
        </tr>
        
        <!--Пользователи которые летали-->
        <?php foreach($allFlightConsolidatedReportCrewYearGroupAircraftType as $flightConsolidatedReportCrewYearGroupAircraftType): ?>
            <?php if($aircraft['name_en'] == $flightConsolidatedReportCrewYearGroupAircraftType['aircraft_name_en'] and $flightConsolidatedReportCrewYearGroupAircraftType['id_section'] == $currentSection[0]['id']): ?>
              <tr>
                <!--Должность-->  
                <td>
                  <?= $flightConsolidatedReportCrewYearGroupAircraftType['rank_'.$lang]; ?>  
                </td>
                <!--Имя-->
                <td>
                  <?= linkUser($flightConsolidatedReportCrewYearGroupAircraftType['id_section'], $flightConsolidatedReportCrewYearGroupAircraftType['id_user'], $flightConsolidatedReportCrewYearGroupAircraftType['last_name_'.$lang], $flightConsolidatedReportCrewYearGroupAircraftType['name_'.$lang], $flightConsolidatedReportCrewYearGroupAircraftType['first_name_'.$lang]); ?>  
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
                        <?php foreach($allFlightConsolidatedReportCrewYearAircraftType as $flightConsolidatedReportCrewYearAircraftType): ?>
                            <?php if($flightConsolidatedReportCrewYearAircraftType['id_user'] == $flightConsolidatedReportCrewYearGroupAircraftType['id_user'] and convertDateMonth($flightConsolidatedReportCrewYearAircraftType['date_shipping']) == $i and $flightConsolidatedReportCrewYearAircraftType['aircraft_name_en'] == $flightConsolidatedReportCrewYearGroupAircraftType['aircraft_name_en']): ?>
                                <?php $td = 1; ?>
                                <td class="text-center">
                                  <div class="flight-consolidated-report-crew-year__time-flight"> 
                                    <?= convertNumberToTime($flightConsolidatedReportCrewYearAircraftType['time_flight']); ?>
                                  </div>
                                  <div class="flight-consolidated-report-crew-year__time-night"> 
                                    <?= convertNumberToTime($flightConsolidatedReportCrewYearAircraftType['time_night']); ?>
                                  </div>
                                </td>
                                 <?php $sumTimeFlight = $sumTimeFlight + $flightConsolidatedReportCrewYearAircraftType['time_flight']; ?> 
                                 <?php $sumTimeNight = $sumTimeNight + $flightConsolidatedReportCrewYearAircraftType['time_night']; ?> 
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
                        <?php foreach($allFlightConsolidatedReportCrewYearAircraftType as $flightConsolidatedReportCrewYear): ?>
                            <?php if($flightConsolidatedReportCrewYear['id_user'] == $flightConsolidatedReportCrewYearGroupUsers['id_user'] and convertDateMonth($flightConsolidatedReportCrewYear['date_shipping']) == $i): ?>
                                <?php $td = 1; ?>
                                <td class="text-center">
                                  <div class="flight-consolidated-report-crew-year__time-flight"> 
                                    <?= convertNumberToTime($flightConsolidatedReportCrewYear['time_flight']); ?>
                                  </div>
                                  <div class="flight-consolidated-report-crew-year__time-night"> 
                                    <?= convertNumberToTime($flightConsolidatedReportCrewYear['time_night']); ?>
                                  </div>
                                </td>
                                 <?php $sumTimeFlight = $sumTimeFlight + $flightConsolidatedReportCrewYear['time_flight']; ?> 
                                 <?php $sumTimeNight = $sumTimeNight + $flightConsolidatedReportCrewYear['time_night']; ?> 
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