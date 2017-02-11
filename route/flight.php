<?php

		if($currentSubsection[0]['type'] == 'flight_assignment' and $permissionReadSubsection)
		{
      # $allAssignmentFlight
			$allAssignmentFlight = selectAllAssignmentFlightAircraft($getPage, $getIdAircraft);
			//$allSubAssignmentFlight = selectAllSubAssignmentFlight($getNumberFlightAssignment, $getYearFlightAssignment, $getIdCrew);
      $allReportFlight = selectAllReportFlight($getIdFlightAssignment);
      
      # Обновить уже внесенные даннные
      //$allReportFlight = selectAllReportFlightMonthAll('2017-01-01');
      
			$allFlightTakeoffApproach = selectAllFlightTakeoffApproach($getIdFlightAssignment);
			$allAircraft = selectAllAircraft();
			$allUserFlight = selectAllUserFlight($getIdFlightAssignment);
			$flightPreparing = selectFlightPreparing($getIdFlightAssignment);
			$allUser = selectAllUser();
			$allUserSortLastNameNoHide = selectAllUserSortLastNameNoHide();
			$allCrewSection = selectAllCrewSection($getIdSection);
			$allCabinCrewSection = selectAllCrewSection(4);
			$allRank = selectAllRank($getIdSection);
			$allRankCabinCrew = selectAllRank(4);
      
      $user = selectUser($getIdUser);
      $getQuarter = clearInt($_GET['quarter']);
      
			$allPicFlightReportTakeoffApproach = selectAllPicFlightReportTakeoffApproach();
			$allYearPicFlightTakeoffApproach = selectAllYearPicFlightTakeoffApproach($getIdUser);
			//$allFlightReportTakeoffApproachYear = selectAllFlightReportTakeoffApproachYear($getIdUser, $getYear);
      $allFlightReportTakeoffApproachUserYearQuarter = selectAllFlightReportTakeoffApproachUserYearQuarter($getIdUser, $getYear, $getQuarter);
      
      
      $allFlightReportGroupYear = selectAllFlightReportGroupYear();
      $allFlightReportGroupYearAircraft = selectAllFlightReportGroupYearAircraft();
      
      
      $allFlightConsolidatedReportAircraftYear = selectAllFlightConsolidatedReportAircraftYear($getYear, $getIdAircraft);
      
      $allFlightConsolidatedReportCrewYear = selectAllFlightConsolidatedReportCrewYear($getYear);
      $allFlightConsolidatedReportCrewYearGroupUsers = selectAllFlightConsolidatedReportCrewYearGroupUsers($getYear);
      $allFlightReportGroupYearGroupAircraft = selectAllFlightReportGroupYearGroupAircraft();
      
			if($_GET['action'] == 'flight_consolidated_report_aircraft_year')
			{
        # Сводный отчет по ВС 
				include('templates/flight-consolidated-report-aircraft-year.php');
			}
      
			if($_GET['action'] == 'flight_consolidated_report_crew_year')
			{
        # Сводный отчет по Экипажам 
				include('templates/flight-consolidated-report-crew-year.php');
			}
        # Сводный отчет по кабинным Экипажам 
			if($_GET['action'] == 'flight_consolidated_report_cabin_crew_year')
			{
				include('templates/flight-consolidated-report-cabin-crew-year.php');
			}
                 
            
            # Список полётных заданий по воздушному судну
			if($_GET['action'] == 'flight_assignment_aircraft_list')
			{
				include('templates/flight-assignment-list.php');
			}
            
                       
      
      
			if(empty($_GET['id_flight_assignment']) and empty($_GET['action']))
			{
            # Список заданий на полет
				include('templates/flight.php');
			}
			else if(!empty($_GET['id_flight_assignment']) and empty($_GET['action']))
			{
              # Список документов - Задания на полет
              $allUserFlight = selectAllUserFlight($currentAssignmentFlight[0]['id']);
              foreach($allUserFlight as $userFlight)
              {
                if($userFlight['id_user'] == $currentUser[0]['id'])
                {
                  $permissionEditFlightGenerateDoc = $userFlight['id_user'];
                  break;
                }
              }
        
				include('templates/flight-assignment-list-doc.php');
			}
      
			# Взлеты и заходы в аеропортах 
			if($_GET['action'] == 'flight_takeoff_approach')
			{
				include('templates/flight-takeoff-approach-airports.php');
			}
			# Взлеты и заходы в аеропортах список кварталов
			if($_GET['action'] == 'flight_takeoff_approach_list_quarter')
			{
					include('templates/flight-takeoff-approach-airports-list-quarter.php');
			}
      
      

      //РЕДАКТИРОВАТЬ
			if($_GET['action'] == 'edit' and empty($_GET['id_flight_assignment']))
			{
				if($permissionEditSubsection)
					include('templates/a-flight-assignment-edit-crews-generate.php');
			}

			//Удалить список заданий на полет
			if($_GET['action'] == 'edit' and !empty($_GET['id_flight_assignment']))
			{
				if($permissionEditSubsection)
          include('templates/a-flight-delete.php');
			}
			//РЕДАКТИРОВАТЬ задание на полет
			if($_GET['action'] == 'edit_assignment' and !empty($_GET['id_flight_assignment']))
			{
					include('templates/a-flight-assignment.php');
			}
			//РЕДАКТИРОВАТЬ отчет о плете
			if($_GET['action'] == 'edit_report')
			{
				include('templates/a-flight-report.php');
			}

			//РЕДАКТИРОВАТЬ ПРЕДВАРИТЕЛЬНАЯ ПОДГОТОВКА
			if($_GET['action'] == 'edit_flight_preparing')
			{
				include('templates/a-flight-preparing.php');
			}
		}
?>