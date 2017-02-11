<?php
		if(!isset($_GET['id_subsection']) and $permissionManageSite and $_GET['action'] == 'manage_site')
		{
      $allSectionsDepartmentHide = selectAllSectionsDepartmentHide();
      
      $allSectionsHide = selectAllSectionsHide();
      $allSubsectionsHide = selectAllSubsectionsHide();
      $allAircraftHide =  selectAllAircraftHide();
      $allUserSortLastNameNoHide = selectAllUserSortLastNameNoHide();
			include('templates/a-manage-site.php');
		}
 ?>