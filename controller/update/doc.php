<?php
	if
		($currentSubsection[0]['type'] == 'doc' and $permissionEditSubsection
	or
		$currentSection[0]['type'] == 'doc' and $permissionEditSection
	or
		$currentSection[0]['user'] == 1 and $permissionManageUsers
  or
    $currentSection[0]['type'] == 'news' and $permissionEditSection
    or
      $currentSection[0]['type'] == 'voluntary-posts' and $permissionEditSection)
	{
		if($_GET['action'] == 'doc')
		{
			for($i = 0; $_POST['id_doc'][$i]; $i++)
			{
        $idDoc = $_POST['id_doc'][$i];
        if(!empty($_POST['id_aircraft'][$i]))
        {
          $idAuthor = clearInt($_POST['id_user'][$i]);
        }
        else
        {
          $idAuthor = $currentUser[0]['id'];
        }
        $idSection = $getIdSection;
        $idSubsection = $getIdSubsection;
        $ip = $currentUserIp;
        $userAgent = $currentUserAgent;
        if(!empty($_POST['id_chapter'][$i]))
        {
          $idChapter = clearInt($_POST['id_chapter'][$i]);
        }
        else
        {
          $idChapter = 0;
        }
        if(!empty($_POST['id_type'][$i]))
        {
          $idType = clearInt($_POST['id_type'][$i]);
        }
        else
        {
          $idType = 0;
        }
        if(!empty($_POST['id_aircraft'][$i]))
        {
          $idAircraft = clearInt($_POST['id_aircraft'][$i]);
        }
        else
        {
          $idAircraft = 0;
        }
        if(!empty($_POST['month'][$i]))
        {
          $month = clearInt($_POST['month'][$i]);
        }
        else
        {
          $month = 0;
        }
        if(!empty($_POST['date_doc'][$i]))
        {
          $dateDoc = convertDateToMySQL($_POST['date_doc'][$i]);
        }
        else
        {
          $dateDoc = 0;
        }
        if(!empty($_POST['date_end'][$i]))
        {
          $dateEnd = convertDateToMySQL($_POST['date_end'][$i]);
        }
        else
        {
          $dateEnd = 0;
        }
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
        
        if(isset($_POST['name_ru'][$i]))
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

          $extension = clearStr($_POST['extension'][$i]);

          $idBook = clearInt($_POST['id_book'][$i]);
          if(empty($_POST['id_book'][$i]))
          {
            $idBook = 0;
          }
          # При смене Книги - убрать главу
          if($_POST['id_book'][$i] != $getIdBook)
          {
            $idChapter = 0;
          }
      
          
          # Удаление файла
          if($_POST['delete'][$i] == 1 and ($permissionDeleteSection or $permissionDeleteSubsection))
          {
            $currentDoc = selectDoc($idDoc);
            $path = '../docs/'.convertDate($currentDoc[0]['date_create']).'/'.$currentDoc[0]['id'].'.'.$currentDoc[0]['extension'];
            unlink($path);
            $hide = 1;
          }
          
          
          updateDoc($idDoc, $idAuthor, $idSection, $idSubsection, $idBook, $idChapter, $idType, $idAircraft, $nameRu, $nameEn, $extension, $month, $dateDoc, $dateEnd, $ip, $userAgent, $priority, $hide);
          $ancor = '#noticeEditDoc';
        }
        else
        {
          $ancor = '#noticeErrorEditDoc';
        }
			}
      redirect($ancor);
		}
  }
?>