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

                    $nameRu = clearStr($_POST['name_ru'][$i]);
                    $nameEn = clearStr($_POST['name_en'][$i]);

                    if(empty($_POST['name_en'][$i]))
                    {
                        $nameEn = $nameRu;
                    }
                    

                    if(!empty($nameRu))
                    {
                      updatePoolTemplateQuestion($idAuthor, $idPoolTemplate, $idUser, $priority, $nameRu, $nameEn, $nameDepartament, $ip, $userAgent, $hide, $idPoolTemplateQuestion);
                      $ancor = '#noticeUpdatePoolTemplateQuestion';
                    }
                  }
                redirect($ancor);
            }
            

            // Редактировать опрос Админ
            if($_GET['action'] == 'pool_edit_admin'){

                $allPoolQuestion = selectAllPoolQuestion($getIdPool);

                foreach($allPoolQuestion as $i => $poolQuestion)
                {
                    $idAuthor = $currentUser[0]['id'];
                    $nameRu = clearStr($_POST['name_ru'][$i]);
                    $nameDepartament = clearStr($_POST['name_departament'][$i]);
                    $priority = clearStr($_POST['priority'][$i]);
                    $idUser = clearStr($_POST['id_user'][$i]);
                    $status = clearStr($_POST['status'][$i]);
                    
                    if($idUser == $currentUser[0]['id']) {
                        $seriousnessUser1 = clearStr($_POST['seriousness_user_1'][$i]);
                        $probabilityUser1 = clearStr($_POST['probability_user_1'][$i]);
                        $seriousnessUser2 = clearStr($_POST['seriousness_user_2'][$i]);
                        $probabilityUser2 = clearStr($_POST['probability_user_2'][$i]);
                        $remarkUser = clearStr($_POST['remark_user'][$i]);
                    } else {
                        $seriousnessUser1 = $poolQuestion['seriousness_user_1'];
                        $probabilityUser1 = $poolQuestion['probability_user_1'];
                        $seriousnessUser2 = $poolQuestion['seriousness_user_2'];
                        $probabilityUser2 = $poolQuestion['probability_user_2'];
                        $remarkUser = $poolQuestion['remark_user'];
                    }
                    // Сбросить данные при смене пользователя
                    if($idUser != $poolQuestion['id_user']) {
                        $seriousnessUser1 = 0;
                        $probabilityUser1 = 0;
                        $seriousnessUser2 = 0;
                        $probabilityUser2 = 0;
                        $remarkUser = 0;
                    }

                    
                    
                    $seriousnessAdmin1 = clearStr($_POST['seriousness_admin_1'][$i]);
                    $probabilityAdmin1 = clearStr($_POST['probability_admin_1'][$i]);
                    $seriousnessAdmin2 = clearStr($_POST['seriousness_admin_2'][$i]);
                    $probabilityAdmin2 = clearStr($_POST['probability_admin_2'][$i]);
                    $remarkAdmin = clearStr($_POST['remark_admin'][$i]);
                   
                    $ip = $currentUserIp;
                    $userAgent = $currentUserAgent;
                    $idPoolQuestion = clearStr($_POST['id_pool_question'][$i]);
                    
                    
                    // Приоритет
                    if(!empty($_POST['priority'][$i]))
                    {
                      $priority = clearStr($_POST['priority'][$i]);
                    }
                    else
                    {
                      $priority = 0;
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
                    
                    
                    updatePoolQuestion($idAuthor, $idUser, $nameRu, $nameDepartament, $priority, $status, $seriousnessUser1, $probabilityUser1, $seriousnessUser2, $probabilityUser2, $seriousnessAdmin1, $probabilityAdmin1, $seriousnessAdmin2, $probabilityAdmin2, $remarkAdmin, $remarkUser, $ip, $userAgent, $idPoolQuestion);
                }
                
                // Отправить уведомление на почту
                if($_POST['sent_mail'] != 0) {
                    
                    $protocol = strstr($_SERVER['HTTP_REFERER'], 'https://');
                    if($protocol) {
                      $protocol = 'https://';
                    } else {
                      $protocol = 'http://';
                    }
                    
                    
                    $allPoolQuestionGroupUser = selectAllPoolQuestionGroupUser($getIdPool);

                    foreach($allPoolQuestionGroupUser as $key => $poolQuestionUser) {
                       $subject = $_SERVER['HTTP_HOST'].' '.$currentPool[0]['subsection_name_en'].' - '.$currentPool[0]['name_ru'].' - '.convertDate($currentPool[0]['date_doc']); 
                       $message = "Hello,\n". 
                              "Please answer the questions in this document: ". $currentPool[0]['name_ru'].' - '.convertDate($currentPool[0]['date_doc']) ."\n".
                              $_SERVER['HTTP_REFERER']."\n".
                               
                              $protocol.$_SERVER['HTTP_HOST']."/index.php?lang=".$_GET['lang']."&id_section=".$getIdSection."&id_subsection=".$getIdSubsection;
                              "The answers must be submitted no later than ".convertDate($currentPool[0]['date_end']);
                              $headers = 'From: pool <pool@'.$_SERVER['HTTP_HOST'].'>' . "\r\n";
                              $headers .= 'Content-type: text/html; charset="utf-8"';

                       if($poolQuestionUser['user_mail']) {
                        $to = $poolQuestionUser['user_mail'];
                        mail($to, $subject, $message, $headers); 
                       }

                       if($poolQuestionUser['user_mail_2'] and $poolQuestionUser['user_mail'] != $poolQuestionUser['user_mail_2']) {
                        $to = $poolQuestionUser['user_mail_2'];
                        mail($to, $subject, $message, $headers); 
                       }
                    }
                }

                // Удалить закрыть опрос
                $poolHide = clearInt($_POST['pool_hide']);
                $poolStatus = clearInt($_POST['pool_status']);
                
                updatePoolCloseDelete($poolHide, $poolStatus, $getIdPool);

                
                
                $ancor = '#noticeUpdatePoolQuestion';
                redirect($ancor);
            }

	}
        
        
	if
            ($currentSubsection[0]['type'] == 'pool' and $permissionReadSubsection)
        {
           // Редактировать опрос Пользователь
            if($_GET['action'] == 'pool_edit_user' and $currentPool[0]['status'] == 0){
                
                $allPoolQuestion = selectAllPoolQuestion($getIdPool);

                if($poolQuestion[0]['status'] == 0) {
                    
                    foreach($allPoolQuestion as $i => $poolQuestion)
                    {
                        $idPoolQuestion = $poolQuestion['id'];

                        if($poolQuestion['id_user'] == $currentUser[0]['id']) {
                            $seriousnessUser1 = clearStr($_POST['seriousness_user_1'][$i]);
                            $probabilityUser1 = clearStr($_POST['probability_user_1'][$i]);
                            $seriousnessUser2 = clearStr($_POST['seriousness_user_2'][$i]);
                            $probabilityUser2 = clearStr($_POST['probability_user_2'][$i]);
                            $remarkUser = clearStr($_POST['remark_user'][$i]);
                            $dateUpdate = date("Y-m-d H:i:s");
                            
                        } else {
                            $seriousnessUser1 = $poolQuestion['seriousness_user_1'];
                            $probabilityUser1 = $poolQuestion['probability_user_1'];
                            $seriousnessUser2 = $poolQuestion['seriousness_user_2'];
                            $probabilityUser2 = $poolQuestion['probability_user_2'];
                            $remarkUser = $poolQuestion['remark_user'];
                            $dateUpdate = $poolQuestion['date_update'];
                        }
                        updatePoolQuestionUser($seriousnessUser1, $probabilityUser1, $seriousnessUser2, $probabilityUser2, $remarkUser, $dateUpdate, $idPoolQuestion);
                    }
                }
                $ancor = '#noticeUpdatePoolQuestionUser';
               redirect($ancor);
            }
        }

?>