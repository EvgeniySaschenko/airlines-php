<?php

		if($currentSection[0]['user'] == '1' and $permissionManageUsers)
    {
			if($_GET['action'] == 'type_doc')
			{
				$idAuthor = $currentUser[0]['id'];
				$idSection = $getIdSection;
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
					insertTypeDoc($idAuthor, $idSection, $nameRu, $nameEn, $ip, $userAgent);
          $ancor = '#noticeAddedTypeDoc';
				}
				else
				{
          $ancor = '#noticeErrorTypeDoc';
				}
      redirect($ancor);
			}
    }
?>