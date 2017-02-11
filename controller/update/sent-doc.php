<?php

	if
		($currentSubsection[0]['type'] == 'doc' and $permissionEditSubsection
	or
		$currentSection[0]['type'] == 'doc' and $permissionEditSection)
	{
		if($_GET['action'] == 'sent_doc')
		{
      for($i = 0; $_POST['id_sent_doc'][$i]; $i++)
      {
         $idAuthor = $currentUser[0]['id'];
         $idSentDoc = clearInt($_POST['id_sent_doc'][$i]);
         $dateEnd = convertDateToMySQL(clearStr($_POST['date_end'][$i]));
         $hide = clearInt($_POST['hide'][$i]);
         updateSentDoc($idAuthor, $idSentDoc, $dateEnd, $hide);
      }
      redirect();
		}
  }

?>