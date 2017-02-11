<?php

	if($_GET['action'] == 'studied_doc')
	{
		foreach($currentSentDoc as $sentDoc)
		{
			if($sentDoc['id_user'] == $currentUser[0]['id'] and $sentDoc['id'] == $_GET['id_sent_doc'] and $sentDoc['date_studied'] == 0)
			{
				$ip = $currentUserIp;
				$userAgent = $currentUserAgent;
				updateSentDocDateStudied($getIdSentDoc, $ip, $userAgent);
				if(selectOneSentDoc($getIdSentDoc)) {
					echo json_encode(selectOneSentDoc($getIdSentDoc));
					exit();
				}

				break;
			}
		}
	}

?>