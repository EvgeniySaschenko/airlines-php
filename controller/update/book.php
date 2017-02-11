<?php
	if
		($currentSubsection[0]['type'] == 'doc' and $permissionEditSubsection
	or
		$currentSection[0]['type'] == 'doc' and $permissionEditSection)
	{
		if($_GET['action'] == 'book_edit')
		{
			$idAuthor = $currentUser[0]['id'];
			$idSection = $getIdSection;
			$idSubsection = $getIdSubsection;
			$ip = $currentUserIp;
			$userAgent = $currentUserAgent;
      
			for($i = 0; $_POST['id_book'][$i]; $i++)
			{
        $idBook = clearInt($_POST['id_book'][$i]);
        if(!empty($_POST['priority'][$i]))
        {
          $priority = clearStr($_POST['priority'][$i]);
        }
        else
        {
          $priority = 0;
        }
        if(!empty($_POST['hide'][$i]))
        {
          $hide = clearStr($_POST['hide'][$i]);
        }
        else
        {
          $hide = 0;
        }
        if(!empty($_POST['name_ru'][$i]))
        {
          if(empty($_POST['name_en'][$i]))
          {
            $nameRu = clearStr($_POST['name_ru'][$i]);
            $nameEn = $nameRu;
          }
          else
          {
            $nameRu = clearStr($_POST['name_ru'][$i]);
            $nameEn = clearStr($_POST['name_en'][$i]);
          }
          updateBook($idAuthor, $idSection, $idSubsection, $idBook, $nameRu, $nameEn, $ip, $userAgent, $priority, $hide);
          $ancor = '#noticeEditBook';
        }
      }
      redirect($ancor);
		}
	}

?>