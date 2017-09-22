<h1 class="title-page text-center text-uppercase"> 
    <div>
        <?= $currentSubsection[0]['name_'.$lang]; ?>
    </div>
    <div>
        <?= $currentAircraft[0]['name_'.$lang].' '.$currentAircraft[0]['model']; ?>
        <?= showNameMonth($getYear.'-'.$getMonth.'-'.'01').' '. $getYear; ?>
    </div>
    <div>
        <?= $user[0]['last_name_'.$lang].' '.$user[0]['name_'.$lang].' '.$user[0]['first_name_'.$lang]; ?>
    </div>
    
    <a href="doc-generate/as-report-pic-alternative.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_user=<?= $getIdUser ;?>&amp;id_aircraft=<?= $getIdAircraft ;?>&amp;month=<?= $_GET['month'] ;?>&amp;year=<?= $_GET['year'] ;?>&amp;action=as_report_pic_download">
      <span class="fa fa-file-word-o text-color-word" data-toggle="tooltip" title="" data-original-title="Скачать"></span>
    </a>
</h1>
<div class="notice">
    <!-- Update-->
    <div data-notice="#noticeReportASPICUpdate" data-ancor="noticeReportASPICUpdate" class="hidden alert alert-success" role="alert">
      <?= $word[218]['name_'.$lang]; ?>
    </div>
</div>
<div class="reports-pic-as-users-month__pic">
  <form role="form" method="post" action="update.php?lang=<?= $lang ;?>&id_section=<?= $getIdSection ;?>&id_subsection=<?= $getIdSubsection ;?>&action=as_pic_report">

  <table class="table table-striped">
    <tbody>
        <input name="id_user" type="hidden" value="<?= $getIdUser; ?>">
        <input name="date_doc" type="hidden" value="<?= $getYear.'-'.$getMonth.'-'.'01'; ?>">
        <!--Воздушное судно-->
        <tr>
          <td class="text-bold"><?= $word[127]['name_'.$lang]; ?></td>
          <td>
            <?php foreach($allFlightReportAircraftGroupPicAS as $flightReportAircraftGroupPicAS): ?>
              <div><?= $flightReportAircraftGroupPicAS['name_'.$lang].' '.$flightReportAircraftGroupPicAS['model']; ?>
            <?php endforeach; ?>
          </td>
        </tr>
        <!--Отчет за период-->
        <tr>
          <td class="text-bold"><?= $word[502]['name_'.$lang]; ?></td>
          <td><?= showNameMonth($getYear.'-'.$getMonth.'-'.'01').' '. $_GET['year']; ?></td>
        </tr>
        <!--1-->
        <tr>
          <td class="text-bold">1. Аэропорт базирования:</td>
          <td>
              <textarea name="paragraph_1" class="form-control"><?php
                  if($ASPicReportPICUserYearMonth[0]['paragraph_1'])
                    echo $ASPicReportPICUserYearMonth[0]['paragraph_1'];
                  else
                    echo $GENERAL_SITE_SETTINGS[0]['basing_airports_report_pic_as'];
                ?></textarea>
          </td>
        </tr>
        <!--2-->
        <tr>
          <td class="text-bold">2. Аэродромы, на которые выполнялись полеты в отчетном периоде:</td>
          <td>
              <?= arraySeparatedCommasAirport($allASFlightReportMonthPicAirports); ?>
          </td>
        </tr>
        
        <!--3-->
        <tr>
          <td class="text-bold">3. Выполнение предполетных, послеполетных осмотров, предполетных и специальных досмотров:</td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_3" data-selected-option="<?= $ASPicReportPICUserYearMonth[0]['paragraph_3']; ?>">
                  <option value="выполнялись всеми экипажами">выполнялись всеми экипажами</option>
                  <option value="имели место нарушения у отдельных экипажей">имели место нарушения у отдельных экипажей</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        <!--4-->
        <tr>
          <td class="text-bold" colspan="2">4. Оценка уровня контроля на безопасность пассажиров, ручной клади, груза</td>
        </tr>
        <!--4.1-->
        <tr>
          <td class="text-bold">4.1 На аэродроме временного базирования:</td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_4_1" data-selected-option="<?= $ASPicReportPICUserYearMonth[0]['paragraph_4_1']; ?>">
                  <option value="соответствует требованиям">соответствует требованиям</option>
                  <option value="не полностью соответствует">не полностью соответствует</option>
                  <option value="не соответствует">не соответствует</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        <!--4.2-->
        <tr>
          <td class="text-bold">4.2 На промежуточных аэродромах:</td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_4_2" data-selected-option="<?= $ASPicReportPICUserYearMonth[0]['paragraph_4_2']; ?>">
                  <option value="соответствует требованиям">соответствует требованиям</option>
                  <option value="не полностью соответствует">не полностью соответствует</option>
                  <option value="не соответствует">не соответствует</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        <!--5-->
        <tr>
          <td class="text-bold">5.  Уровень обеспечения охраны воздушных судов: - на аэродроме базирования</td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_5" data-selected-option="<?= $ASPicReportPICUserYearMonth[0]['paragraph_5']; ?>">
                  <option value="достаточный">достаточный</option>
                  <option value="недостаточный">недостаточный</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--5.1-->
        <tr>
          <td class="text-bold">5.1 кем</td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_5_1" data-selected-option="<?= $ASPicReportPICUserYearMonth[0]['paragraph_5_1']; ?>">
                  <option value="служба авиационной безопасности аеродрома">служба авиационной безопасности аэродрома</option>
                  <option value="военные, полиция">военные, полиция</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--6-->
        <tr>
          <td class="text-bold">6. Наличие бортовой документации по АБ, комплекта (100 шт.) бланков Чек-листов
предполетного осмотра ВС по АБ, комплекта (100 шт.) печатей (стикеров) для
опечатывания ВС:
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_6" data-selected-option="<?= $ASPicReportPICUserYearMonth[0]['paragraph_6']; ?>">
                  <option value="соответствует утвержденному перечню">соответствует утвержденному перечню</option>
                  <option value="не соответствует">не соответствует</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--7-->
        <tr>
          <td class="text-bold">7. Наличие бортового оборудования (аптечки) по авиабезопасности на каждом
борту ВС (металлоискатель ручной, зеркало с телескопической поворотной
штангой, маркеры для маркировки досмотренных мест, фонарик):
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_7" data-selected-option="<?= $ASPicReportPICUserYearMonth[0]['paragraph_7']; ?>">
                  <option value="имеются в наличии и укомплектованы">имеются в наличии и укомплектованы</option>
                  <option value="не укомплектованы">не укомплектованы</option>
                  <option value="в наличии нет">в наличии нет</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--8-->
        <tr>
          <td class="text-bold">8. Контрольная оценка уровня знаний у членов экипажа по АБ: </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_8" data-selected-option="<?= $ASPicReportPICUserYearMonth[0]['paragraph_8']; ?>">
                  <option value="достаточные у всех членов экипажа">достаточные у всех членов экипажа</option>
                  <option value="недостаточные у части членов экипажа">недостаточные у части членов экипажа</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--9-->
        <tr>
          <td class="text-bold">9. Источники информации о текущем состоянии АБ, уровне угроз и рисков в регионе
полетов (брифинги, наблюдения за состоянием АБ, средства массовой информации,
информация от других экипажей, интернет, службы и работники аэропортов): 
          </td>
          <td> 
            <div class="form-group">
              <textarea name="paragraph_9" class="form-control"><?php
                  if($ASPicReportPICUserYearMonth[0]['paragraph_9'])
                    echo $ASPicReportPICUserYearMonth[0]['paragraph_9'];
                  else
                    echo $GENERAL_SITE_SETTINGS[0]['sources_info_as'];
                ?></textarea>
            </div>
          </td>
        </tr>

        <!-- 10 -->
        <tr>
          <td class="text-bold">10. Знание схемы эвакуации экипажа и ВС в случае возникновения чрезвычайных ситуаций: </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_10" data-selected-option="<?= $ASPicReportPICUserYearMonth[0]['paragraph_10']; ?>">
                  <option value="знают все экипажи">знают все экипажи</option>
                  <option value="знают не все экипажи">знают не все экипажи</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        <!-- 11 -->
        <tr>
          <td class="text-bold">11. Наличие случаев принуждения экипажа к выполнению полетов, безопасность
которых должным образом не гарантировалась:</td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_11" data-selected-option="<?= $ASPicReportPICUserYearMonth[0]['paragraph_11']; ?>">
                  <option value="нет">нет</option>
                  <option value="имели место">имели место</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        <!-- 12 -->
        <tr>
          <td class="text-bold">12. Обеспечение выполнения требований личной безопасности членами экипажа :
- знание мест расположения дипломатических представительств Украины,
отдельной полиции, госпиталей, больниц, военных комендатур и маршрутов движения к
ним 
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_12" data-selected-option="<?= $ASPicReportPICUserYearMonth[0]['paragraph_12']; ?>">
                  <option value="знают">знают</option>
                  <option value="не знают">не знают</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        <!-- 12.1 -->
        <tr>
          <td class="text-bold">12.1 - знание информации о наличии в данном регионе определенных ограничений:
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_12_1" data-selected-option="<?= $ASPicReportPICUserYearMonth[0]['paragraph_12_1']; ?>">
                  <option value="знают">знают</option>
                  <option value="не знают">не знают</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        <!-- 12.2 -->
        <tr>
          <td class="text-bold">12.2 - уровень безопасности места проживания экипажа:
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="paragraph_12_2" data-selected-option="<?= $ASPicReportPICUserYearMonth[0]['paragraph_12_2']; ?>">
                  <option value="достаточный">достаточный</option>
                  <option value="недостаточный">недостаточный</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--14-->
        <tr>
          <td class="text-bold">13. Другая (дополнительная) информация по АБ и личной безопасности:</td>
          <td> 
            <div class="form-group">
              <textarea name="paragraph_13" class="form-control"><?= $ASPicReportPICUserYearMonth[0]['paragraph_13']; ?></textarea>
            </div>
          </td>
        </tr>
        
        <!-- Подпись командира -->
        <tr>
          <td class="text-bold"> <?= $word[507]['name_'.$lang]; ?></td>
          <td>
            <div class="form-group text-center">
              <div class="input-group date date-picker">
                  <input value="<?= convertDateEmpty($ASPicReportPICUserYearMonth[0]['date_signature']); ?>" type="text" class="form-control" required="required">
                  <input name="date_signature" type="hidden" value="<?= convertDate3($ASPicReportPICUserYearMonth[0]['date_signature']); ?>">
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
              if($ASPicReportPICUserYearMonth[0]['date_closed'] != 0)
                $checkedStatus = 'checked="checked"';
            ?>
            <tr>
              <td class="text-bold"> <?= $word[509]['name_'.$lang]; ?></td>
              <td>
                <div class="form-group">
                 <div class="input-group text-left">
                  <input type="checkbox" value="1"  <?= $checkedStatus; ?>>
                  <input name="date_closed" type="hidden" value="<?=$ASPicReportPICUserYearMonth[0]['date_closed'];?>">
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