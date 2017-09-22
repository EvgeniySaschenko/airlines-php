<?php
    // Отчёт о полёте по АБ
    if
        ($currentSubsection[0]['type'] == 'as_pic_report' and $permissionReadSubsection and $_GET['action'] == 'as_pic_report')
    {
        $idAircraft = clearInt($_POST['id_aircraft']);
        $idUser = clearInt($_POST['id_user']);
        $dateDoc = clearStr($_POST['date_doc']);
        $idAuthor = $currentUser[0]['id'];
        $paragraph1 = clearStr($_POST['paragraph_1']);
        $paragraph3 = clearStr($_POST['paragraph_3']);
        $paragraph4_1 = clearStr($_POST['paragraph_4_1']);
        $paragraph4_2 = clearStr($_POST['paragraph_4_2']);
        $paragraph5 = clearStr($_POST['paragraph_5']);
        $paragraph5_1 = clearStr($_POST['paragraph_5_1']);
        $paragraph6 = clearStr($_POST['paragraph_6']);
        $paragraph7 = clearStr($_POST['paragraph_7']);
        $paragraph8 = clearStr($_POST['paragraph_8']);
        $paragraph9 = clearStr($_POST['paragraph_9']);
        $paragraph10 = clearStr($_POST['paragraph_10']);
        $paragraph11 = clearStr($_POST['paragraph_11']);
        $paragraph12 = clearStr($_POST['paragraph_12']);
        $paragraph12_1 = clearStr($_POST['paragraph_12_1']);
        $paragraph12_2 = clearStr($_POST['paragraph_12_2']);
        $paragraph13 = clearStr($_POST['paragraph_13']);
        $paragraph14 = clearStr($_POST['paragraph_14']);
        if(empty($paragraph14))
            $paragraph14 = 0;
        $dateSignature =  convertDateToMySQL($_POST['date_signature']);
        
        
        if(empty($_POST['date_closed']) or $_POST['date_closed'] == '0000-00-00')
            $dateClosed = 0;
        elseif($permissionEditSubsection)
            $dateClosed = date("Y-m-d");
        
        $ip = $currentUserIp;
        $userAgent = $currentUserAgent;
        
        
        
        
        // Сортировка по Аеропортам
        if($GENERAL_SITE_SETTINGS[0]['report_pic_as'] == 'report_pic_as_aircraft') {
            
            $ASPicReportAircraftUserYearMonth = selectASPicReportAircraftUserYearMonth($idAircraft, $idUser, $dateDoc);
            
            
            // Если отчет не закрыт или у пользователя есть права на редактировние
            if($permissionEditSubsection or $ASPicReportAircraftUserYearMonth[0]['date_closed'] == 0 or $ASPicReportAircraftUserYearMonth[0]['date_closed'] == '0000-00-00') {
                if(empty($ASPicReportAircraftUserYearMonth[0]['id']))
                    insertASPicReportAircraftUserYearMonth($idAuthor, $idUser, $idAircraft, $paragraph1, $paragraph3, $paragraph4_1, $paragraph4_2, $paragraph5, $paragraph5_1, $paragraph6, $paragraph7, $paragraph8, $paragraph9, $paragraph10, $paragraph11, $paragraph12, $paragraph13, $paragraph14, $dateSignature, $dateDoc, $dateClosed,  $ip, $userAgent);
                else
                    updateASPicReportAircraftUserYearMonth($paragraph1, $paragraph3, $paragraph4_1, $paragraph4_2, $paragraph5, $paragraph5_1, $paragraph6, $paragraph7, $paragraph8, $paragraph9, $paragraph10, $paragraph11, $paragraph12, $paragraph13, $paragraph14, $dateSignature, $dateClosed,  $ip, $userAgent, $idUser, $idAircraft, $dateDoc);


                if($dateClosed == 0) {
                    $protocol = strstr($_SERVER['HTTP_REFERER'], 'https://');
                    if($protocol) {
                      $protocol = 'https://';
                    } else {
                      $protocol = 'http://';
                    }


                    $subject = $_SERVER['HTTP_HOST'].' Aviation security report PIC '; 
                    $message = "Hello,\n". 
                    "To view the report click here \n".
                    $protocol.$_SERVER['HTTP_HOST']."/index.php?lang=".$_GET['lang']."&id_section=".$getIdSection."&id_subsection=".$getIdSubsection."&id_user=".$idUser."&id_aircraft=".$idAircraft."&month=".convertDateMonth($dateDoc)."&year=".convertDateYear($dateDoc)."&action=as_reports_pic_users_month_edit";
                    $headers = 'From: AS Report PIC <as@'.$_SERVER['HTTP_HOST'].'>' . "\r\n";
                    $headers .= 'Content-type: text/html; charset="utf-8"';

                    if($GENERAL_SITE_SETTINGS[0]['mail_report_pic_as'] and empty($_POST['date_closed']) or $_POST['date_closed'] == '0000-00-00') {
                     $to = $GENERAL_SITE_SETTINGS[0]['mail_report_pic_as'];
                     mail($to, $subject, $message, $headers); 
                    }
                }

            }
            
        } 
        // Сортировка по КВС
        elseif($GENERAL_SITE_SETTINGS[0]['report_pic_as'] == 'report_pic_as_PIC') {
            
            $ASPicReportPICUserYearMonth = selectASPicReportPICUserYearMonth($idUser, $dateDoc);
            
            // Если отчет не закрыт или у пользователя есть права на редактировние
            if($permissionEditSubsection or $ASPicReportPICUserYearMonth[0]['date_closed'] == 0 or $ASPicReportPICUserYearMonth[0]['date_closed'] == '0000-00-00') {
                if(empty($ASPicReportPICUserYearMonth[0]['id']))
                    insertASPicReportPICUserYearMonth($idAuthor, $idUser, $paragraph1, $paragraph3, $paragraph4_1, $paragraph4_2, $paragraph5, $paragraph5_1, $paragraph6, $paragraph7, $paragraph8, $paragraph9, $paragraph10, $paragraph11, $paragraph12, $paragraph12_1, $paragraph12_2, $paragraph13, $dateSignature, $dateDoc, $dateClosed,  $ip, $userAgent);
                else
                    updateASPicReportPICUserYearMonth($paragraph1, $paragraph3, $paragraph4_1, $paragraph4_2, $paragraph5, $paragraph5_1, $paragraph6, $paragraph7, $paragraph8, $paragraph9, $paragraph10, $paragraph11, $paragraph12, $paragraph12_1, $paragraph12_2, $paragraph13, $dateSignature, $dateClosed,  $ip, $userAgent, $idUser, $dateDoc);


                if($dateClosed == 0) {
                    $protocol = strstr($_SERVER['HTTP_REFERER'], 'https://');
                    if($protocol) {
                      $protocol = 'https://';
                    } else {
                      $protocol = 'http://';
                    }


                    $subject = $_SERVER['HTTP_HOST'].' Aviation security report PIC '; 
                    $message = "Hello,\n". 
                    "To view the report click here \n".
                    $protocol.$_SERVER['HTTP_HOST']."/index.php?lang=".$_GET['lang']."&id_section=".$getIdSection."&id_subsection=".$getIdSubsection."&id_user=".$idUser."&month=".convertDateMonth($dateDoc)."&year=".convertDateYear($dateDoc)."&action=as_reports_pic_users_month_edit";
                    $headers = 'From: AS Report PIC <as@'.$_SERVER['HTTP_HOST'].'>' . "\r\n";
                    $headers .= 'Content-type: text/html; charset="utf-8"';

                    if($GENERAL_SITE_SETTINGS[0]['mail_report_pic_as'] and empty($_POST['date_closed']) or $_POST['date_closed'] == '0000-00-00') {
                     $to = $GENERAL_SITE_SETTINGS[0]['mail_report_pic_as'];
                     mail($to, $subject, $message, $headers); 
                    }
                }

            }
            
        }
        


       $ancor = '#noticeReportASPICUpdate';
      redirect($ancor);
    }
    
    
    // Оценка рисков по АБ
    if
    ($currentSubsection[0]['type'] == 'as_pic_report' and $permissionReadSubsection and $_GET['action'] == 'as_pic_report_risk')
    {
        

        $dateSignature =  convertDateToMySQL($_POST['date_signature']);

        if(empty($_POST['date_closed']) or $_POST['date_closed'] == '0000-00-00')
            $dateClosed = 0;
        elseif($permissionEditSubsection)
            $dateClosed = date("Y-m-d");
        
        $idUser = clearInt($_POST['id_user']);
        $dateDoc = clearStr($_POST['date_doc']);
        $idAuthor = $currentUser[0]['id']; 
        $ip = $currentUserIp;
        $userAgent = $currentUserAgent;
        $region = clearStr($_POST['region']);
        if(empty($region))
            $region = ' ';
        
        $remark = clearStr($_POST['remark']);
        if(empty($remark))
            $remark = ' ';
        
        $val_1 = clearInt($_POST['val_1']);
        $val_2 = clearInt($_POST['val_2']);
        $val_3 = clearInt($_POST['val_3']);
        $val_4 = clearInt($_POST['val_4']);
        $val_5 = clearInt($_POST['val_5']);        
        $val_6_1 = clearInt($_POST['val_6_1']); 
        $val_6_2 = clearInt($_POST['val_6_2']);
        $val_6_3 = clearInt($_POST['val_6_3']);
        $val_7 = clearInt($_POST['val_7']);
        $val_8 = clearInt($_POST['val_8']);
        $val_9 = clearInt($_POST['val_9']);
        $val_10_1 = clearInt($_POST['val_10_1']); 
        $val_10_2 = clearInt($_POST['val_10_2']);
        $val_10_3 = clearInt($_POST['val_10_3']);
        $val_11_1 = clearInt($_POST['val_11_1']); 
        $val_11_2 = clearInt($_POST['val_11_2']);
        $val_11_3 = clearInt($_POST['val_11_3']);
        $val_11_4 = clearInt($_POST['val_11_4']);
        $val_11_5 = clearInt($_POST['val_11_5']);
        
        
        // Сортировка по КВС
        if($GENERAL_SITE_SETTINGS[0]['report_pic_as'] == 'report_pic_as_PIC') {
            
            
            $ASReportPICRiskPICUserYearMonth = selectASReportPICRiskPICUserYearMonth($idUser, $dateDoc);

            // Если отчет не закрыт или у пользователя есть права на редактировние
            if($permissionEditSubsection or $ASReportPICRiskPICUserYearMonth[0]['date_closed'] == 0 or $ASReportPICRiskPICUserYearMonth[0]['date_closed'] == '0000-00-00') {
                if(empty($ASReportPICRiskPICUserYearMonth[0]['id']))
                    insertASReportPicRiskPICUserYearMonth($idAuthor, $idUser, $region, $remark, $val_1, $val_2, $val_3, $val_4, $val_5, $val_6_1, $val_6_2, $val_6_3, $val_7, $val_8, $val_9, $val_10_1, $val_10_2, $val_10_3, $val_11_1, $val_11_2, $val_11_3, $val_11_4, $val_11_5, $dateSignature, $dateDoc, $dateClosed,  $ip, $userAgent);
                else
                    updateASReportPicRiskPICUserYearMonth($region, $remark, $val_1, $val_2, $val_3, $val_4, $val_5, $val_6_1, $val_6_2, $val_6_3, $val_7, $val_8, $val_9, $val_10_1, $val_10_2, $val_10_3, $val_11_1, $val_11_2, $val_11_3, $val_11_4, $val_11_5, $dateSignature, $dateClosed,  $ip, $userAgent, $idUser, $dateDoc);


                if($dateClosed == 0) {
                    $protocol = strstr($_SERVER['HTTP_REFERER'], 'https://');
                    if($protocol) {
                      $protocol = 'https://';
                    } else {
                      $protocol = 'http://';
                    }


                    $subject = $_SERVER['HTTP_HOST'].' Aviation security report PIC '; 
                    $message = "Hello,\n". 
                    "To view the report click here \n".
                    $protocol.$_SERVER['HTTP_HOST']."/index.php?lang=".$_GET['lang']."&id_section=".$getIdSection."&id_subsection=".$getIdSubsection."&id_user=".$idUser."&month=".convertDateMonth($dateDoc)."&year=".convertDateYear($dateDoc)."&action=as_reports_pic_users_month_risk_edit";
                    $headers = 'From: AS Report PIC <as@'.$_SERVER['HTTP_HOST'].'>' . "\r\n";
                    $headers .= 'Content-type: text/html; charset="utf-8"';

                    if($GENERAL_SITE_SETTINGS[0]['mail_report_pic_as'] and empty($_POST['date_closed']) or $_POST['date_closed'] == '0000-00-00') {
                     $to = $GENERAL_SITE_SETTINGS[0]['mail_report_pic_as'];
                     mail($to, $subject, $message, $headers); 
                    }
                }

            }
            
        }
        $ancor = '#noticeReportASRiskPICUpdate';
        redirect($ancor);
    }
    
 ?>