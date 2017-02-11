<?php

    if($currentSection[0]['type'] == 'department' and $permissionEditSection)
    {
      //ЭКИПАЖ 
      if($_GET['action'] == 'division_department_user_add')
      {
        $idAuthor = $currentUser[0]['id'];
        $idSection = $getIdSection;
        $ip = $currentUserIp;
        $userAgent = $currentUserAgent;

        for($i = 0; $_POST['id_user'][$i]; $i++)
        {
          if($_POST['add'][$i] == 1)
          {
            $idUser = $_POST['id_user'][$i];
            $idRank = $_POST['id_rank'][$i];
            $priority = $_POST['priority'][$i];
            if(empty($priority))
              $priority = 0;
            $idNews = $_POST['id_news'][$i]; 
            $result = insertDivisionUser($idAuthor, $idSection, $idUser, $idRank, $idNews, $priority, $ip, $userAgent);
          }
        }
        if($result)
        {
          $ancor = '#noticeAddUserDivisionDepartment';
        }
        else
        {
          $ancor = '#noticeErrorAddUserDivisionDepartment';
        }
       redirect($ancor);
      }
    }
?>