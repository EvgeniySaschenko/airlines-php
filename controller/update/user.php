<?php
	if
		($currentSection[0]['user'] == 1 and $permissionManageUsers)
  {
    
    # Редактировать пользователя
		if($_GET['action'] == 'user_edit')
		{
			if($_POST['date_birth'] != 0 and !empty($_POST['login']) and !empty($_POST['name_ru']) and !empty($_POST['name_en']) and !empty($_POST['last_name_ru']) and !empty($_POST['last_name_en']) and !empty($_POST['first_name_ru']) and !empty($_POST['first_name_en']) and $_SESSION['token'] == $_POST['token'])
			{
				$idUser = $getIdUser;
				$user = selectUser($getIdUser);
				$idAuthor = $currentUser[0]['id'];
				$idSection = $user[0]['id_section'];
				$idRank = clearInt($_POST['id_rank']);
				$idCrew = clearInt($_POST['id_crew']);
                $idUserPermission = clearInt($_POST['id_user_permission']);
				$login = clearStr($_POST['login']);
				$pass = $user[0]['pass'];
				if(!empty($_POST['pass']))
					$pass = codePass($_POST['pass']);
				$nameRu = clearStr($_POST['name_ru']);
				$nameEn = clearStr($_POST['name_en']);
				$lastNameRu = clearStr($_POST['last_name_ru']);
				$lastNameEn = clearStr($_POST['last_name_en']);
				$firstNameRu = clearStr($_POST['first_name_ru']);
				$firstNameEn = clearStr($_POST['first_name_en']);
				$addressRu = clearStr($_POST['address_ru']);
                $mail2 = clearStr($_POST['mail_2']);
                $skype = clearStr($_POST['skype']);
                $additionalInfo = clearStr($_POST['additional_info']);

                $removeMailingList = clearInt($_POST['remove_mailing_list']);
        
				if(empty($_POST['address_ru']))
					$addressRu = 0;
				$addressEn = clearStr($_POST['address_en']);
				if(empty($_POST['address_en']))
					$addressEn = 0;
				$mail = clearStr($_POST['mail']);
				if(empty($_POST['mail']))
					$mail = 0;
        if(empty($_POST['mail_2']))
          $mail2 = 0;
        if(empty($_POST['skype']))
          $skype = 0;
        if(empty($_POST['additional_info']))
          $additionalInfo = 0;
        
				$phoneCountry = clearStr($_POST['phone_country']);
				$phoneOperator = clearStr($_POST['phone_operator']);
				$phoneNumber = clearStr($_POST['phone_number']);
				$phone = $phoneCountry.'|'.$phoneOperator.'|'.$phoneNumber;
				if(empty($_POST['phone_number']))
					$phone = 0;
				$phoneCountry = clearStr($_POST['phone_corp_country']);
				$phoneOperator = clearStr($_POST['phone_corp_operator']);
				$phoneNumber = clearStr($_POST['phone_corp_number']);
				$phoneCorp = $phoneCountry.'|'.$phoneOperator.'|'.$phoneNumber;
				if(empty($_POST['phone_corp_number']))
					$phoneCorp = 0;
        
				$dateBirth =  convertDateToMySQL(clearStr($_POST['date_birth']));
				$extension = clearStr($_POST['extension']);
				$hide = clearInt($_POST['hide']);
					if(empty($_POST['hide']))
						$hide = 0;
				$numberRetries = clearInt($_POST['number_retries']);
					if(empty($_POST['number_retries']))
						$numberRetries = 0;
				$ip = $currentUserIp;
				$userAgent = $currentUserAgent;

				//Права доступа
        $allSections =	selectAllSectionsHide();
        $allSubsections =	selectAllSubsectionsHide();
				//РАЗДЕЛЫ
				for($i = 0; !empty($allSections[$i]['id']); $i++)
				{
					//Чтение
					if(
                        strstr($currentUser[0]['permission'], ':'.$allSections[$i]['mark'].':')
                      or
                        strstr($userPermission[0]['permission'], ':'.$allSections[$i]['mark'].':')  
                      )
					{
						if(!empty($_POST['view_section'][$i]))
							$permission = ':'.$allSections[$i]['mark'].':'.$permission;
						//Редактирование
						if(
                            strstr($currentUser[0]['permission'], '!:'.$allSections[$i]['mark'].':')
                          or
                            strstr($userPermission[0]['permission'], '!:'.$allSections[$i]['mark'].':')      
                          )
						{
							if(!empty($_POST['edit_section'][$i]))
								$permission = '!'.$permission;
						}
						//Удаление
						if(
                            strstr($currentUser[0]['permission'], '_!:'.$allSections[$i]['mark'].':')
                          or
                            strstr($userPermission[0]['permission'], '_!:'.$allSections[$i]['mark'].':')   
                          )
						{
							if(!empty($_POST['delete_section'][$i]))
								$permission = '_'.$permission;
						}
					}
					//Управление пользователями
					if(
                          $allSections[$i]['user'] != 0 
                        and 
                          (strstr($currentUser[0]['permission'], '@'.$allSections[$i]['mark']) or strstr($userPermission[0]['permission'], '@'.$allSections[$i]['mark']))
                      )
					{
						if(!empty($_POST['manage_users'][$i]))
							$permission = $permission.'@'.$allSections[$i]['mark'];
					}
				}
				//ПОДРАЗДЕЛЫ
				for($i = 0; !empty($allSubsections[$i]['id']); $i++)
				{
					//Чтение
					if(
                          strstr($currentUser[0]['permission'], $allSubsections[$i]['mark'].$allSubsections[$i]['id'].'~')
                        or 
                          strstr($userPermission[0]['permission'], $allSubsections[$i]['mark'].$allSubsections[$i]['id'].'~')
                      )
					{
						if(!empty($_POST['view_subsection'][$i]))
							$permission = $allSubsections[$i]['mark'].$allSubsections[$i]['id'].'~'.$permission;
						else
							$permission = '0'.$permission;
						//Редактирование
						if(
                            strstr($currentUser[0]['permission'], '!'.$allSubsections[$i]['mark'].$allSubsections[$i]['id'].'~')
                          or 
                            strstr($userPermission[0]['permission'], '!'.$allSubsections[$i]['mark'].$allSubsections[$i]['id'].'~')
                          )
						{
							if(!empty($_POST['edit_subsection'][$i]))
								$permission = '!'.$permission;
						}
						else
							$permission = '0'.$permission;
						//Удаление
						if(
                            strstr($currentUser[0]['permission'], '_!'.$allSubsections[$i]['mark'].$allSubsections[$i]['id'].'~')
                          or 
                            strstr($userPermission[0]['permission'], '_!'.$allSubsections[$i]['mark'].$allSubsections[$i]['id'].'~')
                           )
						{
							if(!empty($_POST['delete_subsection'][$i]))
								$permission = '_'.$permission;
						}
						else
							$permission = '0'.$permission;
					}
				}
				//Просмотр личных документов
				if(strstr($currentUser[0]['permission'], '#') or strstr($userPermission[0]['permission'], '#'))
				{
					if(!empty($_POST['personal_doc']))
						$permission = $permission.'#';
				}
				//Управление сайтом
				if(strstr($currentUser[0]['permission'], '*') or strstr($userPermission[0]['permission'], '*'))
				{
					if(!empty($_POST['manage_site']))
						$permission = $permission.'*';
				}

				//Задание на полет (Запретить редактирование)
				if(strstr($currentUser[0]['permission'], '%') or strstr($userPermission[0]['permission'], '%'))
				{
					if(!empty($_POST['doc_assignment_flight']))
						$permission = $permission.'%';
				}
        
                                // Обновить права доступа администратора 
                                if($login == 'admin') 
                                {
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
                                }


                                if(empty($permission)) {
                                  $permission = 0;
                                }
                                
                                
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
                                
        
        
				$checkLogin = selectUserCheckLogin($login);
        
				if($checkLogin[0]['login'] == $user[0]['login'] or empty($checkLogin))
				{
					if(!empty($_FILES['uploadfile']['name']))
						$extension = extensionFile($_FILES['uploadfile']['name']);
					if($extension == 'jpg' or $extension == 'jpeg')
					{
						$extension = 'jpg';
						$path = 'images/user';
						//Загрузка файла на сервер
						if(copy($_FILES['uploadfile']['tmp_name'], $path.'/new_file.'.$extension))
						{
							rename($path.'/new_file.'.$extension, $path.'/'.$idUser.'.'.$extension);
						}
					}

					if(!empty($_FILES['signature']['name']))
						$extension = extensionFile($_FILES['signature']['name']);
					if($extension == 'jpg' or $extension == 'jpeg')
					{
						$extension = 'jpg';
						$path = 'images/user/signature';
						//Загрузка файла на сервер
						if(copy($_FILES['signature']['tmp_name'], $path.'/new_file.jpg'))
						{
							rename($path.'/new_file.'.$extension, $path.'/'.$idUser.'.jpg');
						}
					}
          
          // Сменить раздел пользовалеля + сброс пароля

          if($user[0]['id_section'] != $_POST['id_section']) {
            $idSection = clearInt($_POST['id_section']);
            $pass = 1;
            $allDocUser = selectAllDocUser($idUser, $user[0]['id_section'], 0, 0, 0);
            foreach($allDocUser as $docUser) {
              updateDocSection($docUser['id'], $idSection);
            }
          }
          
          
        if(($userPermissionResult or $idUserPermission == 0))
          updateUser($idUser, $idAuthor, $idSection, $idRank, $idCrew, $idUserPermission, $login, $pass, $nameRu, $nameEn, $lastNameRu, $lastNameEn, $firstNameRu, $firstNameEn, $addressRu, $addressEn, $mail, $mail2, $skype, $additionalInfo, $phone, $phoneCorp, $dateBirth, $permission, $hide, $removeMailingList, $numberRetries, $extension, $ip, $userAgent);
          $ancor = '#noticeUpdateUserEdit';
				}
        else 
        {
          $ancor = '#noticeExistLoginUserEdit';
        }
			}
			else
			{
				$ancor = '#noticeErrorUserEdit';
			}
      redirect($ancor);
		}
    
    # Отключить пользователя
    if($_GET['action'] == 'user_disable')
    {
      $hide = 1;
      $idUser = clearInt($_GET['id_user']);
      updateUserDisadleEnable($hide, $idUser);
      # Уведомление
      $user = selectUser($getIdUser);
      if($user[0]['hide'] == 1) {
        $ancor = '#noticeAddedUserDisable';
      } else {
        $ancor = '#noticeErrorUserDisable';
      }
      redirect($ancor);
    }
    
    # Удалить пользователя (удалить логин)
    if($_GET['action'] == 'user_delete')
    {
      $idUser = clearInt($_GET['id_user']);
      updateUserDeleteLoginDisadle($idUser);
      # Уведомление
      $user = selectUser($getIdUser);
      if($user[0]['hide'] == 1 and $user[0]['login'] == 0) {
        $ancor = '#noticeAddedUserDisable';
      } else {
        $ancor = '#noticeErrorUserDisable';
      }
      redirect($ancor);
    }
  }

?>