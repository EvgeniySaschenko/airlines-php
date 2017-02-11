<?php

	if
		(!empty($_GET['id_section']) and $permissionEditSection and $_GET['action'] == 'edit_section')
	{
		//ГЛАВНАЯ СТРАНИЦА СЛУЖБЫ + О НАС
		$extension = extensionFile($_FILES['uploadfile']['name']);
		if($extension == 'jpg' or $extension == 'jpeg')
		{
			$path = 'images/section';
			//Загрузка файла на сервер
			if(copy($_FILES['uploadfile']['tmp_name'], $path.'/new_file.jpg'))
			{
				rename($path.'/new_file.jpg', $path.'/'.$_GET['id_section'].'.jpg');
			}
		}
	}
?>