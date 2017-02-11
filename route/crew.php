<?php

		if
			($currentSubsection[0]['type'] == 'crew' and $permissionReadSubsection)
		{
			$docDateEnd = selectDocDateEnd();
			$allUser = selectAllUser();
			$allCrewSection = selectAllCrewSection($getIdSection);
			$allAircraft = selectAllAircraft();
			$allRank = selectAllRank($getIdSection);
			//ПРОСМОТР
			if(empty($_GET['action']))
			{
				include('templates/crew.php');
			}
			//РЕДАКТИРОВАТЬ
			if($_GET['action'] == 'edit')
			{
				if($permissionEditSubsection)
					include('templates/a-crew.php');
			}
		}
?>