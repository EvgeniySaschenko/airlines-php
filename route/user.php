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
				include('templates/a-user-profile.php');
			}
		}
?>