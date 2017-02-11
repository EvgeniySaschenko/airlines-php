<?php
		
		if
			($currentSection[0]['type'] == 'doc' and $permissionEditSection
		or
			$currentSubsection[0]['type'] == 'doc' and $permissionEditSubsection)
		{
			if($_GET['action'] == 'book_add')
			{
				$idAuthor = $currentUser[0]['id'];
				$idSection = $getIdSection;
				$idSubsection = $getIdSubsection;
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
					$result = insertBook($idAuthor, $idSection, $idSubsection, $nameRu, $nameEn, $ip, $userAgent);
          if($result)
          {
            $ancor = '#noticeAddedBook';
          }
          else
          {
            $ancor = '#noticeErrorAddedBook';
          }
				}
        redirect($ancor);
			}
    }
 ?>