<?php
		if
			(($currentSection[0]['type'] == 'news'
		or 
			$currentSection[0]['type'] == 'links'
		or 
			$currentSection[0]['type'] == 'department') and $permissionEditSection)
		{
			if($_GET['action'] == 'news')
			{
				$idAuthor = $currentUser[0]['id'];
				$idSection = $getIdSection;
				$idSubsection = $getIdSubsection;
				$nameRu = clearStr($_POST['name_ru']);
				$nameEn = clearStr($_POST['name_en']);
        $priority = clearInt($_POST['priority']);
        
        if(empty($_POST['priority']))
          $priority = 0;
        
        if(empty($_POST['name_en']))
          $nameEn = $nameRu;
        
        $contentRu = clearStr(str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $_POST['content_ru']));
        $contentEn = clearStr(str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $_POST['content_en']));
        
        if(empty($_POST['content_ru']))
          $contentRu = ' ';
        if(empty($_POST['content_en']))
          $contentEn = $contentRu;
        
        
				$ip = $currentUserIp;
				$userAgent = $currentUserAgent;
				if(preg_match('/src="(.*)" frameborder/', $_POST['link'], $matches))
				{
					$link = clearStr($matches[1]);
				}
				else
				{
					$link = clearStr($_POST['link']); 
				}
				if(empty($link))
				{
					$link = 0;
				}
				$extension = extensionFile($_FILES['uploadfile']['name']);
				if(empty($extension))
					$extension = 0;
        else
          $extension = 'jpg';
				$idNews = insertNews($idAuthor, $idSection, $idSubsection, $nameRu, $nameEn, $contentRu, $contentEn, $link, $extension, $priority, $ip, $userAgent);

				if($extension == 'jpg' or $extension == 'jpeg')
				{
					$extension = 'jpg';
					$path = 'images/news';
					//Загрузка файла на сервер
					if(copy($_FILES['uploadfile']['tmp_name'], $path.'/new_file.'.$extension))
					{
						rename($path.'/new_file.'.$extension, $path.'/'.$idNews.'.'.$extension);
					}
				}
        
        if($idNews)
        {
          $ancor = '#noticeAddedNews';
        }
        else 
        {
          $ancor = '#noticeErrorAddedNews';
        }
        
        redirect($ancor);
        
			}
		}
?>