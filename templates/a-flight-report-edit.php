<div class="notice">
  <!-- Added-->
  <div data-notice="#noticeAddedFlightReport" data-ancor="flightReport" class="hidden alert alert-success" role="alert">
    <?= $word[217]['name_'.$lang]; ?>
  </div>
  <!-- Error-->
  <div data-notice="#noticeErrorAddedFlightReport" data-ancor="flightReport" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
  <!-- Added-->
  <div data-notice="#noticeEditFlightReport" data-ancor="flightReport" class="hidden alert alert-success" role="alert">
    <?= $word[218]['name_'.$lang]; ?>
  </div>
</div>

<div class="alert alert-warning" role="alert">
  <?= $word[278]['name_'.$lang]; ?>
</div>

<div class="alert alert-warning" role="alert">
  <?= $word[348]['name_'.$lang]; ?>
</div>

<div class="a-flight-report">
  <div class="a-flight-report__container">
    <div class="a-flight-report-add">
      <form role="form" method="post" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>&amp;action=report_flight">
        <table class="table table-bordered table-1">
          <caption class="text-bold text-center"><?= $word[213]['name_'.$lang]; ?></caption>
          <tbody>
            <tr class="level-1">
              <td rowspan="3"><?= $word[128]['name_'.$lang]; ?></td>
              <td rowspan="3"><?= $word[200]['name_'.$lang]; ?></td>
              <td rowspan="3" class="flight-route"><?= $word[202]['name_'.$lang]; ?></td>
              <td rowspan="2" class="img-v-1 vertical-text"><div><?= $word[220]['name_'.$lang]; ?></div></td>
              <td colspan="2"><?= $word[221]['name_'.$lang]; ?></td>
              <td><?= $word[222]['name_'.$lang]; ?></td>
              <td rowspan="2" class="img-v-2 vertical-text"><div><?= $word[223]['name_'.$lang]; ?></div></td>
              <!--<td rowspan="2" class="img-v-1 vertical-text"><div><?//=$langBlockHours;?></div></td>-->
              <td rowspan="2" class="img-v-2 vertical-text"><div><?= $word[224]['name_'.$lang]; ?></div></td>
              <td colspan="2"><?= $word[225]['name_'.$lang]; ?></td>
              <td colspan="2"><?= $word[226]['name_'.$lang]; ?></td>
              <td colspan="2"><?= $word[227]['name_'.$lang]; ?></td>
              <td rowspan="2" class="img-v-2 vertical-text"><div><?= $word[228]['name_'.$lang]; ?></div></td>
              <td rowspan="2" class="img-v-2 vertical-text"><div><?= $word[229]['name_'.$lang]; ?></div></td>
             <!-- <td rowspan="2" class="img-v-1 vertical-text"><div><?//=$langTakeoffWeight;?></div></td>-->
              <td rowspan="2" class="img-v-1 vertical-text"><div><?= $word[230]['name_'.$lang]; ?></div></td>
              <td rowspan="2" class="img-v-2 vertical-text"><div><?= $word[231]['name_'.$lang]; ?></div></td>
    <!--          <td rowspan="3" class="img-v-1 vertical-text text-save"><div><?//=$langSave;?></div></td>-->
              <td rowspan="3" class="img-v-1 vertical-text text-delete"><div><?= $word[26]['name_'.$lang]; ?></div></td>
            </tr>
            <tr class="level-2">
              <td class="img-v-1 vertical-text"><div><?= $word[232]['name_'.$lang]; ?></div></td>
              <td class="img-v-1 vertical-text"><div><?= $word[233]['name_'.$lang]; ?></div></td>
              <td class="img-v-1 vertical-text"><div><?= $word[234]['name_'.$lang]; ?></div></td>
              <td class="img-v-1 vertical-text"><div><?= $word[235]['name_'.$lang]; ?></div></td>
              <td class="img-v-1 vertical-text"><div><?= $word[236]['name_'.$lang]; ?></div></td>
              <td class="img-v-1 vertical-text"><div><?= $word[235]['name_'.$lang]; ?></div></td>
              <td class="img-v-1 vertical-text"><div><?= $word[236]['name_'.$lang]; ?></div></td>
              <td class="img-v-1 vertical-text"><div><?= $word[237]['name_'.$lang]; ?></div></td>
              <td class="img-v-1 vertical-text"><div><?= $word[238]['name_'.$lang]; ?></div></td>
            </tr>
            <tr>
              <td><?= $word[239]['name_'.$lang]; ?></td>
              <td><?= $word[240]['name_'.$lang]; ?></td>
              <td><?= $word[240]['name_'.$lang]; ?></td>
              <td><?= $word[240]['name_'.$lang]; ?></td>
              <td><?= $word[240]['name_'.$lang]; ?></td>
              <!-- <td><?//=$langHH_MM;?></td>-->
              <td><?= $word[240]['name_'.$lang]; ?></td>
              <td><?= $word[241]['name_'.$lang]; ?></td>
              <td><?= $word[241]['name_'.$lang]; ?></td>
              <td><?= $word[283]['name_'.$lang]; ?></td>
              <td><?= $word[283]['name_'.$lang]; ?></td>
              <td><?= $word[241]['name_'.$lang]; ?></td>
              <td>чел.</td>
              <td>%CAX</td>
              <td>%CAX</td>
             <!--<td><?//=$langT;?></td>-->
              <td><?= $word[241]['name_'.$lang]; ?></td>
              <td>м/FL</td>
            </tr>
            
             <tr>
               <!--Дата отправки-->
               <td class="date">
                <div class="input-group date date-picker">
                  <input name="date_shipping" required="required" type="text" class="form-control">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
               </td>
               <!--№ рейса:-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="number_flight" class="form-control field" type="text" required="required">
                    </div>
                  </div>
               </td>
               <!--Маршрут полета:-->
               <td>
                <div class="form-group  form-inline">
                  <!--Пункт отправки-->
                  <div class="input-group">
                    <input name="point_departure" class="form-control field" type="text" required="required"  data-toggle="tooltip" title="<?= $word[215]['name_'.$lang]; ?>">
                  </div>
                  
                  <span class="glyphicon glyphicon-arrow-right"></span>
                  
                  <!--Пункт прибытия-->
                  <div class="input-group">
                    <input name="point_arrival" class="form-control field" type="text" required="required"  data-toggle="tooltip" title="<?= $word[216]['name_'.$lang]; ?>">
                  </div>
                </div>
               </td>
               <!--Расстояние-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="distance" class="form-control field" type="text" required="required">
                    </div>
                  </div>
               </td>
               <!--Взлет-->
               <td>
                  <div class="input-group picker-time">
                    <input type="text" class="form-control">
                    <input type="hidden" name="time_takeoff" value="00:00">
                    <span class="input-group-addon">
                      <span class="fa fa-clock-o"></span>
                    </span>
                  </div>
               </td>
               <!--Посадки-->
               <td>
                  <div class="input-group picker-time">
                    <input type="text" class="form-control">
                    <input type="hidden" name="time_landing" value="00:00">
                    <span class="input-group-addon">
                      <span class="fa fa-clock-o"></span>
                    </span>
                  </div>
               </td>
               <!--в т.ч. ночью-->
               <td>
                  <div class="input-group picker-time">
                    <input type="text" class="form-control">
                    <input type="hidden" name="time_night" value="00:00">
                    <span class="input-group-addon">
                      <span class="fa fa-clock-o"></span>
                    </span>
                  </div>
               </td>
               <!--Работа двигателей на земле-->
               <td>
                  <div class="input-group picker-time">
                    <input type="text" class="form-control">
                    <input type="hidden" name="time_job_ground" value="00:00">
                    <span class="input-group-addon">
                      <span class="fa fa-clock-o"></span>
                    </span>
                  </div>
               </td>
               <!--Время работы экипажа-->
               <td>
                  <div class="input-group picker-time">
                    <input type="text" class="form-control">
                    <input type="hidden" name="time_hours_crew" value="00:00">
                    <span class="input-group-addon">
                      <span class="fa fa-clock-o"></span>
                    </span>
                  </div>
               </td>
               <!--fuel_balance-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="fuel_balance" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Заправлено-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="fuel_fueled" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--oil_balance-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="oil_balance" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Заправлено-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="oil_fueled" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Груз-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="weight_cargo" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Пассажиров-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="weight_passenger" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Центровка на взлете-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="centering_rise" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Центровка на посадке-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="centering_landing" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Посадочный вес-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="landing_weight" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Планируемый эшелон-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="echelon" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <td></td>
             </tr>
             <!--Отправить-->
             <tr>
               <td class="text-right" colspan="20">
                 <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
               </td>
             </tr>
        </form>
    
    
        <form role="form" method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>&amp;action=report_flight">
          <tr class="text-bold text-center">
            <td colspan="19">
             <?= $word[214]['name_'.$lang]; ?>
            </td>
            <td>
             <?= $word[26]['name_'.$lang]; ?>
            </td>
                
          </tr>

            
           <?php foreach($allReportFlight as $reportFlight): ?>
             <tr>
                <input type="hidden" name="id_report_flight[]" value="<?= $reportFlight['id']; ?>">
                <input type="hidden" name="id_flight_assignment[]" value="<?= $reportFlight['id_flight_assignment']; ?>">
               <!--Дата отправки-->
               <td class="date">
                <div class="input-group date date-picker">
                  <input name="date_shipping[]" value="<?= convertDateEmpty($reportFlight['date_shipping']); ?>" required="required" type="text" class="form-control">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
               </td>
               <!--№ рейса:-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="number_flight[]" value="<?= $reportFlight['number_flight']; ?>" class="form-control field" type="text" required="required">
                    </div>
                  </div>
               </td>
               <!--Маршрут полета:-->
               <td>
                <div class="form-group  form-inline">
                  <!--Пункт отправки-->
                  <div class="input-group">
                    <input name="point_departure[]" value="<?= $reportFlight['point_departure']; ?>" class="form-control field" type="text" required="required"  data-toggle="tooltip" title="<?= $word[215]['name_'.$lang]; ?>">
                  </div>
                  
                  <span class="glyphicon glyphicon-arrow-right"></span>
                  
                  <!--Пункт прибытия-->
                  <div class="input-group">
                    <input name="point_arrival[]" value="<?= $reportFlight['point_arrival']; ?>" class="form-control field" type="text" required="required"  data-toggle="tooltip" title="<?= $word[216]['name_'.$lang]; ?>">
                  </div>
                </div>
               </td>
               <!--Расстояние-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="distance[]" value="<?= $reportFlight['distance']; ?>" class="form-control field" type="text" required="required">
                    </div>
                  </div>
               </td>
               <!--Взлет-->
               <td>
                  <div class="input-group picker-time">
                    <input type="text" class="form-control" value="<?= $reportFlight['time_takeoff']; ?>">
                    <input type="hidden" name="time_takeoff[]" value="<?= $reportFlight['time_takeoff']; ?>">
                    <span class="input-group-addon">
                      <span class="fa fa-clock-o"></span>
                    </span>
                  </div>
               </td>
               <!--Посадки-->
               <td>
                  <div class="input-group picker-time">
                    <input type="text" class="form-control" value="<?= $reportFlight['time_landing']; ?>">
                    <input type="hidden" name="time_landing[]" value="<?= $reportFlight['time_landing']; ?>">
                    <span class="input-group-addon">
                      <span class="fa fa-clock-o"></span>
                    </span>
                  </div>
               </td>
               <!--в т.ч. ночью-->
               <td>
                  <div class="input-group picker-time">
                    <input type="text" class="form-control" value="<?= $reportFlight['time_night']; ?>">
                    <input type="hidden" name="time_night[]" value="<?= $reportFlight['time_night']; ?>">
                    <span class="input-group-addon">
                      <span class="fa fa-clock-o"></span>
                    </span>
                  </div>
               </td>
               <!--Работа двигателей на земле-->
               <td>
                  <div class="input-group picker-time">
                    <input type="text" class="form-control" value="<?= $reportFlight['time_job_ground']; ?>">
                    <input type="hidden" name="time_job_ground[]" value="<?= $reportFlight['time_job_ground']; ?>">
                    <span class="input-group-addon">
                      <span class="fa fa-clock-o"></span>
                    </span>
                  </div>
               </td>
               <!--Время работы экипажа-->
               <td>
                  <div class="input-group picker-time">
                    <input type="text" class="form-control" value="<?= $reportFlight['time_hours_crew']; ?>">
                    <input type="hidden" name="time_hours_crew[]" value="<?= $reportFlight['time_hours_crew']; ?>">
                    <span class="input-group-addon">
                      <span class="fa fa-clock-o"></span>
                    </span>
                  </div>
               </td>
               <!--fuel_balance-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="fuel_balance[]" value="<?= $reportFlight['fuel_balance']; ?>" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Заправлено-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="fuel_fueled[]" value="<?= $reportFlight['fuel_fueled']; ?>" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--oil_balance-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="oil_balance[]" value="<?= $reportFlight['oil_balance']; ?>" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Заправлено-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="oil_fueled[]" value="<?= $reportFlight['oil_fueled']; ?>" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Груз-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="weight_cargo[]" value="<?= $reportFlight['weight_cargo']; ?>" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Пассажиров-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="weight_passenger[]" value="<?= $reportFlight['weight_passenger']; ?>" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Центровка на взлете-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="centering_rise[]" value="<?= $reportFlight['centering_rise']; ?>" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Центровка на посадке-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="centering_landing[]" value="<?= $reportFlight['centering_landing']; ?>" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Посадочный вес-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="landing_weight[]" value="<?= $reportFlight['landing_weight']; ?>" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <!--Планируемый эшелон-->
               <td>
                  <div class="form-group form-inline">
                    <div class="input-group">
                      <input name="echelon[]" value="<?= $reportFlight['echelon']; ?>" class="form-control field" type="text">
                    </div>
                  </div>
               </td>
               <td class="hide-delete-background">
                <div class="form-group hide-delete text-center">
                   <div class="input-group">
                    <input type="checkbox" value="1" data-toggle="tooltip" title="<?= $word[26]['name_'.$lang]; ?>">
                    <input name="hide[]" type="hidden" value="0">
                  </div> 
                </div> 
               </td>
             </tr>
          <?php endforeach; ?>
             <!--Отправить-->
             <tr>
               <td class="text-right" colspan="20">
                 <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
               </td>
             </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
