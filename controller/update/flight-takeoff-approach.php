<?php

  if($currentSubsection[0]['type'] == 'flight_assignment' and $permissionEditSubsection)
  {
    if
			($_GET['action'] == 'flight_takeoff_approach'
		and
			($permissionAssignmentFlight
		or
			($currentAssignmentFlight[0]['date_not_edit_r'] == 0 and $permissionEditFlightGenerateDoc)))
    {

			for($i = 0; $_POST['id_report_flight'][$i]; $i++)
			{
        $idReportFlight = clearInt($_POST['id_report_flight'][$i]);
        $idPilot = clearInt($_POST['ta_id_pilot'][$i]);

        $category = clearStr($_POST['ta_category'][$i]);
        if(empty($_POST['ta_category'][$i]))
          $category = 0;

        $airport = clearStr($_POST['ta_airport'][$i]);
        if(empty($_POST['ta_airport'][$i]))
          $airport = 0;

        $dn = clearStr($_POST['ta_dn'][$i]);
        if(empty($_POST['ta_dn'][$i]))
          $dn = 0;

        $conditions = clearStr($_POST['ta_conditions'][$i]);
        if(empty($_POST['ta_conditions'][$i]))
          $conditions = 0;

        $mkPos = clearStr($_POST['ta_mk_pos'][$i]);
        if(empty($_POST['ta_mk_pos'][$i]))
          $mkPos = 0;
        
        $takeOffLanding = clearStr($_POST['ta_take_off_landing'][$i]);
        if(empty($_POST['ta_take_off_landing'][$i]))
          $takeOffLanding = 0;
      
      	updateAssignmentFlightTakeoffApproach($category, $airport, $dn, $conditions, $mkPos, $takeOffLanding, $idPilot, $idReportFlight);
      $ancor = '#noticeEditTakeoffApproachAirports';
      }
     redirect($ancor);
    }
  }

?>