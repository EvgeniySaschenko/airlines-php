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

<div class="a-user-premission-list">
<table class="table table-striped table-bordered">
  <caption class="text-bold text-center"><?= $word[387]['name_'.$lang]; ?></caption>
  <thead>
    <tr>
      <th class="title"><?= $word[51]['name_'.$lang]; ?></th>
      <th class="title"><?= $word[9]['name_'.$lang]; ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allUserPermission as $userPermission): ?>
      <tr>
        <td class="a-user-premission-list__name">
          <a href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $_GET['id_section']; ?>&amp;id_user_permission=<?= $userPermission['id']; ?>&amp;action=user_premission_edit">
            <?= $userPermission['name_'.$lang]; ?>
          </a>
        </td>
        <td class="a-user-premission-list__description">
          <?= $userPermission['description']; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
