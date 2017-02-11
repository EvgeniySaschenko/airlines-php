<?php
	include('db.connect.php');
	//Обновить данные о пользователе который вошел/вышел на сайт
	function updateUserLogin($login, $dateEntered, $numberRetries, $ip, $userAgent){
		global $db;
		$query =
		"UPDATE ae_user
		SET
			date_entered = ?,
			number_retries = ?,
			ip = ?,
			user_agent = ?
		WHERE login = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "sisss", $dateEntered, $numberRetries, $ip, $userAgent, $login);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	//ДОКУМЕНТ ОТПРАВЛЕННЫЙ пользователю
	function updateSentDoc($idAuthor, $idSentDoc, $dateEnd, $hide){
		global $db;
		$query =
		"UPDATE ae_doc_sent
		SET
			id_author = ?,
			date_end = ?,
      hide = ? 
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "isii", $idAuthor, $dateEnd, $hide, $idSentDoc);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

	//ДАТА ПРОСТОТРА ОТПРАВЛЕННОГО ДОКУМЕНТА
	function updateSentDocDateView($idSentDoc){
		global $db;
		$query =
		"UPDATE ae_doc_sent
		SET date_view = CURRENT_TIMESTAMP
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "i", $idSentDoc);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

	//ПОДТВЕРДИТЬ ИЗУЧЕНИЕ ДОКУМЕНТА
	function updateSentDocDateStudied($idSentDoc, $ip, $userAgent){
		global $db;
		$query =
		"UPDATE ae_doc_sent
		SET
			date_studied = CURRENT_TIMESTAMP,
			ip = ?,
			user_agent = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "ssi", $ip, $userAgent, $idSentDoc);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	
	//ОБНОВИТЬ КНИГУ
	function updateBook($idAuthor, $idSection, $idSubsection, $idBook, $nameRu, $nameEn, $ip, $userAgent, $priority, $hide){
		global $db;
		$query =
		"UPDATE ae_book
		SET
			id_author = ?,
			id_section = ?,
			id_subsection = ?,
			name_ru = ?,
			name_en = ?,
			ip = ?,
			user_agent = ?,
			priority = ?,
			hide = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiisssssii", $idAuthor, $idSection, $idSubsection, $nameRu, $nameEn, $ip, $userAgent, $priority, $hide, $idBook);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
	//ОБНОВИТЬ ПРАВА ДОСТУПА АДМИНИСТРАТОРА
	function updateAdminPermission($login, $permission){
		global $db;
		$query =
		"UPDATE ae_user
		SET
			permission = ?
		WHERE login = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "ss", $permission, $login);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
	//ОБНОВИТЬ - Воздушные суда
	function updateAircraft($idAircraft, $idAuthor, $nameRu, $nameEn, $model, $flightWeight, $weightAircraft, $curbWeightAircraft, $centeringEmptyAircraft, $priority, $hide, $ip, $userAgent) {
		global $db;
		$query =
		"UPDATE ae_aircraft
		SET
			id_author = ?,
			name_ru = ?,
			name_en = ?,
			model = ?,
			flight_weight = ?,
			weight_aircraft = ?,
			curb_weight_aircraft = ?,
			centering_empty_aircraft = ?,
			priority = ?,
      date_update = CURRENT_TIMESTAMP,
			hide = ?,
			ip = ?,
			user_agent = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "isssssssiissi", $idAuthor, $nameRu, $nameEn, $model, $flightWeight, $weightAircraft, $curbWeightAircraft, $centeringEmptyAircraft, $priority, $hide, $ip, $userAgent, $idAircraft);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
	//ОБНОВИТЬ - Воздушные суда
	function updateGeneralSettings($idGeneralSettings, $idAuthor, $idFlightManager, $idEngineerManager, $nameCompanyRu, $nameCompanyEn, $docDaysRed, $docDaysOrange, $mailsVoluntaryPosts, $numberingFlightAssignment, $ip, $userAgent) {
		global $db;
		$query =
		"UPDATE ae_general_settings
		SET
			id_author = ?,
            id_flight_manager = ?,
            id_engineer_manager = ?,
            name_company_ru = ?,
            name_company_en = ?,
            doc_days_red = ?,
            doc_days_orange = ?,
            mails_voluntary_posts = ?,
            numbering_flight_assignment = ?,
			ip = ?,
			user_agent = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiissiissssi", $idAuthor, $idFlightManager, $idEngineerManager, $nameCompanyRu, $nameCompanyEn, $docDaysRed, $docDaysOrange, $mailsVoluntaryPosts, $numberingFlightAssignment, $ip, $userAgent, $idGeneralSettings);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
	# Сортировка документов в Разделе
	function updateSectionDocSort($idSection, $displayDoc){
		global $db;
		$query =
		"UPDATE ae_section
		SET
			doc_sort = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "si", $displayDoc, $idSection);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
	# Сортировка документов в ПодРазделе
	function updateSubsectionDocSort($idSubsection, $displayDoc){
		global $db;
		$query =
		"UPDATE ae_subsection
		SET
			doc_sort = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "si", $displayDoc, $idSubsection);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
	# Сортировка документов в Книге
	function updateBookDocSort($idBook, $displayDoc){
		global $db;
		$query =
		"UPDATE ae_book
		SET
			doc_sort = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "si", $displayDoc, $idBook);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
  

	//ОБНОВИТЬ ГЛАВУ
	function updateChapter($idAuthor, $idSection, $idSubsection, $idBook, $idChapter, $nameRu, $nameEn, $ip, $userAgent, $priority, $hide){
		global $db;
		$query =
		"UPDATE ae_chapter
		SET
			id_author = ?,
			id_section = ?,
			id_subsection = ?,
			id_book = ?,
			name_ru = ?,
			name_en = ?,
			ip = ?,
			user_agent = ?,
			priority = ?,
			hide = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiisssssii", $idAuthor, $idSection, $idSubsection, $idBook, $nameRu, $nameEn, $ip, $userAgent, $priority, $hide, $idChapter);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
  

	//ОБНОВАТЬ ДОКУМЕНТ
	function updateDoc($idDoc, $idAuthor, $idSection, $idSubsection, $idBook, $idChapter, $idType, $idAircraft, $nameRu, $nameEn, $extension, $month, $dateDoc, $dateEnd, $ip, $userAgent, $priority, $hide){
		global $db;
		$query =
		"UPDATE ae_doc
		SET
			id_author = ?,
			id_section = ?,
			id_subsection = ?,
			id_book = ?,
			id_chapter = ?,
			id_type = ?,
			id_aircraft = ?,
			name_ru = ?,
			name_en = ?,
			extension = ?,
			month = ?,
			date_doc = ?,
			date_end = ?,
			ip = ?,
			user_agent = ?,
			priority = ?,
			hide = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiiiiisssisssssii", $idAuthor, $idSection, $idSubsection, $idBook, $idChapter, $idType, $idAircraft, $nameRu, $nameEn, $extension, $month, $dateDoc, $dateEnd, $ip, $userAgent, $priority, $hide, $idDoc);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
	//Изменить раздел документа
	function updateDocSection($idDoc, $idSection){
		global $db;
		$query =
		"UPDATE ae_doc
		SET
			id_section = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "ii", $idSection, $idDoc);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
  
	//ОБНОВАТЬ ДОКУМЕНТ
	function updateDocUpload($idAuthor, $idSection, $idSubsection, $extension, $dateUploads, $ip, $userAgent, $idDoc) {
		global $db;
		$query =
		"UPDATE ae_doc
		SET
			id_author = ?,
			id_section = ?,
			id_subsection = ?,
			extension = ?,
			date_uploads = ?,
			ip = ?,
			user_agent = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiissssi", $idAuthor, $idSection, $idSubsection, $extension, $dateUploads, $ip, $userAgent, $idDoc);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
	//ОБНОВАТЬ ССІЛКУ НА ДОКУМЕНТ
	function updateDocLink($idAuthor, $idSection, $idSubsection, $link, $dateUploads, $ip, $userAgent, $idDoc) {
		global $db;
		$query =
		"UPDATE ae_doc
		SET
			id_author = ?,
			id_section = ?,
			id_subsection = ?,
			link = ?,
			date_uploads = ?,
			ip = ?,
			user_agent = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiissssi", $idAuthor, $idSection, $idSubsection, $link, $dateUploads, $ip, $userAgent, $idDoc);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
  

 	//Отчеты КВС АБ
	function updateFlightUser($idFlightUser){
		global $db;
		$query =
		"UPDATE ae_flight_user
		SET report_as = 0
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "i", $idFlightUser);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

	//ОТЧЕТ О ПОЛЕТЕ
	function updateReportFlight($idAuthor, $pointDeparture, $pointArrival, $numberFlight, $distance, $timeLanding, $timeTakeoff, $timeFlight, $timeNight, $timeJobGround, $timeBlockHours, $timeHoursCrew, $fuelBalance, $fuelFueled, $oilBalance, $oilFueled, $weightCargo, $weightPassenger, $centeringRise, $centeringLanding, $takeoffWeight, $landingWeight, $echelon, $dateShipping, $ip, $userAgent, $hide, $idReportFlight){
		global $db;
		$query =
		"UPDATE ae_flight_report
		SET
			id_author = ?,
			point_departure = ?,
			point_arrival = ?,
			number_flight = ?,
			distance = ?,
      time_landing = ?,
      time_takeoff = ?,
      time_flight = ?,
      time_night = ?,
      time_job_ground = ?,
      time_block_hours = ?,
      time_hours_crew = ?,
      fuel_balance = ?,
      fuel_fueled = ?,
      oil_balance = ?,
      oil_fueled = ?,
      weight_cargo = ?,
      weight_passenger = ?,
      centering_rise = ?,
      centering_landing = ?,
      takeoff_weight = ?,
      landing_weight = ?,
      echelon = ?,
      date_shipping = ?,
			ip = ?,
			user_agent = ?,
      hide = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "isssssssssssssssssssssssssii", $idAuthor, $pointDeparture, $pointArrival, $numberFlight, $distance, $timeLanding, $timeTakeoff, $timeFlight, $timeNight, $timeJobGround, $timeBlockHours, $timeHoursCrew, $fuelBalance, $fuelFueled, $oilBalance, $oilFueled, $weightCargo, $weightPassenger, $centeringRise, $centeringLanding, $takeoffWeight, $landingWeight, $echelon, $dateShipping, $ip, $userAgent, $hide, $idReportFlight);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}


	 // ОТЧЕТ О ПОЛЕТЕ - таблица 2 (обновляет таблицу с даданием на полет)
	function updateAssignmentFlightReportTable2($balanceFuel, $balanceOil, $idPicR, $idNavigatorR, $idRankPicR, $idRankNavigatorR, $t2Airport1R, $t2Airport2R, $t2Airport3R,$t2Category1r, $t2Category2r, $t2Category3r, $t2Dn1R, $t2Dn2R, $t2Dn3R, $t2Conditions1R, $t2Conditions2R, $t2Conditions3R, $t2MkPos1R, $t2MkPos2R, $t2MkPos3R, $t2Date1R, $t2Date2R, $t2Date3R, $remarkNavigatorR, $remarkPicR, $remarkManagerFlightR, $dateNavigatorR, $datePicR, $dateManagerFlightR, $dateNotEditR, $idFlightAssignment){
		global $db;
		$query =
		"UPDATE ae_flight_assignment
		SET
			balance_fuel = ?,
			balance_oil = ?,
			id_pic_r = ?,
			id_navigator_r = ?,
			id_rank_pic_r = ?,
			id_rank_navigator_r = ?,
			t2_airport_1_r = ?,
			t2_airport_2_r = ?,
			t2_airport_3_r = ?,
			t2_category_1_r = ?,
			t2_category_2_r = ?,
			t2_category_3_r = ?,
			t2_dn_1_r = ?,
			t2_dn_2_r = ?,
			t2_dn_3_r = ?,
			t2_conditions_1_r = ?,
			t2_conditions_2_r = ?,
			t2_conditions_3_r = ?,
			t2_mk_pos_1_r = ?,
			t2_mk_pos_2_r = ?,
			t2_mk_pos_3_r = ?,
			t2_date_1_r = ?,
			t2_date_2_r = ?,
			t2_date_3_r = ?,
			remark_navigator_r = ?,
			remark_pic_r = ?,
			remark_manager_flight_r = ?,
			date_navigator_r = ?,
			date_pic_r = ?,
			date_manager_flight_r = ?,
			date_not_edit_r = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "ssiiiisssssssssssssssssssssssssi",$balanceFuel, $balanceOil, $idPicR, $idNavigatorR, $idRankPicR, $idRankNavigatorR, $t2Airport1R, $t2Airport2R, $t2Airport3R, $t2Category1r, $t2Category2r, $t2Category3r, $t2Dn1R, $t2Dn2R, $t2Dn3R, $t2Conditions1R, $t2Conditions2R, $t2Conditions3R, $t2MkPos1R, $t2MkPos2R, $t2MkPos3R, $t2Date1R, $t2Date2R, $t2Date3R, $remarkNavigatorR, $remarkPicR, $remarkManagerFlightR, $dateNavigatorR, $datePicR, $dateManagerFlightR, $dateNotEditR, $idFlightAssignment);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}


	 // ВЗЛЕТЫ И ЗАХОДЫ В АЭРОПОРТАХ - НЕ ИСПОЛЬЗУЕТЬСЯ
	function updateFlightTakeoffApproach($category, $airport, $dn, $conditions, $mkPos, $dateFlight, $idFlightTakeoffApproach){
		global $db;
		$query =
		"UPDATE ae_flight_takeoff_approach
		SET
			category = ?,
			airport = ?,
			dn = ?,
			conditions = ?,
			mk_pos = ?,
			date_flight = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "ssssssi", $category, $airport, $dn, $conditions, $mkPos, $dateFlight, $idFlightTakeoffApproach);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
	 // ВЗЛЕТЫ И ЗАХОДЫ В АЭРОПОРТАХ
	function updateAssignmentFlightTakeoffApproach($category, $airport, $dn, $conditions, $mkPos, $takeOffLanding, $idPilot, $idReportFlight){
		global $db;
		$query =
		"UPDATE ae_flight_report
		SET
			ta_category = ?,
			ta_airport = ?,
			ta_dn = ?,
			ta_conditions = ?,
			ta_mk_pos = ?,
			ta_take_off_landing = ?,
			ta_id_pilot = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "ssssssii", $category, $airport, $dn, $conditions, $mkPos, $takeOffLanding, $idPilot, $idReportFlight);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
  	 // Таблица рабочего времени экипажа
	function updateAssignmentFlightOperatingCrewTime($timePreliminaryPreparation, $timePostFlightWork, $timeParking, $timeRecreation, $idReportFlight){
		global $db;
		$query =
		"UPDATE ae_flight_report
		SET
			wt_time_preliminary_preparation = ?,
			wt_time_post_flight_work = ?,
			wt_time_parking = ?,
			wt_time_recreation = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "ssssi", $timePreliminaryPreparation, $timePostFlightWork, $timeParking, $timeRecreation, $idReportFlight);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}


	 // Для заметок (послеполетный разбор):
	function updateFlightReportNotes($balanceFuel, $balanceOil, $idPicR, $idNavigatorR, $idRankPicR, $idRankNavigatorR, $remarkNavigatorR, $remarkPicR, $remarkManagerFlightR, $dateNavigatorR, $datePicR, $dateManagerFlightR, $dateNotEditR, $idFlightAssignment){
		global $db;
		$query =
		"UPDATE ae_flight_assignment
		SET
			balance_fuel = ?,
			balance_oil = ?,
			id_pic_r = ?,
			id_navigator_r = ?,
			id_rank_pic_r = ?,
			id_rank_navigator_r = ?,
			remark_navigator_r = ?,
			remark_pic_r = ?,
			remark_manager_flight_r = ?,
			date_navigator_r = ?,
			date_pic_r = ?,
			date_manager_flight_r = ?,
			date_not_edit_r = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "ssiiiisssssssi", $balanceFuel, $balanceOil, $idPicR, $idNavigatorR, $idRankPicR, $idRankNavigatorR, $remarkNavigatorR, $remarkPicR, $remarkManagerFlightR, $dateNavigatorR, $datePicR, $dateManagerFlightR, $dateNotEditR, $idFlightAssignment);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
  
	# Топлива / масла израсходовано
	function updateFlightReportSpentFuelOil($fuelSpent, $oilSpent, $idFlightReport) {
		global $db;
		$query =
		"UPDATE ae_flight_report
		SET
			fuel_spent = ?,
			oil_spent = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "ssi", $fuelSpent, $oilSpent, $idFlightReport);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}


	//ЗАДАНИЕ НА ПОЛЕТ
	function updateAssignmentFlight($idManagerF, $idPicA, $idRankManagerF, $idRankPicA, $idAircraft, $numberAssignment, $subnumberAssignment, $numberFlight, $purposeFlightRu, $purposeFlightEn, $routeFlightRu, $routeFlightEn, $weightCargo, $weightAircraft, $pilotAdmission, $datePicA, $dateManagerFlightA, $dateNotEditA, $centeringEmptyAircraft, $curbWeightAircraft, $flightWeight, $dateDeparture, $ip, $userAgent, $idFlightAssignment){
		global $db;
		$query =
		"UPDATE ae_flight_assignment
		SET
			id_manager_f = ?,
			id_pic_a = ?,
			id_rank_manager_f = ?,
			id_rank_pic_a = ?,
			id_aircraft = ?,
			number_assignment = ?,
			subnumber_assignment = ?,
			number_flight = ?,
			purpose_flight_ru = ?,
			purpose_flight_en = ?,
			route_flight_ru = ?,
			route_flight_en = ?,
			weight_cargo = ?,
			weight_aircraft = ?,
			pilot_admission = ?,
			date_pic_a = ?,
			date_manager_flight_a = ?,
			date_not_edit_a = ?,
			centering_empty_aircraft = ?,
			curb_weight_aircraft = ?,
      flight_weight = ?, 
			date_departure = ?,
			ip = ?,
			user_agent = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiiisssssssssssssssisssi", $idManagerF, $idPicA, $idRankManagerF, $idRankPicA, $idAircraft, $numberAssignment, $subnumberAssignment, $numberFlight, $purposeFlightRu, $purposeFlightEn, $routeFlightRu, $routeFlightEn, $weightCargo, $weightAircraft, $pilotAdmission, $datePicA, $dateManagerFlightA, $dateNotEditA, $centeringEmptyAircraft, $curbWeightAircraft, $flightWeight, $dateDeparture, $ip, $userAgent, $idFlightAssignment);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

	//ЛС - ОБНОВИТЬ ПОЛЬЗОВАТЕЛЕЙ В ЗАДАНИН НА ПОЛЕТ
	function updateUserAssignmentFlight($idRank, $priorityF, $hide, $idFlightUser){
		global $db;
		$query =
		"UPDATE ae_flight_user
		SET
			id_rank = ?,
			priority_f = ?,
			hide = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiii", $idRank, $priorityF, $hide, $idFlightUser);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}



	//ЛС - ПРЕДВАРИТЕЛЬНАЯ ПОДГОТОВКА
	function updateFlightPreparing($idNavigator, $idManagerE, $idManagerF, $idSignRoute1, $idSignRoute2, $idSignAirportA1, $idSignAirportA2, $idSignAirportB1, $idSignAirportB2, $idSignAirportC1, $idSignAirportC2, $idRankNavigator, $idRankManagerE, $idRankManagerF, $idRankSignRoute1, $idRankSignRoute2, $idRankSignAirportA1, $idRankSignAirportA2, $idRankSignAirportB1, $idRankSignAirportB2, $idRankSignAirportC1, $idRankSignAirportC2, $numberFlight1, $numberFlight2, $numberFlight3, $routeFlight1, $routeFlight2, $routeZar, $componentsRoute1, $componentsRoute2, $componentsAirportA1, $componentsAirportA2, $componentsAirportB1, $componentsAirportB2, $componentsAirportC1, $componentsAirportC2, $remarks, $dateManagerFlight, $dateManagerEngineer, $dateNavigator, $dateNotEdit, $dateExecution1, $dateExecution2, $dateRoute1, $dateRoute2, $dateAirportA1, $dateAirportA2, $dateAirportB1, $dateAirportB2, $dateAirportC1, $dateAirportC2, $dateSignRoute1, $dateSignRoute2, $dateSignAirportA1, $dateSignAirportA2, $dateSignAirportB1, $dateSignAirportB2, $dateSignAirportC1, $dateSignAirportC2, $idFlightPreparing){
		global $db;
		$query =
		"UPDATE ae_flight_preparing
		SET
			id_navigator = ?,
			id_manager_e = ?,
			id_manager_f = ?,
			id_sign_route_1 = ?,
			id_sign_route_2 = ?,
			id_sign_airport_a_1 = ?,
			id_sign_airport_a_2 = ?,
			id_sign_airport_b_1 = ?,
			id_sign_airport_b_2 = ?,
			id_sign_airport_c_1 = ?,
			id_sign_airport_c_2 = ?,
			id_rank_navigator = ?,
			id_rank_manager_e = ?,
			id_rank_manager_f = ?,
			id_rank_sign_route_1 = ?,
			id_rank_sign_route_2 = ?,
			id_rank_sign_airport_a_1 = ?,
			id_rank_sign_airport_a_2 = ?,
			id_rank_sign_airport_b_1 = ?,
			id_rank_sign_airport_b_2 = ?,
			id_rank_sign_airport_c_1 = ?,
			id_rank_sign_airport_c_2 = ?,
			number_flight_1 = ?,
			number_flight_2 = ?,
			number_flight_3 = ?,
			route_flight_1 = ?,
			route_flight_2 = ?,
			route_zar = ?,
			components_route_1 = ?,
			components_route_2 = ?,
			components_airport_a_1 = ?,
			components_airport_a_2 = ?,
			components_airport_b_1 = ?,
			components_airport_b_2 = ?,
			components_airport_c_1 = ?,
			components_airport_c_2 = ?,
			remarks = ?,
			date_manager_flight = ?,
			date_manager_engineer = ?,
			date_navigator = ?,
			date_not_edit = ?,
			date_execution_1 = ?,
			date_execution_2 = ?,
			date_route_1 = ?,
			date_route_2 = ?,
			date_airport_a_1 = ?,
			date_airport_a_2 = ?,
			date_airport_b_1 = ?,
			date_airport_b_2 = ?,
			date_airport_c_1 = ?,
			date_airport_c_2 = ?,
			date_sign_route_1 = ?,
			date_sign_route_2 = ?,
			date_sign_airport_a_1 = ?,
			date_sign_airport_a_2 = ?,
			date_sign_airport_b_1 = ?,
			date_sign_airport_b_2 = ?,
			date_sign_airport_c_1 = ?,
			date_sign_airport_c_2 = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiiiiiiiiiiiiiiiiiiiisssssssssssssssssssssssssssssssssssssi", $idNavigator, $idManagerE, $idManagerF, $idSignRoute1, $idSignRoute2, $idSignAirportA1, $idSignAirportA2, $idSignAirportB1, $idSignAirportB2, $idSignAirportC1, $idSignAirportC2, $idRankNavigator, $idRankManagerE, $idRankManagerF, $idRankSignRoute1, $idRankSignRoute2, $idRankSignAirportA1, $idRankSignAirportA2, $idRankSignAirportB1, $idRankSignAirportB2, $idRankSignAirportC1, $idRankSignAirportC2, $numberFlight1, $numberFlight2, $numberFlight3, $routeFlight1, $routeFlight2, $routeZar, $componentsRoute1, $componentsRoute2, $componentsAirportA1, $componentsAirportA2, $componentsAirportB1, $componentsAirportB2, $componentsAirportC1, $componentsAirportC2, $remarks, $dateManagerFlight, $dateManagerEngineer, $dateNavigator, $dateNotEdit, $dateExecution1, $dateExecution2, $dateRoute1, $dateRoute2, $dateAirportA1, $dateAirportA2, $dateAirportB1, $dateAirportB2, $dateAirportC1, $dateAirportC2, $dateSignRoute1, $dateSignRoute2, $dateSignAirportA1, $dateSignAirportA2, $dateSignAirportB1, $dateSignAirportB2, $dateSignAirportC1, $dateSignAirportC2, $idFlightPreparing);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}



	//ДОЛЖНОСТЬ
	function updateRank($idAuthor, $idSection, $idRank, $nameRu, $nameEn, $ip, $userAgent, $priority, $hide){
		global $db;
		$query =
		"UPDATE ae_rank
		SET
			id_author = ?,
			id_section = ?,
			name_ru = ?,
			name_en = ?,
			ip = ?,
			user_agent = ?,
			priority = ?,
			hide = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iisssssii", $idAuthor, $idSection, $nameRu, $nameEn, $ip, $userAgent, $priority, $hide, $idRank);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

	//ТИП ДОКУМЕНТА
	function updateTypeDoc($idAuthor, $idSection, $idTypeDoc, $nameRu, $nameEn, $ip, $userAgent, $priority, $hide){
		global $db;
		$query =
		"UPDATE ae_doc_type
		SET
			id_author = ?,
			id_section = ?,
			name_ru = ?,
			name_en = ?,
			ip = ?,
			user_agent = ?,
			priority = ?,
			hide = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iisssssii", $idAuthor, $idSection, $nameRu, $nameEn, $ip, $userAgent, $priority, $hide, $idTypeDoc);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

	//ПОЛЬЗОВАТЕЛЬ
	function updateUser($idUser, $idAuthor, $idSection, $idRank, $idCrew, $login, $pass, $nameRu, $nameEn, $lastNameRu, $lastNameEn, $firstNameRu, $firstNameEn, $addressRu, $addressEn, $mail, $mail2, $skype, $additionalInfo, $phone, $phoneCorp, $dateBirth, $permission, $hide, $numberRetries, $extension, $ip, $userAgent){
		global $db;
		$query =
		"UPDATE ae_user
		SET
			id_author = ?,
			id_section = ?,
			id_rank = ?,
			id_crew = ?,
			login = ?,
			pass = ?,
			name_ru = ?,
			name_en = ?,
			last_name_ru = ?,
			last_name_en = ?,
			first_name_ru = ?,
			first_name_en = ?,
			address_ru = ?,
			address_en = ?,
			mail = ?,
			mail_2 = ?,
			skype = ?,
			additional_info = ?,
			phone = ?,
			phone_corp = ?,
			date_birth = ?,
			permission = ?,
			hide = ?,
			number_retries = ?,
			extension = ?,
			ip = ?,
			user_agent = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiissssssssssssssssssiisssi", $idAuthor, $idSection, $idRank, $idCrew, $login, $pass, $nameRu, $nameEn, $lastNameRu, $lastNameEn, $firstNameRu, $firstNameEn, $addressRu, $addressEn, $mail, $mail2, $skype, $additionalInfo, $phone, $phoneCorp, $dateBirth, $permission, $hide, $numberRetries, $extension, $ip, $userAgent, $idUser);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
	# Удалить пользователя (удалить логин)
	function updateUserDeleteLoginDisadle($idUser){
		global $db;
		$query =
		"UPDATE ae_user
		SET
      login = 0,
      hide = 1
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "i", $idUser);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

	//ЭКИРАЖ
	function updateCrew($idCrew, $idAuthor, $idSection, $nameRu, $nameEn, $hide, $priority, $locationRu, $locationEn, $ip, $userAgent){
		global $db;
		$query =
		"UPDATE ae_crew
		SET
			id_author = ?,
			id_section = ?,
			name_ru = ?,
			name_en = ?,
			hide = ?,
			priority = ?,
			location_ru = ?,
			location_en = ?,
			ip = ?,
			user_agent = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iissiissssi", $idAuthor, $idSection, $nameRu, $nameEn, $hide, $priority, $locationRu, $locationEn, $ip, $userAgent, $idCrew);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

	//ПОЛЬЗОВАТЕЛИ ЭКИРАЖА
	function updateUserCrew($idUser, $idAuthor, $idCrew, $idRank, $team, $remark, $dateReplace, $ip, $userAgent){
		global $db;
		$query =
		"UPDATE ae_user
		SET
			id_author = ?,
			id_crew = ?,
			id_rank = ?,
			team = ?,
			remark = ?,
			date_replace = ?,
			ip = ?,
			user_agent = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiissssi", $idAuthor, $idCrew, $idRank, $team, $remark, $dateReplace, $ip, $userAgent, $idUser);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

	//ГЛАВНАЯ
	function updateHome($idSection, $pageHeaderRu, $pageHeaderEn, $descriptionRu, $descriptionEn){
		global $db;
		$query =
		"UPDATE ae_section
		SET
			page_header_ru = ?,
			page_header_en = ?,
			description_ru = ?,
			description_en = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "ssssi", $pageHeaderRu, $pageHeaderEn, $descriptionRu, $descriptionEn, $idSection);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

	//НОВОСТИ + ССЫЛКИ + РАЗНОЕ
	function updateNews($idNews, $idAuthor, $idSection, $idSubsection, $nameRu, $nameEn, $contentRu, $contentEn, $link, $extension, $dateCreate, $ip, $userAgent, $hide, $priority){
		global $db;
		$query =
		"UPDATE ae_news
		SET
			id_author = ?,
			id_section = ?,
			id_subsection = ?,
			name_ru = ?,
			name_en = ?,
			content_ru = ?,
			content_en = ?,
			link = ?,
			extension = ?,
			date_create = ?,
			ip = ?,
			user_agent = ?,
			hide = ?,
      priority = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiisssssssssiii", $idAuthor, $idSection, $idSubsection, $nameRu, $nameEn, $contentRu, $contentEn, $link, $extension, $dateCreate, $ip, $userAgent, $hide, $priority, $idNews);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

	//УДАЛИТЬ ИЗОБРАЖЕНИЕ В НОВОСТИ
	function updateDeleteImgNews($idNews){
		global $db;
		$query =
		"UPDATE ae_news
		SET extension = 0
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "i", $idNews);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

//РАЗДЕЛЫ САЙТА
	function updateSection($idSection, $nameRu, $nameEn, $priority, $hide){
		global $db;
		$query =
		"UPDATE ae_section
		SET
			name_ru = ?,
			name_en = ?,
			priority = ?,
      hide = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "sssii", $nameRu, $nameEn, $priority, $hide, $idSection);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}

	//ПОДРАЗДЕЛЫ САЙТА
	function updateSubsection($idSubsection, $nameRu, $nameEn, $priority, $hide){
		global $db;
		$query =
		"UPDATE ae_subsection
		SET
			name_ru = ?,
			name_en = ?,
			priority = ?,
			hide = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "sssii", $nameRu, $nameEn, $priority, $hide, $idSubsection);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  

  
	# Удалить Задание на полет
	function updateDeleteFlightAssignment($idFlightAssignment){
		global $db;
		$query =
		"UPDATE ae_flight_assignment a
    INNER JOIN ae_flight_preparing p ON p.id_flight_assignment = ?
    LEFT OUTER JOIN ae_flight_report r ON r.id_flight_assignment = ?
    INNER JOIN ae_flight_takeoff_approach t ON t.id_flight_assignment = ?
    LEFT OUTER JOIN ae_flight_user u ON u.id_flight_assignment = ?
		SET
			a.hide = 1,
			p.hide = 1,
			r.hide = 1,
			t.hide = 1,
			u.hide = 1
		WHERE a.id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiii", $idFlightAssignment, $idFlightAssignment, $idFlightAssignment, $idFlightAssignment, $idFlightAssignment);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
  
	function updateUserDivisionDepartment($idNews, $idRank, $priority, $hide, $idDivisionUser) {
		global $db;
		$query =
		"UPDATE ae_division_user
		SET
			id_news = ?,
            id_rank = ?, 
			priority = ?,
            hide = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiii", $idNews, $idRank, $priority, $hide, $idDivisionUser);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
  //ОБНОВИТЬ ВЗЛЕТНЫЙ ВЕС - для полётных заданий
	function updateFlightAssignmentFlightWeight($idAssignmentFlight, $flightWeight) {
		global $db;
		$query =
		"UPDATE ae_flight_assignment
		SET
			flight_weight = ?
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "ii", $flightWeight, $idAssignmentFlight);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}  
  
?>