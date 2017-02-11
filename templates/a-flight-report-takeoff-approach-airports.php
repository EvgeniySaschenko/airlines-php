<div class="notice">
  <!-- Added-->
  <div data-notice="#noticeEditTakeoffApproachAirports" data-ancor="takeoffApproachAirports" class="hidden alert alert-success" role="alert">
    <?= $word[218]['name_'.$lang]; ?>
  </div>
  <!-- Error-->
  <div data-notice="#noticeErrorEditTakeoffApproachAirports" data-ancor="takeoffApproachAirports" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
</div>



<div class="a-flight-report-takeoff-approach-airports-edit">
  <form role="form" method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>&amp;action=flight_takeoff_approach">
    <table class="table table-striped">
      <caption class="text-bold text-center"><?= $word[214]['name_'.$lang]; ?></caption>
      <thead>
        <tr class="title">
          <th class="text-bold text-center"><?= $word[128]['name_'.$lang]; ?></th>
          <th class="text-bold text-center"><?= $word[200]['name_'.$lang]; ?></th>
          <th class="text-bold text-center"><?= $word[131]['name_'.$lang]; ?></th>
          <th class="text-bold text-center"><?= $word[132]['name_'.$lang]; ?></th>
          <th class="text-bold text-center">Д/Н</th>
          <th class="text-bold text-center"><?= $word[317]['name_'.$lang]; ?></th>
          <th class="text-bold text-center"><?= $word[134]['name_'.$lang]; ?></th>
          <th class="text-bold text-center">МК пос</th>
          <th class="text-bold text-center"><?= $word[316]['name_'.$lang]; ?></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($allReportFlight as $reportFlight): ?>
          <tr>
            <input type="hidden" name="id_report_flight[]" value="<?= $reportFlight['id']; ?>">
            <!--Дата-->
            <td>
              <div class="text-center">
                <?= convertDateEmpty($reportFlight['date_shipping']); ?>
              </div>
            </td>
            <!--Номер рейса-->
            <td>
              <div class="text-center">
                <?= $reportFlight['number_flight']; ?>
              </div>
            </td>
            <!--Категория-->
            <td class="text-center">
              <select name="ta_category[]" data-selected-option="<?= $reportFlight['ta_category']; ?>">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
              </select>
            </td>
            <!--Аэропорт-->
            <td class="text-center">
              <select name="ta_airport[]" data-selected-option="<?= $reportFlight['ta_airport']; ?>">
                <option value="<?= $reportFlight['point_departure']; ?>"><?= $reportFlight['point_departure']; ?></option>
                <option value="<?= $reportFlight['point_arrival']; ?>"><?= $reportFlight['point_arrival']; ?></option>
              </select>
            </td>
            <!--Д/Н-->
            <td class="text-center">
              <select name="ta_dn[]" data-selected-option="<?= $reportFlight['ta_dn']; ?>">
                <option value="Д">Д</option>
                <option value="Н">Н</option>
              </select>
            </td>
            <!--Взлет / Посадка-->
            <td class="text-center">
              <select name="ta_take_off_landing[]" data-selected-option="<?= $reportFlight['ta_take_off_landing']; ?>">
                <option value="Взлет">Взлет</option>
                <option value="Заход">Заход</option>
              </select>
            </td>
            <!--Метеоусловия-->
            <td class="field">
              <div class="form-group form-inline">
                <div class="input-group">
                  <input name="ta_conditions[]" value="<?=$reportFlight['ta_conditions'];?>">
                </div>
              </div>
            </td>
            <!--	МК пос-->
            <td class="field">
              <div class="form-group form-inline">
                <div class="input-group">
                  <input name="ta_mk_pos[]" value="<?=$reportFlight['ta_mk_pos'];?>">
                </div>
              </div>
            </td>
            <!--Пилот-->
            <td>
              <?php dropDownListUsersSection('ta_id_pilot[]', $allUserFlight, $reportFlight['ta_id_pilot'], $getIdSection); ?>
            </td>
          </tr>
      <?php endforeach; ?>
          <!--Отправить-->
          <tr>
            <td class="text-right" colspan="9">
              <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
            </td>
          </tr>
    </tbody>
    </table>
    </form>
</div>