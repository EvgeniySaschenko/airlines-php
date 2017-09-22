<h1 class="title-page text-center text-uppercase"> 
  <?= $currentSubsection[0]['name_'.$lang]; ?> 
  <?php foreach($allAircraft as $aircraft): ?>
    <?php if($aircraft['id'] == $_GET['id_aircraft']): ?>
      <?= $aircraft['name_'.$lang].' '.$aircraft['model']; ?> - 
    <?php endif; ?>
  <?php endforeach; ?>
  <?= $_GET['year']; ?>
</h1>

<div class="reports-pic-as-list-users-month">

  <table class="table table-striped">
    <thead class="a-crew-generate__table-head--<?= $crew['location_en']; ?>">
      <tr>
        <th class="text-center"><?= $word[206]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[71]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[511]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[24]['name_'.$lang]; ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($allFlightReportAircraftGroupMonthAS as $flightReportAircraftGroupMonthAS): ?>
        <?php if($flightReportAircraftGroupMonthAS['date_shipping']): ?>
        <tr>
          <td class="text-bold" colspan="4">
            <?= showNameMonth($flightReportAircraftGroupMonthAS['date_shipping']); ?>
          </td>
        </tr>
       
        <!--Пользователи-->
        <?php foreach($allFlightReportAircraftGroupMonthGropPicAS as $flightReportAircraftGroupMonthGropPicAS): ?>
          <?php if(convertDateYearMonth($flightReportAircraftGroupMonthGropPicAS['date_shipping']) == convertDateYearMonth($flightReportAircraftGroupMonthAS['date_shipping'])): ?>
          <tr>
            <td>
              <a href="doc-generate/as-report-pic.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_user=<?=$flightReportAircraftGroupMonthGropPicAS['id_pic_a'];?>&amp;id_aircraft=<?=$flightReportAircraftGroupMonthGropPicAS['id_aircraft'];?>&amp;month=<?= convertDateMonth($flightReportAircraftGroupMonthGropPicAS['date_shipping']) ;?>&amp;year=<?= convertDateYear($flightReportAircraftGroupMonthGropPicAS['date_shipping']) ;?>&amp;action=as_report_pic_download">
                <span class="fa fa-file-word-o text-color-word" data-toggle="tooltip" title="" data-original-title="Скачать"></span>
                <?= fullNameUser($flightReportAircraftGroupMonthGropPicAS['last_name_'.$lang], $flightReportAircraftGroupMonthGropPicAS['name_'.$lang], $flightReportAircraftGroupMonthGropPicAS['first_name_'.$lang]); ?>
              </a>
            </td>
            <td class="text-center">
                <?= convertDate($flightReportAircraftGroupMonthGropPicAS['date_create']); ?>
            </td>
            <td class="text-center">
                <?= convertDate($flightReportAircraftGroupMonthGropPicAS['date_closed']); ?>
            </td>
            <td class="text-center">
              <?php  if($permissionEditSubsection or $flightReportAircraftGroupMonthGropPicAS['date_closed'] == 0): ?>  
                <a href="index.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_user=<?=$flightReportAircraftGroupMonthGropPicAS['id_pic_a'];?>&amp;id_aircraft=<?=$flightReportAircraftGroupMonthGropPicAS['id_aircraft'];?>&amp;month=<?= convertDateMonth($flightReportAircraftGroupMonthGropPicAS['date_shipping']) ;?>&amp;year=<?= convertDateYear($flightReportAircraftGroupMonthGropPicAS['date_shipping']) ;?>&amp;action=as_reports_pic_users_month_edit#navBottom">
                 <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="<?= $word[24]['name_'.$lang]; ?>"></span>
                </a>
              <?php  endif; ?>  
            </td>
          </tr>
          <?php endif; ?>
        <?php endforeach; ?>
        
        <?php endif; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  
</div>