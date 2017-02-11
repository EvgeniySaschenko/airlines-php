<?php

		if($currentSubsection[0]['type'] == 'crew' and $permissionEditSubsection)
		{
      # Формирование экипажа
      if($_GET['action'] == 'crew_generate')
      {
        for($i = 0; $_POST['id_user'][$i]; $i++)
        {
          $idUser = clearInt($_POST['id_user'][$i]);
          $idCrew = clearInt($_POST['id_crew'][$i]);
          $idRank = clearInt($_POST['id_rank'][$i]);
          if(empty($_POST['id_rank'][$i]))
            $idRank = 0;
          $team = clearInt($_POST['team'][$i]);
          if(empty($_POST['team'][$i]))
            $team = 0;
          $remark = clearStr($_POST['remark'][$i]);
          if(empty($_POST['remark'][$i]))
            $remark = '-';
          $dateReplace =  clearStr(convertDateToMySQL($_POST['date_replace'][$i]));
          # Обновть экипаж (персонал)
          updateUserCrew($idUser, $idAuthor, $idCrew, $idRank, $team, $remark, $dateReplace, $ip, $userAgent);
          
          $ancor = '#noticeUpdateCrewGenerate';
        }
        redirect($ancor);
      }
      
      # Редактировать экипаж
      if($_GET['action'] == 'crew_edit')
      {
        $idAuthor = $currentUser[0]['id'];
        $idSection = $getIdSection;
        $ip = $currentUserIp;
        $userAgent = $currentUserAgent;
        
        for($i = 0; $_POST['id_crew'][$i]; $i++)
        {
          $idCrew = clearInt($_POST['id_crew'][$i]);
          
          $locationEn = clearStr($_POST['location_en'][$i]);
          if($locationEn == 'UKR') {
            $locationRu = 'УКР';
          } else {
            $locationRu = 'ОАЭ';
          }
          
          
          $nameRu = clearStr($_POST['name_ru'][$i]);
          if(empty($_POST['name_ru'][$i]))
            $nameRu = '-';
          $nameEn = clearStr($_POST['name_en'][$i]);
          if(empty($_POST['name_en'][$i]))
            $nameEn = '-';
          $priority = clearInt($_POST['priority'][$i]);
          if(empty($_POST['priority'][$i]))
            $priority = 0;
          $hide = clearInt($_POST['hide'][$i]);
          if(empty($_POST['hide'][$i]))
            $hide = 0;

          updateCrew($idCrew, $idAuthor, $idSection, $nameRu, $nameEn, $hide, $priority, $locationRu, $locationEn, $ip, $userAgent);
          $ancor = '#noticeUpdateCrews';
        }
        redirect($ancor);
      }
      
      //Добавить рейс в архив
      /*
       * $report = clearInt($_POST['report'][$i]);
      $idAircraft = clearInt($_POST['id_aircraft']);
      $year = clearInt($_POST['year_departure']);
      $month = clearInt($_POST['month_departure']);
      $day = clearInt($_POST['day_departure']);
      $dateDeparture =  $year.'-'.$month.'-'.$day;
      $year = clearInt($_POST['year_arrival']);
      $month = clearInt($_POST['month_arrival']);
      $day = clearInt($_POST['day_arrival']);
      $dateArrival =  $year.'-'.$month.'-'.$day;
      if($year != 0 and $_POST['report'][$i] == 1 and $currentUser[0]['id_section'] == 3)
        insertFlight($idAuthor, $idUser, $idAircraft, $report, $dateDeparture, $dateArrival, $ip, $userAgent);
       * 
       */
		}

?>