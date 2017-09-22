<ul class="breadcrumb container">
<?php
	// Раздел
	if(!empty($currentSection[0]['id']))
	{
		$breadSection = '&id_section='.$currentSection[0]['id'];
		echo '<li><a href="index.php?lang='.$lang.$breadSection.'#navBottom">'.$currentSection[0]['name_'.$lang].'</a> </li>';
    
    # Редактировать подразделение
    if($_GET['action'] == 'edit' and $currentSection[0]['type'] == 'department' and !isset($currentSubsection[0]['id']))
    {
      echo '<li><a href="index.php?lang='.$lang.$breadSection.'&action=edit#navBottom">'.$word[272]['name_'.$lang].'</a> </li>';
    }
	}

	// Подраздел
	if(!empty($currentSubsection[0]['id']))
	{
		$breadSubsection = '&id_subsection='.$currentSubsection[0]['id'];
		echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.'#navBottom">'.$currentSubsection[0]['name_'.$lang].'</a> </li>';
	}

	// Книга
	if(!empty($currentBook[0]['id']))
	{
		$breadBook = '&id_book='.$currentBook[0]['id'];
		echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$breadBook.'#navBottom">'.$currentBook[0]['name_'.$lang].'</a> </li>';
	}
	else if(!empty($currentDoc[0]['id_book']))
	{
		$breadBook = '&id_book='.$currentDoc[0]['id_book'];
		echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$breadBook.'#navBottom">'.$currentDoc[0]['book_'.$lang].'</a> </li>';
	}

	// Новость
	if(!empty($currentNews[0]['id']))
	{
		$breadNews = '&id_news='.$currentNews[0]['id'];
		echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$breadNews.'#navBottom">'.$currentNews[0]['name_'.$lang].'</a> </li>';
	}

	// Пользователь
	if(!empty($_GET['id_user']))
	{
		// Отправленные документы
		if($_GET['action'] == 'sent_doc_user')
		{
			$breadSentDocUser = '&id_user='.$_GET['id_user'].'&action=sent_doc_user';
			echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$breadSentDocUser.'#navBottom">'.$langSentDocuments.'</a> </li>';
		}
		// Профиль пользователя
		if($_GET['action'] == 'user_profile' or $_GET['action'] == 'user_edit')
		{
			$breadUserProfile = '&id_user='.$_GET['id_user'].'&action=user_profile';
			echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$breadUserProfile.'#navBottom">'.$langDocUser.'</a> </li>';
		}
	}
    
	// Список заданий на полёт по воздушному судну
	if(!empty($currentAssignmentFlight[0]['id']) and empty($_GET['id_user']) or $_GET['action'] == 'flight_assignment_aircraft_list')
	{
        $breadFlightAssignmentAircraftList = '&id_aircraft='.$_GET['id_aircraft'].'&action=flight_assignment_aircraft_list';
		echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$breadFlightAssignmentAircraftList.'#navBottom">'.$currentAircraft[0]['name_'.$lang].'-'.$currentAircraft[0]['model'].'</a> </li>';
	}

	// Задание на полет
	if(!empty($currentAssignmentFlight[0]['id']) and empty($_GET['id_user']))
	{
		$breadAssignmentFlight = '&id_aircraft='.$currentAssignmentFlight[0]['id_aircraft'].'&id_flight_assignment='.$currentAssignmentFlight[0]['id'].'&amp;num_asignment_month_get='.$_GET['num_asignment_month_get'];
		echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$breadAssignmentFlight.'#navBottom">'.$CURRENT_NUMBER_ASSIGMENT_FLIGHT.'</a> </li>';
	}

	// ВЗЛЕТЫ И ЗАХОДЫ В АЭРОПОРТАХ
	if(!empty($_GET['id_user']))
	{
		if($_GET['action'] == 'flight_takeoff_approach')
		{
			$flightTakeoffApproach = '&id_user='.$_GET['id_user'].'&id_flight_assignment='.$_GET['id_flight_assignment'].'&year='.$_GET['year'].'&action=flight_takeoff_approach#navBottom';
			echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$flightTakeoffApproach.'">'.$word[129]['name_'.$lang].'</a> </li>';
		}
	}
        
	//  Отчет по ВС год по мецам   
        if($_GET['action'] == 'flight_consolidated_report_aircraft_year' or $_GET['action'] == 'flight_consolidated_report_aircraft_year_month')
        {
                $flight_consolidated_report_aircraft_year = '&id_aircraft='.$_GET['id_aircraft'].'&year='.$_GET['year'].'&action=flight_consolidated_report_aircraft_year#navBottom';
                echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$flight_consolidated_report_aircraft_year.'">'.$word[251]['name_'.$lang].' '.$_GET['year'].' - '.$currentAircraft[0]['name_'.$lang].' '.$currentAircraft[0]['model'].'</a> </li>';
        }
        
	//  Отчет по ВС за месяц   
        if($_GET['action'] == 'flight_consolidated_report_aircraft_year_month')
        {
                $flight_consolidated_report_aircraft_year_month = '&id_aircraft='.$_GET['id_aircraft'].'&year='.$_GET['year'].'&month='.$_GET['month'].'&action=flight_consolidated_report_aircraft_year_month#navBottom';
                echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$flight_consolidated_report_aircraft_year_month.'">'.showNameMonth($_GET['year'].'&month='.$_GET['month'].'01').'</a> </li>';
        }
        
	//   Отчет по экипажам          
        if($_GET['action'] == 'flight_consolidated_report_crew_year')
        {
                $flight_consolidated_report_crew_year = '&id_aircraft='.$_GET['id_aircraft'].'&year='.$_GET['year'].'&action=flight_consolidated_report_crew_year#navBottom';
                echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$flight_consolidated_report_crew_year.'">'.$word[269]['name_'.$lang].' - '.$getYear.'</a> </li>';
        }
                
	//   Отчет по кабинным экипажам          
        if($_GET['action'] == 'flight_consolidated_report_cabin_crew_year')
        {
                $flight_consolidated_report_cabin_crew_year = '&id_aircraft='.$_GET['id_aircraft'].'&year='.$_GET['year'].'&action=flight_consolidated_report_cabin_crew_year#navBottom';
                echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$flight_consolidated_report_crew_year.'">'.$word[279]['name_'.$lang].' - '.$getYear.'</a> </li>';
        }
        
        
        // Отчет КВС - АБ  - По ВС
        if(($_GET['action'] == 'reports_pic_as_list_users_month' or $_GET['action'] == 'as_reports_pic_users_month_edit') and !empty($_GET['id_aircraft'])) 
        {
          $reports_pic_as_list_users_month = '&id_aircraft='.$_GET['id_aircraft'].'&year='.$_GET['year'].'&action=reports_pic_as_list_users_month#navBottom';
          echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$reports_pic_as_list_users_month.'">'.$word[127]['name_'.$lang].' '.$currentAircraft[0]['name_'.$lang].' '.$currentAircraft[0]['model'].' - '.$getYear.'</a> </li>';
        }
        
        // Отчет КВС - АБ   - По ВС 
        if($_GET['action'] == 'as_reports_pic_users_month_edit' and !empty($_GET['id_aircraft'])) 
        {
          $as_reports_pic_users_month_edit = '&id_user='.$_GET['id_user'].'&id_aircraft='.$_GET['id_aircraft'].'&month='.$_GET['month'].'&year='.$_GET['year'].'&action=as_reports_pic_users_month_edit#navBottom';
          echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$as_reports_pic_users_month_edit.'">'.showNameMonth($getYear.'-'.$getMonth.'-'.'01').'</a> </li>';
        }
        
        // Отчет КВС - АБ  - По КВС
        if(($_GET['action'] == 'reports_pic_as_list_users_month' or $_GET['action'] == 'as_reports_pic_users_month_edit' or $_GET['action'] == 'as_reports_pic_users_month_risk_edit') and empty($_GET['id_aircraft'])) 
        {
          $reports_pic_as_list_users_month = '&year='.$_GET['year'].'&action=reports_pic_as_list_users_month#navBottom';
          echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$reports_pic_as_list_users_month.'">'.$getYear.'</a> </li>';
        }
        
        
        // Отчет КВС - АБ   - По КВС 
        if($_GET['action'] == 'as_reports_pic_users_month_edit' and empty($_GET['id_aircraft'])) 
        {
          $as_reports_pic_users_month_edit = '&id_user='.$_GET['id_user'].'&month='.$_GET['month'].'&year='.$_GET['year'].'&action=as_reports_pic_users_month_edit#navBottom';
          echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$as_reports_pic_users_month_edit.'">'.$word[517]['name_'.$lang].' - '.showNameMonth($getYear.'-'.$getMonth.'-'.'01').'</a> </li>';
        }
        
        // Отчет КВС - АБ  - оценка угроз  - По КВС 
        if($_GET['action'] == 'as_reports_pic_users_month_risk_edit' and empty($_GET['id_aircraft'])) 
        {
          $as_reports_pic_users_month_edit = '&id_user='.$_GET['id_user'].'&month='.$_GET['month'].'&year='.$_GET['year'].'&action=as_reports_pic_users_month_risk_edit#navBottom';
          echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$as_reports_pic_users_month_edit.'">'.$word[518]['name_'.$lang].' - '.showNameMonth($getYear.'-'.$getMonth.'-'.'01').'</a> </li>';
        }
        
        
        
        // Оценка рисков
        if($_GET['action'] == 'pool_edit_user' or $_GET['action'] == 'pool_edit') 
        {
          $pool_name = '&id_pool='.$_GET['id_pool'].'&action=pool_edit_user#navBottom';
          echo '<li><a href="index.php?lang='.$lang.$breadSection.$breadSubsection.$pool_name.'">'.'№ '.$currentPool[0]['name_'.$lang].' '.$word[417]['name_'.$lang].' '.convertDate($currentPool[0]['date_doc']).'</a> </li>';
        }
  

?>
</ul>
