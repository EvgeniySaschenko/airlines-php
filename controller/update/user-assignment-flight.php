<?php

  if($currentSubsection[0]['type'] == 'flight_assignment' and $permissionEditSubsection)
  {
    if
			(($_GET['action'] == 'user_assignment_flight' or $_GET['action'] == 'user_assignment_flight_cabin')
		and
			($permissionAssignmentFlight
		or
			($currentAssignmentFlight[0]['date_not_edit_r'] == 0 and $permissionEditFlightGenerateDoc)))
    {
			for($i = 0; $_POST['id_flight_user'][$i]; $i++)
			{
        $idFlightUser = $_POST['id_flight_user'][$i];
        $idRank = $_POST['id_rank'][$i];
        $priorityF = $_POST['priority_f'][$i];   
        if(empty($_POST['priority_f'][$i]))
          $priorityF = 0;
        $hide = $_POST['hide'][$i];
        updateUserAssignmentFlight($idRank, $priorityF, $hide, $idFlightUser);
        
        if($_GET['action'] == 'user_assignment_flight')
          $ancor = '#noticeFlightAssignmentUserCrewEdit';
        else
          $ancor = '#noticeFlightAssignmentUserCabinCrewEdit';
      }
      redirect($ancor);
    }
  }

?>