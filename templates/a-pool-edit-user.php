<div class="a-pool-edit-user">
   <h1 class="title-page text-center text-uppercase"> 
        <?= $word[402]['name_'.$lang]; ?>
       <a href="doc-generate/pool.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;id_subsection=<?= $_GET['id_subsection']; ?>&amp;id_pool=<?= $_GET['id_pool']; ?>&amp;action=pool_generate_doc">
        <span class="fa fa-file-word-o"></span> 
       </a>
   </h1>    
  <div class="notice">
    <!-- Update-->
    <div data-notice="#noticeUpdatePoolQuestionUser" data-ancor="noticeUpdatePoolQuestionUser" class="hidden alert alert-success" role="alert">
      <?= $word[218]['name_'.$lang]; ?>
    </div>
  </div>
   

<form method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;id_subsection=<?= $_GET['id_subsection']; ?>&amp;id_pool=<?= $_GET['id_pool']; ?>&amp;action=pool_edit_user">
  <table class="table table-align-middle a-pool-edit__table-edit">
  <caption class="text-bold text-center"> <?= $currentPool[0]['name_'.$lang]; ?> <?= $word[417]['name_'.$lang]; ?> <?= convertDate($currentPool[0]['date_doc']); ?></caption>
    <thead
      <tr>
        <th class="text-center">№</th>
        <th class="text-center"><?= $word[410]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[103]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[372]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[411]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[414]['name_'.$lang]; ?></th>
        <th class="text-center"><?= $word[415]['name_'.$lang]; ?></th>
      </tr>
    </thead>
    <tbody>

      <?php foreach($allPoolQuestion as $key => $poolQuestion): ?>
        <tr data-id-user="<?=  $poolQuestion['id_user']; ?>">
          <td class="text-center text-bold">
              <?= $key + 1; ?>
              <input name="id_pool_question[]" type="hidden" value="<?=  $poolQuestion['id']; ?>">
          </td>
          <td>
             <div> <?= $poolQuestion['name_ru']; ?> </div>
             <div> <?= $poolQuestion['name_en']; ?> </div>
          </td>
          <td>
              <?= linkUser($poolQuestion['id_section_user'], $poolQuestion['id_user'], $poolQuestion['user_last_name_'.$lang], $poolQuestion['user_name_'.$lang], $poolQuestion['user_first_name_'.$lang]); ?>
          </td>
          <td class="text-center">
              <?= $poolQuestion['name_departament']; ?>
          </td>
          <td class="text-center">
              <textarea name="remark_user[]" class="form-control"><?= $poolQuestion['remark_user']; ?></textarea>
          </td>
          <td>
              <div class="form-group down-list__valuation text-center" data-index-risk-before="<?=$poolQuestion['probability_user_1'].''.$poolQuestion['seriousness_user_1']; ?>">
                  <?= dropDownListSimpleArrayNo('seriousness_user_1[]', array('A', 'B', 'C', 'D', 'E'), $poolQuestion['seriousness_user_1']); ?>
                  <?= dropDownListSimpleArrayNo('probability_user_1[]', array('1', '2', '3', '4', '5'), $poolQuestion['probability_user_1']); ?>
              </div>
          </td>
          <td>
              <div class="form-group down-list__valuation text-center" data-index-risk-after="<?=$poolQuestion['probability_user_2'].''.$poolQuestion['seriousness_user_2']; ?>">
                  <?= dropDownListSimpleArrayNo('seriousness_user_2[]', array('A', 'B', 'C', 'D', 'E'), $poolQuestion['seriousness_user_2']); ?>
                  <?= dropDownListSimpleArrayNo('probability_user_2[]', array('1', '2', '3', '4', '5'), $poolQuestion['probability_user_2']); ?>
              </div>
          </td>
        </tr>
      
      <?php endforeach; ?>
    <?php if($currentPool[0]['status'] == 0): ?>   
       <tr>
         <!--Отправить-->
         <td class="text-right" colspan="7">
            <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
         </td>
       </tr>
    <?php endif; ?>   
    </tbody>
  </table>
</form>
    
   <div style="text-align: center">
    <?php if($GENERAL_SITE_SETTINGS[0]['risk_assessment'] == 'risk_assessment_1'): ?>
     <img src="images/risk-assessment.jpg" alt="">
    <?php elseif($GENERAL_SITE_SETTINGS[0]['risk_assessment'] == 'risk_assessment_2'): ?>
     <img src="images/risk-assessment-2.jpg" alt="">
    <?php endif; ?>
   </div>
    
</div>