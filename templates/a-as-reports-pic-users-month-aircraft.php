<h1 class="title-page text-center text-uppercase"> 
    <div>
        <?= $currentSubsection[0]['name_'.$lang]; ?>
    </div>
    <div>
        <?= $currentAircraft[0]['name_'.$lang].' '.$currentAircraft[0]['model']; ?> / 
        <?= showNameMonth($getYear.'-'.$getMonth.'-'.'01').' '. $getYear; ?>
    </div>
    <div>
        <?= $user[0]['last_name_'.$lang].' '.$user[0]['name_'.$lang].' '.$user[0]['first_name_'.$lang]; ?>
    </div>
    
    <a href="doc-generate/as-report-pic.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_user=<?= $getIdUser ;?>&amp;id_aircraft=<?= $getIdAircraft ;?>&amp;month=<?= $_GET['month'] ;?>&amp;year=<?= $_GET['year'] ;?>&amp;action=as_report_pic_download">
      <span class="fa fa-file-word-o text-color-word" data-toggle="tooltip" title="" data-original-title="Скачать"></span>
    </a>
</h1>
<div class="notice">
    <!-- Update-->
    <div data-notice="#noticeReportASPICUpdate" data-ancor="noticeReportASPICUpdate" class="hidden alert alert-success" role="alert">
      <?= $word[218]['name_'.$lang]; ?>
    </div>
</div>
<div class="reports-pic-as-users-month">
  <form role="form" method="post" action="update.php?lang=<?= $lang ;?>&id_section=<?= $getIdSection ;?>&id_subsection=<?= $getIdSubsection ;?>&action=as_pic_report">

  <table class="table table-striped">
    <tbody>
        <input name="id_user" type="hidden" value="<?= $getIdUser; ?>">
        <input name="id_aircraft" type="hidden" value="<?= $getIdAircraft; ?>">
        <input name="date_doc" type="hidden" value="<?= $getYear.'-'.$getMonth.'-'.'01'; ?>">
        <!--Воздушное судно-->
        <tr>
          <td class="text-bold"><?= $word[127]['name_'.$lang]; ?></td>
          <td><?= $currentAircraft[0]['name_'.$lang].' '.$currentAircraft[0]['model']; ?></td>
        </tr>
        <!--Отчет за период-->
        <tr>
          <td class="text-bold"><?= $word[502]['name_'.$lang]; ?></td>
          <td><?= showNameMonth($getYear.'-'.$getMonth.'-'.'01').' '. $_GET['year']; ?></td>
        </tr>
        <!--1-->
        <tr>
          <td class="text-bold">1. <?= $word[457]['name_'.$lang]; ?></td>
          <td>
              <textarea name="paragraph_1" class="form-control"><?php
                  if($ASPicReportAircraftUserYearMonth[0]['paragraph_1'])
                    echo $ASPicReportAircraftUserYearMonth[0]['paragraph_1'];
                  else
                    echo $GENERAL_SITE_SETTINGS[0]['basing_airports_report_pic_as'];
                ?></textarea>
          </td>
        </tr>
        <!--2-->
        <tr>
          <td class="text-bold">2. <?= $word[458]['name_'.$lang]; ?></td>
          <td>
              <?= arraySeparatedCommasAirport($allASFlightReportAircraftMonthPicAirports); ?>
          </td>
        </tr>
        
        <!--3-->
        <tr>
          <td class="text-bold">3. <?= $word[459]['name_'.$lang]; ?></td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_3" data-selected-option="<?= $ASPicReportAircraftUserYearMonth[0]['paragraph_3']; ?>">
                  <option value="дотримані в повному обсязі">дотримані в повному обсязі</option>
                  <option value="мали місце порушення">мали місце порушення</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        <!--4-->
        <tr>
          <td class="text-bold" colspan="2">4. <?= $word[462]['name_'.$lang]; ?></td>
        </tr>
        <!--4.1-->
        <tr>
          <td class="text-bold">4.1 <?= $word[463]['name_'.$lang]; ?></td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_4_1" data-selected-option="<?= $ASPicReportAircraftUserYearMonth[0]['paragraph_4_1']; ?>">
                  <option value="відповідає встановленим вимогам">відповідає встановленим вимогам</option>
                  <option value="відповідає не в повній мірі">відповідає не в повній мірі</option>
                  <option value="не відповідає">не відповідає</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        <!--4.2-->
        <tr>
          <td class="text-bold">4.2 <?= $word[465]['name_'.$lang]; ?></td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_4_2" data-selected-option="<?= $ASPicReportAircraftUserYearMonth[0]['paragraph_4_2']; ?>">
                  <option value="відповідає встановленим вимогам">відповідає встановленим вимогам</option>
                  <option value="відповідає не в повній мірі">відповідає не в повній мірі</option>
                  <option value="не відповідає">не відповідає</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        <!--5-->
        <tr>
          <td class="text-bold">5. <?= $word[468]['name_'.$lang]; ?></td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_5" data-selected-option="<?= $ASPicReportAircraftUserYearMonth[0]['paragraph_5']; ?>">
                  <option value="достатній">достатній</option>
                  <option value="недостатній">недостатній</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--5.1-->
        <tr>
          <td class="text-bold"><?= $word[470]['name_'.$lang]; ?></td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_5_1" data-selected-option="<?= $ASPicReportAircraftUserYearMonth[0]['paragraph_5_1']; ?>">
                  <option value="служба авіаційної безпеки">служба авіаційної безпеки</option>
                  <option value="військові, поліція">військові, поліція</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--6-->
        <tr>
          <td class="text-bold">6. <?= $word[472]['name_'.$lang]; ?></td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_6" data-selected-option="<?= $ASPicReportAircraftUserYearMonth[0]['paragraph_6']; ?>">
                  <option value="відповідає затвердженому Переліку">відповідає затвердженому Переліку</option>
                  <option value="не відповідає">не відповідає</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--7-->
        <tr>
          <td class="text-bold">7. <?= $word[475]['name_'.$lang]; ?></td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_7" data-selected-option="<?= $ASPicReportAircraftUserYearMonth[0]['paragraph_7']; ?>">
                  <option value="мається в наявності і укомплектована">мається в наявності і укомплектована</option>
                  <option value="не укомплектована">не укомплектована</option>
                  <option value="відсутня">відсутня</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--8-->
        <tr>
          <td class="text-bold">8. <?= $word[478]['name_'.$lang]; ?></td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_8" data-selected-option="<?= $ASPicReportAircraftUserYearMonth[0]['paragraph_8']; ?>">
                  <option value="достатній">достатній</option>
                  <option value="недостатній">недостатній</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--9-->
        <tr>
          <td class="text-bold">9. <?= $word[481]['name_'.$lang]; ?></td>
          <td> 
            <div class="form-group">
              <textarea name="paragraph_9" class="form-control"><?php
                  if($ASPicReportAircraftUserYearMonth[0]['paragraph_9'])
                    echo $ASPicReportAircraftUserYearMonth[0]['paragraph_9'];
                  else
                    echo $GENERAL_SITE_SETTINGS[0]['sources_info_as'];
                ?></textarea>
            </div>
          </td>
        </tr>

        <!-- 10 -->
        <tr>
          <td class="text-bold">10. <?= $word[487]['name_'.$lang]; ?></td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_10" data-selected-option="<?= $ASPicReportAircraftUserYearMonth[0]['paragraph_10']; ?>">
                  <option value="знають">знають</option>
                  <option value="не знають">не знають</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        <!-- 11 -->
        <tr>
          <td class="text-bold">11. <?= $word[490]['name_'.$lang]; ?></td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_11" data-selected-option="<?= $ASPicReportAircraftUserYearMonth[0]['paragraph_11']; ?>">
                  <option value="не було">не було</option>
                  <option value="мало місце">мало місце</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        <!-- 12 -->
        <tr>
          <td class="text-bold">12. <?= $word[493]['name_'.$lang]; ?></td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_12" data-selected-option="<?= $ASPicReportAircraftUserYearMonth[0]['paragraph_12']; ?>">
                  <option value="виконуються">виконуються</option>
                  <option value="не виконуються">не виконуються</option>
                  <option value="мали місце порушення з боку конкретних осіб">мали місце порушення з боку конкретних осіб</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        <!-- 13 -->
        <tr>
          <td class="text-bold">13. <?= $word[496]['name_'.$lang]; ?></td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_13" data-selected-option="<?= $ASPicReportAircraftUserYearMonth[0]['paragraph_13']; ?>">
                  <option value="надає постійно">надає постійно</option>
                  <option value="надає час від часу">надає час від часу</option>
                  <option value="не надає">не надає</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        <!--14-->
        <tr>
          <td class="text-bold"><?= $word[512]['name_'.$lang]; ?></td>
          <td> 
            <div class="form-group">
              <textarea name="paragraph_14" class="form-control"><?= $ASPicReportAircraftUserYearMonth[0]['paragraph_14']; ?></textarea>
            </div>
          </td>
        </tr>
        
        <!-- Подпись командира -->
        <tr>
          <td class="text-bold"> <?= $word[507]['name_'.$lang]; ?></td>
          <td>
            <div class="form-group text-center">
              <div class="input-group date date-picker">
                  <input value="<?= convertDateEmpty($ASPicReportAircraftUserYearMonth[0]['date_signature']); ?>" type="text" class="form-control" required="required">
                  <input name="date_signature" type="hidden" value="<?= convertDate3($ASPicReportAircraftUserYearMonth[0]['date_signature']); ?>">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
          </td>
        </tr>
        
        <?php if($permissionEditSubsection): ?>
            <!-- Запретить редактирование -->
            <?php
              if($ASPicReportAircraftUserYearMonth[0]['date_closed'] != 0)
                $checkedStatus = 'checked="checked"';
            ?>
            <tr>
              <td class="text-bold"> <?= $word[509]['name_'.$lang]; ?></td>
              <td>
                <div class="form-group">
                 <div class="input-group text-left">
                  <input type="checkbox" value="1"  <?= $checkedStatus; ?>>
                  <input name="date_closed" type="hidden" value="<?=$ASPicReportAircraftUserYearMonth[0]['date_closed'];?>">
                 </div>
                </div>
              </td>
            </tr>
        <?php endif; ?>
        <tr>
          <td class="text-right" colspan="2">
             <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
          </td>
        </tr>
        
    </tbody>
  </table>
  </form>
</div>