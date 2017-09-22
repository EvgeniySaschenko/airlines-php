<?php
    # Управление сайтом
    if($_GET['action'] == 'general_site_settings' and $permissionManageSite)
    {

        $idAuthor = $currentUser[0]['id'];
        $ip = $currentUserIp;
        $userAgent = $currentUserAgent;
        $idGeneralSettings = clearInt($_POST['id_general_settings']);
        $idFlightManager = clearInt($_POST['id_flight_manager']);
        $idEngineerManager = clearInt($_POST['id_engineer_manager']);
        $nameCompanyRu = clearStr($_POST['name_company_ru']);
        $nameCompanyEn = clearStr($_POST['name_company_en']);
        $docDaysRed = clearInt($_POST['doc_days_red']);
        $docDaysOrange = clearInt($_POST['doc_days_orange']);
        $mailsVoluntaryPosts = clearStr($_POST['mails_voluntary_posts']);
        $mailsDoc = clearStr($_POST['mails_doc']);
        $numberingFlightAssignment = clearStr($_POST['numbering_flight_assignment']);
        $riskAssessment = clearStr($_POST['risk_assessment']);
        $reportPicAs = clearStr($_POST['report_pic_as']);
        $mailAdmin = clearStr($_POST['mail_admin']);
        $basingAirportsReportPicAs = clearStr($_POST['basing_airports_report_pic_as']);
        $mailReportPicAs = clearStr($_POST['mail_report_pic_as']);
        $remarkReportPicAs = clearStr($_POST['remark_report_pic_as']);
        $sourcesInfoAs = clearStr($_POST['sources_info_as']);
                
		updateGeneralSettings($idGeneralSettings, $idAuthor, $idFlightManager, $idEngineerManager, $nameCompanyRu, $nameCompanyEn, $docDaysRed, $docDaysOrange, $mailsVoluntaryPosts, $mailsDoc, $numberingFlightAssignment, $riskAssessment, $reportPicAs, $mailAdmin, $basingAirportsReportPicAs, $mailReportPicAs, $remarkReportPicAs, $sourcesInfoAs, $ip, $userAgent);
        
        $ancor = '#noticeGeneralSiteSettings';
        
        redirect($ancor);
    }
 ?>