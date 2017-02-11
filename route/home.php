<?php

    $countRecords = selectCountNews($getIdSection, $getIdSubsection);
    $allNews = selectAllNews($getIdSection, $getIdSubsection, $getPage);
    $allNewsLast = selectAllNews($getIdSection, $getIdSubsection, 0);
    $allDoc = selectAllDocNameNews($getIdUser, $getIdSection, $getIdSubsection, $getIdNews, $getIdBook);
    $allImg = selectAllImg($getIdSection, $getIdSubsection, $getIdNews);
    # Главная
    if($currentSection[0]['type'] == 'home' and !isset($_GET['id_user']) and !isset($_GET['action']))
    {
      include('templates/home.php');
    }
    
?>