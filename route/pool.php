<?php
    // Оценка рисков
    if
      ($currentSubsection[0]['type'] == 'pool' and $permissionReadSubsection)
    {
      $allPoolTemplate = selectAllPoolTemplate($getIdSubsection);
      $allUser = selectAllUser();
      $allPoolTempleateQuestion = selectAllPoolTemplateQuestion($getIdPoolTemplate);
      $allPool = selectAllPool($getIdSubsection, $getPage);
      $allPoolQuestion = selectAllPoolQuestion($getIdPool);
      $allPoolGroupMonth = selectAllPoolGroupMonth($getIdSubsection);
      
      
        // Позьзователь
        if(empty($_GET['action'])) {
          include('templates/pool-list.php');
        } 

        if($_GET['action'] == 'pool_edit_user') {
          include('templates/a-pool-edit-user.php');
        } 

        
      // Админ
      if($permissionEditSubsection) {
        if($_GET['action'] == 'edit') {
          include('templates/a-pool.php');
        }
        // Редактировать шаблон опроса
        if($_GET['action'] == 'pool_template_edit') {
          include('templates/a-pool-template-edit.php');
        }
        // Редактировать опрос
        if($_GET['action'] == 'pool_edit') {
          include('templates/a-pool-edit.php');
        }
      }
    }
 ?>