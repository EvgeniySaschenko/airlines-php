<h1 class="title-page text-center text-uppercase"> 
  <?= $currentSubsection[0]['name_'.$lang]; ?> 
  <?php foreach($allAircraft as $aircraft): ?>
    <?php if($aircraft['id'] == $_GET['id_aircraft']): ?>
      <?= $aircraft['name_'.$lang].' '.$aircraft['model']; ?> - 
    <?php endif; ?>
  <?php endforeach; ?>
  <?= $_GET['year']; ?>
</h1>


<div class="reports-pic-as-list-users-month__pic">
  <table class="table table-striped">
    <thead>
      <tr>
        <th><?= $word[13]['name_'.$lang]; ?></th>
        <th><?= $word[206]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[71]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[511]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[24]['name_'.$lang]; ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($allFlightReportPicGroupMonthAS as $flightReportPicGroupMonthAS): ?>
        <?php if($flightReportPicGroupMonthAS['date_shipping']): ?>
        <tr>
          <td class="text-bold text-center" colspan="5">
            <?= showNameMonth($flightReportPicGroupMonthAS['date_shipping']); ?>
          </td>
        </tr>
       
        <!--Пользователи-->
        <?php foreach($allFlightReportPicGroupMonthGropPicAS as $flightReportPicGroupMonthGropPicAS): ?>
          <?php if(convertDateYearMonth($flightReportPicGroupMonthGropPicAS['date_shipping']) == convertDateYearMonth($flightReportPicGroupMonthAS['date_shipping'])): ?>
          <tr>
              
            <td>
              <div>  
                <a href="doc-generate/as-report-pic-alternative.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_user=<?=$flightReportPicGroupMonthGropPicAS['id_pic_a'];?>&amp;month=<?= convertDateMonth($flightReportPicGroupMonthGropPicAS['date_shipping']) ;?>&amp;year=<?= convertDateYear($flightReportPicGroupMonthGropPicAS['date_shipping']) ;?>&amp;action=as_report_pic_download">
                  <span class="fa fa-file-word-o text-color-word" data-toggle="tooltip" title="" data-original-title="Скачать"></span>
                  <?= $word[517]['name_'.$lang]; ?>
                </a>
              </div> 
                
              <div>  
                <a href="doc-generate/as-report-pic-risk-alternative.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_user=<?=$flightReportPicGroupMonthGropPicAS['id_pic_a'];?>&amp;month=<?= convertDateMonth($flightReportPicGroupMonthGropPicAS['date_shipping']) ;?>&amp;year=<?= convertDateYear($flightReportPicGroupMonthGropPicAS['date_shipping']) ;?>&amp;action=as_report_pic_risk_download">
                  <span class="fa fa-file-word-o text-color-word" data-toggle="tooltip" title="" data-original-title="Скачать"></span>
                  <?= $word[518]['name_'.$lang]; ?>
                </a>
              </div> 
            </td>
              
            <td>
                <?= fullNameUser($flightReportPicGroupMonthGropPicAS['last_name_'.$lang], $flightReportPicGroupMonthGropPicAS['name_'.$lang], $flightReportPicGroupMonthGropPicAS['first_name_'.$lang]); ?>
            </td>
            
            <td class="text-center">
                <div>
                    <?= convertDate($flightReportPicGroupMonthGropPicAS['date_create']); ?>
                </div>
                <div>
                    <?= convertDate($flightReportPicGroupMonthGropPicAS['date_create_risk']); ?>
                </div>
            </td>
            
            <td class="text-center">
                <div>
                    <?= convertDate($flightReportPicGroupMonthGropPicAS['date_closed']); ?>
                </div>
                <div>
                    <?= convertDate($flightReportPicGroupMonthGropPicAS['date_closed_risk']); ?>
                </div>
            </td>
            
            <td class="text-center">

                
                <div>
                    <?php  if($permissionEditSubsection or $flightReportPicGroupMonthGropPicAS['date_closed'] == 0): ?>  
                      <a href="index.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_user=<?=$flightReportPicGroupMonthGropPicAS['id_pic_a'];?>&amp;month=<?= convertDateMonth($flightReportPicGroupMonthGropPicAS['date_shipping']) ;?>&amp;year=<?= convertDateYear($flightReportPicGroupMonthGropPicAS['date_shipping']) ;?>&amp;action=as_reports_pic_users_month_edit#navBottom">
                       <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="<?= $word[24]['name_'.$lang]; ?>"></span>
                      </a>
                    <?php  endif; ?> 
                </div>
                
                <div>
                    <?php  if($permissionEditSubsection or $flightReportPicGroupMonthGropPicAS['date_closed_risk'] == 0): ?>  
                      <a href="index.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_user=<?=$flightReportPicGroupMonthGropPicAS['id_pic_a'];?>&amp;month=<?= convertDateMonth($flightReportPicGroupMonthGropPicAS['date_shipping']) ;?>&amp;year=<?= convertDateYear($flightReportPicGroupMonthGropPicAS['date_shipping']) ;?>&amp;action=as_reports_pic_users_month_risk_edit#navBottom">
                       <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="<?= $word[24]['name_'.$lang]; ?>"></span>
                      </a>
                    <?php  endif; ?> 
                </div>
                
            </td>
            
          </tr>
          <?php endif; ?>
        <?php endforeach; ?>
        
        <?php endif; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
  
</div>