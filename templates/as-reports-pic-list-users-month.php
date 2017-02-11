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
    <tbody>
      <?php foreach($allFlightReportAircraftGroupMonthAS as $flightReportAircraftGroupMonthAS): ?>
        <?php if($flightReportAircraftGroupMonthAS['date_shipping']): ?>
        <tr>
          <td class="text-bold">
            <?= showNameMonth($flightReportAircraftGroupMonthAS['date_shipping']); ?>
          </td>
          <td>
          </td>
        </tr>
       
        <!--Пользователи-->
        <?php foreach($allFlightReportAircraftGroupMonthGropPicAS as $flightReportAircraftGroupMonthGropPicAS): ?>
          <?php if(convertDateYearMonth($flightReportAircraftGroupMonthGropPicAS['date_shipping']) == convertDateYearMonth($flightReportAircraftGroupMonthAS['date_shipping'])): ?>
          <tr>
            <td>
              <a href="doc-generate/report-as.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;action=as_reports_pic_list_users_month_download">
                <span class="fa fa-file-word-o text-color-word" data-toggle="tooltip" title="" data-original-title="Скачать"></span>
                <?= fullNameUser($flightReportAircraftGroupMonthGropPicAS['last_name_'.$lang], $flightReportAircraftGroupMonthGropPicAS['name_'.$lang], $flightReportAircraftGroupMonthGropPicAS['first_name_'.$lang]); ?>
              </a>
            </td>
            <td class="text-right">
            <?php if(($currentAssignmentFlight[0]['date_not_edit_r'] == 0 and $permissionEditFlightGenerateDoc or $permissionAssignmentFlight) and $permissionEditSubsection): ?>
              <a href="index.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;action=as_reports_pic_list_users_month_edit#navBottom">
               <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="<?= $word[24]['name_'.$lang]; ?>"></span>
              </a>
            <?php endif; ?>
            </td>
          </tr>
          <?php endif; ?>
        <?php endforeach; ?>
        
        <?php endif; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  
</div>