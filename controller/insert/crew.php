<?php

    if($currentSubsection[0]['type'] == 'crew' and $permissionEditSubsection)
    {
      //ЭКИПАЖ 
      if($_GET['action'] == 'crew_add')
      {
        $idAuthor = $currentUser[0]['id'];
        $idSection = $getIdSection;
        $nameRu = clearStr($_POST['name_ru']);
        $nameEn = clearStr($_POST['name_en']);
        $ip = $currentUserIp;
        $userAgent = $currentUserAgent;
        if($_POST['location_en'] == 'UKR')
        {
          $locationRu = 'УКР';
          $locationEn = 'UKR';
        }
        else
        {
          $locationRu = 'ОАЭ';
          $locationEn = 'UAE';
        }
        
        $result = insertCrew($idAuthor, $idSection, $nameRu, $nameEn, $locationRu, $locationEn, $ip, $userAgent);
        if($result)
        {
          $ancor = '#noticeAddCrew';
        }
        else
        {
          $ancor = '#noticeErrorAddCrew';
        }
        redirect($ancor);
      }
    }
?>