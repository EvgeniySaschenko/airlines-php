<?php
    # Воздушное судно
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
        $numberingFlightAssignment = clearStr($_POST['numbering_flight_assignment']);
        
		updateGeneralSettings($idGeneralSettings, $idAuthor, $idFlightManager, $idEngineerManager, $nameCompanyRu, $nameCompanyEn, $docDaysRed, $docDaysOrange, $mailsVoluntaryPosts, $numberingFlightAssignment, $ip, $userAgent);
        
        $ancor = '#noticeGeneralSiteSettings';
        
        redirect($ancor);
    }
 ?>