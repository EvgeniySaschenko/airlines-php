<?php
		if($currentSection[0]['type'] == 'voluntary-posts')
		{
          $countRecords = selectCountNews($getIdSection, $getIdSubsection);
          $allNews = selectAllNews($getIdSection, $getIdSubsection, $getPage);
          # Отправка сообщений
          if(!isset($_GET['action']) and !isset($_GET['id_news'])) {
            include('templates/voluntary-posts-send.php');
          }
          # Список сообщений
          elseif($_GET['action'] == 'edit') {
            include('templates/voluntary-posts-send-list.php');
          }
          # Cообщениt
          elseif(isset($_GET['id_news'])) {
            include('templates/a-voluntary-posts.php');
          }
		}
?>