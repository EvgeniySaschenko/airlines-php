<?php

  if($currentSubsection[0]['type'] == 'flight_assignment' and $permissionReadSubsection)
  {
    if(
			$_GET['action'] == 'report_flight'
		and
			($permissionAssignmentFlight
		or
			($currentAssignmentFlight[0]['date_not_edit_r'] == 0 and $permissionEditFlightGenerateDoc)))
    {

			for($i = 0; $_POST['id_report_flight'][$i]; $i++)
			{
        $idAuthor = $currentUser[0]['id'];

        $idReportFlight = clearInt($_POST['id_report_flight'][$i]);

        $pointDeparture = clearStr($_POST['point_departure'][$i]);
        if(empty($_POST['point_departure'][$i]))
          $pointDeparture = 0;

        $pointArrival = clearStr($_POST['point_arrival'][$i]);
        if(empty($_POST['point_arrival'][$i]))
          $pointArrival = 0;

        $distance = clearStr($_POST['distance'][$i]);
        if(empty($_POST['distance'][$i]))
          $distance = 0;

        $numberFlight = clearStr($_POST['number_flight'][$i]);
        if(empty($_POST['number_flight'][$i]))
          $numberFlight = 0;


        $dateShipping = clearStr(convertDateToMySQL($_POST['date_shipping'][$i]));

        $timeLanding = clearStr($_POST['time_landing'][$i]);

        $timeTakeoff = clearStr($_POST['time_takeoff'][$i]);
        
        $timeFlight = differenceInTime($timeTakeoff, $timeLanding);

        $timeNight = clearStr($_POST['time_night'][$i]);

        $timeJobGround = clearStr($_POST['time_job_ground'][$i]);

        $timeBlockHours = clearStr($_POST['time_block_hours'][$i]);

        $timeHoursCrew = clearStr($_POST['time_hours_crew'][$i]);

        $fuelBalance = clearStr($_POST['fuel_balance'][$i]);
        if(empty($_POST['fuel_balance'][$i]))
          $fuelBalance = 0;

        $fuelFueled = clearStr($_POST['fuel_fueled'][$i]);
        if(empty($_POST['fuel_fueled'][$i]))
          $fuelFueled = 0;

        $oilBalance = clearStr($_POST['oil_balance'][$i]);
        if(empty($_POST['oil_balance'][$i]))
          $oilBalance = 0;

        $oilFueled = clearStr($_POST['oil_fueled'][$i]);
        if(empty($_POST['oil_fueled'][$i]))
          $oilFueled = 0;

        $weightCargo = clearStr($_POST['weight_cargo'][$i]);
        if(empty($_POST['weight_cargo'][$i]))
          $weightCargo = 0;

        $weightPassenger = clearStr($_POST['weight_passenger'][$i]);
        if(empty($_POST['weight_passenger'][$i]))
          $weightPassenger = 0;

        $centeringRise = clearStr($_POST['centering_rise'][$i]);
        if(empty($_POST['centering_rise'][$i]))
          $centeringRise = 0;

        $centeringLanding = clearStr($_POST['centering_landing'][$i]);
        if(empty($_POST['centering_landing'][$i]))
          $centeringLanding = 0;

        $takeoffWeight = clearStr($_POST['takeoff_weight'][$i]);
        if(empty($_POST['takeoff_weight'][$i]))
          $takeoffWeight = 0;

        $landingWeight = clearStr($_POST['landing_weight'][$i]);
        if(empty($_POST['landing_weight'][$i]))
          $landingWeight = 0;

        $echelon = clearStr($_POST['echelon'][$i]);
        if(empty($_POST['echelon'][$i]))
          $echelon = 0;
        
        $hide = clearInt($_POST['hide'][$i]);
        if(empty($_POST['hide'][$i]))
          $hide = 0;

        $ip = $currentUserIp;

        $userAgent = $currentUserAgent;
        
        updateReportFlight($idAuthor, $pointDeparture, $pointArrival, $numberFlight, $distance, $timeLanding, $timeTakeoff, $timeFlight, $timeNight, $timeJobGround, $timeBlockHours, $timeHoursCrew, $fuelBalance, $fuelFueled, $oilBalance, $oilFueled, $weightCargo, $weightPassenger, $centeringRise, $centeringLanding, $takeoffWeight, $landingWeight, $echelon, $dateShipping, $ip, $userAgent, $hide, $idReportFlight);

        $ancor = '#noticeEditFlightReport';
      }
      redirect($ancor);
    }
  }

?>