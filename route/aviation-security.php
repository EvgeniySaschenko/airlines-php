<?php

    if
       ($currentSubsection[0]['type'] == 'as_pic_report' and $permissionReadSubsection)
    {
        $getIdAircraft = clearInt($_GET['id_aircraft']);
        $allAircraft = selectAllAircraft();
        $allFlightReportGroupYearAS = selectAllFlightReportGroupYearAS();
        
        // Сортировать по воздушным судам
        if($GENERAL_SITE_SETTINGS[0]['report_pic_as'] == 'report_pic_as_aircraft') {
            $allFlightReportGroupYearGroupAircraftAS = selectAllFlightReportGroupYearGroupAircraftAS();
            $allFlightReportAircraftGroupMonthAS = selectAllFlightReportAircraftGroupMonthAS($getYear, $getIdAircraft);
            $allFlightReportAircraftGroupMonthGropPicAS = selectAllFlightReportAircraftGroupMonthGropPicAS($getYear, $getIdAircraft);
            //ПРОСМОТР
            if(empty($_GET['action']))
            {
                include('templates/as-reports-pic-year-aircraft.php');
            }
            else if($_GET['action'] == 'reports_pic_as_list_users_month')
            {
                include('templates/as-reports-pic-list-users-month-aircraft.php');
            }
            // Редактировать отчет
            else if($_GET['action'] == 'as_reports_pic_users_month_edit')
            {
                $user = selectUser($getIdUser);
                $allASFlightReportAircraftMonthPicAirports = selectAllASFlightReportAircraftMonthPicAirports($getYear, $getMonth, $getIdAircraft, $getIdUser);
                $ASPicReportAircraftUserYearMonth = selectASPicReportAircraftUserYearMonth($getIdAircraft, $getIdUser, $getYear.'-'.$getMonth.'-'.'01');
                include('templates/a-as-reports-pic-users-month-aircraft.php');
            }
        } elseif($GENERAL_SITE_SETTINGS[0]['report_pic_as'] == 'report_pic_as_PIC') {
            //ПРОСМОТР
            if(empty($_GET['action']))
            {
 
                include('templates/as-reports-pic-year-pic.php');
            }
            else if($_GET['action'] == 'reports_pic_as_list_users_month')
            {
                $allFlightReportPicGroupMonthGropPicAS = selectAllFlightReportPicGroupMonthGropPicAS($getYear);
                $allFlightReportPicGroupMonthAS = selectAllFlightReportPicGroupMonthAS($getYear);
                include('templates/as-reports-pic-list-users-month-pic.php');
            }
            // Отчет КВС
            else if($_GET['action'] == 'as_reports_pic_users_month_edit')
            {
                $user = selectUser($getIdUser);
                // ВС
                $allFlightReportAircraftGroupPicAS = selectAllFlightReportAircraftGroupPicAS($getIdUser, $getYear.'-'.$getMonth.'-'.'01');
                // Аеропорты
                $allASFlightReportMonthPicAirports = selectAllASFlightReportMonthPicAirports($getYear, $getMonth, $getIdUser);
                // Отчет 
                $ASPicReportPICUserYearMonth = selectASPicReportPICUserYearMonth($getIdUser, $getYear.'-'.$getMonth.'-'.'01');
                include('templates/a-as-reports-pic-users-month-pic.php');
            }
            // Оценка риисков
            else if($_GET['action'] == 'as_reports_pic_users_month_risk_edit')
            {
                $user = selectUser($getIdUser);
                // ВС
                $allFlightReportAircraftGroupPicAS = selectAllFlightReportAircraftGroupPicAS($getIdUser, $getYear.'-'.$getMonth.'-'.'01');
                // Аеропорты
                $allASFlightReportMonthPicAirports = selectAllASFlightReportMonthPicAirports($getYear, $getMonth, $getIdUser);
                // Отчет 
                $ASReportPICRiskPICUserYearMonth = selectASReportPICRiskPICUserYearMonth($getIdUser, $getYear.'-'.$getMonth.'-'.'01');
                include('templates/a-as-reports-pic-risk-users-month-pic.php');
            }
            
        }

    }
?>