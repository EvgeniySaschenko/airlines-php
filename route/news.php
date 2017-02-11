<?php
		if(($currentSection[0]['type'] == 'news' or $currentSection[0]['type'] == 'links' or $currentSection[0]['type'] == 'home') and $permissionReadSection)
		{
			$countRecords = selectCountNews($getIdSection, $getIdSubsection);
			$allNews = selectAllNews($getIdSection, $getIdSubsection, $getPage);
			$allNewsLast = selectAllNews($getIdSection, $getIdSubsection, 0);
			$allDoc = selectAllDocNameNews($getIdUser, $getIdSection, $getIdSubsection, $getIdNews, $getIdBook);
      
			# Просмотр
			if(empty($_GET['action']))
			{
				if(empty($_GET['id_news']))
        {
          # Список новостей
          if($currentSection[0]['type'] == 'news')
          {
            include('templates/news-list.php');
          }
          # Список ссылок
          if($currentSection[0]['type'] == 'links')
          {
            include('templates/links.php');
          }
        }
				if(!empty($_GET['id_news']))
        {
          # Одна новость
					include('templates/news.php');
        }
			}
      
			# Редактировать
			if($_GET['action'] == 'edit' and $permissionEditSection)
			{
				if(empty($_GET['id_news']) and $currentSection[0]['type'] != 'home')
				{
					include('templates/a-news-add.php');
					include('templates/a-news-list.php');
				}
				if(!empty($_GET['id_news']) or $currentSection[0]['type'] == 'home')
				{
          # Главная
          if($currentSection[0]['type'] == 'home')
          {
            $currentNews = $allNews;
          }
					include('templates/a-news.php');
				}
			}
		}
?>
