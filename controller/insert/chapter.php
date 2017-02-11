<?php

		if
			($currentSection[0]['type'] == 'doc' and $permissionEditSection
		or
			$currentSubsection[0]['type'] == 'doc' and $permissionEditSubsection)
		{
			if($_GET['action'] == 'chapter_add')
			{
				$idAuthor = $currentUser[0]['id'];
				$idSection = $getIdSection;
				$idSubsection = $getIdSubsection;
				$idBook = clearInt($_POST['id_book']);
				$ip = $currentUserIp;
				$userAgent = $currentUserAgent;
				if(!empty($_POST['name_ru']))
				{
					if(empty($_POST['name_en']))
					{
						$nameRu = clearStr($_POST['name_ru']);
						$nameEn = $nameRu;
					}
					else
					{
						$nameRu = clearStr($_POST['name_ru']);
						$nameEn = clearStr($_POST['name_en']);
					}
					$result = insertChapter($idAuthor, $idSection, $idSubsection, $idBook, $nameRu, $nameEn, $ip, $userAgent);
				}
        if($result)
        {
          $ancor = '#noticeAddedChapter';
        }
        else
        {
          $ancor = '#noticeErrorAddedChapter';
        }
        redirect($ancor);
			}
    }

?>