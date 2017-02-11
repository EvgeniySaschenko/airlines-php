<?php

		if($currentSection[0]['user'] == '1' and $permissionManageUsers)
    {
			if($_GET['action'] == 'rank')
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
					insertRank($idAuthor, $idSection, $nameRu, $nameEn, $ip, $userAgent);
          $ancor = '#noticeAddedUserRank';
				}
				else
				{
					$ancor = '#noticeErrorUserRank';
				}
         redirect($ancor);
			}
    }
?>