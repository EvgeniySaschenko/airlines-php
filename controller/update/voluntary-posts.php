<?php
		if
			($currentSection[0]['type'] == 'voluntary-posts' and $permissionEditSection)
		{
			if($_GET['action'] == 'voluntary_posts')
			{
              
              // Добавление в БД
              $idAuthor = $currentUser[0]['id'];
              $idNews = $getIdNews;
              $idDepartment = clearInt($_POST['id_department']);
              $commentCorrectiveActions = clearStr($_POST['comment_corrective_actions']);
              
              
              updateVoluntaryPosts($idAuthor, $idNews, $idDepartment, $commentCorrectiveActions);
       

              $ancor = '#noticeUpdateVoluntaryPostsSend';
 
              redirect($ancor);

            }
        }
?>