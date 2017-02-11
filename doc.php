<?php
include('general.php');
if
	((!empty($currentUser)
and
	$_SESSION['check'] == codeSessionCheck($currentUser[0]['login'].$currentUser[0]['pass'].session_id()))
or
  $currentDoc[0]['type_section'] == 'home')
{
  
	//MIME тип
	if($currentDoc[0]['extension'] == 'pdf')
	{
		$contentType = 'application/'.$currentDoc[0]['extension'];
	}
	if($currentDoc[0]['extension'] == 'jpeg' or $currentDoc[0]['extension'] == 'jpg' or $currentDoc[0]['extension'] == 'png')
	{
		$contentType = 'image/'.$currentDoc[0]['extension'];
	}
	if($currentDoc[0]['extension'] == 'docx')
	{
		$contentType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
	}
	if($currentDoc[0]['extension'] == 'doc')
	{
		$contentType = 'application/msword';
	}
	if($currentDoc[0]['extension'] == 'xls')
	{
		$contentType = 'application/vnd.ms-excel';
	}
	if($currentDoc[0]['extension'] == 'xlsx')
	{
		$contentType = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
	}
	if($currentDoc[0]['extension'] == 'mp4')
	{
		$contentType = 'video/mp4';
	}
  
	$path = '../docs/'.convertDate($currentDoc[0]['date_create']).'/'.$currentDoc[0]['id'].'.'.$currentDoc[0]['extension'];
	//Имя с которым файл будет отдаватся пользователю
	if(!empty($currentDoc[0]['name_'.$lang]))
	{
		$name = translit(replaceInvalidCharacters($currentDoc[0]['name_'.$lang]));
	}
	if(!empty($currentDoc[0]['type_'.$lang]))
	{
		$name = translit(replaceInvalidCharacters($currentDoc[0]['type_'.$lang])).'_'.$name;
	}
	if($currentDoc[0]['date_doc'] != 0)
	{
		$name = $name.'_'.replaceInvalidCharacters(convertDate($currentDoc[0]['date_doc']));
	}
	else
	{
		$name = $name.'_'.replaceInvalidCharacters(convertDate($currentDoc[0]['date_uploads']));
	}
	$name = $name.'_'.$currentDoc[0]['id'];

	if
		(!empty($currentDoc[0]['id_subsection']) and $permissionReadSubsection
	or
		!empty($currentDoc[0]['id_section']) and $permissionReadPersonalDoc
	or
		!empty($currentDoc[0]['id_section']) and $permissionReadSection
	or
		$currentDoc[0]['id_user'] == $currentUser[0]['id']
	or
		$currentDoc[0]['type_section'] == 'home')
	{
		//Дата просмотра отправленного документа
		foreach($currentSentDoc as $sentDoc)
		{
			if($sentDoc['id'] == $_GET['id_sent_doc'] and $sentDoc['date_view'] == 0)
			{
				updateSentDocDateView($getIdSentDoc);
				break;
			}
		}

		//Отобразить документ на странице
		if
			($_GET['action'] == 'view'
		and
			$currentDoc[0]['extension'] != 'doc'
		and
			$currentDoc[0]['extension'] != 'docx'
		and
			$currentDoc[0]['extension'] != 'xls'
		and
			$currentDoc[0]['extension'] != 'xlsx')
		{
			header('Content-Type: '.$contentType);
			header('Cache-Control: max-age=3600');
			readfile($path);
      
      if($currentDoc[0]['extension'] != 'mp4'){
        header ("Content-Description: File Transfer");
        header ("Content-Type: ".$contentType);
        header ("Content-Disposition: attachment; filename=".$path);
        header ("Content-Transfer-Encoding: binary");
        header ("Expires: 0");
        header ("Cache-Control: must-revalidate");
        header ("Pragma: public");
        header ("Content-Length: ".filesize($path));
        header('Cache-Control: max-age=3600');
        ob_clean();
        flush();
        readfile($path);
        exit();
      }
		}
		//Скачать документ
		elseif(empty($currentDoc[0]['link']))
		{
			header('Content-type: '.$contentType);
			header('Content-Disposition: attachment; filename='.$name.'.'.$currentDoc[0]['extension']);
			readfile($path);
		}
		else
    {
      $link = $currentDoc[0]['link'];
			header('Content-type: '.$contentType);
			header('Content-Disposition: attachment; filename='.$name.$link);
			readfile($link);
    }
	}
}

?>