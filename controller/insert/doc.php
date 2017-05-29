<?php
		if
			($currentSection[0]['type'] == 'doc' and $permissionEditSection
		or
			$currentSubsection[0]['type'] == 'doc' and $permissionEditSubsection
    or 
      $currentSection[0]['user'] == '1' and $permissionManageUsers
    or
      $currentSection[0]['type'] == 'news' and $permissionEditSection
    or
      $currentSection[0]['type'] == 'voluntary-posts' and $permissionEditSection)
		{
      # Документ
			if($_GET['action'] == 'doc')
			{

				if(count($_FILES) <= 15 and !empty($_FILES))
				{
					for($i = 0; $_FILES['uploadfile']['name'][$i]; $i++)
					{
						//Проверка расширения файла
						foreach($allowExtension as $checkExtension)
						{
							if(extensionFile($_FILES['uploadfile']['name'][$i]) == $checkExtension)
							{
								$extension = $checkExtension;
								break;
							}
							else
							{
								$extension = false;
							}
						}
						if($extension)
						{				
							$idAuthor = $currentUser[0]['id'];
							$idUser = $getIdUser;
							$idSection = $getIdSection;
							$idSubsection = $getIdSubsection;
							$idNews = $getIdNews;
							$idBook = $getIdBook;
							$idType = 0;
							$nameRu = clearStr(nameFile($_FILES['uploadfile']['name'][$i]));
							$nameEn = clearStr(nameFile($_FILES['uploadfile']['name'][$i]));
							$month = 0;
							$dateCreate = date('Y-m-d H:i:s');
							$dateUploads = date('Y-m-d H:i:s'); 
							if(!empty($_POST['year_doc']) and !empty($_POST['month_doc']) and !empty($_POST['day_doc']))
							{
								$dateDoc = clearInt($_POST['year_doc']).'-'.clearInt($_POST['month_doc']).'-'.clearInt($_POST['day_doc']);
							}
							else
							{
								$dateDoc = 0;
							}
							$dateEnd = 0;
							$ip = $currentUserIp;
							$userAgent = $currentUserAgent;
							if(!empty($_POST['id_chapter']))
							{
								$idChapter = clearInt($_POST['id_chapter']);
							}
							else
							{
								$idChapter = 0;
							}
							if(!empty($_POST['id_aircraft']))
							{
								$idAircraft = clearInt($_POST['id_aircraft']);
							}
							else
							{
								$idAircraft = 0;
							}
							$path = '../docs/'.convertDate($dateCreate);
							//Создать папку есои не существует
							if(!file_exists($path))	
								mkdir($path, 0750);
							//Загрузка файла на сервер
							if(copy($_FILES['uploadfile']['tmp_name'][$i], $path.'/new_file.'.$extension))
							{
								$idDoc = insertDoc($idAuthor, $idUser, $idSection, $idSubsection, $idNews, $idBook, $idChapter, $idType, $idAircraft, $nameRu, $nameEn, $extension, $month, $dateCreate, $dateUploads, $dateDoc, $dateEnd, $ip, $userAgent);
								rename($path.'/new_file.'.$extension, $path.'/'.$idDoc.'.'.$extension);
                                
                                $nameAuthor = $currentUser[0]['last_name_'.$lang].' '.$currentUser[0]['name_'.$lang].' '.$currentUser[0]['first_name_'.$lang];
                                sendMessageAddOrUpdateDoc($GENERAL_SITE_SETTINGS[0]['mails_doc'], $nameRu, $idDoc, $idUser, $idAuthor, $nameAuthor, 'Add');
                $ancor = '#noticeAddedAddDoc';
							}
							else
							{
                $ancor = '#noticeErrorAddDoc';
							}
						}
					}
				}
        redirect($ancor);
			}
      # Ссылка
      elseif($_GET['action'] == 'doc_link')
      {
        $idAuthor = $currentUser[0]['id'];
        $idUser = $getIdUser;
        $idSection = $getIdSection;
        $idSubsection = $getIdSubsection;
        $idNews = $getIdNews;
        $idBook = $getIdBook;
        $idType = 0;
        $nameRu = clearStr($_POST['name_ru']);
        
        if(empty($_POST['name_en'])) {
          $nameEn = $nameRu;
        } else {
          $nameEn = clearStr($_POST['name_en']);
        }

        $link = clearStr($_POST['link']);
        $month = 0;
        $dateCreate = date('Y-m-d H:i:s');
        $dateUploads = date('Y-m-d H:i:s'); 
        $dateDoc = 0;
        $dateEnd = 0;
        
        $ip = $currentUserIp;
        $userAgent = $currentUserAgent;
        if(!empty($_POST['id_chapter']))
        {
          $idChapter = clearInt($_POST['id_chapter']);
        }
        else
        {
          $idChapter = 0;
        }
        if(!empty($_POST['id_aircraft']))
        {
          $idAircraft = clearInt($_POST['id_aircraft']);
        }
        else
        {
          $idAircraft = 0;
        }
        $idDoc = insertDocLink($idAuthor, $idUser, $idSection, $idSubsection, $idNews, $idBook, $idChapter, $idType, $idAircraft, $nameRu, $nameEn, $link, $month, $dateCreate, $dateUploads, $dateDoc, $dateEnd, $ip, $userAgent);
        
        $nameAuthor = $currentUser[0]['last_name_'.$lang].' '.$currentUser[0]['name_'.$lang].' '.$currentUser[0]['first_name_'.$lang];
        sendMessageAddOrUpdateDoc($GENERAL_SITE_SETTINGS[0]['mails_doc'], $nameRu, $idDoc, $idUser, $idAuthor, $nameAuthor, 'Add');
        $ancor = '#noticeAddedAddDoc';
        redirect($ancor);
      }
      
    }
?>