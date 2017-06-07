<?php
	if
		($currentSection[0]['user'] == 1 and $permissionManageUsers)
  {
    
        # Обновить права доступа всех пользователей
		if($_GET['action'] == 'user_all_edit_permission')
		{
          for($i = 0; !empty($_POST['id_user'][$i]); $i++)
          {
            $idUser = $_POST['id_user'][$i];
            $idUserPermission = $_POST['id_user_permission'][$i];
            
            updateUserFieldPermission($idUser, $idUserPermission);
          }
          $ancor = '#noticeUserPermissionUpdate';
          redirect($ancor);
        }
  }

?>