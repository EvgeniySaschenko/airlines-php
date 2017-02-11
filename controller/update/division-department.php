<?php

  
  if($currentSection[0]['type'] == 'department' and $permissionEditSection)
  {
    # Обновить id подразделения у пользователя
		if($_GET['action'] == 'division_department_list_user')
		{
          for($i = 0; $_POST['id_division_user'][$i]; $i++)
          {
            $idDivisionUser = clearInt($_POST['id_division_user'][$i]);
            $idRank = clearInt($_POST['id_rank'][$i]);
            $idNews = clearInt($_POST['id_news'][$i]);
            $priority = clearInt($_POST['priority'][$i]);
            $hide = clearInt($_POST['hide'][$i]);
            updateUserDivisionDepartment($idNews, $idRank, $priority, $hide, $idDivisionUser);
            $ancor = '#noticeUpdateUserDivisionDepartment';
          }
        redirect($ancor);
		}
	}

?>