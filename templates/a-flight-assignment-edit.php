<div class="notice">
  <!-- Added-->
  <div data-notice="#noticeEditAssignmentFlight" data-ancor="flightAssignment" class="hidden alert alert-success" role="alert">
    <?= $word[210]['name_'.$lang]; ?>
  </div>
  <!-- Error-->
  <div data-notice="#noticeErrorEditAssignmentFlight" data-ancor="flightAssignment" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
</div>


<div class="a-flight-assignment-edit">
  <form role="form" method="post" action="update.php?lang=<?= $lang ;?>&id_section=<?= $getIdSection ;?>&id_subsection=<?= $getIdSubsection ;?>&id_flight_assignment=<?= $getIdFlightAssignment;?>&action=assignment_flight">
    <table class="table table-bordered">
      <caption class="text-bold text-center"><?= $word[199]['name_'.$lang]; ?></caption>
      <tbody>
        <!--Номер задания на полет-->
        <tr>
          <td class="text-bold"><?= $word[124]['name_'.$lang]; ?></td>
          <td>
            <div class="form-group">
              <div class="input-group">
                <input name="number_assignment" type="text" class="form-control" required="required" value="<?=$currentAssignmentFlight[0]['number_assignment'];?>">
              </div>
            </div> 
          </td>
        </tr>
        
        <!--Номер рейса-->
        <tr>
          <td class="text-bold"><?= $word[200]['name_'.$lang]; ?></td>
          <td>
            <div class="form-group">
                <textarea name="number_flight" class="form-control"><?=$currentAssignmentFlight[0]['number_flight'];?></textarea>
            </div> 
          </td>
        </tr>
        <!--Цель полета-->
        <tr>
          <td class="text-bold"><?= $word[201]['name_'.$lang]; ?></td>
          <td>
            <div class="form-group">
                <input name="purpose_flight_ru" type="text" class="form-control" required="required" value="<?=$currentAssignmentFlight[0]['purpose_flight_ru']; ?>">
            </div> 
          </td>
        </tr>
        <!--Маршрут полета-->
        <tr>
          <td class="text-bold"><?= $word[202]['name_'.$lang]; ?></td>
          <td>
            <div class="form-group">
               <input name="route_flight_ru" type="text" class="form-control" value="<?=$currentAssignmentFlight[0]['route_flight_ru']; ?>">
            </div> 
          </td>
        </tr>
        <!--Масса снаряженного воздушного судна (кг)-->
        <tr>
          <td class="text-bold"><?= $word[203]['name_'.$lang]; ?></td>
          <td>
            <div class="form-group">
                <?php
                  if($currentAssignmentFlight[0]['weight_aircraft'] != 0)
                  {
                    $weightAircraft = $currentAssignmentFlight[0]['weight_aircraft'];
                  } else {
                    $weightAircraft = $currentAssignmentFlight[0]['aircraft_weight_aircraft'];
                  }
                ?>
              <div class="input-group">
                <input name="weight_aircraft" type="text" class="form-control" value="<?=$weightAircraft;?>">
              </div>
            </div> 
          </td>
        </tr>
        <!--Центровка пустого ВС (%САХ)-->
        <tr>
          <td class="text-bold"><?= $word[204]['name_'.$lang]; ?></td>
          <td>
            <div class="form-group">
                <?php
                  if($currentAssignmentFlight[0]['centering_empty_aircraft'] != 0)
                  {
                    $centeringEmptyAircraft = $currentAssignmentFlight[0]['centering_empty_aircraft'];
                  } else {
                    $centeringEmptyAircraft = $currentAssignmentFlight[0]['aircraft_centering_empty_aircraft'];
                  }
                ?>
              <div class="input-group">
                <input name="centering_empty_aircraft" type="text" class="form-control" value="<?=$centeringEmptyAircraft;?>">
              </div>
            </div> 
          </td>
        </tr>
        <!--Служебный груз (кг)-->
        <tr>
          <td class="text-bold"><?= $word[205]['name_'.$lang]; ?></td>
          <td>
            <div class="form-group">
              <div class="input-group">
                <?php
                  if($currentAssignmentFlight[0]['curb_weight_aircraft'] != 0)
                  {
                    $curbWeightAircraft = $currentAssignmentFlight[0]['curb_weight_aircraft'];
                  } else {
                    $curbWeightAircraft = $currentAssignmentFlight[0]['aircraft_curb_weight_aircraft'];
                  }
                ?>
                <input name="curb_weight_aircraft" type="text" class="form-control" value="<?=$curbWeightAircraft;?>">
              </div>
            </div> 
          </td>
        </tr>
        <!--Полетная масса допустимая-->
        <tr>
          <td class="text-bold"><?= $word[305]['name_'.$lang]; ?></td>
          <td>
            <div class="form-group">
              <div class="input-group">
                <?php
                  if($currentAssignmentFlight[0]['flight_weight'] != 0)
                  {
                    $flightWeight = $currentAssignmentFlight[0]['flight_weight'];
                  } else {
                    $flightWeight = $currentAssignmentFlight[0]['aircraft_flight_weight'];
                  }
                ?>
                
                <input name="flight_weight" type="text" class="form-control" value="<?=$flightWeight;?>">
              </div>
            </div> 
          </td>
        </tr>
        <!--Воздушное судно-->
        <tr>
          <td class="text-bold"><?= $word[127]['name_'.$lang]; ?></td>
          <td>
            <?= dropDownList('id_aircraft', $allAircraft, $currentAssignmentFlight[0]['id_aircraft']); ?>
          </td>
        </tr>
        <!--Дата вылета-->
        <tr>
          <td class="text-bold"><?= $word[128]['name_'.$lang]; ?></td>
          <td>
            <div class="input-group date date-picker">
              <input value="<?= convertDateEmpty($currentAssignmentFlight[0]['date_departure']); ?>" type="text" class="form-control" placeholder="<?= $word[130]['name_'.$lang]; ?>">
              <input name="date_departure" type="hidden" value="<?= convertDate3($currentAssignmentFlight[0]['date_departure']); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </td>
        </tr>
        <!--Командир ВС-->
        <tr>
          <td class="text-bold"><?= $word[84]['name_'.$lang]; ?> 1 (<?= $word[342]['name_'.$lang]; ?> <?= $word[206]['name_'.$lang]; ?>)</td>
          <td>
            <?php dropDownListUsersSection('id_pic_a', $allUserFlight, $currentAssignmentFlight[0]['id_pic_a'], $getIdSection); ?>
          </td>
        </tr>
        <!--Зам. директора по ОЛР-->
        <tr>
          <td class="text-bold"><?= $word[84]['name_'.$lang]; ?> 2 (<?= $word[342]['name_'.$lang]; ?> <?= $word[343]['name_'.$lang]; ?>)</td>
          <td>
             <?php 
                if(empty($currentAssignmentFlight[0]['id_manager_f'])) {
                  $id_manager_f = $GENERAL_SITE_SETTINGS[0]['id_flight_manager'];
                } else {
                  $id_manager_f = $currentAssignmentFlight[0]['id_manager_f'];
                }
               ?> 
              
            <?php dropDownListUsers('id_manager_f', $allUserSortLastNameNoHide, $id_manager_f); ?>
          </td>
        </tr>
        <!--Дата документа-->
        <tr>
          <td class="text-bold"><?= $word[11]['name_'.$lang]; ?></td>
          <td>
            <div class="input-group date date-picker">
              <input value="<?= convertDateEmpty($currentAssignmentFlight[0]['date_pic_a']); ?>" type="text" class="form-control" placeholder="<?= $word[130]['name_'.$lang]; ?>">
              <input name="date_pic_a" type="hidden" value="<?= convertDate3($currentAssignmentFlight[0]['date_pic_a']); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </td>
        </tr>
        <!--Экипаж допущен к полету по минимуму:-->
        <tr>
          <td class="text-bold"><?= $word[208]['name_'.$lang]; ?></td>
          <td>
            <div class="form-group">
                <input name="pilot_admission" type="text" class="form-control" value="<?=$currentAssignmentFlight[0]['pilot_admission'];?>">
            </div> 
          </td>
        </tr>
        <!--Запретить редактирование-->
        <?php
          if($currentAssignmentFlight[0]['date_not_edit_a'] != 0)
            $checkedHide = 'checked="checked"';
        ?>
        <tr>
          <td class="text-bold"><?= $word[209]['name_'.$lang]; ?></td>
          <td>
            <div class="form-group">
             <div class="input-group">
              <input type="checkbox" value="1"  <?= $checkedHide; ?>>
              <input name="date_not_edit_a" type="hidden" value="<?=$currentAssignmentFlight[0]['date_not_edit_a'];?>">
             </div>
            </div>
          </td>
        </tr>
        <!--Отправить-->
        <tr>
          <td class="a-crew-generate__submit text-right" colspan="2">
             <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>