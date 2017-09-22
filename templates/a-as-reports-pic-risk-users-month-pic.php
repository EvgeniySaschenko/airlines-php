<h1 class="title-page text-center text-uppercase"> 
    <div>
        <?= showNameMonth($getYear.'-'.$getMonth.'-'.'01').' '. $getYear; ?>
    </div>
    <div>
        <?= $user[0]['last_name_'.$lang].' '.$user[0]['name_'.$lang].' '.$user[0]['first_name_'.$lang]; ?>
    </div>
    <div>
        Оценка угрозы в странах, аэропортах выполнения полетов ВС АК
    </div>

    
    <a href="doc-generate/as-report-pic-risk-alternative.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_user=<?= $getIdUser ;?>&amp;id_aircraft=<?= $getIdAircraft ;?>&amp;month=<?= $_GET['month'] ;?>&amp;year=<?= $_GET['year'] ;?>&amp;action=as_report_pic_risk_download">
      <span class="fa fa-file-word-o text-color-word" data-toggle="tooltip" title="" data-original-title="Скачать"></span>
    </a>
</h1>
<div class="notice">
    <!-- Update-->
    <div data-notice="#noticeReportASRiskPICUpdate" data-ancor="noticeReportASRiskPICUpdate" class="hidden alert alert-success" role="alert">
      <?= $word[218]['name_'.$lang]; ?>
    </div>
</div>


<div class="a-as-reports-pic-risk-users-month__pic">
  <form role="form" method="post" action="update.php?lang=<?= $lang ;?>&id_section=<?= $getIdSection ;?>&id_subsection=<?= $getIdSubsection ;?>&action=as_pic_report_risk">

  <table class="table table-striped">
    <tbody>
        <input name="id_user" type="hidden" value="<?= $getIdUser; ?>">
        <input name="date_doc" type="hidden" value="<?= $getYear.'-'.$getMonth.'-'.'01'; ?>">

        <!--Отчет за период-->
        <tr>
          <td class="text-bold" colspan="1">Отчетный период (месяц, год):</td>
          <td colspan="2"><?= showNameMonth($getYear.'-'.$getMonth.'-'.'01').' '. $_GET['year']; ?></td>
        </tr>
        
        <!--ФИО ответственного за АБ - КВС: -->
        <tr>
          <td class="text-bold" colspan="1">ФИО ответственного за АБ - КВС:</td>
          <td colspan="2"><?= $user[0]['last_name_'.$lang].' '.$user[0]['name_'.$lang].' '.$user[0]['first_name_'.$lang]; ?></td>
        </tr>
        
        <!-- Аэропорт (ы): -->
        <tr>
          <td class="text-bold" colspan="1">Аэропорт (ы):</td>
          <td colspan="2">
              <?= arraySeparatedCommasAirport($allASFlightReportMonthPicAirports); ?>
          </td>
        </tr>
        
        <!--Воздушные судна АК: -->
        <tr>
          <td class="text-bold" colspan="1">Воздушные судна АК: </td>
          <td colspan="2">
            <?php foreach($allFlightReportAircraftGroupPicAS as $flightReportAircraftGroupPicAS): ?>
              <div><?= $flightReportAircraftGroupPicAS['name_'.$lang].' '.$flightReportAircraftGroupPicAS['model']; ?>
            <?php endforeach; ?>
          </td>
        </tr>
        
        <!-- Страна, город (а), регион: -->
        <tr>
          <td class="text-bold" colspan="1">Страна, город (а), регион:</td>
          <td colspan="2">
              <textarea name="region" class="form-control"><?= $ASReportPICRiskPICUserYearMonth[0]['region']; ?></textarea>
          </td>
        </tr>
        
        <!-- Заголовки -->
        <tr>
          <td class="text-bold">Критерии оценки угроз</td>
          <td class="text-bold">Описание мероприятий</td>
          <td class="text-bold">Оценочные показатели (да-2, не значительн.-1, нет-0)</td>
        </tr>
        

        <!--1-->
        <tr>
          <td>
            <span class="text-bold">1.</span> 
            Наличие в стране террор. организаций, способных совершить теракты, АНВ 
          </td>
          <td>
            Есть ли сведения о наличии группы, которая способна совершить АНВ? Описание ее деятельности.
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_1" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_1']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>

        <!--2-->
        <tr>
          <td>
            <span class="text-bold">2.</span> 
             Информация о совершении террористических актов в стране, городе в прошлом
          </td>
          <td>
            Кроме террористических актов, это могут быть другие АНВ, вооруженные нападения как на людей так и на объекты, любые виды
            насильственных действий. Однако особое внимание следует обращать на любые акции, направленные против гражданской авиации.
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_2" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_2']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>

        <!--3-->
        <tr>
          <td>
            <span class="text-bold">3.</span> 
               Наличие в стране внутренних конфликтов, политической нестабильности
          </td>
          <td>
            Не спокойная внутренняя обстановка, а именно, продолжающаяся или назревающая гражданская война или другие политические
            волнения. Конфликты на религиозном, национальном, региональном уровнях.
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_3" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_3']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>

        <!--4-->
        <tr>
          <td>
            <span class="text-bold">4.</span> 
                Наличие экономических проблем
          </td>
          <td>
            Эконом. кризис, который может привести к значительному сокращению финансирования и таким образом повлиять на способность
            поддерживать на необходимом уровне мероприятия по обеспечению АБ
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_4" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_4']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--5-->
        <tr>
          <td>
            <span class="text-bold">5.</span> 
                Информация о совершении АНВ в аэропорту в прошлом
          </td>
          <td>
            Это могут быть взрывы в АП, а также другие вооруженные нападения произошедшие, как в аэропорту, так и вблизи его.
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_5" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_5']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--6-->
        <tr>
          <td rowspan="4">
            <span class="text-bold">6.</span> 
                Выявление нарушений АБ в аэропорту, которые могут нести угрозу для совершения АНВ
          </td>
          <td colspan="2">
            Нарушения со стороны персонала АП по:
          </td>
        </tr>
        
         <!--6.1-->
        <tr>
          <td>
            6.1 - контролю на безопасность членов экипажа ВС, пассажиров, груза;
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_6_1" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_6_1']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
         <!--6.2-->
        <tr>
          <td>
            6.2 - охране ВС и объектов, их защиты от АНВ;
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_6_2" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_6_2']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
         <!--6.3-->
        <tr>
          <td>
            6.3 - пропускному и внутреннему объектовому режиму.
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_6_3" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_6_3']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--7-->
        <tr>
          <td>
            <span class="text-bold">7.</span> 
                Общее количество рейсов
          </td>
          <td>
            Имеет ли влияние количество рейсов на вероятность совершения АНВ?
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_7" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_7']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--8-->
        <tr>
          <td>
            <span class="text-bold">8.</span> 
            Выявление рейсов, которые могут быть наиболее уязвимы для совершения АНВ. Рейсы повышенного риска
          </td>
          <td>
            Рейсы, которые могут рассматриваться как особо уязвимые для совершения АНВ с учетом места выполнения полета. К рейсам
            повышенного риска относятся, например, те, которые ранее уже подвергались нападениям. Рейсы, периодически, часто повторяются.
            Рейсы по перевозке грузов, которые могут вызвать интерес для их ограбления.
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_8" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_8']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--9-->
        <tr>
          <td>
            <span class="text-bold">9.</span> 
            Выявление рейсов запрещенных, не согласованные для выполнению
          </td>
          <td>
            Выполнение рейсов должно осуществляться в соответствии с Приказом ГАСУ от 29.04.2014 № 317 “Об утверждении Перечня стран и АП,
            в которых временно запрещено или ограничено полеты ВС укр. эксплуатантов”
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_9" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_9']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--10-->
        <tr>
          <td rowspan="4">
            <span class="text-bold">10.</span> 
            Выявление на борту ВС посторонних предметов
          </td>
          <td colspan="2">
          </td>
        </tr>
        
         <!--10.1-->
        <tr>
          <td>
            10.1 - Выполнение предполетного / послеполетного осмотров ВС по АБ перед / после каждого вылета.
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_10_1" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_10_1']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
         <!--10.2-->
        <tr>
          <td>
            10.2 - Выполнение предполетного досмотра по АБ в случае необходимости и целенаправленно.
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_10_2" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_10_2']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
         <!--10.3-->
        <tr>
          <td>
            10.3 -  Выполнение спец. досмотра по АБ в случае получения информации об угрозе безопаснос- ти ВС, когда есть обоснованное подозрение о
            размещении на ВС предметов угрозы совершения АНВ.
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_10_3" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_10_3']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
        <!--11-->
        <tr>
          <td rowspan="6">
            <span class="text-bold">11.</span> 
            Выявление в грузе посторонних предметов, перевозимых на ВС, как потенциального объекта для совершения АНВ
          </td>
          <td colspan="2">
          </td>
        </tr>
        
         <!--11.1-->
        <tr>
          <td>
            11.1 -  Принятие груза от известного грузоотправителя.
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_11_1" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_11_1']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        </tr>
        
         <!--11.2-->
        <tr>
          <td>
            11.2 -  Груз должен быть доставлен лицом, указанным в Декларации
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_11_2" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_11_2']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
         <!--11.3-->
        <tr>
          <td>
            11.3 - Осмотр груза на отсутствие признаков вскрытия
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_11_3" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_11_3']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
         <!--11.4-->
        <tr>
          <td>
            11.4 -  Наличие и правильное заполнение Декларации по безопасности грузового отправления.
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_11_4" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_11_4']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
         <!--11.5-->
        <tr>
          <td>
            11.5 - Досмотр груза по АБ экипажем при необходимости.
          </td>
          <td>
              <div class="form-group">
                <div class="input-group">
                <select name="val_11_5" data-selected-option="<?= $ASReportPICRiskPICUserYearMonth[0]['val_11_5']; ?>">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
                </div>
              </div>
          </td>
        </tr>
        
         <!--11.5-->
        <tr>
          <td class="text-bold">
            Сумарная оценка:
          </td>
          <td colspan="2">
              <?= 
                $ASReportPICRiskPICUserYearMonth[0]['val_1'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_2'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_3'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_4'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_5'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_6_1'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_6_2'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_6_3'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_7'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_8'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_9'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_10_1'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_10_2'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_10_3'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_11_1'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_11_2'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_11_3'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_11_4'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_11_5'];
              ?>

          </td>
        </tr>
        
        <!--Комментарий-->
        <tr>
          <td class="text-bold">Дополнительная информация:</td>
          <td colspan="2"> 
            <div class="form-group">
              <textarea name="remark" class="form-control"><?= $ASReportPICRiskPICUserYearMonth[0]['remark']; ?></textarea>
            </div>
          </td>
        </tr>
        
        
        <!-- Подпись командира -->
        <tr>
          <td class="text-bold"> <?= $word[507]['name_'.$lang]; ?></td>
          <td colspan="2">
            <div class="form-group text-center">
              <div class="input-group date date-picker">
                  <input value="<?= convertDateEmpty($ASReportPICRiskPICUserYearMonth[0]['date_signature']); ?>" type="text" class="form-control" required="required">
                  <input name="date_signature" type="hidden" value="<?= convertDate3($ASReportPICRiskPICUserYearMonth[0]['date_signature']); ?>">
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
              if($ASReportPICRiskPICUserYearMonth[0]['date_closed'] != 0)
                $checkedStatus = 'checked="checked"';
            ?>
            <tr>
              <td class="text-bold"> <?= $word[509]['name_'.$lang]; ?></td>
              <td colspan="2">
                <div class="form-group">
                 <div class="input-group text-left">
                  <input type="checkbox" value="1"  <?= $checkedStatus; ?>>
                  <input name="date_closed" type="hidden" value="<?=$ASReportPICRiskPICUserYearMonth[0]['date_closed'];?>">
                 </div>
                </div>
              </td>
            </tr>
        <?php endif; ?>
        <tr>
          <td class="text-right" colspan="3">
             <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
          </td>
        </tr>
        
    </tbody>
  </table>
  </form>
</div>