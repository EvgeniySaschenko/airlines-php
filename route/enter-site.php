<?php
  # Вход на сайт
  if($currentSection[0]['type'] != 'home' and $currentSection[0]['type'] != 'voluntary-posts' and !isset($_SESSION['check']))
  {
    include('templates/enter-site-content.php');
  }
?>