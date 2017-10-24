<?php
	if
		($currentSection[0]['user'] == 1 and $permissionManageUsers)
  {
    
        # Обновить права доступа всех пользователей
        if($_GET['action'] == 'user_all_edit_permission')
        {
          for($i = 0; !empty($_POST['id_user'][$i]); $i++)
          {
            $idUser = clearInt($_POST['id_user'][$i]);
            $idUserPermission = clearInt($_POST['id_user_permission'][$i]);
            
            
            // Проверка прав, на возможность изменения прав доступа
            $userPermissionCheck= selectUserPermission($idUserPermission);
            preg_match_all('/:[a-z]{1,}:/', $userPermissionCheck[0]['permission'], $readSect, PREG_OFFSET_CAPTURE);
            preg_match_all('/!:[a-z]{1,}:/', $userPermissionCheck[0]['permission'], $editSect, PREG_OFFSET_CAPTURE);
            preg_match_all('/_!:[a-z]{1,}:/', $userPermissionCheck[0]['permission'], $delSect, PREG_OFFSET_CAPTURE);
            preg_match_all('/[a-z]{1,1}[0-9]{1,}~/', $userPermissionCheck[0]['permission'], $readSubSect, PREG_OFFSET_CAPTURE);
            preg_match_all('/![a-z]{1,1}[0-9]{1,}~/', $userPermissionCheck[0]['permission'], $reditSubSect, PREG_OFFSET_CAPTURE);
            preg_match_all('/_![a-z]{1,1}[0-9]{1,}~/', $userPermissionCheck[0]['permission'], $delSubSect, PREG_OFFSET_CAPTURE);
            preg_match_all('/@[a-z]{1,1}/', $userPermissionCheck[0]['permission'], $manageUser, PREG_OFFSET_CAPTURE);
            preg_match_all('/#/', $userPermissionCheck[0]['permission'], $readPersonalData, PREG_OFFSET_CAPTURE);
            preg_match_all('/\*/', $userPermissionCheck[0]['permission'], $manageSite, PREG_OFFSET_CAPTURE);
            preg_match_all('/%/', $userPermissionCheck[0]['permission'], $editFlightAsigment, PREG_OFFSET_CAPTURE);

            $arrPermission= [ $readSect, $editSect, $delSect, $readSubSect, $reditSubSect, $delSubSect, $manageUser, $readPersonalData, $manageSite, $editFlightAsigment ];
            $userPermission= '';
            foreach($arrPermission as $permissionItem){
                
                foreach($permissionItem[0] as  $permissionItemSub){
                  if(strstr($currentUser[0]['permission'], $permissionItemSub[0])){
                      $userPermissionResult= true;
                  }else{
                      $userPermissionResult= false;
                      break;
                  }
                }
                
                if(!$userPermissionResult){
                    break;
                }
                
            }
            
            if(($userPermissionResult or $idUserPermission == 0))
                updateUserFieldPermission($idUser, $idUserPermission);
          }
          $ancor = '#noticeUserPermissionUpdate';
          redirect($ancor);
        }
  }
