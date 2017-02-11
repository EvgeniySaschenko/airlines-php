<?php
	include('db.connect.php');
	//СТАТИСТИКА - пользователь который вошел
	function insertVisitor($idUser, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_visitor
			(id_user,
			ip,
			user_agent,
			date_visit)
		VALUES(?, ?, ?, CURRENT_TIMESTAMP)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iss", $idUser, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
	
	//ДОБАВИТТЬ ФАЙЛ
	function insertDoc($idAuthor, $idUser, $idSection, $idSubsection, $idNews, $idBook, $idChapter, $idType, $idAircraft, $nameRu, $nameEn, $extension, $month, $dateCreate, $dateUploads, $dateDoc, $dateEnd, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_doc
			(id_author,
			id_user,
			id_section,
			id_subsection,
			id_news,
			id_book,
			id_chapter, 
			id_type,
			id_aircraft,
			name_ru,
			name_en,
			extension,
			month,
			date_create,
			date_uploads,
			date_doc,
			date_end,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiiiiiiisssissssss", $idAuthor, $idUser, $idSection, $idSubsection, $idNews, $idBook, $idChapter, $idType, $idAircraft, $nameRu, $nameEn, $extension, $month, $dateCreate, $dateUploads, $dateDoc, $dateEnd, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
  
	//ДОБАВИТТЬ - Воздушное судно
	function insertAircraft($idAuthor, $nameRu, $nameEn, $model, $flightWeight, $weightAircraft, $curbWeightAircraft, $centeringEmptyAircraft, $priority, $ip, $userAgent) {
		global $db;
		$query = 
		"INSERT INTO ae_aircraft
			(id_author,
			name_ru,
			name_en,
			model,
			flight_weight,
			weight_aircraft,
			curb_weight_aircraft,
			centering_empty_aircraft,
			priority,
			date_create,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "isssissssss", $idAuthor, $nameRu, $nameEn, $model, $flightWeight, $weightAircraft, $curbWeightAircraft, $centeringEmptyAircraft, $priority, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
  
	//ДОБАВИТТЬ - Подраздел
	function insertSubsection($idAuthor, $nameRu, $nameEn, $idSection, $priority, $ip, $userAgent) {
		global $db;
		$query = 
		"INSERT INTO ae_subsection
			(id_author,
			name_ru,
			name_en,
			id_section,
			priority,
			date_create,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "issiiss", $idAuthor, $nameRu, $nameEn, $idSection, $priority, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
  
	//ДОБАВИТТЬ ССЫЛКУ НА ФАЙЛ
	function insertDocLink($idAuthor, $idUser, $idSection, $idSubsection, $idNews, $idBook, $idChapter, $idType, $idAircraft, $nameRu, $nameEn, $link, $month, $dateCreate, $dateUploads, $dateDoc, $dateEnd, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_doc
			(id_author,
			id_user,
			id_section,
			id_subsection,
			id_news,
			id_book,
			id_chapter, 
			id_type,
			id_aircraft,
			name_ru,
			name_en,
			link,
			month,
			date_create,
			date_uploads,
			date_doc,
			date_end,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiiiiiiisssissssss", $idAuthor, $idUser, $idSection, $idSubsection, $idNews, $idBook, $idChapter, $idType, $idAircraft, $nameRu, $nameEn, $link, $month, $dateCreate, $dateUploads, $dateDoc, $dateEnd, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
	
	//ОТПРАВИТЬ ДОКУМЕНТ пользователю
	function insertSentDoc($idAuthor, $idSectionUser, $idUser, $idDoc, $dateEnd){
		global $db;
		$query = 
		"INSERT INTO ae_doc_sent
			(id_author,
			id_section_user,
			id_user,
			id_doc,
			date_sent,
			date_end)
		VALUES(?, ?, ?, ?, CURRENT_TIMESTAMP, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiis", $idAuthor, $idSectionUser, $idUser, $idDoc, $dateEnd);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
	
	//ДОБАВИТЬ КНИГУ
	function insertBook($idAuthor, $idSection, $idSubsection, $nameRu, $nameEn, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_book
			(id_author,
			id_section,
			id_subsection,
			name_ru,
			name_en,
			date_create,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiissss", $idAuthor, $idSection, $idSubsection, $nameRu, $nameEn, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
	
	//ДОБАВИТЬ КНИГУ
	function insertChapter($idAuthor, $idSection, $idSubsection, $idBook, $nameRu, $nameEn, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_chapter
			(id_author,
			id_section,
			id_subsection,
			id_book,
			name_ru,
			name_en,
			date_create,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiissss", $idAuthor, $idSection, $idSubsection, $idBook, $nameRu, $nameEn, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
	
	
	//ДОБАВИТЬ ПОЛЬЗОВАТЕЛЯ КОТОРЫЙ ДОЛЖЕН ПРЕДОСТАВИТЬ ОТЧЕТ АБ
	function insertUserReportAS($idAuthor, $idUser, $idAircraft, $reportAs, $dateDeparture, $dateArrival, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_report_as
			(id_author,
			id_user,
			id_aircraft,
			report,
			date_departure,
			date_arrival,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiissss", $idAuthor, $idUser, $idAircraft, $reportAs, $dateDeparture, $dateArrival, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
	
	//ДОБАВИТЬ ПОЛЕТ
	function insertFlightAssignment($idAuthor, $idManagerF, $idRankManagerF, $idAircraft, $idCrew, $numberAssignment, $subnumberAssignment, $dateDeparture, $dateArrival, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_flight_assignment
			(id_author,
			id_manager_f,
			id_rank_manager_f,
			id_aircraft,
			id_crew,
			number_assignment,
			subnumber_assignment,
			date_departure,
			date_arrival,
			date_create,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			printf("Errormessage: %s\n", mysqli_error($db));
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiiissssss", $idAuthor, $idManagerF, $idRankManagerF, $idAircraft, $idCrew, $numberAssignment, $subnumberAssignment, $dateDeparture, $dateArrival, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
	
	//ДОБАВИТЬ ПОЛЬЗОВАТЕЛЯ В ПОЛЕТ
	function insertFlightUser($idAuthor, $idUser, $idRank, $idFlightAssignment, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_flight_user
			(id_author,
			id_user,
			id_rank,
			id_flight_assignment,
			date_create,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiiss", $idAuthor, $idUser, $idRank, $idFlightAssignment, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
  
	//ЛС-ОТЧЕТ О ПОЛЕТЕ
	function insertReportFlight($idAuthor, $idFlightAssignment, $pointDeparture, $pointArrival, $numberFlight, $distance, $timeLanding, $timeTakeoff, $timeFlight, $timeNight, $timeJobGround, $timeBlockHours, $timeHoursCrew, $fuelBalance, $fuelFueled, $oilBalance, $oilFueled, $weightCargo, $weightPassenger, $centeringRise, $centeringLanding, $takeoffWeight, $landingWeight, $echelon, $dateShipping, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_flight_report
			(id_author,
			id_flight_assignment,
			point_departure,
			point_arrival,
			number_flight,
			distance,
      time_landing,
      time_takeoff,
      time_flight,
      time_night,
      time_job_ground,
      time_block_hours,
      time_hours_crew,
      fuel_balance,
      fuel_fueled,
      oil_balance,
      oil_fueled,
      weight_cargo,
      weight_passenger,
      centering_rise,
      centering_landing,
      takeoff_weight,
      landing_weight,
      echelon,
      date_shipping,
      date_create,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iisssssssssssssssssssssssss", $idAuthor, $idFlightAssignment, $pointDeparture, $pointArrival, $numberFlight, $distance, $timeLanding, $timeTakeoff, $timeFlight, $timeNight, $timeJobGround, $timeBlockHours, $timeHoursCrew, $fuelBalance, $fuelFueled, $oilBalance, $oilFueled, $weightCargo, $weightPassenger, $centeringRise, $centeringLanding, $takeoffWeight, $landingWeight, $echelon, $dateShipping, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
	
	//ЛС - ПРЕДВАРИТЕЛЬНАЯ ПОДГОТОВКА ПО МАРШРУТАМ И АЭРОДРОМАМ
	function insertFlightPreparing($idAuthor, $idFlightAssignment, $idManagerF, $idManagerE, $idNavigator, $idRankManagerF, $idRankManagerE, $idRankNavigator, $idCrew, $numberAssignment, $dateDeparture, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_flight_preparing
			(id_author,
			id_flight_assignment,
			id_manager_f,
			id_manager_e,
			id_navigator,
			id_rank_manager_f,
			id_rank_manager_e,
			id_rank_navigator,
			id_crew,
			number_assignment,
			date_departure,
			date_create,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiiiiiiissss", $idAuthor, $idFlightAssignment, $idManagerF, $idManagerE, $idNavigator, $idRankManagerF, $idRankManagerE, $idRankNavigator, $idCrew, $numberAssignment, $dateDeparture, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
	
	
	//ДОБАВИТЬ ПОЛЕТ
	function insertFlightTakeoffApproach($idFlightAssignment){
		global $db;
		$query = 
		"INSERT INTO ae_flight_takeoff_approach
			(id_flight_assignment)
		VALUES(?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "i", $idFlightAssignment);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
	
	
	
	
	
	//ДОЛЖНОСТЬ
	function insertRank($idAuthor, $idSection, $nameRu, $nameEn, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_rank
			(id_author,
			id_section,
			name_ru,
			name_en,
			date_create,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iissss", $idAuthor, $idSection, $nameRu, $nameEn, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
	
		//ДОЛЖНОСТЬ
	function insertTypeDoc($idAuthor, $idSection, $nameRu, $nameEn, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_doc_type
			(id_author,
			id_section,
			name_ru,
			name_en,
			date_create,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iissss", $idAuthor, $idSection, $nameRu, $nameEn, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
	
	//ПОЛЬЗОВАТЕЛЬ
	function insertUser($idAuthor, $idSection, $idRank, $idCrew, $login, $pass, $nameRu, $nameEn, $lastNameRu, $lastNameEn, $firstNameRu, $firstNameEn, $addressRu, $addressEn, $mail, $mail2, $skype, $additionalInfo, $phone, $phoneCorp, $dateBirth, $permission, $extension, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_user
			(id_author,
			id_section,
			id_rank,
			id_crew,
			login,
			pass,
			name_ru,
			name_en,
			last_name_ru,
			last_name_en,
			first_name_ru,
			first_name_en,
			address_ru,
			address_en,
			mail,
			mail_2,
			skype,
			additional_info,
			phone,
			phone_corp,
			date_birth,
			date_create,
			permission,
			extension,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiisssssssssssssssssssss", $idAuthor, $idSection, $idRank, $idCrew, $login, $pass, $nameRu, $nameEn, $lastNameRu, $lastNameEn, $firstNameRu, $firstNameEn, $addressRu, $addressEn, $mail, $mail2, $skype, $additionalInfo, $phone, $phoneCorp, $dateBirth, $permission, $extension, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
	
	// Пользователи главной страницы раздела
	function insertDivisionUser($idAuthor, $idSection, $idUser, $idRank, $idNews, $priority, $ip, $userAgent) {
		global $db;
		$query = 
		"INSERT INTO ae_division_user
			(id_author,
			id_section,
			id_user,
			id_rank,
      id_news,
			priority,
      date_create,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiiiiss", $idAuthor, $idSection, $idUser, $idRank, $idNews, $priority, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
  
  
//ЭКИПАЖ
	function insertCrew($idAuthor, $idSection, $nameRu, $nameEn, $locationRu, $locationEn, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_crew
			(id_author,
      id_section,
      name_ru,
			name_en,
			location_ru,
			location_en,
      ip,
      user_agent)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iissssss", $idAuthor, $idSection, $nameRu, $nameEn, $locationRu, $locationEn, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}

  
	//НОВОСТИ + ССЫЛКИ + РАЗНОЕ
	function insertNews($idAuthor, $idSection, $idSubsection, $nameRu, $nameEn, $contentRu, $contentEn, $link, $extension, $priority, $ip, $userAgent){
		global $db;
		$query = 
		"INSERT INTO ae_news
			(id_author,
			id_section,
			id_subsection,
			name_ru,
			name_en,
			content_ru,
			content_en,
			link,
			extension,
      priority,
			date_create,
			ip,
			user_agent)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?, ?)";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiisssssssss", $idAuthor, $idSection, $idSubsection, $nameRu, $nameEn, $contentRu, $contentEn, $link, $extension, $priority, $ip, $userAgent);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return 	mysqli_insert_id($db);
	}
	
?>