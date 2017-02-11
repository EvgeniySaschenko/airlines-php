<div class="notice">
  <!-- Added-->
  <div data-notice="#noticeEditOperatingCrewTime" data-ancor="operatingCrewTime" class="hidden alert alert-success" role="alert">
    <?= $word[218]['name_'.$lang]; ?>
  </div>
</div>

<div class="a-flight-report-operating-crew-time">
  <form role="form" method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>&amp;action=flight_operating_crew_time">
    <table class="table table-bordered">
      <caption class="text-bold text-center"><?= $word[315]['name_'.$lang]; ?></caption>
      <tbody>
        <tr class="title">
          <td rowspan="2" class="text-bold text-center"><?= $word[128]['name_'.$lang]; ?></td>
          <td rowspan="2" class="text-bold text-center"><?= $word[202]['name_'.$lang]; ?></td>
          <td colspan="4" class="text-bold text-center"><?= $word[318]['name_'.$lang]; ?></td>
        </tr>
        <tr class="title">
          <td class="text-bold text-center"><?= $word[324]['name_'.$lang]; ?></td>
          <td class="text-bold text-center"><?= $word[319]['name_'.$lang]; ?></td>
          <td class="text-bold text-center"><?= $word[320]['name_'.$lang]; ?></td>
          <td class="text-bold text-center"><?= $word[321]['name_'.$lang]; ?></td>
        </tr>
        
        <?php foreach($allReportFlight as $reportFlight): ?>
          <tr>
            <input type="hidden" name="id_report_flight[]" value="<?= $reportFlight['id']; ?>">
            <input type="hidden" name="id_flight_assignment[]" value="<?= $reportFlight['id_flight_assignment']; ?>">
            <!--Предварительная подготовка--> 
            <td class="text-center"><?= convertDateEmpty($reportFlight['date_shipping']); ?></td>
            <!--Маршрут полета-->
            <td class="text-center"><?= $reportFlight['point_departure']; ?> - <?= $reportFlight['point_arrival']; ?></td>
            <!--Предварительная подготовка-->
            <td class="text-center">
              <div class="input-group picker-time">
                <input type="text" class="form-control" value="<?= $reportFlight['wt_time_preliminary_preparation']; ?>">
                <input type="hidden" name="wt_time_preliminary_preparation[]" value="<?= $reportFlight['wt_time_preliminary_preparation']; ?>">
                <span class="input-group-addon">
                  <span class="fa fa-clock-o"></span>
                </span>
              </div>
            </td>
            <!--Послеполетные работы-->
            <td class="text-center">
              <div class="input-group picker-time">
                <input type="text" class="form-control" value="<?= $reportFlight['wt_time_post_flight_work']; ?>">
                <input type="hidden" name="wt_time_post_flight_work[]" value="<?= $reportFlight['wt_time_post_flight_work']; ?>">
                <span class="input-group-addon">
                  <span class="fa fa-clock-o"></span>
                </span>
              </div>
            </td>
            <!--Стоянки-->
            <td class="text-center">
              <div class="input-group picker-time">
                <input type="text" class="form-control" value="<?= $reportFlight['wt_time_parking']; ?>">
                <input type="hidden" name="wt_time_parking[]" value="<?= $reportFlight['wt_time_parking']; ?>">
                <span class="input-group-addon">
                  <span class="fa fa-clock-o"></span>
                </span>
              </div>
            </td>
            <!--Отдыха-->
            <td class="text-center">
              <div class="input-group picker-time">
                <input type="text" class="form-control" value="<?= $reportFlight['wt_time_recreation']; ?>">
                <input type="hidden" name="wt_time_recreation[]" value="<?= $reportFlight['wt_time_recreation']; ?>">
                <span class="input-group-addon">
                  <span class="fa fa-clock-o"></span>
                </span>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
          <!--Отправить-->
          <tr>
            <td class="text-right" colspan="6">
              <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
            </td>
          </tr>
      </tbody>
    </table>
    </form>
</div>