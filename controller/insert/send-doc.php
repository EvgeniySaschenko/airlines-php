<?php
		if
			($currentSection[0]['type'] == 'doc' and $permissionEditSection
		or
			$currentSubsection[0]['type'] == 'doc' and $permissionEditSubsection)
		{
			if($_GET['action'] == 'send_doc')
			{
        for($i = 0; $_POST['id_user'][$i]; $i++)
				{
					$idAuthor = $currentUser[0]['id'];
					$idSectionUser = $getIdSectionUser;
					$idUser = clearInt($_POST['id_user'][$i]);
					$idDoc = $getIdDoc;
					$dateEnd =  convertDateToMySQL(clearStr($_POST['date_end']));
					$idSentDoc = insertSentDoc($idAuthor, $idSectionUser, $idUser, $idDoc, $dateEnd);
          $nameDoc = $_POST["name_doc"];
          
          $protocol = strstr($_SERVER['HTTP_REFERER'], 'https://');
          if($protocol) {
            $protocol = 'https://';
          } else {
            $protocol = 'http://';
          }

          // Отправка на маил
          /*
          if($idSentDoc) {
            $user = selectUser($idUser);

               $subject = $_SERVER['HTTP_HOST'].' - '.$nameDoc.' - '.convertDate($dateEnd); 
               $message = "Hello,\n". 
                       "You have received the document \"".$nameDoc."\" to get acquainted with it, proceed the following link:\n".
                       $protocol.$_SERVER['HTTP_HOST']."/index.php?lang=".$_GET['lang']."&id_section=".$idSectionUser."&id_user=".$idUser."&action=user_profile#docUserReceived\n".
                       "The document must be read prior to the date ".convertDate($dateEnd);
               $headers = "From: doc <doc@".$_SERVER['OST'].">";
  
               if($user[0]['mail']) {
                 $to = $user[0]['mail'];
                mail($to, $subject, $message, $headers); 
               }
               
               if($user[0]['mail_2'] and $user[0]['mail_1'] != $user[0]['mail_2']) {
                 $to = $user[0]['mail_2'];
                mail($to, $subject, $message, $headers); 
               }
          }
          */
				}

      
        if($idSentDoc)
          echo $word[96]['name_'.$lang];
        else
          echo $word[98]['name_'.$lang];
			}
    }
 ?>