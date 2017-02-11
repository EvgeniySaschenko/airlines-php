<?php

  if($currentSubsection[0]['type'] == 'flight_assignment' and $permissionEditSubsection)
  {
		if
			($_GET['action'] == 'assignment_flight'
		and
			($permissionAssignmentFlight
		or
			($currentAssignmentFlight[0]['date_not_edit_a'] == 0 and $permissionEditFlightGenerateDoc)))
    {

			$flightWeight = clearInt($_POST['flight_weight']);
			// Подпись Командир ВС
			$idPicA = clearInt($_POST['id_pic_a']);
				$user = selectUser($idPicA);
			$idRankPicA = $user[0]['id_rank'];

			$datePicA = clearStr(convertDateToMySQL($_POST['date_pic_a']));
			// Зам. директора по ОЛР
			$idManagerF = clearInt($_POST['id_manager_f']);
				$user = selectUser($idManagerF);
			$idRankManagerF = $user[0]['id_rank'];
			$dateManagerFlightA = $datePicA;


		// Запретить редактирование
			if($_POST['date_not_edit_a'] != 0 and $permissionAssignmentFlight)
			{
				$dateNotEditA = currentDateTimeMySQL();
			}
			else if($_POST['date_not_edit_a'] == 0 and $permissionAssignmentFlight)
			{
				$dateNotEditA = 0;
			}
			else
			{
				$dateNotEditA = $currentAssignmentFlight[0]['date_not_edit_a'];
			}
			$idFlightAssignment = $getIdFlightAssignment;
			$idAircraft = clearInt($_POST['id_aircraft']);
			$numberAssignment = clearStr($_POST['number_assignment']);
      if(empty($_POST['number_assignment']))
        $numberAssignment = 0;
			$subnumberAssignment = clearStr($_POST['subnumber_assignment']);
      if(empty($_POST['subnumber_assignment']))
        $subnumberAssignment = 0;
			$numberFlight = clearStr($_POST['number_flight']);
      if(empty($_POST['number_flight']))
        $numberFlight = 0;
			$purposeFlightRu = clearStr($_POST['purpose_flight_ru']);
      if(empty($_POST['purpose_flight_ru']))
        $purposeFlightRu = 0;
			$purposeFlightEn = clearStr($_POST['purpose_flight_en']);
      if(empty($_POST['purpose_flight_en']))
       $purposeFlightEn = $purposeFlightRu;
			$routeFlightRu = clearStr($_POST['route_flight_ru']);
      if(empty($_POST['route_flight_ru']))
        $routeFlightRu = 0;
			$routeFlightEn = clearStr($_POST['route_flight_en']);
      if(empty($_POST['route_flight_en']))
        $routeFlightEn = $routeFlightRu;
			$weightCargo = clearStr($_POST['weight_cargo']);
      if(empty($_POST['weight_cargo']))
        $weightCargo = 0;
			$weightAircraft = clearStr($_POST['weight_aircraft']);
      if(empty($_POST['weight_aircraft']))
        $weightAircraft = 0;
			$centeringEmptyAircraft = clearStr($_POST['centering_empty_aircraft']);
      if(empty($_POST['centering_empty_aircraft']))
        $centeringEmptyAircraft = 0;
			$curbWeightAircraft = clearStr($_POST['curb_weight_aircraft']);
      if(empty($_POST['curb_weight_aircraft']))
        $curbWeightAircraft = 0;
			$pilotAdmission = clearStr($_POST['pilot_admission']);
      if(empty($_POST['pilot_admission']))
        $pilotAdmission = 0;

			$ip = $currentUserIp;
			$userAgent = $currentUserAgent;

			$dateDeparture = clearStr(convertDateToMySQL($_POST['date_departure']));

			$yearDeparture= clearStr(convertDateYear($_POST['date_departure']));

			$assignmentFlightCheckUpdate = selectAssignmentFlightCheckUpdate($idFlightAssignment, $idAircraft, $numberAssignment, $yearDeparture);
			if(empty($assignmentFlightCheckUpdate))
			{
				updateAssignmentFlight($idManagerF, $idPicA, $idRankManagerF, $idRankPicA, $idAircraft, $numberAssignment, $subnumberAssignment, $numberFlight, $purposeFlightRu, $purposeFlightEn, $routeFlightRu, $routeFlightEn, $weightCargo, $weightAircraft, $pilotAdmission, $datePicA, $dateManagerFlightA, $dateNotEditA, $centeringEmptyAircraft, $curbWeightAircraft, $flightWeight, $dateDeparture, $ip, $userAgent, $idFlightAssignment);
        $ancor = '#noticeEditAssignmentFlight';
			}
      else    
      {
        $ancor = '#noticeErrorEditAssignmentFlight';
      }
      redirect($ancor);
		}
  }

?>