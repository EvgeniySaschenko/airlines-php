<div class="notice" id="crewGenerate">
  <!--Формировать экипаж-->
  <div data-notice="#noticeUpdateCrewGenerate" data-ancor="crewGenerate" class="hidden alert alert-success" role="alert">
    <?= $word[180]['name_'.$lang]; ?>
  </div>
  <!--Добавить задание на полет-->
  <div data-notice="#noticeAddFlightAssignment" data-ancor="crewGenerate" class="hidden alert alert-success" role="alert">
    <?= $word[197]['name_'.$lang]; ?>
  </div>
  <!--Задание с таким номером уже существует-->
  <div data-notice="#noticeErrorFlightAssignment" data-ancor="crewGenerate" class="hidden alert alert-danger" role="alert">
    <?= $word[198]['name_'.$lang]; ?>
  </div>
</div>

<div class="a-flight-assignment-edit-crews-generate panel-group accordion-open-first-tab" id="collapse-a-crews-generate">
  <?php foreach($allCrewSection as $key => $crew): ?>
    <?php if($crew['location_en'] != 'UKR'): ?>
  
    <div class="panel panel-default">
      <div class="panel-heading">
        <!--Раскрыть блок-->
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#collapse-a-crews-generate" href="#crew<?= $crew['id']; ?>"><?= $crew['name_'.$lang]; ?></a>
        </h4>
      </div>
       <!--Блок-->
      <div id="crew<?= $crew['id']; ?>" class="panel-collapse collapse accordion-item">
        <div class="panel-body">
            
          <div class="a-flight-assignment-edit-crew-generate a-crew-generate--<?= $crew['location_en']; ?>" data-id-section="<?= $crew['id_section']; ?>" data-priority="<?= $crew['priority']; ?>" data-locatio="<?= $crew['location_en']; ?>">
          <form method="post" action="update.php?lang=<?= $lang ?>&amp;id_section=<?= $_GET['id_section'] ?>&amp;id_subsection=<?= $_GET['id_subsection'] ?>&amp;id_crew=<?= $crew['id'] ?>&amp;action=crew_generate">
            <table class="table table-striped">
              <caption class="a-crew-generate__caption--<?= $crew['location_en']; ?> text-center text-uppercase text-bold"><?= $crew['name_ru']; ?></caption>
              <thead class="a-crew-generate__table-head--<?= $crew['location_en']; ?>">
                <tr>
                  <th class="text-center"><?= $word[15]['name_'.$lang]; ?></th>
                  <th class="text-center"><?= $word[18]['name_'.$lang]; ?></th>
                  <th class="text-center"><?= $word[41]['name_'.$lang]; ?></th>
                  <th class="text-center"><?= $word[16]['name_'.$lang]; ?></th>
                  <th class="text-center"><?= $word[34]['name_'.$lang]; ?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($allUser as $user): ?>
                    <?php if($user['id_crew'] == $crew['id'] and $user['id_section'] == $currentSection[0]['id']): ?>
                        <input name="id_user[]" type="hidden" value="<?= $user['id']; ?>">
                
                        <tr class="a-crew-generate-user" data-date-end-doc="<?= $user['id_user']; ?>">
                          <!--Должность-->
                          <td class="a-crew-generate-user__rank"> 
                            <?= dropDownList('id_rank[]', $allRank, $user['id_rank']); ?>
                          </td>
                          <!--Имя-->
                          <td class="a-crew-generate-user__name">
                             <?= linkUser($user['id_section'], $user['id'], $user['last_name_'.$lang], $user['name_'.$lang], $user['first_name_'.$lang]); ?>
                          </td>
                          <!--Дата замены-->
                          <td class="a-crew-generate-user__date-replace">
                            <div class="input-group date date-picker hidden">
                              <input value="<?= convertDateEmpty($user['date_replace']); ?>" type="text" class="form-control" placeholder="<?= $word[130]['name_'.$lang]; ?>">
                              <input name="date_replace[]" type="hidden" value="<?= convertDate3($user['date_replace']); ?>">
                              <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                              </span>
                            </div>
                          </td>
                          <!--Экипаж-->
                          <td class="a-crew-generate-user__crew"> 
                            <div class="hidden">
                               <?= dropDownList('id_crew[]', $allCrew, $user['id_crew']); ?>
                            </div>
                          </td>
                          <!--Комментарий-->
                          <td class="a-crew-generate-user__remark">
                            <div class="form-group text-center hidden">
                              <div class="input-group">
                                <input type="text" value="<?= $user['remark']; ?>">
                                <input name="remark[]" type="hidden" value="<?= $user['remark']; ?>">
                              </div>
                            </div>
                          </td>
                        </tr>
                  <?php endif; ?>
                <?php endforeach; ?>   
                        
                 <!--Показывать только в разделе для формирования задания на полёт-->
                 <?php if($currentSubsection[0]['type'] != 'crew' and $crew['location_en'] == 'UAE'): ?>
                 <!--Уведомление--> 
                 <tr>
                    <td colspan="5">
                      <div class="alert alert-warning" role="alert">
                        <?= $word[355]['name_'.$lang]; ?>
                      </div>
                    </td>
                 </tr>
                 
                 <tr>
                   <!--Воздушное судно-->
                    <td class="a-crew-generate__aircraft">
                      <div class="text-bold"><?= $word[127]['name_'.$lang]; ?></div>
                      <select name="id_aircraft">
                      <?php foreach($allAircraft as $aircraft): ?>
                         <?php if(strstr($crew['name_ru'], '76')) { $selected = 'selected'; } ?>
                          <option <?= $selected ?> value="<?= $aircraft['id'] ?>"><?= $aircraft['name_'.$lang].' '.$aircraft['model'].' / '.$word[354]['name_'.$lang]; ?> - <?= $aircraft['last_number_assignment'] ?></option>
                          <?php unset($selected); ?>
                        <?php endforeach; ?>
                      </select>
                    </td>
                    <td></td>
                   <!--Дата вылета-->
                    <td class="a-crew-generate__date-departure">
                      <div class="text-bold text-center"><?= $word[128]['name_'.$lang]; ?></div>
                      <div class="input-group date date-picker">
                        <input value="<?= convertDateEmpty($user['date_departure']); ?>" type="text" class="form-control" placeholder="<?= $word[130]['name_'.$lang]; ?>">
                        <input name="date_departure" type="hidden" value="<?= convertDate3($user['date_departure']); ?>">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                      </div>
                    </td>
                    <td></td>
                    <!--Задание на полет №--> 
                    <td class="a-crew-generate__number-assignment">
                      <div class="text-bold text-center">№ <?= $word[124]['name_'.$lang]; ?></div>
                      <div class="form-group text-center">
                        <div class="input-group">
                          <input name="number_assignment" type="text" pattern="^[0-9]+$">
                        </div>
                      </div>
                    </td>
                 </tr>
                 <?php endif; ?>
                <tr>
                  <!--Отправить-->
                  <td class="a-crew-generate__submit text-right" colspan="5">
                     <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
                  </td>
                </tr>
              </tbody>
            </table>
           </form> 
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  <?php endforeach; ?>
</div>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

