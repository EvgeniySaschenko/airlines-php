<?php
    # Воздушное судно
		if($_GET['action'] == 'edit_aircraft' and $permissionManageSite)
		{
      for($i = 0; $_POST['id_aircraft'][$i]; $i++)
      {
				$idAuthor = $currentUser[0]['id'];
				$ip = $currentUserIp;
				$userAgent = $currentUserAgent;
        
        $idAircraft = clearInt($_POST['id_aircraft'][$i]);
        $nameRu = clearStr($_POST['name_ru'][$i]);
        $nameEn = clearStr($_POST['name_en'][$i]);
        $model = clearStr($_POST['model'][$i]);
        $flightWeight = clearStr($_POST['flight_weight'][$i]);
        $weightAircraft = clearStr($_POST['weight_aircraft'][$i]);
        $curbWeightAircraft = clearStr($_POST['curb_weight_aircraft'][$i]);
        $centeringEmptyAircraft = clearStr($_POST['centering_empty_aircraft'][$i]);
        $priority = clearInt($_POST['priority'][$i]);
        $hide = clearInt($_POST['hide'][$i]);
        
				updateAircraft($idAircraft, $idAuthor, $nameRu, $nameEn, $model, $flightWeight, $weightAircraft, $curbWeightAircraft, $centeringEmptyAircraft, $priority, $hide, $ip, $userAgent);
        
        $ancor = '#noticeEditAircraft';
      }
        redirect($ancor);
    }
 ?>