<?php
    # Воздушное судно
		if($_GET['action'] == 'add_aircraft' and $permissionManageSite)
		{
				$idAuthor = $currentUser[0]['id'];
				$ip = $currentUserIp;
				$userAgent = $currentUserAgent;
        
        
        
        $nameRu = clearStr($_POST['name_ru']);
        if(empty($_POST['name_en'])) {
          $nameEn = $nameRu;
        } else {
          $nameEn = clearStr($_POST['name_en']);
        }
        $model = clearStr($_POST['model']);
        $flightWeight = clearStr($_POST['flight_weight']);
        $weightAircraft = clearStr($_POST['weight_aircraft']);
        $curbWeightAircraft = clearStr($_POST['curb_weight_aircraft']);
        $centeringEmptyAircraft = clearStr($_POST['centering_empty_aircraft']);
        $priority = clearStr($_POST['priority']);
        
				$result = insertAircraft($idAuthor, $nameRu, $nameEn, $model, $flightWeight, $weightAircraft, $curbWeightAircraft, $centeringEmptyAircraft, $priority, $ip, $userAgent);
        
        if($result) {
          $ancor = '#noticeAddAircraft';
        } else {
          $ancor = '#noticeErrorAddAircraft';
        }

        redirect($ancor);
    }
 ?>