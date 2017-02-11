<?php

	if
		($currentSection[0]['user'] == 1 and $permissionManageUsers)
  {
		if($_GET['action'] == 'rank')
		{
			$idAuthor = $currentUser[0]['id'];
			$idSection = $getIdSection;
			$ip = $currentUserIp;
			$userAgent = $currentUserAgent;
      
			for($i = 0; $_POST['name_ru'][$i]; $i++)
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
        $idRank = clearInt($_POST['id_rank'][$i]);
        $priority = clearInt($_POST['priority'][$i]);
        $hide = clearInt($_POST['hide'][$i]);
        
				updateRank($idAuthor, $idSection, $idRank, $nameRu, $nameEn, $ip, $userAgent, $priority, $hide);
        $ancor = '#noticeUpdateUserRank';
			}
      redirect($ancor);
		}
  }

?>