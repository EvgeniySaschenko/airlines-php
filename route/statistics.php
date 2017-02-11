<?php
		if($currentSection[0]['type'] == 'statistics' and $permissionReadSection)
		{
			if(empty($_GET['action']))
			{
				$allDateVisit = selectAllDateVisitGroup();
				$allVisitors = selectAllVisitorsGroup();
				include('templates/statistics.php');
			}
		}
?>