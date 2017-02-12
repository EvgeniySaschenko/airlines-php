<?php
		if($currentSection[0]['type'] == 'voluntary-posts')
		{
          $countRecords = selectCountNews($getIdSection, $getIdSubsection);
          $allNews = selectAllNews($getIdSection, $getIdSubsection, $getPage);
          $allDoc = selectAllDocNameNews($getIdUser, $getIdSection, $getIdSubsection, $getIdNews, $getIdBook);
          # Отправка сообщений
          if(!isset($_GET['action']) and !isset($_GET['id_news'])) {
            include('templates/voluntary-posts-send.php');
          }
          
          if($permissionEditSection) {
            # Список сообщений
            if($_GET['action'] == 'edit' and !isset($_GET['id_news'])) {
              include('templates/voluntary-posts-list.php');
            }
            # Показать сообщение
            elseif(isset($_GET['id_news']) and !isset($_GET['action'])) {
              include('templates/voluntary-posts.php');
              include('templates/doc-list-voluntary-posts.php');

            }
            # Редактировать сообщение
            elseif(isset($_GET['id_news']) and $_GET['action'] == 'edit') {
              include('templates/a-voluntary-posts.php');
            }
          } 

          
		}
?>