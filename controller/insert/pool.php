<?php
		
    if
        ($currentSubsection[0]['type'] == 'pool' and $permissionEditSubsection)
    {
        // Опрос
        if($_GET['action'] == 'pool_template_add')
        {
            $idAuthor = $currentUser[0]['id'];
            $idSection = $getIdSection;
            $idSubsection = $getIdSubsection;
            $ip = $currentUserIp;
            $userAgent = $currentUserAgent;
            if(!empty($_POST['name_ru']))
            {
                $nameRu = clearStr($_POST['name_ru']);
                $nameEn = $nameRu;
                $result = insertPoolTemplate($idAuthor, $idSection, $idSubsection, $nameRu, $nameEn, $ip, $userAgent);
            if($result)
                $ancor = '#noticeAddedPoolTemplate';
            else
                $ancor = '#noticeErrorAddedPoolTemplate';
                    }
            redirect($ancor);
        }
        // Вопрос
        if($_GET['action'] == 'pool_template_question_add')
        {
            $idAuthor = $currentUser[0]['id'];
            $idPoolTemplate = clearInt($_GET['id_pool_template']);
            $idUser = clearInt($_POST['id_user']);
            $priority = clearInt($_POST['priority']);
            $nameDepartament = clearStr($_POST['name_departament']);
            $ip = $currentUserIp;
            $userAgent = $currentUserAgent;
            
            if(empty($priority))
                $priority = 0;
            
            if(!empty($_POST['name_ru']))
            {
                $nameRu = clearStr($_POST['name_ru']);
                $nameEn = $nameRu;
                $result = insertPoolTemplateQuestion($idAuthor, $idPoolTemplate, $idUser, $priority, $nameRu, $nameEn, $nameDepartament, $ip, $userAgent);
            if($result)
            {
            $ancor = '#noticeAddedPoolTemplateQuestion';
            }
            else
            {
            $ancor = '#noticeErrorAddedPoolTemplateQuestion';
            }
                    }
            redirect($ancor);
        }
        
        // Создать Опрос (отправить)
        if($_GET['action'] == 'pool_add')
        {
            $idAuthor = $currentUser[0]['id'];
            $idPoolTemplate = clearInt($_POST['id_pool_template']);
            $dateDoc = convertDateToMySQL(clearStr($_POST['date_doc']));
            $dateEnd = convertDateToMySQL(clearStr($_POST['date_end']));
            $remark = clearStr($_POST['remark']);
            $ip = $currentUserIp;
            $userAgent = $currentUserAgent;
            $idBook = clearInt($_POST['id_book']);
                if(empty($idBook))
                    $idBook = 0;
            
            
            if(empty($remark))
                 $remark = 0;
            
            $nameRu = clearStr($_POST['name_ru']);
            $nameEn = $nameRu;
            
            
            $result = insertPool($idAuthor, $idPoolTemplate, $idBook, $nameRu, $nameEn, $remark, $dateDoc, $dateEnd, $ip, $userAgent);
            
            if($result) {
                $allPoolTempleateQuestion = selectAllPoolTemplateQuestion($idPoolTemplate);

                foreach($allPoolTempleateQuestion as $poolTempleateQuestion) {
                    $idPool = $result;
                    $idUser = $poolTempleateQuestion['id_user'];
                    $priority = $poolTempleateQuestion['priority'];
                    $nameRu = $poolTempleateQuestion['name_ru'];
                    $nameEn = $poolTempleateQuestion['name_en'];
                    $nameDepartament = $poolTempleateQuestion['name_departament'];

                    insertPoolQuestion($idAuthor, $idPool, $idUser, $priority, $nameRu, $nameEn, $nameDepartament, $ip, $userAgent);
                }
                
            }
            
            if($result)
                $ancor = '#noticeAddedPool';
            else
                $ancor = '#noticeErrorAddedPool';

            redirect($ancor);
        }
    }
 ?>