<div class="notice">
  <!--Section Update-->
  <div data-notice="#noticeGeneralSiteSettings" data-ancor="generalSiteSettings" class="hidden alert alert-success" role="alert">
    <?= $word[218]['name_'.$lang]; ?>
  </div>
</div>

<div class="a-general-site-settings">
    <form method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;action=general_site_settings">
      <table class="table table-striped">
        <caption class="text-bold text-center"><?= $word[356]['name_'.$lang]; ?></caption>
        <thead>
          <tr>
            <th class="title"><?= $word[357]['name_'.$lang]; ?></th>
            <th class="title text-center"><?= $word[358]['name_'.$lang]; ?></th>
          </tr>
        </thead>
        <tbody>

         <tr>
            <!--ID-->
            <td colspan="2">
              <input name="id_general_settings" type="hidden" value="<?= $GENERAL_SITE_SETTINGS[0]['id']; ?>">
            </td>
         </tr>
         <!--Название компании ru-->
         <tr>
            <td class="text-bold a-general-site-settings__name">
              <?= $word[359]['name_'.$lang]; ?> ru 
            </td>
            <td>
              <input name="name_company_ru" type="text" value="<?= $GENERAL_SITE_SETTINGS[0]['name_company_ru']; ?>">
            </td>
         </tr>
         <!--Название компании en-->
         <tr>
            <td class="text-bold a-general-site-settings__name">
              <?= $word[359]['name_'.$lang]; ?> en
            </td>
            <td>
              <input name="name_company_en" type="text" value="<?= $GENERAL_SITE_SETTINGS[0]['name_company_en']; ?>">
            </td>
         </tr>
         <!--Нумерация заданий на полёт-->
         <tr>
            <td class="text-bold a-general-site-settings__name">
              <?= $word[360]['name_'.$lang]; ?>
            </td>
            <td>
              <div class="form-group">
                <div class="input-group">
                <select name="numbering_flight_assignment" data-selected-option="<?= $GENERAL_SITE_SETTINGS[0]['numbering_flight_assignment']; ?>">
                  <option value="name_aircraft-number_flight_assignment-month-year">"Название ВС"-"номер задания (уникальный для текущего года и ВС)"-"месяц"-"год"</option>
                  <option value="reg_number_last_leter-day-month-year">"Последняя буква Рег. номера ВС"-"день"-"месяц"-"год"</option>
                  <option value="name_aircraft-reg_number-day-month-year">"Название ВС"-"Рег. номер"-"день"-"месяц"-"год"</option>
                  <option value="name_aircraft-reg_number-day-month-year/number_flight_assignment">"Название ВС"-"Рег. номер"-"день"-"месяц"-"год"/"номер задания (уникальный для текущего года и ВС)"</option>
                  <option value="reg_number_last_leter-number_task_in_month-month-year">"Последняя буква Рег. номера ВС"-"Поряд. номер задан. в месяце"-"месяц"-"год"</option>
                </select>
                </div>
              </div>
            </td>
         </tr>
         <!--Подсветка документов 1-й период - менее критическая дата (указывать дни), подсветка оранжевым цветом-->
         <tr>
            <td class="text-bold a-general-site-settings__name">
              <?= $word[361]['name_'.$lang]; ?> en
            </td>
            <td>
              <input name="doc_days_orange"  value="<?= $GENERAL_SITE_SETTINGS[0]['doc_days_orange']; ?>">
            </td>
         </tr>
         <!--Подсветка документов 2-й период - более критическая дата (указывать дни), подсветка красным цветом-->
         <tr>
            <td class="text-bold a-general-site-settings__name">
              <?= $word[362]['name_'.$lang]; ?> en
            </td>
            <td>
              <input name="doc_days_red"  value="<?= $GENERAL_SITE_SETTINGS[0]['doc_days_red']; ?>">
            </td>
         </tr>
         
         <!--Подпись директора ЛС-->
         <tr>
            <td class="text-bold a-general-site-settings__name">
                <?= $word[84]['name_'.$lang]; ?> (<?= $word[342]['name_'.$lang]; ?> <?= $word[343]['name_'.$lang]; ?>)
            </td>
            <td>
                <?php dropDownListUsers('id_flight_manager', $allUserSortLastNameNoHide, $GENERAL_SITE_SETTINGS[0]['id_flight_manager']); ?>
            </td>
         </tr>
         
         <!--Подпись директора ИАС-->
         <tr>
            <td class="text-bold a-general-site-settings__name">
                <?= $word[84]['name_'.$lang]; ?> (<?= $word[342]['name_'.$lang]; ?> <?= $word[363]['name_'.$lang]; ?>)
            </td>
            <td>
                <?php dropDownListUsers('id_engineer_manager', $allUserSortLastNameNoHide, $GENERAL_SITE_SETTINGS[0]['id_engineer_manager']); ?>
            </td>
         </tr>

         <!--Добровольные сообщения - e-mail адреса, нужно указывать через запятую-->
         <tr>
            <td class="text-bold a-general-site-settings__name">
                <?= $word[364]['name_'.$lang]; ?>
            </td>
            <td>
                <textarea name="mails_voluntary_posts" class="form-control"><?=$GENERAL_SITE_SETTINGS[0]['mails_voluntary_posts'];?></textarea>
            </td>
         </tr>

         <!--Эмейл при загрузке / апдейте документов-->
         <tr>
            <td class="text-bold a-general-site-settings__name">
                <?= $word[382]['name_'.$lang]; ?>
            </td>
            <td>
                <textarea name="mails_doc" class="form-control"><?=$GENERAL_SITE_SETTINGS[0]['mails_doc'];?></textarea>
            </td>
         </tr>
        <!--Отправить-->
        <tr>
          <td colspan="2">
            <div class="form-group text-right">
              <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
            </div>
          </td>
        </tr>
      </tbody>  
    </table>
  </form>   
</div>
