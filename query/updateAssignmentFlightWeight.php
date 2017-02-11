<?php
  include('../general.php');
  
  # ОБНОВИТЬ ВЗЛЕТНЫЙ ВЕС в полётных заданиях
  $assignmentFlightWeight = selectAssignmentFlightWeight();
  
  foreach($assignmentFlightWeight as $flightWeight)
  {
    updateFlightAssignmentFlightWeight($flightWeight['id'], $flightWeight['flight_weight_aircraft']);
  }

?>
