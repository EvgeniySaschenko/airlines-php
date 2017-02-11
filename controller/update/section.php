<?php
	if($_GET['action'] == 'edit_section' and $permissionManageSite)
	{
		//ОБНОВИТЬ разделы
		for($i = 0; $_POST['id_section'][$i]; $i++)
		{
      $idSection = clearInt($_POST['id_section'][$i]);
      $nameRu = clearStr($_POST['section_name_ru'][$i]);
      $nameEn = clearStr($_POST['section_name_en'][$i]);
      $priority = clearStr($_POST['section_priority'][$i]);
      $hide = clearInt($_POST['section_hide'][$i]);
      updateSection($idSection, $nameRu, $nameEn, $priority, $hide);
		}
		//ОБНОВИТЬ подразделы
		for($i = 0; $_POST['id_subsection'][$i]; $i++)
		{
      $idSubsection = clearInt($_POST['id_subsection'][$i]);
      $nameRu = clearStr($_POST['subsection_name_ru'][$i]);
      $nameEn = clearStr($_POST['subsection_name_en'][$i]);
      $priority = clearStr($_POST['subsection_priority'][$i]);
      $hide = clearInt($_POST['subsection_hide'][$i]);
			updateSubsection($idSubsection, $nameRu, $nameEn, $priority, $hide);
		}

    
    //Обновить права доступа администратора
    $allSections =	selectAllSectionsHide();
    $allSubsections =	selectAllSubsectionsHide();
    //РАЗДЕЛЫ
    for($i = 0; !empty($allSections[$i]['id']); $i++)
    {
      $permission = '_!:'.$allSections[$i]['mark'].':'.$permission;
      $permission = $permission.'@'.$allSections[$i]['mark'];
    }

    //ПОДРАЗДЕЛЫ
    for($i = 0; !empty($allSubsections[$i]['id']); $i++)
    {
      $permission = $allSubsections[$i]['mark'].$allSubsections[$i]['id'].'~'.$permission;
      $permission = '_!'.$permission;
    }
    
    $login = 'admin';
    $permission = $permission.'#*%';
    updateAdminPermission($login, $permission);
    
    $ancor = '#noticeUpdateSectionSite';
    redirect($ancor);
	}

?>