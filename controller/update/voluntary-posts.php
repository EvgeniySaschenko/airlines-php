<?php
		if
			($currentSection[0]['type'] == 'voluntary-posts' and $permissionEditSection)
		{
			if($_GET['action'] == 'voluntary_posts')
			{
              
              // Добавление в БД
              $idNews = $getIdNews;
              $idDepartment = clearInt($_POST['id_department']);
              $commentCorrectiveActions = clearStr($_POST['comment_corrective_actions']);
              
              
              updateVoluntaryPosts($idNews, $idDepartment, $commentCorrectiveActions);
       

              $ancor = '#noticeUpdateVoluntaryPostsSend';
 
              redirect($ancor);

            }
        }
?>