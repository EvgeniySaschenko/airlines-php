<?php

    if($currentSubsection[0]['type'] == 'flight_assignment' and $permissionReadSubsection)
    {
      // Пользователи которые могут редактировать отчет о полете
      $allUserFlight = selectAllUserFlight($getIdFlightAssignment);
      foreach($allUserFlight as $userFlight)
      {
        if($userFlight['id_user'] == $currentUser[0]['id'])
        {
          $permissionEditFlightGenerateDoc = $userFlight['id_user'];
          break;
        }
      }

      // ПОЛЬЗОВАТЕЛЬ
      if
        (($_GET['action'] == 'user_assignment_flight' or $_GET['action'] == 'user_assignment_flight_cabin')
      and 
        ($permissionEditSubsection
      or
        ($currentAssignmentFlight[0]['date_not_edit_r'] == 0 and $permissionEditFlightGenerateDoc)))
        {
            $idUser = clearInt($_POST['id_user']);
            $idAuthor = $currentUser[0]['id'];
            $ip = $currentUserIp;
            $userAgent = $currentUserAgent;
            $idFlightAssignment = $getIdFlightAssignment;
            $user = selectUser($idUser);
            insertFlightUser($idAuthor, $idUser, $user[0]['id_rank'], $idFlightAssignment, $ip, $userAgent);
            
            if($_GET['action'] == 'user_assignment_flight')
              $ancor = '#noticeFlightAssignmentUserCrewAdd';
            else
              $ancor = '#noticeFlightAssignmentUserCabinCrewAdd';
        }

      // ОТЧЕТ О ПОЛЕТЕ
      if
        ($_GET['action'] == 'report_flight'
      and 
        ($permissionEditSubsection
      or
        ($currentAssignmentFlight[0]['date_not_edit_r'] == 0 and $permissionEditFlightGenerateDoc)))
        {
          $idAuthor = $currentUser[0]['id'];
          $idFlightAssignment = $getIdFlightAssignment;
          $pointDeparture = clearStr($_POST['point_departure']);
          if(empty($_POST['point_departure']))
            $pointDeparture = 0;
          $pointArrival = clearStr($_POST['point_arrival']);
          if(empty($_POST['point_arrival']))
            $pointArrival = 0;
          $numberFlight = clearStr($_POST['number_flight']);
          if(empty($_POST['number_flight']))
            $numberFlight = 0;
          $distance = clearStr($_POST['distance']);
          if(empty($_POST['distance']))
            $distance = 0;
          
          
          $dateShipping =  clearStr(convertDateToMySQL($_POST['date_shipping']));
          
          $timeLanding = clearStr($_POST['time_landing']);
          
          $timeTakeoff = clearStr($_POST['time_takeoff']);
          
          $timeNight = clearStr($_POST['time_night']);
          
          $timeJobGround = clearStr($_POST['time_job_ground']);

          $timeBlockHours = clearStr($_POST['time_block_hours']);
          
          $timeHoursCrew = clearStr($_POST['time_hours_crew']);
          
          $timeFlight = differenceInTime($timeTakeoff, $timeLanding);
          
          $fuelBalance = clearStr($_POST['fuel_balance']);
          if(empty($_POST['fuel_balance']))
            $fuelBalance = 0;
          
          $fuelFueled = clearStr($_POST['fuel_fueled']);
          if(empty($_POST['fuel_fueled']))
            $fuelFueled = 0;
          
          $oilBalance = clearStr($_POST['oil_balance']);
          if(empty($_POST['oil_balance']))
            $oilBalance = 0;
          
          $oilFueled = clearStr($_POST['oil_fueled']);
          if(empty($_POST['oil_fueled']))
            $oilFueled = 0;
          
          $weightCargo = clearStr($_POST['weight_cargo']);
          if(empty($_POST['weight_cargo']))
            $weightCargo = 0;
          
          $weightPassenger = clearStr($_POST['weight_passenger']);
          if(empty($_POST['weight_passenger']))
            $weightPassenger = 0;
          
          $centeringRise = clearStr($_POST['centering_rise']);
          if(empty($_POST['centering_rise']))
            $centeringRise = 0;
          
          $centeringLanding = clearStr($_POST['centering_landing']);
          if(empty($_POST['centering_landing']))
            $centeringLanding = 0;
          
          $takeoffWeight = clearStr($_POST['takeoff_weight']);
          if(empty($_POST['takeoff_weight']))
            $takeoffWeight = 0;
          
          $landingWeight = clearStr($_POST['landing_weight']);
          if(empty($_POST['landing_weight']))
            $landingWeight = 0;
          
          $echelon = clearStr($_POST['echelon']);
          if(empty($_POST['echelon']))
            $echelon = 0;

          $ip = $currentUserIp;
          
          $userAgent = $currentUserAgent;
          
          
          $result = insertReportFlight($idAuthor, $idFlightAssignment, $pointDeparture, $pointArrival, $numberFlight, $distance, $timeLanding, $timeTakeoff, $timeFlight, $timeNight, $timeJobGround, $timeBlockHours, $timeHoursCrew, $fuelBalance, $fuelFueled, $oilBalance, $oilFueled, $weightCargo, $weightPassenger, $centeringRise, $centeringLanding, $takeoffWeight, $landingWeight, $echelon, $dateShipping, $ip, $userAgent);
          
          if($result)
            $ancor = '#noticeAddedFlightReport';
          else
            $ancor = '#noticeErrorAddedFlightReport';
        }
       
        redirect($ancor);
    }
?>