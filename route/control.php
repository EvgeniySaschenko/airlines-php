<?php
		//КОНТРОЛЬ
		if
			($currentSubsection[0]['type'] == 'control' and $permissionReadSubsection)
		{
      $allDocSectionControl = selectAllDocSectionControl($getIdSection, $getPage);
			$allUserControl = selectAllUserControl($getIdSection);
			include('templates/control.php');
		}
 ?>