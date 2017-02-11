<?php

  if($currentSubsection[0]['type'] == 'flight_assignment' and $permissionEditSubsection)
  {
		if
			($_GET['action'] == 'delete'
		and
			($permissionAssignmentFlight
		or
			($currentAssignmentFlight[0]['date_not_edit_a'] == 0 and $permissionEditFlightGenerateDoc)))
    {
      $idFlightAssignment = $getIdFlightAssignment;
      updateDeleteFlightAssignment($idFlightAssignment);
      $ancor = '#noticeDeleteFlightAssignment';
      redirect($ancor);
		}
  }

?>