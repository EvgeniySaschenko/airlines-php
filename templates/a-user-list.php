<div class="notice">
  <!--User Added-->
  <div data-notice="#noticeAddedUserDisable" data-ancor="userList" class="hidden alert alert-success" role="alert">
    <?= $word[146]['name_'.$lang]; ?>
  </div>
  <!--User Error-->
  <div data-notice="#noticeErrorUserDisable" data-ancor="userList" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
</div>

<div class="a-user-list">
<table class="table table-striped table-bordered tablesorter tablesorter-a-user-list">
  <thead>
    <tr>
      <th class="title text-center"><span class="fa fa-info-circle"></span></th>
      <th class="title hidden-xs"><?= $word[15]['name_'.$lang]; ?></th>
      <th class="title"><?= $word[18]['name_'.$lang]; ?></th>
      <th class="title hidden-xs"><?= $word[5]['name_'.$lang]; ?></th>
      <th class="title hidden-xs"><?= $word[1]['name_'.$lang]; ?></th>
      <th class="title text-center hidden-xs"><?= $word[71]['name_'.$lang]; ?></th>
      <th class="title text-center">
        <span class="fa fa-times visible-xs" data-toggle="tooltip" title="<?= $word[144]['name_'.$lang]; ?>"></span>
        <span class="hidden-xs"><?= $word[144]['name_'.$lang]; ?></span>
      </th>
      <th class="title text-bold text-center">
        <span class="glyphicon glyphicon-user" data-toggle="tooltip" title="<?= $word[45]['name_'.$lang]; ?>"></span>
      </td>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allUser as $user): ?>
     <?php if($user['id_section'] == $currentSection[0]['id']): ?>
      <tr data-user-hide="<?= $user['hide']; ?>" data-user-date-birth="<?= userDateBirth10days($user['date_birth']); ?>">
        <td class="a-user-list__info text-center">
          <span class="place-notice"></span>
        </td>
        <td class="a-user-list__rank hidden-xs">
          <?= $user['rank_'.$lang]; ?>
        </td>
        <td class="a-user-list__name">
           <?= linkUser($user['id_section'], $user['id'], $user['last_name_'.$lang], $user['name_'.$lang], $user['first_name_'.$lang]); ?>
        </td>
        <td class="a-user-list__date-birth hidden-xs">
          <?= convertDate($user['date_birth']); ?>
        </td>
        <td class="a-user-list__login hidden-xs">
          <?= $user['login']; ?>
        </td>
        <td class="a-user-list__date-create text-center hidden-xs">
           <?= convertDate($user['date_create']); ?>
        </td>
        <td class="a-user-list__disable text-center">
          <a href="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $user['id_section']; ?>&amp;id_user=<?= $user['id']; ?>&amp;action=user_delete">
           <span class="fa fa-times"></span>
          </a>
        </td>
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
