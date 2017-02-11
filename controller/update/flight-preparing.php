<?php
  if($currentSubsection[0]['type'] == 'flight_assignment' and $permissionEditSubsection)
  {
		$flightPreparing = selectFlightPreparingId($getIdFlightPreparing);
    if
			($_GET['action'] == 'flight_preparing'
		and
			($permissionAssignmentFlight
		or
			($flightPreparing[0]['date_not_edit'] == 0 and $permissionEditFlightGenerateDoc)))
		{
			$idFlightPreparing = clearInt($_GET['id_flight_preparing']);
			$numberFlight1 = clearStr($_POST['number_flight_1']);
			$numberFlight2 = clearStr($_POST['number_flight_2']);
			$numberFlight3 = clearStr($_POST['number_flight_3']);
			$routeFlight1 = clearStr($_POST['route_flight_1']);
			$routeFlight2 = clearStr($_POST['route_flight_2']);
			$routeZar = clearStr($_POST['route_zar']);
			$componentsRoute1 = clearStr($_POST['components_route_1']);
			$componentsRoute2 = clearStr($_POST['components_route_2']);
			$componentsAirportA1 = clearStr($_POST['components_airport_a_1']);
			$componentsAirportA2 = clearStr($_POST['components_airport_a_2']);
			$componentsAirportB1 = clearStr($_POST['components_airport_b_1']);
			$componentsAirportB2 = clearStr($_POST['components_airport_b_2']);
			$componentsAirportC1 = clearStr($_POST['components_airport_c_1']);
			$componentsAirportC2 = clearStr($_POST['components_airport_c_2']);
			$remarks = clearStr($_POST['remarks']);

			$dateExecution1 = clearStr(convertDateToMySQL($_POST['date_execution_1']));

			$dateExecution2 = clearStr(convertDateToMySQL($_POST['date_execution_2']));

			$dateRoute1 = clearStr(convertDateToMySQL($_POST['date_route_1']));

			$dateRoute2 = clearStr(convertDateToMySQL($_POST['date_route_2']));

			$dateAirportA1 = clearStr(convertDateToMySQL($_POST['date_airport_a_1']));

			$dateAirportA2 = clearStr(convertDateToMySQL($_POST['date_airport_a_2']));

			$dateAirportB1 = clearStr(convertDateToMySQL($_POST['date_airport_b_1']));

			$dateAirportB2 = clearStr(convertDateToMySQL($_POST['date_airport_b_2']));

			$dateAirportC1 = clearStr(convertDateToMySQL($_POST['date_airport_c_1']));

			$dateAirportC2 = clearStr(convertDateToMySQL($_POST['date_airport_c_2']));

			// ЛЕТНАЯ / ПРАКТИЧЕСКАЯ КОМПЕТЕНЦИЯ МАРШРУТА

			if($dateRoute1 != 0)
			{
				$dateSignRoute1 = currentDateTimeMySQL();
				$idSignRoute1 = clearInt($_POST['id_sign_route_1']);
					$user = selectUser($idSignRoute1);
				$idRankSignRoute1 = $user[0]['id_rank'];
			}
			else
			{
				$dateSignRoute1 = 0;
				$idSignRoute1 = 0;
				$idRankSignRoute1 = 0;
			}

			if($dateRoute2 != 0)
			{
				$dateSignRoute2 = currentDateTimeMySQL();
				$idSignRoute2 = clearInt($_POST['id_sign_route_2']);
					$user = selectUser($idSignRoute2);
				$idRankSignRoute1 = $user[0]['id_rank'];
			}
			else
			{
				$dateSignRoute2 = 0;
				$idSignRoute2 = 0;
				$idRankSignRoute2 = 0;
			}

			// ЛЕТНАЯ / ПРАКТИЧЕСКАЯ КОМПЕТЕНЦИЯ АЭРОДРОМА КАТЕГОРИИ "A"
			if($dateAirportA1 != 0)
			{
				$dateSignAirportA1 = currentDateTimeMySQL();
				$idSignAirportA1 = clearInt($_POST['id_sign_airport_a_1']);
					$user = selectUser($idSignAirportA1);
				$idRankSignAirportA1 = $user[0]['id_rank'];
			}
			else
			{
				$dateSignAirportA1 = 0;
				$idSignAirportA1 = 0;
				$idRankSignAirportA1 = 0;
			}

			if($dateAirportA2 != 0)
			{
				$dateSignAirportA2 = currentDateTimeMySQL();
				$idSignAirportA2 = clearInt($_POST['id_sign_airport_a_2']);
					$user = selectUser($idSignAirportA2);
				$idRankSignAirportA2 = $user[0]['id_rank'];
			}
			else
			{
				$dateSignAirportA2 = 0;
				$idSignAirportA2 = 0;
				$idRankSignAirportA2 = 0;
			}

			// ЛЕТНАЯ / ПРАКТИЧЕСКАЯ КОМПЕТЕНЦИЯ АЭРОДРОМА КАТЕГОРИИ "B"
			if($dateAirportB1 != 0)
			{
				$dateSignAirportB1 = currentDateTimeMySQL();
				$idSignAirportB1 = clearInt($_POST['id_sign_airport_b_1']);
					$user = selectUser($idSignAirportB1);
				$idRankSignAirportB1 = $user[0]['id_rank'];
			}
			else
			{
				$dateSignAirportB1 = 0;
				$idSignAirportB1 = 0;
				$idRankSignAirportB1 = 0;
			}

			if($dateAirportB2 != 0)
			{
				$dateSignAirportB2 = currentDateTimeMySQL();
				$idSignAirportB2 = clearInt($_POST['id_sign_airport_b_2']);
					$user = selectUser($idSignAirportA2);
				$idRankSignAirportB2 = $user[0]['id_rank'];
			}
			else
			{
				$dateSignAirportB2 = 0;
				$idSignAirportB2 = 0;
				$idRankSignAirportB2 = 0;
			}


			// ЛЕТНАЯ / ПРАКТИЧЕСКАЯ КОМПЕТЕНЦИЯ АЭРОДРОМА КАТЕГОРИИ "C"
			if($dateAirportC1 != 0)
			{
				$dateSignAirportC1 = currentDateTimeMySQL();
				$idSignAirportC1 = clearInt($_POST['id_sign_airport_c_1']);
					$user = selectUser($idSignAirportC1);
				$idRankSignAirportC1 = $user[0]['id_rank'];
			}
			else
			{
				$dateSignAirportC1 = 0;
				$idSignAirportC1 = 0;
				$idRankSignAirportC1 = 0;
			}

			if($dateAirportC2 != 0)
			{
				$dateSignAirportC2 = currentDateTimeMySQL();
				$idSignAirportC2 = clearInt($_POST['id_sign_airport_c_2']);
					$user = selectUser($idSignAirportA2);
				$idRankSignAirportC2 = $user[0]['id_rank'];
			}
			else
			{
				$dateSignAirportC2 = 0;
				$idSignAirportC2 = 0;
				$idRankSignAirportC2 = 0;
			}

			// Подпись штурман
			$idNavigator = clearInt($_POST['id_navigator']);
				$user = selectUser($idNavigator);
			$idRankNavigator = $user[0]['id_rank'];
			$dateNavigator = currentDateTimeMySQL();

			// Подпись начальника ИАС
			$idManagerE = clearInt($_POST['id_manager_e']);
				$user = selectUser($idManagerE);
			$idRankManagerE = $user[0]['id_rank'];
			$dateManagerEngineer = currentDateTimeMySQL();

			// Подпись начальника ЛС
			$idManagerF = clearInt($_POST['id_manager_f']);
				$user = selectUser($idManagerF);
			$idRankManagerF = $user[0]['id_rank'];
			$dateManagerFlight = currentDateTimeMySQL();

		// Запретить редактирование
			if($_POST['date_not_edit'] != 0 and $permissionAssignmentFlight)
			{
				$dateNotEdit = currentDateTimeMySQL();
			}
			else if($_POST['date_not_edit'] == 0 and $permissionAssignmentFlight)
			{
				$dateNotEdit = 0;
			}
			else
			{
				$dateNotEdit = $currentAssignmentFlight[0]['date_not_edit'];
			}

				updateFlightPreparing($idNavigator, $idManagerE, $idManagerF, $idSignRoute1, $idSignRoute2, $idSignAirportA1, $idSignAirportA2, $idSignAirportB1, $idSignAirportB2, $idSignAirportC1, $idSignAirportC2, $idRankNavigator, $idRankManagerE, $idRankManagerF, $idRankSignRoute1, $idRankSignRoute2, $idRankSignAirportA1, $idRankSignAirportA2, $idRankSignAirportB1, $idRankSignAirportB2, $idRankSignAirportC1, $idRankSignAirportC2, $numberFlight1, $numberFlight2, $numberFlight3, $routeFlight1, $routeFlight2, $routeZar, $componentsRoute1, $componentsRoute2, $componentsAirportA1, $componentsAirportA2, $componentsAirportB1, $componentsAirportB2, $componentsAirportC1, $componentsAirportC2, $remarks, $dateManagerFlight, $dateManagerEngineer, $dateNavigator, $dateNotEdit, $dateExecution1, $dateExecution2, $dateRoute1, $dateRoute2, $dateAirportA1, $dateAirportA2, $dateAirportB1, $dateAirportB2, $dateAirportC1, $dateAirportC2, $dateSignRoute1, $dateSignRoute2, $dateSignAirportA1, $dateSignAirportA2, $dateSignAirportB1, $dateSignAirportB2, $dateSignAirportC1, $dateSignAirportC2, $idFlightPreparing);
        $ancor = '#noticeEditFlightPreparing';
        redirect($ancor);
		}
  }
?>