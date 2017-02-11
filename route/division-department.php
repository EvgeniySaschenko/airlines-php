<?php
    if($currentSection[0]['type'] == 'department' and $permissionReadSection and !isset($_GET['id_subsection']))
    {
        $allUserDivisionDepartment = selectAllUserDivisionDepartment($getIdSection);
        $allDivisionDepartment = selectAllNews($getIdSection, $getIdSubsection, $getPage);
        $allRank = selectAllRank($getIdSection);
        $allUser = selectAllUser();
        if($_GET['action'] == 'edit' and $permissionEditSection and !isset($_GET['id_news']))
        {
          include('templates/a-division-department.php');
        }
        # Редактировать подразделение
        elseif(isset($_GET['id_news']) and $permissionEditSection) 
        {
          include('templates/a-news-edit.php');
        }
        if(!isset($_GET['id_news']) and !isset($_GET['id_subsection']) and !isset($_GET['action'])) 
        {
          $allUserDivisionDepartment = selectAllUserDivisionDepartment($getIdSection);
          $allDivisionDepartment = selectAllNews($getIdSection, $getIdSubsection, $getPage);
          include('templates/division-department.php');
        }
    }
?>