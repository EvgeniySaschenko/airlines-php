<?php
		if($_GET['action'] == 'send_doc' or $_GET['action'] == 'sent_doc')
		{
			if
        ($currentSubsection[0]['type'] == 'doc' and $permissionReadSubsection
			or
				$currentSection[0]['type'] == 'doc' and $permissionReadSection)
			{
				if($_GET['action'] == 'send_doc')
				{
					$allUser = selectAllUser();
					include('templates/send-doc.php');
				}
			}
		}
?>