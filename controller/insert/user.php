<?php
		if
			($currentSection[0]['user'] == '1' and $permissionManageUsers)
		{
			if($_GET['action'] == 'user_add')
			{
				if($_POST['date_birth'] != 0 and !empty($_POST['login']) and !empty($_POST['pass']) and !empty($_POST['name_ru']) and !empty($_POST['name_en']) and !empty($_POST['last_name_ru']) and !empty($_POST['last_name_en']) and !empty($_POST['first_name_ru']) and !empty($_POST['first_name_en']) and $_SESSION['token'] == $_POST['token'])
				{
					unset($_SESSION['token']);
					$idAuthor = $currentUser[0]['id'];
					$idSection = $getIdSection;
					$idRank = clearInt($_POST['id_rank']);
					$idUserPermission = clearInt($_POST['id_user_permission']);
					$idCrew = clearInt($_POST['id_crew']);
					$login = clearStr($_POST['login']);
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
					$ip = $currentUserIp;
					$userAgent = $currentUserAgent;
          
					//Права доступа
					$allSections =	selectAllSectionsHide();
					$allSubsections =	selectAllSubsectionsHide();
					//РАЗДЕЛЫ
					for($i = 0; !empty($allSections[$i]['id']); $i++)
					{
						//Чтение
						if(strstr($currentUser[0]['permission'], ':'.$allSections[$i]['mark'].':'))
						{
							if(!empty($_POST['view_section'][$i]))
								$permission = ':'.$allSections[$i]['mark'].':'.$permission;
							//Редактирование
							if(strstr($currentUser[0]['permission'], '!:'.$allSections[$i]['mark'].':'))
							{
								if(!empty($_POST['edit_section'][$i]))
									$permission = '!'.$permission;
							}
							//Удаление
							if(strstr($currentUser[0]['permission'], '_!:'.$allSections[$i]['mark'].':'))
							{
								if(!empty($_POST['delete_section'][$i]))
									$permission = '_'.$permission;
							}
						}
						//Управление пользователями
						if($allSections[$i]['user'] != 0 and strstr($currentUser[0]['permission'], '@'.$allSections[$i]['mark']))
						{
							if(!empty($_POST['manage_users'][$i]))
								$permission = $permission.'@'.$allSections[$i]['mark'];
						}
					}
					//ПОДРАЗДЕЛЫ
					for($i = 0; !empty($allSubsections[$i]['id']); $i++)
					{
						//Чтение
						if(strstr($currentUser[0]['permission'], $allSubsections[$i]['mark'].$allSubsections[$i]['id'].'~'))
						{
							if(!empty($_POST['view_subsection'][$i]))
								$permission = $allSubsections[$i]['mark'].$allSubsections[$i]['id'].'~'.$permission;
							else
								$permission = '0'.$permission;
							//Редактирование
							if(strstr($currentUser[0]['permission'], '!'.$allSubsections[$i]['mark'].$allSubsections[$i]['id'].'~'))
							{
								if(!empty($_POST['edit_subsection'][$i]))
									$permission = '!'.$permission;
							}
							else
								$permission = '0'.$permission;
							//Удаление
							if(strstr($currentUser[0]['permission'], '_!'.$allSubsections[$i]['mark'].$allSubsections[$i]['id'].'~'))
							{
								if(!empty($_POST['delete_subsection'][$i]))
									$permission = '_'.$permission;
							}
							else
								$permission = '0'.$permission;
						}
					}
					//Просмотр личных документов
					if(strstr($currentUser[0]['permission'], '#'))
					{
						if(!empty($_POST['personal_doc']))
							$permission = $permission.'#';
					}
					//Управление сайтом
					if(strstr($currentUser[0]['permission'], '*'))
					{
						if(!empty($_POST['manage_site']))
							$permission = $permission.'*';
					}
					
					//Задание на полет (Запретить редактирование)
					if(strstr($currentUser[0]['permission'], '%'))
					{
						if(!empty($_POST['doc_assignment_flight']))
							$permission = $permission.'%';
					}
          
                    if(empty($permission)) {
                      $permission = 0;
                    }
					
					$checkLogin = selectUserCheckLogin($login);
					if(empty($checkLogin))
					{
						$extension = extensionFile($_FILES['uploadfile']['name']);
						if(empty($extension))
							$extension = 0;
						$idUser = insertUser($idAuthor, $idSection, $idRank, $idUserPermission, $idCrew, $login, $pass, $nameRu, $nameEn, $lastNameRu, $lastNameEn, $firstNameRu, $firstNameEn, $addressRu, $addressEn, $mail, $mail2, $skype, $additionalInfo, $phone, $phoneCorp, $dateBirth, $permission, $extension, $ip, $userAgent);
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
					}
          # Уведомление
          if($idUser)
            $ancor = '#noticeAddedUserAdd';
          elseif($checkLogin)
            $ancor = '#noticeAddedUserAddExistLogin';
          else
            $ancor = '#noticeErrorUserAdd';
				}
          redirect($ancor);
			}
    }
?>