<div class="control__doc-user">
  <table class="table table-striped table-bordered tablesorter tablesorter-control__doc-user">
    <thead>
      <tr>
        <th class="text-center"><span class="fa fa-info-circle" data-toggle="tooltip" title="<?= $word[75]['name_'.$lang]; ?>"></span></th>
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
    <?php foreach($allUserControl as $user): ?>
      <?php if($user['hide'] == 0 and $user['id_section'] == $currentSection[0]['id']): ?>
        <tr data-date-end-doc="<?= $user['date_end_doc']; ?>"
            data-id-section="<?= $user['id_section']; ?>"
            data-user-date-birth="<?= userDateBirth10days($user['date_birth']); ?>">
          <td class="text-center">
            <span class="place-notice fa fa-file-text"></span>
          </td>
          <td class="hidden-xs"><?= $user['rank_'.$lang]; ?></td>
          <td>
            <?= linkUser($user['id_section'], $user['id'], $user['last_name_'.$lang], $user['name_'.$lang], $user['first_name_'.$lang]); ?>
          </td>
          <td class="text-center hidden-xs">
            <?= convertDate($user['date_birth']); ?>
          </td>
          <td class="text-center hidden-xs">
            <span class="icon-section" data-toggle="tooltip" title="<?= $user['section_'.$lang]; ?>"></span>
          </td>
          <td class="hidden-xs"><?= $user['crew_'.$lang]; ?></td>
          <td class="text-center">
            <!--Пользователь заблокирован-->  
            <?php if($user['number_retries']): ?>
              <span class="glyphicon glyphicon-ban-circle text-red" data-toggle="tooltip" title="<?= $word[164]['name_'.$lang]; ?>"></span>
            <?php endif; ?>
            <!--Пользователь скрыт-->  
            <?php if($user['hide']): ?>
              <span class="glyphicon glyphicon-eye-close text-red" data-toggle="tooltip" title="<?= $word[350]['name_'.$lang]; ?>"></span>
            <?php endif; ?>
            <!--Пользователь удален-->   
            <?php if(empty($user['login'])): ?>
              <span class="glyphicon glyphicon-remove text-red" data-toggle="tooltip" title="<?= $word[351]['name_'.$lang]; ?>"></span>
            <?php endif; ?>
            <!--День рождения--> 
            <?php if(userDateBirth10days($user['date_birth'])): ?>
              <span class="glyphicon glyphicon-gift text-red" data-toggle="tooltip" title="<?= $word[352]['name_'.$lang]; ?>"></span>
            <?php endif; ?>
          </td>
        </tr>
        <?php endif; ?>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
