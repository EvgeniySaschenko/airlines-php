<?php
  if($currentSection[0]['type'] == 'search' and $permissionReadSection) {
      $allSections= selectAllSections();
      $allUser= selectAllUser();
      include('templates/search.php');
  }
?>