<?php

	if
		($currentSubsection[0]['type'] == 'doc' and $permissionEditSubsection
	or
		$currentSection[0]['type'] == 'doc' and $permissionEditSection)
	{
		if($_GET['action'] == 'chapter_edit')
		{
			//ГЛАВА
			$idAuthor = $currentUser[0]['id'];
			$idSection = $getIdSection;
			$idSubsection = $getIdSubsection;
			$ip = $currentUserIp;
			$userAgent = $currentUserAgent;
      
			for($i = 0; $_POST['id_chapter'][$i]; $i++)
			{
        $idBook = clearInt($_POST['id_book'][$i]);
        $idChapter = clearInt($_POST['id_chapter'][$i]);
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
          updateChapter($idAuthor, $idSection, $idSubsection, $idBook, $idChapter, $nameRu, $nameEn, $ip, $userAgent, $priority, $hide);
          $ancor = '#noticeEditChapter';
        }
      }
      redirect($ancor);
		}
	}

?>