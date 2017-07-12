<div class="a-pool-edit">
   <h1 class="title-page text-center text-uppercase"> <?= $word[402]['name_'.$lang]; ?>  </h1>    
  <div class="notice">
    <!-- Update-->
    <div data-notice="#noticeUpdatePoolQuestion" data-ancor="noticeUpdatePoolQuestion" class="hidden alert alert-success" role="alert">
      <?= $word[218]['name_'.$lang]; ?>
    </div>
  </div>
   
<?php if($currentPool[0]['hide'] == 0): ?>
    <form method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;id_subsection=<?= $_GET['id_subsection']; ?>&amp;id_pool=<?= $_GET['id_pool']; ?>&amp;action=pool_edit_admin">
      <table class="table table-align-middle a-pool-edit__table-edit">
      <caption class="text-bold text-center"> <?= $currentPool[0]['name_'.$lang]; ?> <?= $word[417]['name_'.$lang]; ?> <?= convertDate($currentPool[0]['date_doc']); ?></caption>
        <thead>
          <tr>
            <th class="text-center">№</th>
            <th class="text-center a-pool-edit__table-edit_name"><?= $word[410]['name_'.$lang]; ?></th>
            <th class="text-center"><?= $word[372]['name_'.$lang]; ?></th>
            <th class="text-center"><?= $word[53]['name_'.$lang]; ?></th>
            <th class="text-center"><?= $word[103]['name_'.$lang]; ?></th>
            <th class="text-center"></th>
          </tr>
        </thead>
        <tbody>

          <?php foreach($allPoolQuestion as $key => $poolQuestion): ?>
          <tr data-id-user="<?=  $poolQuestion['id_user']; ?>">
            <!--Номер-->
            <td class="text-center text-bold" rowspan="3"><?= $key + 1; ?></td>

            <!--Название-->
            <td class="text-bold">
              <input name="id_pool_question[]" type="hidden" class="form-control" value="<?= $poolQuestion['id'] ?>">
              <?= $poolQuestion['name_ru'] ?> <br>/ <?= $poolQuestion['name_en'] ?> 
            </td>
            <!--Ответственный департамент-->
            <td>
              <div class="form-group">
                  <input name="name_departament[]" type="text" class="form-control" value="<?= $poolQuestion['name_departament'] ?>" placeholder="<?= $word[372]['name_'.$lang]; ?>">
              </div> 
            </td>
            <!--Приоритет-->
            <td>
              <div class="form-group">
                  <input name="priority[]" type="text" class="form-control" value="<?= $poolQuestion['priority'] ?>" placeholder="<?= $word[53]['name_'.$lang]; ?>">
              </div> 
            </td>
            <!--Пользователь-->
            <td>
              <?= dropDownListUsers('id_user[]', $allUser, $poolQuestion['id_user']); ?>
            </td>
            <!--status-->
            <td>
              <div class="form-group text-center">
               <div class="input-group">
                <input name="status[]" type="hidden" value="0">
               </div>
              </div>
            </td>
          </tr>

          <tr data-id-user="<?=  $poolQuestion['id_user']; ?>">
            <td>
                <!--Примечание пользователя-->
                <div class="form-group">
                    <div class="input-group">
                      <div data-toggle="tooltip" title="<?= $word[411]['name_'.$lang]; ?>" class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                      <input name="remark_user[]" value="<?= $poolQuestion['remark_user']; ?>" class="form-control" type="text" placeholder="<?= $word[411]['name_'.$lang]; ?>">
                    </div>
                </div>
            </td>
            <td colspan="2" data-index-risk-before="<?=$poolQuestion['probability_user_1'].''.$poolQuestion['seriousness_user_1']; ?>">
                <div class="form-group down-list__valuation">
                    <span class="glyphicon glyphicon-remove" data-toggle="tooltip" title="<?= $word[414]['name_'.$lang]; ?>"></span>
                    <?= dropDownListSimpleArrayNo('seriousness_user_1[]', array('A', 'B', 'C', 'D', 'E'), $poolQuestion['seriousness_user_1']); ?>
                    <?= dropDownListSimpleArrayNo('probability_user_1[]', array('1', '2', '3', '4', '5'), $poolQuestion['probability_user_1']); ?>
                </div>
            </td>
            <td colspan="2" data-index-risk-after="<?=$poolQuestion['probability_user_2'].''.$poolQuestion['seriousness_user_2']; ?>">
                <div class="form-group down-list__valuation">
                    <span class="glyphicon glyphicon-ok" data-toggle="tooltip" title="<?= $word[415]['name_'.$lang]; ?>"></span>
                    <?= dropDownListSimpleArrayNo('seriousness_user_2[]', array('A', 'B', 'C', 'D', 'E'), $poolQuestion['seriousness_user_2']); ?>
                    <?= dropDownListSimpleArrayNo('probability_user_2[]', array('1', '2', '3', '4', '5'), $poolQuestion['probability_user_2']); ?>
                </div>
            </td>
          </tr>

          <tr data-id-admin="admin">
            <td>
                <!--Примечание администратора-->
                <div class="form-group">
                    <div class="input-group">
                      <div data-toggle="tooltip" title="<?= $word[412]['name_'.$lang]; ?>" class="input-group-addon"><span class="glyphicon glyphicon-tower"></span></div>
                      <input name="remark_admin[]" value="<?= $poolQuestion['remark_admin']; ?>" class="form-control" type="text" placeholder="<?= $word[412]['name_'.$lang]; ?>">
                    </div>
                </div>
            </td>
            <td colspan="2" data-index-risk-before="<?=$poolQuestion['probability_admin_1'].''.$poolQuestion['seriousness_admin_1']; ?>">
                <div class="form-group down-list__valuation">
                    <span class="glyphicon glyphicon-remove" data-toggle="tooltip" title="<?= $word[414]['name_'.$lang]; ?>"></span>
                    <?= dropDownListSimpleArrayNo('seriousness_admin_1[]', array('A', 'B', 'C', 'D', 'E'), $poolQuestion['seriousness_admin_1']); ?>
                    <?= dropDownListSimpleArrayNo('probability_admin_1[]', array('1', '2', '3', '4', '5'), $poolQuestion['probability_admin_1']); ?>
                </div>
            </td>
            <td colspan="2" data-index-risk-after="<?=$poolQuestion['probability_admin_2'].''.$poolQuestion['seriousness_admin_2']; ?>">
                <div class="form-group down-list__valuation">
                    <span class="glyphicon glyphicon-ok" data-toggle="tooltip" title="<?= $word[415]['name_'.$lang]; ?>"></span>
                    <?= dropDownListSimpleArrayNo('seriousness_admin_2[]', array('A', 'B', 'C', 'D', 'E'), $poolQuestion['seriousness_admin_2']); ?>
                    <?= dropDownListSimpleArrayNo('probability_admin_2[]', array('1', '2', '3', '4', '5'), $poolQuestion['probability_admin_2']); ?>
                </div>
            </td>
          </tr>

          <?php endforeach; ?>
          <tr>
            <!--Отправить-->
            <td colspan="2">
               <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
            </td>

            <td colspan="2">
                <div class="text-bold"><?= $word[416]['name_'.$lang]; ?> </div>
                <div class="text-bold"><?= $word[26]['name_'.$lang]; ?> </div>
                <div class="text-bold"><?= $word[418]['name_'.$lang]; ?> </div>
                <div class="text-bold"><?= $word[451]['name_'.$lang]; ?> </div>
            </td>
            <td>
                <!--sent_mail-->
                <div class="form-group">
                    <div class="input-group">
                      <input name="sent_mail" type="checkbox" value="1" checked="checked">
                    </div>
                </div>
                <!--Удалить-->
                <div class="form-group">
                    <div class="input-group">
                      <input type="checkbox" value="1">
                      <input type="hidden" name="pool_hide" value="<?= $currentPool[0]['hide']; ?>">
                    </div>
                </div> 
                <!--Закрыть опрос-->
                <?php
                  if($currentPool[0]['status'] != 0)
                    $checkedClosePool = 'checked="checked"';
                ?>
                <div class="form-group">
                    <div class="input-group">
                        <input type="checkbox" value="1" <?= $checkedClosePool; ?>>
                        <input type="hidden" name="pool_status" value="<?= $currentPool[0]['status']; ?>">
                    </div>
                </div> 
                <div class="text-bold text-right">
                     <?= linkUser($allPoolQuestion[0]['id_section_admin'], $allPoolQuestion[0]['id_author'], $allPoolQuestion[0]['admin_user_last_name_'.$lang], $allPoolQuestion[0]['admin_user_name_'.$lang], $allPoolQuestion[0]['admin_user_first_name_'.$lang]); ?>
                </div> 
            </td>
          </tr>
        </tbody>
      </table>
    </form>
<?php endif; ?>
   

   <div style="text-align: center">
    <?php if($GENERAL_SITE_SETTINGS[0]['risk_assessment'] == 'risk_assessment_1'): ?>
     <img src="images/risk-assessment.jpg" alt="">
    <?php elseif($GENERAL_SITE_SETTINGS[0]['risk_assessment'] == 'risk_assessment_2'): ?>
     <img src="images/risk-assessment-2.jpg" alt="">
    <?php endif; ?>
   </div>
</div>