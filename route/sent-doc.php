<?php
		if($_GET['action'] == 'sent_doc')
		{
			if
        ($currentSubsection[0]['type'] == 'doc' and $permissionReadSubsection
			or
				$currentSection[0]['type'] == 'doc' and $permissionReadSection)
			{
				if($_GET['action'] == 'sent_doc')
				{
					$allSentDoc = selectSentDoc($getIdDoc, $getPage, $getIdSectionUser);
					include('templates/sent-doc.php');
				}
			}
		}
?>