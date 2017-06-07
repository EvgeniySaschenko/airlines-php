<div class="control__doc-all-user-received accordion-open-first-tab panel-group" id="collapse-doc-all-user-received">
  <?php foreach($allSections as $section): ?>
    <?php if($section['count_user'] > 0): ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <!--Раскрыть блок-->
        <h4 class="panel-title text-bold">
          <a data-toggle="collapse" data-parent="#collapse-doc-all-user-received" href="#section__collapse-doc-all-user-received<?= $section['id']; ?>"><?= $section['name_'.$lang]; ?></a>
        </h4>
      </div>
       <!--Блок-->
      <div id="section__collapse-doc-all-user-received<?= $section['id']; ?>" class="panel-collapse collapse accordion-item">
        <div class="panel-body">

          <table class="table table-striped table-bordered tablesorter tablesorter-control__doc-all-user-received">
            <thead>
              <tr>
                <th class="text-center"><span class="fa fa-info-circle" data-toggle="tooltip" title="<?= $word[102]['name_'.$lang]; ?>"></span></th>
                <th class="title text-bold hidden-xs"><?= $word[15]['name_'.$lang]; ?></td>
                <th class="title text-bold"><?= $word[18]['name_'.$lang]; ?></td>
                <th class="title text-bold hidden-xs"><?= $word[5]['name_'.$lang]; ?></th>
                <th class="title text-bold text-center hidden-xs"><?= $word[91]['name_'.$lang]; ?></td>
                <th class="title text-bold hidden-xs"><?= $word[16]['name_'.$lang]; ?></td>
                <th class="title text-bold text-center">
                  <span class="glyphicon glyphicon-user" data-toggle="tooltip" title="<?= $word[45]['name_'.$lang]; ?>"></span>
                </td>
              </tr>
            </thead>
            <tbody>
            <?php foreach($allUserAllSectionControl as $userAllSectionControl): ?>
              <?php if($userAllSectionControl['hide'] == 0 and $userAllSectionControl['id_section'] == $section['id'] and $userAllSectionControl['remove_mailing_list'] == '0'): ?>
                <tr 
                  data-date-studied="<?= $userAllSectionControl['date_studied_doc']; ?>"
                  data-id-section="<?= $userAllSectionControl['id_section']; ?>"
                  data-user-date-birth="<?= userDateBirth10days($userAllSectionControl['date_birth']); ?>">
                  <td class="text-center">
                    <span class="place-notice fa fa-file-text"></span>
                  </td>
                  <td class="hidden-xs"><?= $userAllSectionControl['rank_'.$lang]; ?></td>
                  <td>
                    <?= linkUserSentDoc($userAllSectionControl['id_section'], $userAllSectionControl['id'], $userAllSectionControl['last_name_'.$lang], $userAllSectionControl['name_'.$lang], $userAllSectionControl['first_name_'.$lang]); ?>
                  </td>
                  <td class="text-center hidden-xs">
                    <?= convertDate($userAllSectionControl['date_birth']); ?>
                  </td>
                  <td class="text-center hidden-xs">
                    <span class="icon-section" data-toggle="tooltip" title="<?= $userAllSectionControl['section_'.$lang]; ?>"></span>
                  </td>
                  <td class="hidden-xs"><?= $userAllSectionControl['crew_'.$lang]; ?></td>
                  <td class="text-center">
                    <!--Пользователь заблокирован-->  
                    <?php if($userAllSectionControl['number_retries']): ?>
                      <span class="glyphicon glyphicon-ban-circle text-red" data-toggle="tooltip" title="<?= $word[164]['name_'.$lang]; ?>"></span>
                    <?php endif; ?>
                    <!--Пользователь скрыт-->  
                    <?php if($userAllSectionControl['hide']): ?>
                      <span class="glyphicon glyphicon-eye-close text-red" data-toggle="tooltip" title="<?= $word[350]['name_'.$lang]; ?>"></span>
                    <?php endif; ?>
                    <!--Пользователь удален-->   
                    <?php if(empty($userAllSectionControl['login'])): ?>
                      <span class="glyphicon glyphicon-remove text-red" data-toggle="tooltip" title="<?= $word[351]['name_'.$lang]; ?>"></span>
                    <?php endif; ?>
                    <!--День рождения--> 
                    <?php if(userDateBirth10days($userAllSectionControl['date_birth'])): ?>
                      <span class="glyphicon glyphicon-gift text-red" data-toggle="tooltip" title="<?= $word[352]['name_'.$lang]; ?>"></span>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endif; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php endif; ?>
  <?php endforeach; ?> 
</div>
