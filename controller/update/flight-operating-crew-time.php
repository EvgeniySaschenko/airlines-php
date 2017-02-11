<?php
  if($currentSubsection[0]['type'] == 'flight_assignment' and $permissionEditSubsection)
  {
    if
			($_GET['action'] == 'flight_operating_crew_time'
		and
			($permissionAssignmentFlight
		or
			($currentAssignmentFlight[0]['date_not_edit_r'] == 0 and $permissionEditFlightGenerateDoc)))
    {

			for($i = 0; $_POST['id_report_flight'][$i]; $i++)
			{
        $idReportFlight = clearInt($_POST['id_report_flight'][$i]);
        $timePreliminaryPreparation = clearStr($_POST['wt_time_preliminary_preparation'][$i]);
        $timePostFlightWork = clearStr($_POST['wt_time_post_flight_work'][$i]);
        $timeParking = clearStr($_POST['wt_time_parking'][$i]);
        $timeRecreation = clearStr($_POST['wt_time_recreation'][$i]);
      
      	updateAssignmentFlightOperatingCrewTime($timePreliminaryPreparation, $timePostFlightWork, $timeParking, $timeRecreation, $idReportFlight);
      $ancor = '#noticeEditOperatingCrewTime';
      }
     redirect($ancor);
    }
  }
?>