<?php

	if($currentSection[0]['type'] == 'home' and $_GET['action'] == 'home' and $permissionEditSection)
	{
		$idSection = clearInt($_GET['id_section']);
		$pageHeaderRu = clearStr($_POST['page_header_ru']);
		$pageHeaderEn = clearStr($_POST['page_header_en']);
		$descriptionRu = clearStr($_POST['description_ru']);
		$descriptionEn = clearStr($_POST['description_en']);
		updateHome($idSection, $pageHeaderRu, $pageHeaderEn, $descriptionRu, $descriptionEn);
		$path = 'images';
		//Загрузка файла на сервер
		for($i = 0; isset($_FILES['uploadfile'.$i]['name']); $i++)
		{
			$extension = extensionFile($_FILES['uploadfile'.$i]['name']);
			if($extension == 'jpg' or $extension == 'jpeg')
			{
				copy($_FILES['uploadfile'.$i]['tmp_name'], $path.'/'.$i.'.jpg');
			}
		}
	}
?>