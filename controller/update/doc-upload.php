<?php
	if
		($currentSubsection[0]['type'] == 'doc' and $permissionEditSubsection
	or
		$currentSection[0]['type'] == 'doc' and $permissionEditSection
  or
		$currentSection[0]['type'] == 'news' and $permissionEditSection
  or
    $_GET['action'] == 'doc_user_upload' and $permissionManageUsers)
	{
    
    # Обновить документ
		if($_GET['action'] == 'doc_upload' or $_GET['action'] == 'doc_user_upload')
		{
			$idDoc = $getIdDoc;
    	$idAuthor = $currentUser[0]['id'];
			$idSection = $getIdSection;
			$idSubsection = $getIdSubsection;
      $dateUploads = date('Y-m-d H:i:s');
			$ip = $currentUserIp;
			$userAgent = $currentUserAgent;
      
				if(count($_FILES) == 1)
				{
					$dateUploads = date('Y-m-d H:i:s');
					//Проверка расширения файла
					foreach($allowExtension as $checkExtension)
					{
						if(extensionFile($_FILES['uploadfile']['name']) == $checkExtension)
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
						$path = '../docs/'.convertDate($currentDoc[0]['date_create']);
						//Создать папку есои не существует
						if(!file_exists($path))
							mkdir($path, 0750);
						//Загрузка файла на сервер
						if(copy($_FILES['uploadfile']['tmp_name'], $path.'/new_file.'.$extension))
						{
							rename($path.'/new_file.'.$extension, $path.'/'.$idDoc.'.'.$extension);
                            updateDocUpload($idAuthor, $idSection, $idSubsection, $extension, $dateUploads, $ip, $userAgent, $idDoc);
                            $nameAuthor = $currentUser[0]['last_name_'.$lang].' '.$currentUser[0]['name_'.$lang].' '.$currentUser[0]['first_name_'.$lang];
                            sendMessageAddOrUpdateDoc($GENERAL_SITE_SETTINGS[0]['mails_doc'], $currentDoc[0]['name_ru'], $idDoc, $currentDoc[0]['id_user'], $idAuthor, $nameAuthor, 'Update upload');
							$ancor = '#noticeUploadDoc';
						}
						else
						{
							$ancor = '#noticeErrorUploadDoc';
						}
					}
          else
          {
            $ancor = '#noticeErrorUploadDoc';
          }
				}
        else
        {
          $ancor = '#noticeErrorUploadDoc';
        }
        redirect($ancor);
			}
      
      # Обновить ссілку на документ
      if($_GET['action'] == 'doc_link_update')
      {
        $idDoc = $getIdDoc;
        $idAuthor = $currentUser[0]['id'];
        $idSection = $getIdSection;
        $idSubsection = $getIdSubsection;
        $dateUploads = date('Y-m-d H:i:s');
        $link =  clearStr($_POST['link']);
        $ip = $currentUserIp;
        $userAgent = $currentUserAgent;
        
        updateDocLink($idAuthor, $idSection, $idSubsection, $link, $dateUploads, $ip, $userAgent, $idDoc);
        
        $nameAuthor = $currentUser[0]['last_name_'.$lang].' '.$currentUser[0]['name_'.$lang].' '.$currentUser[0]['first_name_'.$lang];
        sendMessageAddOrUpdateDoc($GENERAL_SITE_SETTINGS[0]['mails_doc'],  $currentDoc[0]['name_ru'], $idDoc, $currentDoc[0]['id_user'], $idAuthor, $nameAuthor, 'Update upload');
          
		$ancor = '#noticeUpdateDocLink';
        redirect($ancor);
      }
    }
?>