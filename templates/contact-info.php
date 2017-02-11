<div class="contact-info accordion-open-first-tab panel-group" id="collapse-control-contact-info">
<h1 class="title-page text-center text-uppercase"> <?= $currentSection[0]['name_'.$lang]; ?> </h1>
    
  <?php foreach($allSections as $section): ?>
    <?php if($section['count_user'] > 0): ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <!--Раскрыть блок-->
        <h4 class="panel-title text-bold">
          <a data-toggle="collapse" data-parent="#collapse-control-contact-info" href="#section<?= $section['id']; ?>"><?= $section['name_'.$lang]; ?></a>
        </h4>
      </div>
       <!--Блок-->
      <div id="section<?= $section['id']; ?>" class="panel-collapse collapse accordion-item">
        <div class="panel-body">

          <table class="table table-striped table-bordered tablesorter tablesorter-contact-info__list-user">
            <thead>
              <tr>
                <th class="title text-bold hidden-xs"><?= $word[15]['name_'.$lang]; ?></td>
                <th class="title text-bold"><?= $word[18]['name_'.$lang]; ?></td>
                <th class="title text-bold"><?= $word[157]['name_'.$lang]; ?></td>  
                <th class="title text-bold"><?= $word[8]['name_'.$lang]; ?></td>
                <th class="title text-bold"><?= $word[312]['name_'.$lang]; ?></td> 
                <th class="title text-bold hidden-xs"><?= $word[5]['name_'.$lang]; ?></th>
                <th class="title text-bold text-center hidden-xs"><?= $word[91]['name_'.$lang]; ?></td>
              </tr>
            </thead>
            <tbody>
            <?php foreach($allUser as $user): ?>
              <?php if($user['hide'] == 0 and $user['id_section'] == $section['id']): ?>
                <tr 
                  data-id-section="<?= $user['id_section']; ?>"
                  data-user-date-birth="<?= userDateBirth10days($user['date_birth']); ?>">
                  <td class="hidden-xs"><?= $user['rank_'.$lang]; ?></td>
                  <td>
                    <?= linkUserSentDoc($user['id_section'], $user['id'], $user['last_name_'.$lang], $user['name_'.$lang], $user['first_name_'.$lang]); ?>
                  </td>
                  <td>
                    <div><?= phone($user['phone']); ?></div> 
                    <div><?= phone($user['phone_corp']); ?></div> 
                  </td>
                  <td>
                    <div><?= checkEmptyOr0($user['mail']); ?></div> 
                    <div><?= checkEmptyOr0($user['mail_2']); ?></div> 
                  </td>
                  <td>
                    <?= checkEmptyOr0($user['skype']); ?>
                  </td> 
                  <td class="text-center hidden-xs">
                    <?= convertDate($user['date_birth']); ?>
                  </td>
                  <td class="text-center hidden-xs">
                    <span class="icon-section" data-toggle="tooltip" title="<?= $user['section_'.$lang]; ?>"></span>
                  </td>
                </tr>
                <?php if($user['additional_info']): ?>
                  <tr 
                    data-id-section="<?= $user['id_section']; ?>"
                    data-user-date-birth="<?= userDateBirth10days($user['date_birth']); ?>">
                    <td colspan="7">
                      <span class="fa fa-info-circle" data-toggle="tooltip" title="<?= $word[313]['name_'.$lang]; ?>"></span>  <?= checkEmptyOr0($user['additional_info']); ?>
                    </td>
                  </tr>
                <?php endif; ?>
                  
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