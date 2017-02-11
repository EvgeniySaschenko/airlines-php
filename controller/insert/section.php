<?php
    # Воздушное судно
		if($_GET['action'] == 'add_subsection' and $permissionManageSite)
		{
				$idAuthor = $currentUser[0]['id'];
				$ip = $currentUserIp;
				$userAgent = $currentUserAgent;
        
        $nameRu = clearStr($_POST['name_ru']);
        if(empty($_POST['name_en'])) {
          $nameEn = $nameRu;
        } else {
          $nameEn = clearStr($_POST['name_en']);
        }
        $idSection = clearStr($_POST['id_section_department']);
        $priority = clearInt($_POST['priority']);
				$result = insertSubsection($idAuthor, $nameRu, $nameEn, $idSection, $priority, $ip, $userAgent);
        
        // Права администратора
        if($result) {
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
        }

        
        
        if($result) {
          $ancor = '#noticeAddSectionSite';
        } else {
          $ancor = '#noticeErrorAddSectionSite';
        }

        redirect($ancor);
    }
 ?>