<?php
  if($currentSection[0]['type'] == 'contacts' and $permissionReadSection) {
    
    $allUser = selectAllUser();
    if(empty($_GET['action']))
    {
      include('templates/contact-info.php');
    }

  }
?>