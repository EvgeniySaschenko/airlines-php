<?php
  # Вход на сайт
  if($currentSection[0]['type'] != 'home' and !isset($_SESSION['check']))
  {
    include('templates/enter-site-content.php');
  }
?> 