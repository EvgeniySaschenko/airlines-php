<?php

		if
			($currentSubsection[0]['type'] == 'reports_pic_as' and $permissionReadSubsection)
		{
      $getIdAircraft = clearInt($_GET['id_aircraft']);
      
      $allAircraft = selectAllAircraft();
      
      $allFlightReportGroupYearAS = selectAllFlightReportGroupYearAS();
      $allFlightReportGroupYearGroupAircraftAS = selectAllFlightReportGroupYearGroupAircraftAS();
      $allFlightReportAircraftGroupMonthAS = selectAllFlightReportAircraftGroupMonthAS($getYear, $getIdAircraft);
      $allFlightReportAircraftGroupMonthGropPicAS = selectAllFlightReportAircraftGroupMonthGropPicAS($getYear, $getIdAircraft);
			//ПРОСМОТР
			if(empty($_GET['action']))
			{
				include('templates/as-reports-pic-year.php');
			}
			else if($_GET['action'] == 'reports_pic_as_list_users_month')
			{
				include('templates/as-reports-pic-list-users-month.php');
			}

      

		}
?>