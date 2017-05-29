<?php
		if
			($currentSection[0]['user'] == '1' and $permissionManageUsers)
		{
			if($_GET['action'] == 'user_premission_edit')
			{
              
              
					$idAuthor = $currentUser[0]['id'];
					$idUserPermission = $getIdUserPermission;
					$ip = $currentUserIp;
					$userAgent = $currentUserAgent;
					$nameRu = clearStr($_POST['name_ru']);
					$nameEn = clearStr($_POST['name_en']);
					$description = clearStr($_POST['description']);
                    
                    // Текущие права
                    $userPermission = selectUserPermission($getIdUserPermission);
                    
					if(empty($_POST['name_ru']))
						$nameRu = 0;
   					if(empty($_POST['name_en']))
						$nameEn = $nameRu;
					if(empty($_POST['description']))
						$description = 0;
                    
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
                            strstr($userPermission[0]['permission'], ':'.$allSections[$i]['mark'].':'))
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
          
				updateUserPermission($idUserPermission, $idAuthor, $nameRu, $nameEn, $description, $permission, $ip, $userAgent);
                
                $ancor = '#noticeUserPermissionUpdate';
                redirect($ancor);
			}
    }
?>