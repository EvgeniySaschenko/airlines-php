<?php

  if($currentSubsection[0]['type'] == 'flight_assignment' and $permissionEditSubsection)
  {
    if
			($_GET['action'] == 'flight_report_notes'
		and
			($permissionAssignmentFlight
		or
			($currentAssignmentFlight[0]['date_not_edit_r'] == 0 and $permissionEditFlightGenerateDoc)))
    {
			$balanceFuel = clearStr($_POST['balance_fuel']);
      if(empty($_POST['balance_fuel']))
        $balanceFuel = 0;
			$balanceOil = clearStr($_POST['balance_oil']);
      if(empty($_POST['balance_oil']))
        $balanceOil = 0;

			$remarkNavigatorR = clearStr($_POST['remark_navigator_r']);
      if(empty($_POST['remark_navigator_r']))
        $remarkNavigatorR = 0;
			$remarkPicR = clearStr($_POST['remark_pic_r']);
      if(empty($_POST['remark_pic_r']))
        $remarkPicR = 0;
			$remarkManagerFlightR = clearStr($_POST['remark_manager_flight_r']);
      if(empty($_POST['remark_manager_flight_r']))
        $remarkManagerFlightR = 0;

			// Подпись штурман
			$idNavigatorR = clearInt($_POST['id_navigator_r']);
				$user = selectUser($idNavigatorR);
			$idRankNavigatorR = $user[0]['id_rank'];
			$dateNavigatorR = currentDateTimeMySQL();
			// Подпись Командир ВС
			$idPicR = clearInt($_POST['id_pic_r']);
				$user = selectUser($idPicR);
			$idRankPicR = $user[0]['id_rank'];
			$datePicR = currentDateTimeMySQL();
			$dateManagerFlightR = currentDateTimeMySQL();

			// Запретить редактирование
			$dateNotEditR = 0;
			if($_POST['date_not_edit_r'] != 0 and $permissionAssignmentFlight)
			{
				$dateNotEditR = currentDateTimeMySQL();
			}
			else if($_POST['date_not_edit_r'] == 0 and $permissionAssignmentFlight)
			{
				$dateNotEditR = 0;
			}
			else
			{
				$dateNotEditR = $currentAssignmentFlight[0]['date_not_edit_r'];
			}

			$idFlightAssignment = $getIdFlightAssignment;

      
      
      $allReportFlight = selectAllReportFlight($getIdFlightAssignment);
      # Остаток топлива + масла
      foreach($allReportFlight as $key => $reportFlight)
      {
        # Топливо 
        if($allReportFlight[$key + 1]['fuel_balance'])
        {
          $fuelBalanceNext = $allReportFlight[$key + 1]['fuel_balance'];
          $oilBalanceNext = $allReportFlight[$key + 1]['oil_balance'];
        } 
        else 
        {
          $fuelBalanceNext = $currentAssignmentFlight[0]['balance_fuel'];
          $oilBalanceNext = $currentAssignmentFlight[0]['balance_oil'];
        }
        $fuelSpent = $reportFlight['fuel_balance'] + $reportFlight['fuel_fueled'] - $fuelBalanceNext;
        $oilSpent = $reportFlight['oil_balance'] + $reportFlight['oil_fueled'] - $oilBalanceNext;
        $idFlightReport = $reportFlight['id'];
        updateFlightReportSpentFuelOil($fuelSpent, $oilSpent, $idFlightReport);
      }
      
      
			updateFlightReportNotes($balanceFuel, $balanceOil, $idPicR, $idNavigatorR, $idRankPicR, $idRankNavigatorR, $remarkNavigatorR, $remarkPicR, $remarkManagerFlightR, $dateNavigatorR, $datePicR, $dateManagerFlightR, $dateNotEditR, $idFlightAssignment);
      $ancor = '#noticeEditPostFlightAnalysis';
      redirect($ancor);
		}
  }

?>