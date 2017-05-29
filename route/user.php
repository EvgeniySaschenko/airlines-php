<?php
    if
        ($permissionReadPersonalDoc and $_GET['action'] == 'user_profile'
    or
        $currentUser[0]['id'] == $_GET['id_user'] and $_GET['action'] == 'user_profile')
    {
        $user = selectUser($getIdUser);
        $allTypeDoc = selectAllTypeDoc($getIdSection, $getIdSubsection);
        $allDoc = selectAllDocUser($getIdUser, $getIdSection, $getIdSubsection, $getIdNews, $getIdBook);
        $sentDocUser = selectSentDocUser($getIdUser, $getPage);
        include('templates/user.php');
    }
    
    # Управление пользователями
	if($permissionManageUsers)
    {
      $allSectionsHide = selectAllSectionsHide();
      $allSubsectionsHide = selectAllSubsectionsHide();
      $allRank = selectAllRank($getIdSection);
      $allCrew = selectAllCrew();
      $allUserPermission = selectAllUserPermission($getIdSection);
      # Добавить пользователя
      if($_GET['action'] == 'user_add')
      {
          $allUser = selectAllUser();
          include('templates/a-user.php');
      }
      # Редактировать пользователя
      if($_GET['action'] == 'user_edit')
      {
          $user = selectUser($getIdUser);
          $allTypeDoc = selectAllTypeDoc($getIdSection, $getIdSubsection);
          $allDoc = selectAllDocUser($getIdUser, $getIdSection, $getIdSubsection, $getIdNews, $getIdBook);
          $allUserPermission = selectAllUserPermission($getIdSection);
          include('templates/a-user-profile.php');
      }
      # Права доступа
      if($_GET['action'] == 'user_premission_edit')
      {
          $userPermission = selectUserPermission($getIdUserPermission);
          include('templates/a-user-permission-edit.php');
      }
	}
?>