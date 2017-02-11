	# Удалить Задание на полет
	function updateDeleteFlightAssignment($idFlightAssignment){
		global $db;
		$query =
		"UPDATE ae_flight_assignment, ae_flight_preparing, ae_flight_report, ae_flight_takeoff_approach, ae_flight_user
		SET
			ae_flight_assignment.hide = 1,
			ae_flight_preparing.hide = 1,
			ae_flight_report.hide = 1,
			ae_flight_takeoff_approach.hide = 1,
			ae_flight_user.hide = 1
		WHERE 
      ae_flight_assignment.id = ?
    AND
			ae_flight_preparing.id_flight_assignment = ?
    AND
			ae_flight_report.id_flight_assignment = ?
    AND
			ae_flight_takeoff_approach.id_flight_assignment = ?
    AND
			ae_flight_user.id_flight_assignment = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiii", $idFlightAssignment, $idFlightAssignment, $idFlightAssignment, $idFlightAssignment, $idFlightAssignment);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}