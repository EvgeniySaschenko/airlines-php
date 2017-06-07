<?php
    // Оценка рисков
    if
      ($currentSubsection[0]['type'] == 'pool' and $permissionReadSubsection)
    {
      $allPoolTemplate = selectAllPoolTemplate($getIdSubsection);
      $allUser = selectAllUser();
      $allPoolTempleateQuestion = selectAllPoolTemplateQuestion($getIdPoolTemplate);
      $allPool = selectAllPool($getIdSubsection);
      $allPoolQuestion = selectAllPoolQuestion($getIdPool);
      
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