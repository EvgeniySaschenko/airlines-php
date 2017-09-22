<h1 class="title-page text-center text-uppercase"> <?= $currentSubsection[0]['name_'.$lang]; ?> </h1>

<div class="reports-pic-as-year">
  <table class="table table-striped">
    <thead>
      <tr>
        <?php foreach($allAircraft as $aircraft): ?>
          <th class="text-center title">
            <?= $aircraft['name_'.$lang].' '.$aircraft['model']; ?>
          </th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
    <?php foreach($allFlightReportGroupYearAS as $flightReportGroupYearAS): ?>
      <tr>
        <?php foreach($allAircraft as $aircraft): ?>
          <td class="text-center">
            <?php foreach($allFlightReportGroupYearGroupAircraftAS as $flightReportGroupYearGroupAircraftAS): ?>
              <?php if(convertDateYear($flightReportGroupYearAS['date_shipping']) == convertDateYear($flightReportGroupYearGroupAircraftAS['date_shipping'])): ?>
                <?php if($flightReportGroupYearGroupAircraftAS['id_aircraft'] == $aircraft['id']): ?>
                <a href="index.php?lang=<?= $lang ;?>&id_section=<?= $getIdSection ;?>&id_subsection=<?= $getIdSubsection ;?>&id_aircraft=<?= $aircraft['id'];?>&year=<?= convertDateYear($flightReportGroupYearAS['date_shipping']); ?>&action=reports_pic_as_list_users_month#navBottom">
                  <?= convertDateYear($flightReportGroupYearAS['date_shipping']); ?>
                </a>
                <?php endif; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>