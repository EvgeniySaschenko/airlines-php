<?php
	if
            ($currentSubsection[0]['type'] == 'pool' and $permissionEditSubsection)
	{
            if($_GET['action'] == 'pool_template_question_edit')
            {
                
                    $idAuthor = $currentUser[0]['id'];
                    $idPoolTemplate = $getIdPoolTemplate;
                    $ip = $currentUserIp;
                    $userAgent = $currentUserAgent;

                    for($i = 0; $_POST['id_pool_template_question'][$i]; $i++)
                    {
                        
                        $idPoolTemplateQuestion = $_POST['id_pool_template_question'][$i];
                        // Приоритет
                        if(!empty($_POST['priority'][$i]))
                        {
                          $priority = clearStr($_POST['priority'][$i]);
                        }
                        else
                        {
                          $priority = 0;
                        }
                        
                        // Пользователь
                        if(!empty($_POST['id_user'][$i]))
                        {
                          $idUser = clearInt($_POST['id_user'][$i]);
                        }
                        else
                        {
                          $idUser = 0;
                        }
                        
                        // Департамент
                        if(!empty($_POST['name_departament'][$i]))
                        {
                          $nameDepartament = clearStr($_POST['name_departament'][$i]);
                        }
                        else
                        {
                          $nameDepartament = 0;
                        }
                        
                        // Удалить
                        if(!empty($_POST['hide'][$i]))
                        {
                          $hide = clearStr($_POST['hide'][$i]);
                        }
                        else
                        {
                          $hide = 0;
                        }
                        
                        
                        if(!empty($_POST['name_ru'][$i]))
                        {
                          $nameRu = clearStr($_POST['name_ru'][$i]);
                          $nameEn = $nameRu;
                          updatePoolTemplateQuestion($idAuthor, $idPoolTemplate, $idUser, $priority, $nameRu, $nameEn, $nameDepartament, $ip, $userAgent, $hide, $idPoolTemplateQuestion);
                          $ancor = '#noticeUpdatePoolTemplateQuestion';
                        }
                      }
        redirect($ancor);
		}
	}

?>