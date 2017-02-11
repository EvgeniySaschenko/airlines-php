<?php

  if($currentSubsection[0]['type'] == 'flight_assignment' and $permissionEditSubsection)
  {
    
			if($_GET['action'] == 'crew_generate')
			{
					$idAircraft = clearInt($_POST['id_aircraft']);
					$dateDeparture = clearStr(convertDateToMySQL($_POST['date_departure']));
            if(empty($_POST['date_departure']))
              $dateDeparture = 0;
            
					$dateArrival = clearStr(convertDateToMySQL($_POST['date_arrival']));
            if(empty($_POST['date_arrival']))
              $dateArrival = 0;
            
					$numberAssignment = clearStr($_POST['number_assignment']);
						if(empty($_POST['number_assignment']))
							$numberAssignment = 0;
            
					$subnumberAssignment = clearStr($_POST['subnumber_assignment']);
          
					$idAuthor = $currentUser[0]['id'];
					$idCrew = $getIdCrew;
					$ip = $currentUserIp;
					$userAgent = $currentUserAgent;

					$idManagerF = 0;
					$idRankManagerF = 0;
					$idManagerE = 0;
					$idRankManagerE = 0;
					$idNavigator = 0;
					$idRankNavigator = 0;

					$yearDeparture= clearStr(convertDateYear($_POST['date_departure']));

					$assignmentFlightCheck = selectAssignmentFlightCheck($idAircraft, $numberAssignment, $yearDeparture);
					if(empty($assignmentFlightCheck))
					{
						//Добавить задание на полет
						$idFlightAssignment = insertFlightAssignment($idAuthor, $idManagerF, $idRankManagerF, $idAircraft, $idCrew, $numberAssignment, $subnumberAssignment, $dateDeparture, $dateArrival, $ip, $userAgent);
						//Добавить ПРЕДВАРИТЕЛЬНАЯ ПОДГОТОВКА
						insertFlightPreparing($idAuthor, $idFlightAssignment, $idManagerF, $idManagerE, $idNavigator, $idRankManagerF, $idRankManagerE, $idRankNavigator, $idCrew, $numberAssignment, $dateDeparture, $ip, $userAgent);
						//Добавить ВЗЛЕТЫ И ЗАХОДЫ В АЭРОПОРТАХ
						if(!empty($idFlightAssignment))
						{
							for($i = 1; $i <= 3; $i++)
							{
								insertFlightTakeoffApproach($idFlightAssignment);
							}
						}

						// Экипаж
						for($i = 0; $_POST['id_user'][$i]; $i++)
						{
							$idUser = clearInt($_POST['id_user'][$i]);
							$idRank = clearInt($_POST['id_rank'][$i]);
							if(empty($_POST['id_rank'][$i]))
								$idRank = 0;
							insertFlightUser($idAuthor, $idUser, $idRank, $idFlightAssignment, $ip, $userAgent);
						}
						// Кабинный экипаж
						$allUser = selectAllUser();
						foreach($allUser as $user)
						{
							if($user['id_section'] == 4 and $user['id_crew'] == $idCrew)
								insertFlightUser($idAuthor, $user['id'], $user['id_rank'], $idFlightAssignment, $ip, $userAgent);
						}
            $ancor = '#noticeAddFlightAssignment';
					}
          # Задание с таким номером уже существует
          else 
          {
            $ancor = '#noticeErrorFlightAssignment';
          }
          redirect($ancor);
			}
  }

?>