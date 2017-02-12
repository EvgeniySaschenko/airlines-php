<?php
	include('db.connect.php');
    
	// Глобальные настройки для сайта
	function selectGeneralSiteSettings(){
		global $db;
		$query = "SELECT * FROM ae_general_settings";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
	
	global $GENERAL_SITE_SETTINGS;
	$GENERAL_SITE_SETTINGS = selectGeneralSiteSettings();
    

	//Все разделы сайта
	function selectAllWord(){
		global $db;
		$query =
		"SELECT
			*
		FROM ae_word";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}

	//Все разделы сайта
	function selectAllSections(){
		global $db;
		$query =
		"SELECT
			se.*,
			(SELECT COUNT(*) FROM ae_subsection WHERE id_section = se.id AND hide = 0) as count_subsection,
			(SELECT COUNT(*) FROM ae_user WHERE id_section = se.id AND hide = 0) as count_user
		FROM ae_section se
		WHERE se.hide = 0
		ORDER BY se.priority ASC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
  
  	//Все разделы сайта + Скрытые 
	function selectAllSectionsHide(){
		global $db;
		$query =
		"SELECT
			se.*,
			(SELECT COUNT(*) FROM ae_subsection WHERE id_section = se.id AND hide = 0) as count_subsection,
			(SELECT COUNT(*) FROM ae_user WHERE id_section = se.id AND hide = 0) as count_user
		FROM ae_section se
		ORDER BY se.priority ASC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
  
  
    	//Все разделы сайта + Скрытые (только Department)
	function selectAllSectionsDepartmentHide(){
		global $db;
		$query =
		"SELECT
			se.*,
			(SELECT COUNT(*) FROM ae_subsection WHERE id_section = se.id AND hide = 0) as count_subsection,
			(SELECT COUNT(*) FROM ae_user WHERE id_section = se.id AND hide = 0) as count_user
		FROM ae_section se
    WHERE type = 'department'
		ORDER BY se.priority ASC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}


	//Все подразделы сайта
	function selectAllSubsections(){
		global $db;
		$query =
		"SELECT
			su.id,
			su.id_section,
			su.id_author,
			su.priority,
			su.name_ru,
			su.name_en,
			se.mark
		FROM ae_subsection su
		INNER JOIN ae_section se ON se.id = su.id_section
		WHERE su.hide = 0
		ORDER BY
			se.priority ASC,
			su.priority ASC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
  
  
	//Все подразделы сайта + Скрытые 
	function selectAllSubsectionsHide(){
		global $db;
		$query =
		"SELECT
			su.id,
			su.id_section,
			su.id_author,
			su.priority,
			su.name_ru,
			su.name_en,
			su.type,
			se.mark,
			su.hide
		FROM ae_subsection su
		INNER JOIN ae_section se ON se.id = su.id_section
		ORDER BY
			se.priority ASC,
			su.priority ASC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
  

	//Один раздел сайта
	function selectSection($idSection){
		global $db;
		$query =
		"SELECT
			id,
			id_author,
			priority,
			name_ru,
			name_en,
			page_header_ru,
			page_header_en,
			description_ru,
			description_en,
			user,
			closed,
			mark,
      doc_sort,
      type
		FROM ae_section
		WHERE
			hide = 0
		AND
			id = ?";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idSection);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
	//Один подраздел сайта
	function selectSubsection($idSubsection){
		global $db;
		$query =
		"SELECT
			su.id,
			su.id_section,
			su.id_author,
			su.priority,
			su.name_ru,
			su.name_en,
			su.doc_sort,
      su.type,
			se.mark,
			se.name_ru as section_name_ru,
			se.name_en as section_name_en
		FROM ae_subsection su
		INNER JOIN ae_section se ON se.id = su.id_section
		WHERE
			su.hide = 0
		AND
			su.id = ?";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idSubsection);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//Пользователь который вошел в систему
	function selectUserСurrent($login, $pass){
		global $db;
		$query =
		"SELECT
			u.id,
			u.id_author,
			u.id_section,
			u.id_rank,
			u.id_crew,
			u.team,
			u.login,
			u.pass,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			u.address_ru,
			u.address_en,
			u.mail,
			u.phone,
			u.phone_corp,
			u.remark,
			u.date_birth,
			u.date_replace,
			u.date_create,
			u.date_entered,
			u.number_retries,
			u.hide,
			u.permission,
			u.extension,
			s.mark,
			(SELECT date_end FROM ae_doc WHERE id_user = u.id AND hide = 0 AND date_end < NOW() + INTERVAL 60 DAY ORDER BY date_end ASC LIMIT 1) as date_end_doc,
			(SELECT date_end FROM ae_doc_sent WHERE id_user = u.id AND date_studied = 0 AND hide = 0 ORDER BY date_end ASC LIMIT 1) as date_end_sent_doc,
			(SELECT COUNT(*) FROM ae_doc_sent WHERE id_user = u.id AND hide = 0 AND date_studied = 0) as count_not_studied_doc
		FROM ae_user u
		INNER JOIN ae_section s ON s.id = u.id_section
		WHERE
			u.login = ?
		AND
			u.pass = ?
		AND
			u.hide = 0";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ss", $login, $pass);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  
  
  	//Все пользователи департамента
	function selectAllUserDivisionDepartment($idSection){
		global $db;
		$query =
		"SELECT
          du.id,
          du.id_user,
          du.id_rank,
          du.id_news,
          du.priority,
          u.id_section,
          u.name_ru,
          u.name_en,
          u.last_name_ru,
          u.last_name_en,
          u.first_name_ru,
          u.first_name_en,
          u.address_ru,
          u.address_en,
          u.mail,
          u.mail_2,
          u.skype,
          u.phone,
          u.phone_corp,
          u.extension,
          r.name_ru as rank_ru,
          r.name_en as rank_en,
          c.name_ru as crew_ru,
          c.name_en as crew_en
		FROM ae_division_user du
		INNER JOIN ae_user u ON u.id = du.id_user
		LEFT OUTER JOIN ae_rank r ON r.id = du.id_rank
		LEFT OUTER JOIN ae_crew c ON c.id = u.id_crew
		LEFT OUTER JOIN ae_news n ON n.id = u.id_news
		WHERE du.id_section = ? AND u.hide = 0 AND du.hide = 0
		ORDER BY
			n.priority ASC,
			du.priority ASC,
			r.priority ASC,
			u.last_name_ru ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idSection);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  
  
	//Пользователь который вошел в систему
	function selectUserСurrent1($login, $pass){
		global $db;
		$query =
		"SELECT
			u.id,
			u.id_author,
			u.id_section,
			u.id_rank,
			u.id_crew,
			u.team,
			u.login,
			u.pass,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			u.address_ru,
			u.address_en,
			u.mail,
			u.phone,
			u.phone_corp,
			u.remark,
			u.date_birth,
			u.date_replace,
			u.date_create,
			u.date_entered,
			u.number_retries,
			u.hide,
			u.permission,
			u.extension,
			s.mark,
			(SELECT date_end FROM ae_doc WHERE id_user = u.id AND hide = 0 AND date_end < NOW() + INTERVAL 60 DAY ORDER BY date_end ASC LIMIT 1) as date_end_doc,
			(SELECT date_end FROM ae_doc_sent WHERE id_user = u.id AND date_studied = 0 AND hide = 0 ORDER BY date_end ASC LIMIT 1) as date_end_sent_doc,
			(SELECT COUNT(*) FROM ae_doc_sent WHERE id_user = u.id AND hide = 0 AND date_studied = 0) as count_not_studied_doc
		FROM ae_user u
		INNER JOIN ae_section s ON s.id = u.id_section
		WHERE
			u.login = ?
		AND
			u.pass = ?
		AND
			u.hide = 0";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ss", $login, $pass);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  

	//Все пользователи
	function selectAllUser(){
		global $db;
		$query =
		"SELECT
			u.*,
			s.mark,
			s.name_ru as section_ru,
			s.name_en as section_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en,
			r.manager,
			c.name_ru as crew_ru,
			c.name_en as crew_en,
			c.location_ru,
			c.location_en,
			(SELECT date_end FROM ae_doc WHERE date_end <> 0 AND hide = 0 AND id_user = u.id AND date_end < NOW() + INTERVAL 60 DAY ORDER BY date_end ASC LIMIT 1) as date_end_doc,
			(SELECT date_studied FROM ae_doc_sent WHERE id_user = u.id AND date_studied = 0 AND hide = 0 ORDER BY date_studied ASC LIMIT 1) as date_studied_doc
		FROM ae_user u
		LEFT OUTER JOIN ae_section s ON s.id = u.id_section
		LEFT OUTER JOIN ae_rank r ON r.id = u.id_rank
		LEFT OUTER JOIN ae_crew c ON c.id = u.id_crew
		ORDER BY
			u.hide ASC,
			u.id_section ASC,
			c.id ASC,
			r.priority ASC,
			u.date_create DESC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
  
  
	//Все пользователи - упорядочить по имени, не показывать скрытых
	function selectAllUserSortLastNameNoHide(){
		global $db;
		$query =
		"SELECT
			u.id,
			u.id as id_user,
			u.id_author,
			u.id_section,
			u.id_rank,
			u.id_crew,
			u.team,
			u.login,
			u.pass,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			u.address_ru,
			u.address_en,
			u.mail,
			u.mail_2,
			u.skype,
			u.phone,
			u.phone_corp,
			u.remark,
			u.date_birth,
			u.date_replace,
			u.date_create,
			u.date_entered,
			u.number_retries,
			u.hide,
			u.permission,
			s.mark,
			s.name_ru as section_ru,
			s.name_en as section_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en,
			r.manager,
			c.name_ru as crew_ru,
			c.name_en as crew_en,
			c.location_ru,
			c.location_en,
			(SELECT date_end FROM ae_doc WHERE hide = 0 AND id_user = u.id AND date_end < NOW() + INTERVAL 60 DAY ORDER BY date_end ASC LIMIT 1) as date_end_doc,
			(SELECT date_studied FROM ae_doc_sent WHERE id_user = u.id AND date_studied = 0 AND hide = 0 ORDER BY date_studied ASC LIMIT 1) as date_studied_doc
		FROM ae_user u
		LEFT OUTER JOIN ae_section s ON s.id = u.id_section
		LEFT OUTER JOIN ae_rank r ON r.id = u.id_rank
		LEFT OUTER JOIN ae_crew c ON c.id = u.id_crew
		WHERE u.hide = 0
		ORDER BY
			u.last_name_ru ASC,
			u.id_section ASC,
			c.id ASC,
			r.priority ASC,
			u.date_create DESC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
  
  
  
	//Все пользователи Контроль
	function selectAllUserControl($idSection){
		global $db;
		$query =
		"SELECT
			u.id,
			u.id as id_user,
			u.id_author,
			u.id_section,
			u.id_rank,
			u.id_crew,
			u.team,
			u.login,
			u.pass,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			u.address_ru,
			u.address_en,
			u.mail,
			u.phone,
			u.phone_corp,
			u.remark,
			u.date_birth,
			u.date_replace,
			u.date_create,
			u.date_entered,
			u.number_retries,
			u.hide,
			u.permission,
			s.mark,
			s.name_ru as section_ru,
			s.name_en as section_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en,
			r.manager,
			c.name_ru as crew_ru,
			c.name_en as crew_en,
			c.location_ru,
			c.location_en,
        (SELECT 
          date_end
         FROM ae_doc
         WHERE 
          id_section = ? 
         AND
          date_end <> 0
         AND 
          hide = 0
         AND 
          id_user = u.id 
         AND date_end < NOW() + INTERVAL 60 DAY
         ORDER BY date_end ASC 
         LIMIT 1) as date_end_doc,
        (SELECT 
          sent.date_studied
         FROM ae_doc_sent sent
         INNER JOIN ae_user user ON user.id = sent.id_author
         WHERE 
          user.id_section = ?
         AND 
          sent.date_studied = 0
         AND 
          sent.id_user = u.id 
         AND 
          sent.hide = 0
         LIMIT 1) as date_studied_doc
		FROM ae_user u
		LEFT OUTER JOIN ae_section s ON s.id = u.id_section
		LEFT OUTER JOIN ae_rank r ON r.id = u.id_rank
		LEFT OUTER JOIN ae_crew c ON c.id = u.id_crew
		ORDER BY
			u.hide ASC,
			u.id_section ASC,
			c.id ASC,
			r.priority ASC,
			u.date_create DESC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $idSection, $idSection);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//Один пользователь
	function selectUser($idUser){
		global $db;
		$query =
		"SELECT
			u.id,
			u.id_author,
			u.id_section,
			u.id_rank,
			u.id_crew,
			u.team,
			u.login,
			u.pass,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			u.address_ru,
			u.address_en,
			u.mail,
			u.mail_2,
			u.skype,
			u.additional_info,
			u.phone,
			u.phone_corp,
			u.remark,
			u.date_birth,
			u.date_replace,
			u.date_create,
			u.date_entered,
			u.number_retries,
			u.extension,
			u.hide,
			u.permission,
			s.mark,
			r.name_ru as rank_ru,
			r.name_en as rank_en,
			c.name_ru as crew_ru,
			c.name_en as crew_en
		FROM ae_user u
		LEFT OUTER JOIN ae_section s ON s.id = u.id_section
		LEFT OUTER JOIN ae_rank r ON r.id = u.id_rank
		LEFT OUTER JOIN ae_crew c ON c.id = u.id_crew
		WHERE u.id = ?";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idUser);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ПОЛЬЗОВАТЕЛИ КВС и Ст.КВС
	function selectAllUserPIC(){
		global $db;
		$query =
		"SELECT
			u.id,
			u.id_author,
			u.id_section,
			u.id_rank,
			u.id_crew,
			u.team,
			u.login,
			u.pass,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			u.address_ru,
			u.address_en,
			u.mail,
			u.phone,
			u.phone_corp,
			u.remark,
			u.date_birth,
			u.date_replace,
			u.date_create,
			u.date_entered,
			u.number_retries,
			u.hide,
			u.permission,
			s.mark,
			r.name_ru as rank_ru,
			r.name_en as rank_en,
			r.manager,
			c.name_ru as crew_ru,
			c.name_en as crew_en,
			c.location_ru,
			c.location_en
		FROM ae_user u
		LEFT OUTER JOIN ae_section s ON s.id = u.id_section
		LEFT OUTER JOIN ae_rank r ON r.id = u.id_rank
		LEFT OUTER JOIN ae_crew c ON c.id = u.id_crew
		WHERE
			u.hide = 0
		AND
			u.id_rank = 1
		OR
			u.id_rank = 2
		ORDER BY
			u.id_rank ASC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}

	//Количество попыток входа в систему
	function selectUserLogin($login){
		global $db;
		$query =
		"SELECT
			login,
			date_entered,
			number_retries
		FROM ae_user
		WHERE login = ? AND hide = 0";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "s", $login);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//Проверка логина при регистрации на уникальность
	function selectUserCheckLogin($login){
		global $db;
		$query =
		"SELECT
			login
		FROM ae_user
		WHERE login = ?";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "s", $login);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ВСЕ ДОЛЖНОСТИ
	function selectAllRank($idSection){
		global $db;
		$query =
		"SELECT
			id,
			id_section,
			id_author,
			name_ru,
			name_en,
			manager,
			date_create,
			priority,
			hide
		FROM ae_rank
		WHERE id_section = ? AND  hide = 0
		ORDER BY priority ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idSection);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ВСЕ ЭКИПАЖЫ
	function selectAllCrew(){
		global $db;
		$query =
		"SELECT
			c.id,
			c.id_section,
			c.id_author,
			c.name_ru,
			c.name_en,
			c.location_ru,
			c.location_en,
			c.priority,
			c.hide,
			(SELECT COUNT(*) FROM ae_user WHERE id_crew = c.id AND hide = 0) as count_user
		FROM ae_crew c
    WHERE c.hide = 0
		ORDER BY c.priority ASC, c.location_en ASC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
  
	//ВСЕ ЭКИПАЖЫ
	function selectAllCrewSection($idSection){
		global $db;
		$query =
		"SELECT
			c.id,
			c.id_section,
			c.id_author,
			c.name_ru,
			c.name_en,
			c.location_ru,
			c.location_en,
			c.priority,
			c.hide,
			(SELECT COUNT(*) FROM ae_user WHERE id_crew = c.id AND hide = 0 AND id_section = ?) as count_user,
      (SELECT COUNT(*) FROM ae_crew WHERE priority = c.priority AND hide = 0 AND id_section = ? AND count_user > 0) as count_priority
		FROM ae_crew c
    WHERE c.hide = 0
		ORDER BY c.priority ASC, c.id ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $idSection, $idSection);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  

	//ТИП ДОКУМЕНТА
	function selectAllTypeDoc($idSection, $idSubsection){
		global $db;
		$query =
		"SELECT
			id,
			id_section,
			id_subsection,
			id_author,
			name_ru,
			name_en,
			date_create,
			priority,
			hide
		FROM ae_doc_type
		WHERE
			id_section = ?
		AND
			id_subsection = ?
		AND
			hide = 0
		ORDER BY priority ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $idSection, $idSubsection);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  
    # Все документы отсортирование по дате
    function selectAllDocDateDoc($idUser, $idSection, $idSubsection, $idNews, $idBook, $page){
      $record = $page * 30;
      global $db;
      $query =
      "SELECT
      d.id,
      d.id_author,
      d.id_user,
      d.id_section,
      d.id_subsection,
      d.id_news,
      d.id_book,
      d.id_chapter,
      d.id_type,
      d.id_aircraft,
      d.name_ru,
      d.name_en,
      d.link,
      d.extension,
      d.month,
      d.date_create,
      d.date_uploads,
      d.date_doc,
      d.date_end,
      d.ip,
      d.user_agent,
      d.priority,
      d.hide,
      t.name_ru as type_ru,
      t.name_en as type_en,
      TO_DAYS(d.date_end) - TO_DAYS(NOW()) as days_left,
        (SELECT 
          COUNT(*)
          FROM ae_doc
          WHERE id_user = d.id_user
          AND id_section = d.id_section
          AND id_subsection = d.id_subsection
          AND id_news = d.id_news
          AND id_book = d.id_book
          AND hide = 0) as count_doc
      FROM ae_doc d
      LEFT OUTER JOIN ae_doc_type t ON t.id = d.id_type
      LEFT OUTER JOIN ae_chapter c ON c.id = d.id_chapter
      WHERE
        d.id_user = ?
      AND
        d.id_section = ?
      AND
        d.id_subsection = ?
      AND
        d.id_news = ?
      AND
        d.id_book = ?
      AND
        d.hide = 0
      ORDER BY
        d.date_doc DESC,
        d.priority DESC,
        d.name_ru ASC,
        d.date_uploads DESC
        LIMIT $record, 30";
      $stmt = mysqli_stmt_init($db);
      if(!mysqli_stmt_prepare($stmt, $query))
        return false;
      mysqli_stmt_bind_param($stmt, "iiiii", $idUser, $idSection, $idSubsection, $idNews, $idBook);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        $arr[] = $row;
      mysqli_stmt_close($stmt);
      return $arr;
    }
    
    # Все документы отсортирование по дате
    function selectAllDocDateUpload($idUser, $idSection, $idSubsection, $idNews, $idBook, $page){
      $record = $page * 30;
      global $db;
      $query =
      "SELECT
      d.id,
      d.id_author,
      d.id_user,
      d.id_section,
      d.id_subsection,
      d.id_news,
      d.id_book,
      d.id_chapter,
      d.id_type,
      d.id_aircraft,
      d.name_ru,
      d.name_en,
      d.link,
      d.extension,
      d.month,
      d.date_create,
      d.date_uploads,
      d.date_doc,
      d.date_end,
      d.ip,
      d.user_agent,
      d.priority,
      d.hide,
      t.name_ru as type_ru,
      t.name_en as type_en,
      TO_DAYS(d.date_end) - TO_DAYS(NOW()) as days_left,
        (SELECT 
          COUNT(*)
          FROM ae_doc
          WHERE id_user = d.id_user
          AND id_section = d.id_section
          AND id_subsection = d.id_subsection
          AND id_news = d.id_news
          AND id_book = d.id_book
          AND hide = 0) as count_doc
      FROM ae_doc d
      LEFT OUTER JOIN ae_doc_type t ON t.id = d.id_type
      LEFT OUTER JOIN ae_chapter c ON c.id = d.id_chapter
      WHERE
        d.id_user = ?
      AND
        d.id_section = ?
      AND
        d.id_subsection = ?
      AND
        d.id_news = ?
      AND
        d.id_book = ?
      AND
        d.hide = 0
      ORDER BY
        d.date_uploads DESC,
        d.priority DESC,
        d.name_ru ASC,
        d.date_uploads DESC
        LIMIT $record, 30";
      $stmt = mysqli_stmt_init($db);
      if(!mysqli_stmt_prepare($stmt, $query))
        return false;
      mysqli_stmt_bind_param($stmt, "iiiii", $idUser, $idSection, $idSubsection, $idNews, $idBook);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        $arr[] = $row;
      mysqli_stmt_close($stmt);
      return $arr;
    }
    
    # Все документы отсортирование по главам
    function selectAllDocСhapter($idUser, $idSection, $idSubsection, $idNews, $idBook, $page){
      $record = $page * 30;
      global $db;
      $query =
      "SELECT
      d.id,
      d.id_author,
      d.id_user,
      d.id_section,
      d.id_subsection,
      d.id_news,
      d.id_book,
      d.id_chapter,
      d.id_type,
      d.id_aircraft,
      d.name_ru,
      d.name_en,
      d.link,
      d.extension,
      d.month,
      d.date_create,
      d.date_uploads,
      d.date_doc,
      d.date_end,
      d.ip,
      d.user_agent,
      d.priority,
      d.hide,
      t.name_ru as type_ru,
      t.name_en as type_en,
      TO_DAYS(d.date_end) - TO_DAYS(NOW()) as days_left,
        (SELECT 
          COUNT(*)
          FROM ae_doc
          WHERE id_user = d.id_user
          AND id_section = d.id_section
          AND id_subsection = d.id_subsection
          AND id_news = d.id_news
          AND id_book = d.id_book
          AND hide = 0) as count_doc
      FROM ae_doc d
      LEFT OUTER JOIN ae_doc_type t ON t.id = d.id_type
      LEFT OUTER JOIN ae_chapter c ON c.id = d.id_chapter
      WHERE
        d.id_user = ?
      AND
        d.id_section = ?
      AND
        d.id_subsection = ?
      AND
        d.id_news = ?
      AND
        d.id_book = ?
      AND
        d.hide = 0
      ORDER BY
        c.priority DESC,
        d.priority DESC,
        d.name_ru ASC,
        d.date_doc DESC,
        d.date_uploads DESC
        LIMIT $record, 30";
      $stmt = mysqli_stmt_init($db);
      if(!mysqli_stmt_prepare($stmt, $query))
        return false;
      mysqli_stmt_bind_param($stmt, "iiiii", $idUser, $idSection, $idSubsection, $idNews, $idBook);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        $arr[] = $row;
      mysqli_stmt_close($stmt);
      return $arr;
    }
    
    # Все документы отсортирование по названию
    function selectAllDocName($idUser, $idSection, $idSubsection, $idNews, $idBook, $page){
      $record = $page * 30;
      global $db;
      $query =
      "SELECT
      d.id,
      d.id_author,
      d.id_user,
      d.id_section,
      d.id_subsection,
      d.id_news,
      d.id_book,
      d.id_chapter,
      d.id_type,
      d.id_aircraft,
      d.name_ru,
      d.name_en,
      d.link,
      d.extension,
      d.month,
      d.date_create,
      d.date_uploads,
      d.date_doc,
      d.date_end,
      d.ip,
      d.user_agent,
      d.priority,
      d.hide,
      t.name_ru as type_ru,
      t.name_en as type_en,
      TO_DAYS(d.date_end) - TO_DAYS(NOW()) as days_left,
        (SELECT 
          COUNT(*)
          FROM ae_doc
          WHERE id_user = d.id_user
          AND id_section = d.id_section
          AND id_subsection = d.id_subsection
          AND id_news = d.id_news
          AND id_book = d.id_book
          AND hide = 0) as count_doc
      FROM ae_doc d
      LEFT OUTER JOIN ae_doc_type t ON t.id = d.id_type
      LEFT OUTER JOIN ae_chapter c ON c.id = d.id_chapter
      WHERE
        d.id_user = ?
      AND
        d.id_section = ?
      AND
        d.id_subsection = ?
      AND
        d.id_news = ?
      AND
        d.id_book = ?
      AND
        d.hide = 0
      ORDER BY
        t.priority ASC,
        d.name_ru ASC,
        d.priority DESC,
        c.name_ru ASC,
        d.date_doc DESC,
        d.date_uploads DESC
        LIMIT $record, 30";
      $stmt = mysqli_stmt_init($db);
      if(!mysqli_stmt_prepare($stmt, $query))
        return false;
      mysqli_stmt_bind_param($stmt, "iiiii", $idUser, $idSection, $idSubsection, $idNews, $idBook);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        $arr[] = $row;
      mysqli_stmt_close($stmt);
      return $arr;
    }
    
    # Все документы отсортирование по названию
    function selectAllDocUser($idUser, $idSection, $idSubsection, $idNews, $idBook){
      global $db;
      $query =
      "SELECT
      d.id,
      d.id_author,
      d.id_user,
      d.id_section,
      d.id_subsection,
      d.id_news,
      d.id_book,
      d.id_chapter,
      d.id_type,
      d.id_aircraft,
      d.name_ru,
      d.name_en,
      d.link,
      d.extension,
      d.month,
      d.date_create,
      d.date_uploads,
      d.date_doc,
      d.date_end,
      d.ip,
      d.user_agent,
      d.priority,
      d.hide,
      t.name_ru as type_ru,
      t.name_en as type_en,
      TO_DAYS(d.date_end) - TO_DAYS(NOW()) as days_left,
        (SELECT 
          COUNT(*)
          FROM ae_doc
          WHERE id_user = d.id_user
          AND id_section = d.id_section
          AND id_subsection = d.id_subsection
          AND id_news = d.id_news
          AND id_book = d.id_book
          AND hide = 0) as count_doc
      FROM ae_doc d
      LEFT OUTER JOIN ae_doc_type t ON t.id = d.id_type
      LEFT OUTER JOIN ae_chapter c ON c.id = d.id_chapter
      WHERE
        d.id_user = ?
      AND
        d.id_section = ?
      AND
        d.id_subsection = ?
      AND
        d.id_news = ?
      AND
        d.id_book = ?
      AND
        d.hide = 0
      ORDER BY
        t.priority ASC,
        d.name_ru ASC,
        d.priority DESC,
        c.name_ru ASC,
        d.date_doc DESC,
        d.date_uploads DESC";
      $stmt = mysqli_stmt_init($db);
      if(!mysqli_stmt_prepare($stmt, $query))
        return false;
      mysqli_stmt_bind_param($stmt, "iiiii", $idUser, $idSection, $idSubsection, $idNews, $idBook);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        $arr[] = $row;
      mysqli_stmt_close($stmt);
      return $arr;
    }
    
    # Все документы отсортирование по приоритету
    function selectAllDocPriority($idUser, $idSection, $idSubsection, $idNews, $idBook, $page){
      $record = $page * 30;
      global $db;
      $query =
      "SELECT
      d.id,
      d.id_author,
      d.id_user,
      d.id_section,
      d.id_subsection,
      d.id_news,
      d.id_book,
      d.id_chapter,
      d.id_type,
      d.id_aircraft,
      d.name_ru,
      d.name_en,
      d.link,
      d.extension,
      d.month,
      d.date_create,
      d.date_uploads,
      d.date_doc,
      d.date_end,
      d.ip,
      d.user_agent,
      d.priority,
      d.hide,
      t.name_ru as type_ru,
      t.name_en as type_en,
      TO_DAYS(d.date_end) - TO_DAYS(NOW()) as days_left,
        (SELECT 
          COUNT(*)
          FROM ae_doc
          WHERE id_user = d.id_user
          AND id_section = d.id_section
          AND id_subsection = d.id_subsection
          AND id_news = d.id_news
          AND id_book = d.id_book
          AND hide = 0) as count_doc
      FROM ae_doc d
      LEFT OUTER JOIN ae_doc_type t ON t.id = d.id_type
      LEFT OUTER JOIN ae_chapter c ON c.id = d.id_chapter
      WHERE
        d.id_user = ?
      AND
        d.id_section = ?
      AND
        d.id_subsection = ?
      AND
        d.id_news = ?
      AND
        d.id_book = ?
      AND
        d.hide = 0
      ORDER BY
        d.priority DESC,
        d.name_ru ASC,
        c.name_ru ASC,
        d.date_doc DESC,
        d.date_uploads DESC
        LIMIT $record, 30";
      $stmt = mysqli_stmt_init($db);
      if(!mysqli_stmt_prepare($stmt, $query))
        return false;
      mysqli_stmt_bind_param($stmt, "iiiii", $idUser, $idSection, $idSubsection, $idNews, $idBook);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        $arr[] = $row;
      mysqli_stmt_close($stmt);
      return $arr;
    }
    
    # Все документы отсортирование по названию
    function selectAllDocNameNews($idUser, $idSection, $idSubsection, $idNews, $idBook, $page){
      global $db;
      $query =
      "SELECT
      d.id,
      d.id_author,
      d.id_user,
      d.id_section,
      d.id_subsection,
      d.id_news,
      d.id_book,
      d.id_chapter,
      d.id_type,
      d.id_aircraft,
      d.name_ru,
      d.name_en,
      d.link,
      d.extension,
      d.month,
      d.date_create,
      d.date_uploads,
      d.date_doc,
      d.date_end,
      d.ip,
      d.user_agent,
      d.priority,
      d.hide,
      t.name_ru as type_ru,
      t.name_en as type_en,
      TO_DAYS(d.date_end) - TO_DAYS(NOW()) as days_left,
        (SELECT 
          COUNT(*)
          FROM ae_doc
          WHERE id_user = d.id_user
          AND id_section = d.id_section
          AND id_subsection = d.id_subsection
          AND id_news = d.id_news
          AND id_book = d.id_book
          AND hide = 0) as count_doc
      FROM ae_doc d
      LEFT OUTER JOIN ae_doc_type t ON t.id = d.id_type
      LEFT OUTER JOIN ae_chapter c ON c.id = d.id_chapter
      WHERE
        d.id_user = ?
      AND
        d.id_section = ?
      AND
        d.id_subsection = ?
      AND
        d.id_news = ?
      AND
        d.id_book = ?
      AND
        d.hide = 0
      ORDER BY
        t.priority DESC,
        d.priority DESC,
        d.name_ru ASC,
        c.name_ru ASC,
        d.date_doc DESC,
        d.date_uploads DESC";
      $stmt = mysqli_stmt_init($db);
      if(!mysqli_stmt_prepare($stmt, $query))
        return false;
      mysqli_stmt_bind_param($stmt, "iiiii", $idUser, $idSection, $idSubsection, $idNews, $idBook);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        $arr[] = $row;
      mysqli_stmt_close($stmt);
      return $arr;
    }

  
	// Один документ для меню сортировки
	function selectDocMenuContent($idSection, $idSubsection, $idBook){
		global $db;
		$query =
		"SELECT
		d.id,
		d.id_author,
		d.id_user,
		d.id_section,
		d.id_subsection,
		d.id_news,
		d.id_book,
		d.id_chapter,
		d.id_type,
		d.id_aircraft,
		d.name_ru,
		d.name_en,
    d.link,
		d.extension,
		d.month,
		d.date_create,
		d.date_uploads,
		d.date_doc,
		d.date_end,
		d.ip,
		d.user_agent,
		d.priority,
		d.hide,
		t.name_ru as type_ru,
		t.name_en as type_en,
		TO_DAYS(d.date_end) - TO_DAYS(NOW()) as days_left
		FROM ae_doc d
		LEFT OUTER JOIN ae_doc_type t ON t.id = d.id_type
		LEFT OUTER JOIN ae_chapter c ON c.id = d.id_chapter
		WHERE
			d.id_user = 0
		AND
			d.id_section = ?
		AND
			d.id_subsection = ?
		AND
			d.id_book = ?
		AND
			d.hide = 0
		LIMIT 1";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iii", $idSection, $idSubsection, $idBook);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

  
	//ВСЕ ДОКУМЕНТЫ раздела Контроль
	function selectAllDocSectionControl($idSection, $page){
    $record = $page * 30;
		global $db;
		$query =
		"SELECT
		d.id,
		d.id_author,
		d.id_user,
		d.id_section,
		d.id_subsection,
		d.id_news,
		d.id_book,
		d.id_chapter,
		d.id_type,
		d.id_aircraft,
		d.name_ru,
		d.name_en,
    d.link,
		d.extension,
		d.month,
		d.date_create,
		d.date_uploads,
		d.date_doc,
		d.date_end,
		d.ip,
		d.user_agent,
		d.priority,
		d.hide,
		TO_DAYS(d.date_end) - TO_DAYS(NOW()) as days_left,
      (SELECT 
        COUNT(*)
        FROM ae_doc
        WHERE
          id_section = ?
        AND
          hide = 0
        AND
          date_end <> 0
        AND
          id_user = 0
        AND
          date_end < NOW() + INTERVAL 60 DAY) as count_doc
		FROM ae_doc d
		WHERE
			d.id_section = ?
    AND
			d.hide = 0
    AND
      d.date_end <> 0
    AND
      d.id_user = 0
    AND
      d.date_end < NOW() + INTERVAL 60 DAY
		ORDER BY
      d.date_end ASC, 
      d.name_ru ASC
      LIMIT $record, 30";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $idSection, $idSection);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  
  
	//ОДИН ДОКУМЕНТ
	function selectDoc($idDoc){
		global $db;
		$query =
		"SELECT
		d.id,
		d.id_author,
		d.id_user,
		d.id_section,
		d.id_subsection,
		d.id_news,
		d.id_book,
		d.id_chapter,
		d.id_type,
		d.id_aircraft,
		d.name_ru,
		d.name_en,
    d.link,
		d.extension,
		d.month,
		d.date_create,
		d.date_uploads,
		d.date_doc,
		d.date_end,
		d.ip,
		d.user_agent,
		d.priority,
		d.hide,
		t.name_ru as type_ru,
		t.name_en as type_en,
		s.mark as mark,
		s.type as type_section,
		b.name_ru as book_ru,
		b.name_en as book_en
		FROM ae_doc d
		LEFT OUTER JOIN ae_doc_type t ON t.id = d.id_type
		LEFT OUTER JOIN ae_section s ON s.id = d.id_section
		LEFT OUTER JOIN ae_book b ON b.id = d.id_book
		WHERE d.id = ?";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idDoc);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ДОКУМЕНТЫ - групировка по и годам
	function selectDocDateEnd(){
		global $db;
		$query =
		"SELECT
			id_user,
			date_end
		FROM ae_doc
		WHERE
			id_user > 0
		AND
			date_end < NOW() + INTERVAL 60 DAY
		ORDER BY
			id_section ASC,
			id_user ASC,
			date_end ASC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}

	//ДОКУМЕНТЫ - групировка по и годам
	function selectDocGroupYear($idUser, $idSection, $idSubsection, $idNews, $idBook, $idChapter, $idType){
		global $db;
		$query =
		"SELECT
		date_doc as date_doc
		FROM ae_doc
		WHERE
			id_user = ?
		AND
			id_section = ?
		AND
			id_subsection = ?
		AND
			id_news = ?
		AND
			id_book = ?
		AND
			id_chapter = ?
		AND
			id_type = ?
		AND
			hide = 0
		AND
			date_doc > 0
		GROUP BY YEAR(date_doc)
		ORDER BY
			date_doc DESC,
			name_ru ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iiiiiii", $idUser, $idSection, $idSubsection, $idNews, $idBook, $idChapter, $idType);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ДОКУМЕНТЫ - групировка по и годам + Скрытые
	function selectDocGroupYearHide($idUser, $idSection, $idSubsection, $idNews, $idBook, $idChapter, $idType){
		global $db;
		$query =
		"SELECT
		date_doc as date_doc
		FROM ae_doc
		WHERE
			id_user = ?
		AND
			id_section = ?
		AND
			id_subsection = ?
		AND
			id_news = ?
		AND
			id_book = ?
		AND
			id_chapter = ?
		AND
			id_type = ?
		AND
			date_doc > 0
		GROUP BY YEAR(date_doc)
		ORDER BY
			date_doc DESC,
			name_ru ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iiiiiii", $idUser, $idSection, $idSubsection, $idNews, $idBook, $idChapter, $idType);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ДОКУМЕНТЫ - групировка по месяцам
	function selectDocGroupMonth($idSection, $idSubsection, $idBook){
		global $db;
		$query =
		"SELECT
		date_doc
		FROM ae_doc
		WHERE
			id_user = 0
		AND
			id_section = ?
		AND
			id_subsection = ?
		AND
			id_book = ?
		AND
			hide = 0
		GROUP BY DATE_FORMAT(date_doc, '%Y-%m')
		ORDER BY
			date_doc DESC,
			name_ru ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iii", $idSection, $idSubsection, $idBook);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  
	//ДОКУМЕНТЫ - групировка по месяцам - дата загрузки
	function selectDocGroupMonthUpload($idSection, $idSubsection, $idBook){
		global $db;
		$query =
		"SELECT
		date_uploads
		FROM ae_doc
		WHERE
			id_user = 0
		AND
			id_section = ?
		AND
			id_subsection = ?
		AND
			id_book = ?
		AND
			hide = 0
		GROUP BY DATE_FORMAT(date_uploads, '%Y-%m')
		ORDER BY
			date_uploads DESC,
			name_ru ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iii", $idSection, $idSubsection, $idBook);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ДОКУМЕНТЫ - групировка по месяцам + Скрытые
	function selectDocGroupMonthHide($idUser, $idSection, $idSubsection, $idNews, $idBook, $idChapter, $idType, $year){
		global $db;
		$query =
		"SELECT
		date_doc as date_doc
		FROM ae_doc
		WHERE
			id_user = ?
		AND
			id_section = ?
		AND
			id_subsection = ?
		AND
			id_news = ?
		AND
			id_book = ?
		AND
			id_chapter = ?
		AND
			id_type = ?
		AND
			YEAR(date_doc) = ?
		GROUP BY MONTH(date_doc)
		ORDER BY
			date_doc DESC,
			name_ru ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iiiiiiii", $idUser, $idSection, $idSubsection, $idNews, $idBook, $idChapter, $idType, $year);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}


	//ВСЕ КНИГИ
	function selectAllBook($idSection, $idSubsection){
		global $db;
		$query =
		"SELECT
			b.id,
			b.id_author,
			b.id_section,
			b.id_subsection,
			b.name_ru,
			b.name_en,
			b.doc_sort,
			b.date_create,
			b.ip,
			b.user_agent,
			b.priority,
			(SELECT 
        COUNT(*)
        FROM ae_book
        WHERE
          id_section = ?
        AND
          id_subsection = ?
        AND
          hide = 0) as count_book,
			u.name_ru as user_name_ru,
			u.name_en as user_name_en,
			u.last_name_ru as user_last_name_ru,
			u.last_name_en as user_last_name_en,
			u.first_name_ru as user_first_name_ru,
			u.first_name_en as user_first_name_en
		FROM ae_book b
		LEFT OUTER JOIN ae_user u ON u.id = b.id_author
		WHERE
			b.id_section = ?
		AND
			b.id_subsection = ?
		AND
			b.hide = 0
		ORDER BY
			b.priority DESC,
			b.name_ru ASC,
      b.date_create DESC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iiii", $idSection, $idSubsection, $idSection, $idSubsection);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ОДНА КНИГА
	function selectBook($idBook){
		global $db;
		$query =
		"SELECT
			b.id,
			b.id_author,
			b.id_section,
			b.id_subsection,
			b.name_ru,
			b.name_en,
			b.date_create as date_create,
			b.ip,
			b.user_agent,
			b.priority,
			b.hide,
			b.doc_sort,
			s.mark
		FROM ae_book b
		INNER JOIN ae_section s ON s.id = b.id_section
		WHERE b.id = ?";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idBook);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ВСЕ ГЛАВЫ
	function selectAllChapter($idSectin, $idSubsection, $idBook){
		global $db;
		$query =
		"SELECT
			id,
			id_author,
			id_section,
			id_subsection,
			id_book,
			name_ru,
			name_en,
			date_create,
			ip,
			user_agent,
			priority,
			hide
		FROM ae_chapter
		WHERE
			id_book = ?
		AND
			id_section = ?
		AND
			id_subsection = ?
		AND
			hide = 0
		ORDER BY
			priority DESC,
			name_ru ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iii", $idBook, $idSectin, $idSubsection);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ОДНА ГЛАВА
	function selectChapter($idChapter){
		global $db;
		$query =
		"SELECT
			c.id,
			c.id_author,
			c.id_section,
			c.id_subsection,
			c.id_book,
			c.name_ru,
			c.name_en,
			c.date_create as date_create,
			c.ip,
			c.user_agent,
			c.priority,
			c.hide,
			s.mark
		FROM ae_chapter c
		INNER JOIN ae_section s ON s.id = c.id_section
		WHERE c.id = ?";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idChapter);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ОТПРАВЛЕННЫЕ ДОКУМЕНТЫ
	function selectSentDoc($idDoc, $page, $idSectionUser){
		$record = $page * 30;
		global $db;
		$query =
		"SELECT
			s.id,
			s.id_section_user,
			s.id_user,
			s.id_doc,
			s.date_sent,
			s.date_view,
			s.date_studied,
			s.date_end,
			s.ip,
			s.user_agent,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en,
			r.manager,
			c.name_ru as crew_ru,
			c.name_en as crew_en,
			c.location_ru,
			c.location_en,
			d.id_section,
			d.id_subsection,
      se.name_ru as section_ru,
      se.name_en as section_en,
      (SELECT COUNT(*) FROM ae_doc_sent WHERE id_doc = s.id_doc AND id_section_user = u.id_section AND hide = 0) as count_doc_sent
		FROM ae_doc_sent s
		LEFT OUTER JOIN ae_user u ON u.id = s.id_user
		LEFT OUTER JOIN ae_rank r ON r.id = u.id_rank
		LEFT OUTER JOIN ae_crew c ON c.id = u.id_crew
		LEFT OUTER JOIN ae_doc d ON d.id = s.id_doc
		LEFT OUTER JOIN ae_section se ON se.id = u.id_section
		WHERE
			s.id_doc = ?
		AND
			s.id_section_user = ?
		AND
			s.hide = 0
		ORDER BY
			s.date_sent DESC,
			c.id ASC,
			r.priority DESC
		LIMIT $record, 30";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $idDoc, $idSectionUser);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ОТПРАВЛЕННЫЕ ДОКУМЕНТЫ - групировка по одинаковым IP и USER AGENT
	function selectSentDocGroupIPUserAgent($idDoc, $idSectionUser){
		global $db;
		$query =
		"SELECT
			COUNT(*),
			id,
			id_section_user,
			id_user,
			id_doc,
			date_sent,
			date_view,
			date_studied,
			date_end,
			ip,
			user_agent
		FROM ae_doc_sent
		WHERE
			id_doc = ?
		AND
			id_section_user = ?
		AND
			ip > 0
    AND 
      hide = 0
		GROUP BY ip, user_agent
		ORDER BY date_sent DESC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $idDoc, $idSectionUser);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ОТПРАВЛЕННЫЕ ДОКУМЕНТЫ
	function selectSentDocDateStudiedSection($idSection){
		global $db;
		$query =
		"SELECT
			s.id,
			s.id_author,
			s.id_section_user,
			s.id_user,
			s.id_doc,
			s.date_sent,
			s.date_view,
			s.date_studied,
			s.date_end
		FROM ae_doc_sent s
		LEFT OUTER JOIN ae_user u ON u.id = s.id_author
		WHERE
			s.date_studied = 0
		AND
			u.id_section = ?
    AND
      s.hide = 0
		ORDER BY
			s.id_section_user ASC,
			s.id_user ASC,
			s.date_sent ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idSection);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ОТПРАВЛЕННЫЕ ДОКУМЕНТЫ
	function selectSentDocDateStudied(){
		global $db;
		$query =
		"SELECT
			id,
			id_author,
			id_section_user,
			id_user,
			id_doc,
			date_sent,
			date_view,
			date_studied,
			date_end
		FROM ae_doc_sent
		WHERE date_studied = 0 AND hide = 0
		ORDER BY
			id_section_user ASC,
			id_user ASC,
			date_sent ASC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}


	//ОТПРАВЛЕННЫЕ ДОКУМЕНТЫ - текущий документ
	function selectCurrentSentDoc($idDoc, $idUser){
		global $db;
		$query =
		"SELECT
			s.id,
			s.id_section_user,
			s.id_user,
			s.id_doc,
			s.date_sent,
			s.date_view,
			s.date_studied,
			s.date_end,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en,
			r.manager,
			c.name_ru as crew_ru,
			c.name_en as crew_en,
			c.location_ru,
			c.location_en,
			d.id_section
		FROM ae_doc_sent s
		LEFT OUTER JOIN ae_user u ON u.id = s.id_user
		LEFT OUTER JOIN ae_rank r ON r.id = u.id_rank
		LEFT OUTER JOIN ae_crew c ON c.id = u.id_crew
		LEFT OUTER JOIN ae_doc d ON d.id = s.id_doc
		WHERE
			s.id_doc = ?
		AND
			s.id_user = ?";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $idDoc, $idUser);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ОТПРАВЛЕННЫЕ ДОКУМЕНТЫ ПОЛЬЗОВАТЕЛЮ
	function selectSentDocUser($idUser, $page){
		$record = $page * 30;
		global $db;
		$query =
		"SELECT
			s.id,
			s.id_section_user,
			s.id_user,
			s.id_doc,
			s.date_sent,
			s.date_view,
			s.date_studied,
			s.date_end,
			d.name_ru,
			d.name_en,
			d.id_section,
			d.id_subsection,
			d.link as link_doc,
			d.extension,
			sec.name_ru as section_ru,
			sec.name_en as section_en,
			TO_DAYS(s.date_end) - TO_DAYS(NOW()) as days_left,
			(SELECT COUNT(*) FROM ae_doc_sent WHERE id_user = s.id_user AND hide = 0) as count_doc
		FROM ae_doc_sent s
		LEFT OUTER JOIN ae_doc d ON d.id = s.id_doc
		LEFT OUTER JOIN ae_section sec ON sec.id = d.id_section
		WHERE s.id_user = ? AND s.hide = 0
		ORDER BY s.date_sent DESC
		LIMIT $record, 30";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idUser);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ОТПРАВЛЕННЫЕ ДОКУМЕНТЫ ПОЛЬЗОВАТЕЛЮ
	function selectOneSentDoc($idSentDoc){
		global $db;
		$query =
		"SELECT
			*
		FROM ae_doc_sent
		WHERE id = ?";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idSentDoc);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ОТПРАВЛЕННЫЕ ДОКУМЕНТЫ ПОЛЬЗОВАТЕЛЮ - проверить наличие непрочитаных
	function selectSentDocUserNotStudied($idUser){
		global $db;
		$query =
		"SELECT
			id_user
		FROM ae_doc_sent
		WHERE
			id_user = ?
		AND
			date_studied = 0
    AND
      hide = 0
		LIMIT 1";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idUser);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}


	//ЗАДАНИЕ НА ПОЛЕТ
	function selectAllReportFlight($idFlightAssignment){
		global $db;
		$query =
		"SELECT
      r.id,
      r.id_author,
			r.id_flight_assignment,
			r.point_departure,
			r.point_arrival,
			r.number_flight,
			r.distance,
      r.time_landing,
      r.time_takeoff,
      r.time_night,
      r.time_job_ground,
      r.time_block_hours,
      r.time_hours_crew,
      r.fuel_balance,
      r.fuel_fueled,
      r.oil_balance,
      r.oil_fueled,
      r.weight_cargo,
			r.weight_passenger,
      r.centering_rise,
      r.centering_landing,
      r.takeoff_weight,
      r.landing_weight,
      r.echelon,
      r.date_shipping,
      r.date_create,
      r.ta_category,
      r.ta_airport,
    	r.ta_dn,
      r.ta_conditions,
      r.ta_mk_pos,
      r.ta_take_off_landing,
      r.ta_id_pilot,
      r.wt_time_preliminary_preparation,
      r.wt_time_post_flight_work,
      r.wt_time_parking,
      r.wt_time_recreation,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en
		FROM ae_flight_report r
    LEFT OUTER JOIN ae_user u ON u.id = r.ta_id_pilot
		WHERE r.id_flight_assignment = ? and r.hide = 0
		ORDER BY r.date_shipping ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idFlightAssignment);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  
  
	//ЗАДАНИЕ НА ПОЛЕТ
	function selectAllReportFlightMonthAll($date){
		global $db;
		$query =
		"SELECT
      *
		FROM ae_flight_report
		WHERE DATE_FORMAT(date_shipping, '%Y-%m') = DATE_FORMAT(?, '%Y-%m')
		ORDER BY date_shipping ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "s", $date);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	} 
  
  
  # Отчет по воздушным 
	function selectAllFlightConsolidatedReportAircraftYear($year, $idAircraft){
		global $db;
		$query =
		"SELECT
			SUM(r.distance) as distance,
      SUM(TIME_TO_SEC(r.time_flight)) as time_flight,
      SUM(TIME_TO_SEC(r.time_night)) as time_night,
      SUM(TIME_TO_SEC(r.time_job_ground)) as time_job_ground,
      SUM(TIME_TO_SEC(r.time_block_hours)) as time_block_hours,
      SUM(TIME_TO_SEC(r.time_hours_crew)) as time_hours_crew,
      SUM(r.weight_cargo) as weight_cargo,
			SUM(r.weight_passenger) as weight_passenger,
      SUM(r.landing_weight) as landing_weight,
      SUM(r.fuel_spent) as fuel_spent,
      SUM(r.oil_spent) as oil_spent,
      r.date_shipping,
      a.id_aircraft,
      SUM(a.weight_aircraft) as weight_aircraft,
      SUM(a.curb_weight_aircraft) as curb_weight_aircraft,
      air.name_ru,
      air.name_en,
      air.model,
      (SELECT 
        COUNT(*)
        FROM ae_flight_report
        WHERE 
          DATE_FORMAT(r.date_shipping, '%Y') = ?
        AND 
          r.hide = 0
        AND 
          a.id_aircraft = ?) as count_flight
		FROM ae_flight_report r
    INNER JOIN ae_flight_assignment a ON a.id = r.id_flight_assignment
    INNER JOIN ae_aircraft air ON air.id = a.id_aircraft
		WHERE 
      DATE_FORMAT(r.date_shipping, '%Y') = ?
    AND 
      r.hide = 0
    AND 
      a.id_aircraft = ?
    GROUP BY DATE_FORMAT(r.date_shipping, '%m') 
		ORDER BY r.date_shipping DESC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iiii", $year, $idAircraft, $year, $idAircraft);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	} 
 
        
  # Отчет по экипажам 
	function selectAllFlightConsolidatedReportCrewYear($year){
		global $db;
		$query =
		"SELECT
			fu.id_user,
			u.id_crew,
			u.id_section,
      SUM(TIME_TO_SEC(r.time_flight)) as time_flight,
      SUM(TIME_TO_SEC(r.time_night)) as time_night,
      SUM(TIME_TO_SEC(r.time_job_ground)) as time_job_ground,
      SUM(TIME_TO_SEC(r.time_block_hours)) as time_block_hours,
      SUM(TIME_TO_SEC(r.time_hours_crew)) as time_hours_crew,
      r.date_shipping
    FROM ae_flight_report r   
    INNER JOIN ae_flight_assignment a ON a.id = r.id_flight_assignment
    INNER JOIN ae_flight_user fu ON fu.id_flight_assignment = r.id_flight_assignment
    INNER JOIN ae_user u ON u.id = fu.id_user
    LEFT OUTER JOIN ae_section s ON s.id = u.id_section
    LEFT OUTER JOIN ae_rank rank ON rank.id = u.id_rank
    LEFT OUTER JOIN ae_crew c ON c.id = u.id_crew
    WHERE 
            DATE_FORMAT(r.date_shipping, '%Y') = ?
    AND 
        r.hide = 0
    AND 
        fu.hide = 0
    GROUP BY DATE_FORMAT(r.date_shipping, '%Y-%m'), fu.id_user
    ORDER BY 
            u.hide ASC,
            u.id_section ASC,
            c.priority ASC,
            c.id ASC,
            rank.priority ASC,
            u.date_create DESC,
            fu.id_user DESC,
            r.date_shipping ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $year);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	} 
        
        
  # Отчет по экипажам Групировка по пользователям
	function selectAllFlightConsolidatedReportCrewYearGroupUsers($year){
		global $db;
		$query =
		"SELECT
			fu.id_user,
			u.id_crew,
			u.id_section,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			rank.name_ru as rank_ru,
			rank.name_en as rank_en,
      SUM(TIME_TO_SEC(r.time_flight)) as time_flight,
      SUM(TIME_TO_SEC(r.time_night)) as time_night,
      SUM(TIME_TO_SEC(r.time_job_ground)) as time_job_ground,
      SUM(TIME_TO_SEC(r.time_block_hours)) as time_block_hours,
      SUM(TIME_TO_SEC(r.time_hours_crew)) as time_hours_crew,
      r.date_shipping
    FROM ae_flight_report r   
    INNER JOIN ae_flight_assignment a ON a.id = r.id_flight_assignment
    INNER JOIN ae_flight_user fu ON fu.id_flight_assignment = r.id_flight_assignment
    INNER JOIN ae_user u ON u.id = fu.id_user
    LEFT OUTER JOIN ae_section s ON s.id = u.id_section
    LEFT OUTER JOIN ae_rank rank ON rank.id = u.id_rank
    LEFT OUTER JOIN ae_crew c ON c.id = u.id_crew
    WHERE 
            DATE_FORMAT(r.date_shipping, '%Y') = ?
    AND 
        r.hide = 0
    AND 
        fu.hide = 0
    GROUP BY fu.id_user
    ORDER BY 
            u.hide ASC,
            u.id_section ASC,
            c.priority ASC,
            c.id ASC,
            rank.priority ASC,
            u.date_create DESC,
            fu.id_user DESC,
            r.date_shipping ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $year);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	} 


	//ЗАДАНИЕ НА ПОЛЕТ (проверка существуещего)
	function selectAssignmentFlightCheck($idAircraft, $numberAssignment, $yearDeparture){
		global $db;
		$query =
		"SELECT
			id
		FROM ae_flight_assignment
		WHERE
			id_aircraft = ?
		AND
			number_assignment = ?
		AND
			DATE_FORMAT(date_departure, '%Y') = ?
    AND
      hide = 0";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iii", $idAircraft, $numberAssignment, $yearDeparture);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ЗАДАНИЕ НА ПОЛЕТ (проверка существуещего)
	function selectAssignmentFlightCheckUpdate($idFlightAssignment, $idAircraft, $numberAssignment, $yearDeparture){
		global $db;
		$query =
		"SELECT
			id
		FROM ae_flight_assignment
		WHERE
			id <> ?
		AND
			id_aircraft = ?
		AND
			number_assignment = ?
		AND
			DATE_FORMAT(date_departure, '%Y') = ?
    AND
      hide = 0";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iiii", $idFlightAssignment, $idAircraft, $numberAssignment, $yearDeparture);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//АБ-График рейсойв групировка по году
	function selectFlightGroupYear(){
		global $db;
		$query =
		"SELECT
			a.date_departure
		FROM ae_flight_user u
		INNER JOIN ae_flight_assignment a ON a.id = u.id_flight_assignment
		WHERE u.report_as > 0
		GROUP BY DATE_FORMAT(a.date_departure, '%Y')
		ORDER BY a.date_departure DESC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}

	//АБ-График рейсойв групировка по году и месяцу
	function selectFlightGroupYearMonth($year){
		global $db;
		$query =
		"SELECT
			fu.id,
			fu.id_user,
			fa.id_aircraft,
			fu.report_as,
			fu.report_flight,
			fa.id_author,
			fa.id_pic_a,
			fa.id_pic_r,
			fa.id_navigator_r,
			fa.id_rank_author,
			fa.id_rank_pic_a,
			fa.id_rank_pic_r,
			fa.id_rank_navigator_r,
			fa.remark_navigator_r,
			fa.remark_pic_r,
			fa.remark_manager_flight_r,
			fa.date_manager_flight_a,
			fa.date_pic_a,
			fa.date_not_edit_a,
			fa.date_navigator_r,
			fa.date_pic_r,
			fa.date_manager_flight_r,
			fa.date_not_edit_r,
			fa.date_departure,
			fa.date_arrival,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en,
			c.name_ru as crew_ru,
			c.name_en as crew_en,
			d.id as id_doc,
			d.id_section,
			d.id_subsection,
			d.name_ru as doc_ru,
			d.name_en as doc_en,
			d.date_uploads,
			d.date_doc
		FROM ae_flight_user fu
		INNER JOIN ae_flight_assignment fa ON fa.id = fu.id_flight_assignment
		LEFT OUTER JOIN ae_user u ON u.id = fu.id_user
		LEFT OUTER JOIN ae_rank r ON r.id = fu.id_rank
		LEFT OUTER JOIN ae_crew c ON c.id = fa.id_crew
		LEFT OUTER JOIN ae_doc d ON
			DATE_FORMAT(d.date_doc, '%Y-%m') = DATE_FORMAT(fa.date_departure, '%Y-%m')
		AND
			d.id_author = fu.id_user
		AND
			d.id_aircraft = fa.id_aircraft
		WHERE
			DATE_FORMAT(fa.date_departure, '%Y') = ?
		AND
			fu.report_as > 0
		GROUP BY fu.id_user, fa.id_aircraft, DATE_FORMAT(fa.date_departure, '%Y-%m')
		ORDER BY
			fa.date_departure DESC,
			fa.id_aircraft ASC,
			fu.id_user ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
		{
			printf("Errormessage: %s\n", mysqli_error($db));
			return false;
		}
		mysqli_stmt_bind_param($stmt, "i", $year);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//АБ-График рейсойв групировка по году и месяцу
	function selectAllDocReportPIC($year){
		global $db;
		$query =
		"SELECT
			d.id,
			d.id_author,
			d.id_section,
			d.id_subsection,
			d.id_aircraft,
			d.name_ru as doc_ru,
			d.name_en as doc_en,
			d.date_uploads,
			d.date_doc,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en,
			c.name_ru as crew_ru,
			c.name_en as crew_en
		FROM ae_doc d
		LEFT OUTER JOIN ae_user u ON u.id = d.id_author
		LEFT OUTER JOIN ae_rank r ON r.id = u.id_rank
		LEFT OUTER JOIN ae_crew c ON c.id = u.id_crew
		WHERE
			DATE_FORMAT(d.date_doc, '%Y') = ?
		AND
			d.id_aircraft > 0";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $year);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//АБ-График рейсойв групировка по году и месяцу
	function selectAllReportAS($page){
		$record = $page * 30;
		global $db;
		$query =
		"SELECT
			ras.id,
			ras.id_user,
			ras.id_aircraft,
			ras.report,
			ras.date_departure,
			ras.date_arrival,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en,
			c.name_ru as crew_ru,
			c.name_en as crew_en,
			a.name_ru as aircraft_ru,
			a.name_en as aircraft_en,
			a.model
		FROM ae_report_as ras
		LEFT OUTER JOIN ae_user u ON u.id = ras.id_user
		LEFT OUTER JOIN ae_rank r ON r.id = u.id_rank
		LEFT OUTER JOIN ae_crew c ON c.id = u.id_crew
		LEFT OUTER JOIN ae_aircraft a ON a.id = ras.id_aircraft
		ORDER BY
			ras.date_departure DESC,
			ras.id_aircraft ASC,
			ras.id_user ASC
		LIMIT $record, 30";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}


	//АБ-График рейсойв групировка по году
	function selectReportASGroupYear(){
		global $db;
		$query =
		"SELECT
			date_departure
		FROM ae_report_as
		WHERE report > 0
		GROUP BY DATE_FORMAT(date_departure, '%Y')
		ORDER BY date_departure DESC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}

	//АБ-График рейсойв групировка по году и месяцу
	function selectReportASGroupYearMonth($year){
		global $db;
		$query =
		"SELECT
			ras.id,
			ras.id_user,
			ras.id_aircraft,
			ras.report,
			ras.date_departure,
			ras.date_arrival,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en,
			c.name_ru as crew_ru,
			c.name_en as crew_en,
			d.id as id_doc,
			d.id_section,
			d.id_subsection,
			d.name_ru as doc_ru,
			d.name_en as doc_en,
			d.date_uploads,
			d.date_doc
		FROM ae_report_as ras
		LEFT OUTER JOIN ae_user u ON u.id = ras.id_user
		LEFT OUTER JOIN ae_rank r ON r.id = u.id_rank
		LEFT OUTER JOIN ae_crew c ON c.id = u.id_crew
		LEFT OUTER JOIN ae_doc d ON
			DATE_FORMAT(d.date_doc, '%Y-%m') = DATE_FORMAT(ras.date_departure, '%Y-%m')
		AND
			d.id_author = ras.id_user
		AND
			d.id_aircraft = ras.id_aircraft
		WHERE
			DATE_FORMAT(ras.date_departure, '%Y') = ?
		AND
			ras.report > 0
		GROUP BY ras.id_user, ras.id_aircraft, DATE_FORMAT(ras.date_departure, '%Y-%m')
		ORDER BY
			ras.date_departure DESC,
			ras.id_aircraft ASC,
			ras.id_user ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $year);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}



	// ЛС - ЗАДАНИЯ НА ПОЛЕТ
	function selectAllAssignmentFlightAircraft($page, $idAircraft){
		$record = $page * 30;
		global $db;
		$query =
		"SELECT
			fa.id,
			fa.id_author,
			fa.id_manager_f,
			fa.id_crew,
			fa.id_pic_a,
			fa.id_pic_r,
			fa.id_navigator_r,
			fa.id_rank_manager_f,
			fa.id_rank_pic_a,
			fa.id_rank_pic_r,
			fa.id_rank_navigator_r,
			fa.id_aircraft,
			fa.number_assignment,
			fa.subnumber_assignment,
			fa.number_flight,
			fa.purpose_flight_ru,
			fa.purpose_flight_en,
			fa.route_flight_ru,
			fa.route_flight_en,
			fa.weight_cargo,
			fa.weight_aircraft,
			fa.remark_navigator_r,
			fa.remark_pic_r,
			fa.remark_manager_flight_r,
			fa.date_manager_flight_a,
			fa.date_pic_a,
			fa.date_not_edit_a,
			fa.date_navigator_r,
			fa.date_pic_r,
			fa.date_manager_flight_r,
			fa.date_not_edit_r,
			fa.date_departure,
			fa.date_arrival,
			fa.date_create,
			a.name_ru as aircraft_ru,
			a.name_en as aircraft_en,
			a.model,
			u.id_section,
			u.name_ru as pic_name_ru,
			u.name_en as pic_name_en,
			u.last_name_ru as pic_last_name_ru,
			u.last_name_en as pic_last_name_en,
			u.first_name_ru as pic_first_name_ru,
			u.first_name_en as pic_first_name_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en,
			uManagerF.id_section,
			uManagerF.name_ru as author_name_ru,
			uManagerF.name_en as author_name_en,
			uManagerF.last_name_ru as author_last_name_ru,
			uManagerF.last_name_en as author_last_name_en,
			uManagerF.first_name_ru as author_first_name_ru,
			uManagerF.first_name_en as author_first_name_en,
			rManagerF.name_ru as author_rank_ru,
			rManagerF.name_en as author_rank_en,
			uPicA.name_ru as pic_a_name_ru,
			uPicA.name_en as pic_a_name_en,
			uPicA.last_name_ru as pic_a_last_name_ru,
			uPicA.last_name_en as pic_a_last_name_en,
			uPicA.first_name_ru as pic_a_first_name_ru,
			uPicA.first_name_en as pic_a_first_name_en,
			rPicA.name_ru as pic_a_rank_ru,
			rPicA.name_en as pic_a_rank_en,
			uPicR.name_ru as pic_r_name_ru,
			uPicR.name_en as pic_r_name_en,
			uPicR.last_name_ru as pic_r_last_name_ru,
			uPicR.last_name_en as pic_r_last_name_en,
			uPicR.first_name_ru as pic_r_first_name_ru,
			uPicR.first_name_en as pic_r_first_name_en,
			rPicR.name_ru as pic_r_rank_ru,
			rPicR.name_en as pic_r_rank_en,
			uNavigatorR.name_ru as navigator_r_name_ru,
			uNavigatorR.name_en as navigator_r_name_en,
			uNavigatorR.last_name_ru as navigator_r_last_name_ru,
			uNavigatorR.last_name_en as navigator_r_last_name_en,
			uNavigatorR.first_name_ru as navigator_r_first_name_ru,
			uNavigatorR.first_name_en as navigator_r_first_name_en,
			rNavigatorR.name_ru as navigator_r_rank_ru,
			rNavigatorR.name_en as navigator_r_rank_en,
			c.name_ru as author_crew_ru,
			c.name_en as author_crew_en,
      (SELECT
        COUNT(DISTINCT number_assignment, DATE_FORMAT(date_departure, '%Y'), id_aircraft)
      FROM ae_flight_assignment
      WHERE hide = 0 AND id_aircraft = ?) as count_flight_assignment
		FROM ae_flight_assignment fa
		LEFT OUTER JOIN ae_aircraft a ON a.id = fa.id_aircraft
		LEFT OUTER JOIN ae_flight_user fu ON fu.id_flight_assignment = fa.id AND fu.report_flight = 1
		LEFT OUTER JOIN ae_user u ON u.id = fu.id_user
		LEFT OUTER JOIN ae_rank r ON r.id = u.id_rank
		LEFT OUTER JOIN ae_crew c ON c.id = fa.id_crew
		LEFT OUTER JOIN ae_user uManagerF ON uManagerF.id = fa.id_manager_f
		LEFT OUTER JOIN ae_rank rManagerF ON rManagerF.id = fa.id_rank_manager_f
		LEFT OUTER JOIN ae_user uPicA ON uPicA.id = fa.id_pic_a
		LEFT OUTER JOIN ae_rank rPicA ON rPicA.id = fa.id_rank_pic_a
		LEFT OUTER JOIN ae_user uPicR ON uPicR.id = fa.id_pic_r
		LEFT OUTER JOIN ae_rank rPicR ON rPicR.id = fa.id_rank_pic_r
		LEFT OUTER JOIN ae_user uNavigatorR ON uNavigatorR.id = fa.id_navigator_r
		LEFT OUTER JOIN ae_rank rNavigatorR ON rNavigatorR.id = fa.id_rank_navigator_r
    WHERE fa.hide = 0 AND fa.id_aircraft = ?
    GROUP BY fa.number_assignment, DATE_FORMAT(fa.date_departure, '%Y'), fa.id_aircraft
    ORDER BY fa.date_departure DESC
		LIMIT $record, 30";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "ii", $idAircraft, $idAircraft);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	// ЛС - ЗАДАНИЯ НА ПОЛЕТ
	function selectAllSubAssignmentFlight($numberFlightAssignment, $yearFlightAssignment, $idCrew){
		global $db;
		$query =
		"SELECT
			fa.id,
			fa.id_author,
			fa.id_crew,
			fa.id_pic_a,
			fa.id_pic_r,
			fa.id_navigator_r,
			fa.id_rank_author,
			fa.id_rank_pic_a,
			fa.id_rank_pic_r,
			fa.id_rank_navigator_r,
			fa.id_aircraft,
			fa.number_assignment,
			fa.subnumber_assignment,
			fa.number_flight,
			fa.purpose_flight_ru,
			fa.purpose_flight_en,
			fa.route_flight_ru,
			fa.route_flight_en,
			fa.weight_cargo,
			fa.weight_aircraft,
			fa.remark_navigator_r,
			fa.remark_pic_r,
			fa.remark_manager_flight_r,
			fa.date_manager_flight_a,
			fa.date_pic_a,
			fa.date_not_edit_a,
			fa.date_navigator_r,
			fa.date_pic_r,
			fa.date_manager_flight_r,
			fa.date_not_edit_r,
			fa.date_departure,
			fa.date_arrival,
			fa.date_create,
			a.name_ru as aircraft_ru,
			a.name_en as aircraft_en,
			a.model,
			uAuthor.id_section,
			uAuthor.name_ru as author_name_ru,
			uAuthor.name_en as author_name_en,
			uAuthor.last_name_ru as author_last_name_ru,
			uAuthor.last_name_en as author_last_name_en,
			uAuthor.first_name_ru as author_first_name_ru,
			uAuthor.first_name_en as author_first_name_en,
			rAuthor.name_ru as author_rank_ru,
			rAuthor.name_en as author_rank_en,
			uPicA.name_ru as pic_a_name_ru,
			uPicA.name_en as pic_a_name_en,
			uPicA.last_name_ru as pic_a_last_name_ru,
			uPicA.last_name_en as pic_a_last_name_en,
			uPicA.first_name_ru as pic_a_first_name_ru,
			uPicA.first_name_en as pic_a_first_name_en,
			rPicA.name_ru as pic_a_rank_ru,
			rPicA.name_en as pic_a_rank_en,
			uPicR.name_ru as pic_r_name_ru,
			uPicR.name_en as pic_r_name_en,
			uPicR.last_name_ru as pic_r_last_name_ru,
			uPicR.last_name_en as pic_r_last_name_en,
			uPicR.first_name_ru as pic_r_first_name_ru,
			uPicR.first_name_en as pic_r_first_name_en,
			rPicR.name_ru as pic_r_rank_ru,
			rPicR.name_en as pic_r_rank_en,
			uNavigatorR.name_ru as navigator_r_name_ru,
			uNavigatorR.name_en as navigator_r_name_en,
			uNavigatorR.last_name_ru as navigator_r_last_name_ru,
			uNavigatorR.last_name_en as navigator_r_last_name_en,
			uNavigatorR.first_name_ru as navigator_r_first_name_ru,
			uNavigatorR.first_name_en as navigator_r_first_name_en,
			rNavigatorR.name_ru as navigator_r_rank_ru,
			rNavigatorR.name_en as navigator_r_rank_en,
			c.name_ru as author_crew_ru,
			c.name_en as author_crew_en
		FROM ae_flight_assignment fa
		LEFT OUTER JOIN ae_aircraft a ON a.id = fa.id_aircraft
		LEFT OUTER JOIN ae_flight_user fu ON fu.id_flight_assignment = fa.id AND fu.report_flight = 1
		LEFT OUTER JOIN ae_user u ON u.id = fu.id_user
		LEFT OUTER JOIN ae_crew c ON c.id = fa.id_crew
		LEFT OUTER JOIN ae_user uAuthor ON uAuthor.id = fa.id_author
		LEFT OUTER JOIN ae_rank rAuthor ON rAuthor.id = fa.id_rank_author
		LEFT OUTER JOIN ae_user uPicA ON uPicA.id = fa.id_pic_a
		LEFT OUTER JOIN ae_rank rPicA ON rPicA.id = fa.id_rank_pic_a
		LEFT OUTER JOIN ae_user uPicR ON uPicR.id = fa.id_pic_r
		LEFT OUTER JOIN ae_rank rPicR ON rPicR.id = fa.id_rank_pic_r
		LEFT OUTER JOIN ae_user uNavigatorR ON uNavigatorR.id = fa.id_navigator_r
		LEFT OUTER JOIN ae_rank rNavigatorR ON rNavigatorR.id = fa.id_rank_navigator_r
		WHERE fa.number_assignment = ? AND DATE_FORMAT(fa.date_departure, '%Y') = ? AND fa.id_crew = ? AND fa.hide = 0
    ORDER BY fa.subnumber_assignment ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iii", $numberFlightAssignment, $yearFlightAssignment, $idCrew);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	// ЛС - ЗАДАНИЕ НА ПОЛЕТ
	function selectAssignmentFlight($idAssignmentFlight){
		global $db;
		$query =
		"SELECT
			f.id,
			f.id_author,
			f.id_manager_f,
			f.id_pic_a,
			f.id_pic_r,
			f.id_navigator_r,
			f.id_rank_manager_f,
			f.id_rank_pic_a,
			f.id_rank_pic_r,
			f.id_rank_navigator_r,
			f.id_aircraft,
			f.balance_fuel,
			f.balance_oil,
			f.number_assignment,
			f.subnumber_assignment,
			f.number_flight,
			f.date_departure,
			f.purpose_flight_ru,
			f.purpose_flight_en,
			f.route_flight_ru,
			f.route_flight_en,
			f.weight_cargo,
			f.weight_aircraft,
			f.centering_empty_aircraft,
			f.curb_weight_aircraft,
			f.pilot_admission,
			f.remark_navigator_r,
			f.remark_pic_r,
			f.remark_manager_flight_r,
			f.date_manager_flight_a,
			f.date_pic_a,
			f.date_not_edit_a,
			f.date_navigator_r,
			f.date_pic_r,
			f.date_manager_flight_r,
			f.date_not_edit_r,
			f.date_arrival,
			f.date_create,
			f.t2_airport_1_r,
			f.t2_airport_2_r,
			f.t2_airport_3_r,
			f.t2_category_1_r,
			f.t2_category_2_r,
			f.t2_category_3_r,
			f.t2_dn_1_r,
			f.t2_dn_2_r,
			f.t2_dn_3_r,
			f.t2_conditions_1_r,
			f.t2_conditions_2_r,
			f.t2_conditions_3_r,
			f.t2_mk_pos_1_r,
			f.t2_mk_pos_2_r,
			f.t2_mk_pos_3_r,
			f.t2_date_1_r,
			f.t2_date_2_r,
			f.t2_date_3_r,
            f.flight_weight,
			a.name_ru as aircraft_ru,
			a.name_en as aircraft_en,
			a.model,
			a.flight_weight as aircraft_flight_weight,
			a.weight_aircraft as aircraft_weight_aircraft,
			a.curb_weight_aircraft as aircraft_curb_weight_aircraft,
			a.centering_empty_aircraft as aircraft_centering_empty_aircraft,
			uManagerF.id_section,
			uManagerF.name_ru as manager_f_name_ru,
			uManagerF.name_en as manager_f_name_en,
			uManagerF.last_name_ru as manager_f_last_name_ru,
			uManagerF.last_name_en as manager_f_last_name_en,
			uManagerF.first_name_ru as manager_f_first_name_ru,
			uManagerF.first_name_en as manager_f_first_name_en,
			rManagerF.name_ru as manager_f_rank_ru,
			rManagerF.name_en as manager_f_rank_en,
			uPicA.name_ru as pic_a_name_ru,
			uPicA.name_en as pic_a_name_en,
			uPicA.last_name_ru as pic_a_last_name_ru,
			uPicA.last_name_en as pic_a_last_name_en,
			uPicA.first_name_ru as pic_a_first_name_ru,
			uPicA.first_name_en as pic_a_first_name_en,
			rPicA.name_ru as pic_a_rank_ru,
			rPicA.name_en as pic_a_rank_en,
			uPicR.name_ru as pic_r_name_ru,
			uPicR.name_en as pic_r_name_en,
			uPicR.last_name_ru as pic_r_last_name_ru,
			uPicR.last_name_en as pic_r_last_name_en,
			uPicR.first_name_ru as pic_r_first_name_ru,
			uPicR.first_name_en as pic_r_first_name_en,
			rPicR.name_ru as pic_r_rank_ru,
			rPicR.name_en as pic_r_rank_en,
			uNavigatorR.name_ru as navigator_r_name_ru,
			uNavigatorR.name_en as navigator_r_name_en,
			uNavigatorR.last_name_ru as navigator_r_last_name_ru,
			uNavigatorR.last_name_en as navigator_r_last_name_en,
			uNavigatorR.first_name_ru as navigator_r_first_name_ru,
			uNavigatorR.first_name_en as navigator_r_first_name_en,
			rNavigatorR.name_ru as navigator_r_rank_ru,
			rNavigatorR.name_en as navigator_r_rank_en,
			c.name_ru as author_crew_ru,
			c.name_en as author_crew_en
		FROM ae_flight_assignment f
		LEFT OUTER JOIN ae_aircraft a ON a.id = f.id_aircraft
		LEFT OUTER JOIN ae_crew c ON c.id = f.id_crew
		LEFT OUTER JOIN ae_user uManagerF ON uManagerF.id = f.id_manager_f
		LEFT OUTER JOIN ae_rank rManagerF ON rManagerF.id = f.id_rank_manager_f
		LEFT OUTER JOIN ae_user uPicA ON uPicA.id = f.id_pic_a
		LEFT OUTER JOIN ae_rank rPicA ON rPicA.id = f.id_rank_pic_a
		LEFT OUTER JOIN ae_user uPicR ON uPicR.id = f.id_pic_r
		LEFT OUTER JOIN ae_rank rPicR ON rPicR.id = f.id_rank_pic_r
		LEFT OUTER JOIN ae_user uNavigatorR ON uNavigatorR.id = f.id_navigator_r
		LEFT OUTER JOIN ae_rank rNavigatorR ON rNavigatorR.id = f.id_rank_navigator_r
		WHERE f.id = ? AND  f.hide = 0";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "i", $idAssignmentFlight);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}


	// ЛС - ЗАДАНИЕ НА ПОЛЕТ (по номеру задания)
	function selectCheckAssignmentFlight($numberAssignment, $subnumberAssignment, $idCrew, $dateDeparture){
		global $db;
		$query =
		"SELECT
			f.id,
			f.id_author,
			f.id_pic_a,
			f.id_pic_r,
			f.id_navigator_r,
			f.id_rank_author,
			f.id_rank_pic_a,
			f.id_rank_pic_r,
			f.id_rank_navigator_r,
			f.id_aircraft,
			f.number_assignment,
			f.subnumber_assignment,
			f.number_flight,
			f.purpose_flight_ru,
			f.purpose_flight_en,
			f.route_flight_ru,
			f.route_flight_en,
			f.weight_cargo,
			f.weight_aircraft,
			f.remark_navigator_r,
			f.remark_pic_r,
			f.remark_manager_flight_r,
			f.date_manager_flight_a,
			f.date_pic_a,
			f.date_not_edit_a,
			f.date_navigator_r,
			f.date_pic_r,
			f.date_manager_flight_r,
			f.date_not_edit_r,
			f.date_departure,
			f.date_arrival,
			f.date_create,
			a.name_ru as aircraft_ru,
			a.name_en as aircraft_en,
			a.model
		FROM ae_flight_assignment f
		LEFT OUTER JOIN ae_aircraft a ON a.id = f.id_aircraft
		WHERE f.number_assignment = ? AND f.subnumber_assignment = ? AND f.id_crew = ? AND DATE_FORMAT(f.date_departure, '%Y') = DATE_FORMAT(?, '%Y') AND f.hide = 0";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "ssis", $numberAssignment, $subnumberAssignment, $idCrew, $dateDeparture);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	// ЛС - ЗАДАНИЕ НА ПОЛЕТ (ПРЕДВАРИТЕЛЬНАЯ ПОДГОТОВКА)
	function selectCheckAssignmentFlightPreparing($numberAssignment, $idCrew, $dateDeparture){
		global $db;
		$query =
		"SELECT
			f.id,
			f.id_author,
			f.id_pic_a,
			f.id_pic_r,
			f.id_navigator_r,
			f.id_rank_author,
			f.id_rank_pic_a,
			f.id_rank_pic_r,
			f.id_rank_navigator_r,
			f.id_aircraft,
			f.number_assignment,
			f.subnumber_assignment,
			f.number_flight,
			f.purpose_flight_ru,
			f.purpose_flight_en,
			f.route_flight_ru,
			f.route_flight_en,
			f.weight_cargo,
			f.weight_aircraft,
			f.remark_navigator_r,
			f.remark_pic_r,
			f.remark_manager_flight_r,
			f.date_manager_flight_a,
			f.date_pic_a,
			f.date_not_edit_a,
			f.date_navigator_r,
			f.date_pic_r,
			f.date_manager_flight_r,
			f.date_not_edit_r,
			f.date_departure,
			f.date_arrival,
			f.date_create,
			a.name_ru as aircraft_ru,
			a.name_en as aircraft_en,
			a.model
		FROM ae_flight_assignment f
		LEFT OUTER JOIN ae_aircraft a ON a.id = f.id_aircraft
		WHERE f.number_assignment = ? AND f.id_crew = ? AND DATE_FORMAT(f.date_departure, '%Y') = DATE_FORMAT(?, '%Y') AND f.hide = 0";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "sis", $numberAssignment, $idCrew, $dateDeparture);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	// ЛС - Количество заданий на полет
	function selectCountRecordsAssignmentFlight(){
		global $db;
		$query =
		"SELECT
			COUNT(DISTINCT number_assignment, DATE_FORMAT(date_departure, '%Y'))
		FROM ae_flight_assignment
    WHERE hide = 0";
		if(!$result = mysqli_query($db, $query))
		{
			return false;
		}
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		$arr[0]['COUNT(*)'] = $arr[0]["COUNT(DISTINCT number_assignment, DATE_FORMAT(date_departure, '%Y'))"];
		$arr = $arr[0]['COUNT(*)'];
		return $arr;
	}

	// ЛС - ПОЛЬЗОВАТЕЛИ ОДНОГО ПОЛЕТА
	function selectAllUserFlight($idAssignmentFlight){
		global $db;
		$query =
		"SELECT
			fu.id,
			fu.id_user,
			fu.id_flight_assignment,
			fu.report_as,
      fu.id_rank as id_rank_user,
      fu.priority_f,
			fa.id_manager_f,
			fa.id_pic_a,
			fa.id_pic_r,
			fa.id_navigator_r,
			fa.id_rank_manager_f,
			fa.id_rank_pic_a,
			fa.id_rank_pic_r,
			fa.id_rank_navigator_r,
			fa.id_aircraft,
			fa.id_crew,
			fa.number_assignment,
			fa.number_flight,
			fa.remark_navigator_r,
			fa.remark_pic_r,
			fa.remark_manager_flight_r,
			fa.date_manager_flight_a,
			fa.date_pic_a,
			fa.date_not_edit_a,
			fa.date_navigator_r,
			fa.date_pic_r,
			fa.date_manager_flight_r,
			fa.date_not_edit_r,
			fa.date_departure,
			fa.date_arrival,
			u.id_section,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en,
			a.name_ru as aircraft_ru,
			a.name_en as aircraft_en,
			a.model
		FROM ae_flight_user fu
		INNER JOIN ae_flight_assignment fa ON fa.id = fu.id_flight_assignment
		INNER JOIN ae_user u ON u.id = fu.id_user
		INNER JOIN ae_rank r ON r.id = fu.id_rank
		INNER JOIN ae_aircraft a ON a.id = fa.id_aircraft
		WHERE fu.id_flight_assignment = ? AND fu.hide = 0
		ORDER BY fu.priority_f DESC, r.priority ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idAssignmentFlight);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	// ЛС - ПРЕДВАРИТЕЛЬНАЯ ПОДГОТОВКА
	function selectFlightPreparing($idAssignmentFlight){
		global $db;
		$query =
		"SELECT
			p.id,
			p.id_author,
			p.id_flight_assignment,
			p.id_manager_f,
			p.id_manager_e,
			p.id_navigator,
			p.id_sign_route_1,
			p.id_sign_route_2,
			p.id_sign_airport_a_1,
			p.id_sign_airport_a_2,
			p.id_sign_airport_b_1,
			p.id_sign_airport_b_2,
			p.id_sign_airport_c_1,
			p.id_sign_airport_c_2,
			p.id_crew,
			p.id_rank_manager_f,
			p.id_rank_manager_e,
			p.id_rank_navigator,
			p.id_rank_sign_route_1,
			p.id_rank_sign_route_2,
			p.id_rank_sign_airport_a_1,
			p.id_rank_sign_airport_a_2,
			p.id_rank_sign_airport_b_1,
			p.id_rank_sign_airport_b_2,
			p.id_rank_sign_airport_c_1,
			p.id_rank_sign_airport_c_2,
			p.number_assignment,
			p.number_flight_1,
			p.number_flight_2,
			p.number_flight_3,
			p.route_flight_1,
			p.route_flight_2,
			p.route_zar,
			p.components_route_1,
			p.components_route_2,
			p.components_airport_a_1,
			p.components_airport_a_2,
			p.components_airport_b_1,
			p.components_airport_b_2,
			p.components_airport_c_1,
			p.components_airport_c_2,
			p.remarks,
			p.date_manager_flight,
			p.date_manager_engineer,
			p.date_navigator,
			p.date_not_edit,
			p.date_departure,
			p.date_execution_1,
			p.date_execution_2,
			p.date_route_1,
			p.date_route_2,
			p.date_airport_a_1,
			p.date_airport_a_2,
			p.date_airport_b_1,
			p.date_airport_b_2,
			p.date_airport_c_1,
			p.date_airport_c_2,
			p.date_create,
			p.date_sign_route_1,
			p.date_sign_route_2,
			p.date_sign_airport_a_1,
			p.date_sign_airport_a_2,
			p.date_sign_airport_b_1,
			p.date_sign_airport_b_2,
			p.date_sign_airport_c_1,
			p.date_sign_airport_c_2,
			p.ip,
			p.user_agent,
			uManagerF.name_ru as manager_f_name_ru,
			uManagerF.name_en as manager_f_name_en,
			uManagerF.last_name_ru as manager_f_last_name_ru,
			uManagerF.last_name_en as manager_f_last_name_en,
			uManagerF.first_name_ru as manager_f_first_name_ru,
			uManagerF.first_name_en as manager_f_first_name_en,
			rManagerF.name_ru as manager_f_rank_ru,
			rManagerF.name_en as manager_f_rank_en,
			uManagerE.name_ru as manager_e_name_ru,
			uManagerE.name_en as manager_e_name_en,
			uManagerE.last_name_ru as manager_e_last_name_ru,
			uManagerE.last_name_en as manager_e_last_name_en,
			uManagerE.first_name_ru as manager_e_first_name_ru,
			uManagerE.first_name_en as manager_e_first_name_en,
			rManagerE.name_ru as manager_e_rank_ru,
			rManagerE.name_en as manager_e_rank_en,
			uNavigator.name_ru as navigator_name_ru,
			uNavigator.name_en as navigator_name_en,
			uNavigator.last_name_ru as navigator_last_name_ru,
			uNavigator.last_name_en as navigator_last_name_en,
			uNavigator.first_name_ru as navigator_first_name_ru,
			uNavigator.first_name_en as navigator_first_name_en,
			rNavigator.name_ru as navigator_rank_ru,
			rNavigator.name_en as navigator_rank_en
		FROM ae_flight_preparing p
		LEFT OUTER JOIN ae_user uManagerF ON uManagerF.id = p.id_manager_f
		LEFT OUTER JOIN ae_rank rManagerF ON rManagerF.id = p.id_rank_manager_f
		LEFT OUTER JOIN ae_user uManagerE ON uManagerE.id = p.id_manager_e
		LEFT OUTER JOIN ae_rank rManagerE ON rManagerE.id = p.id_rank_manager_e
		LEFT OUTER JOIN ae_user uNavigator ON uNavigator.id = p.id_navigator
		LEFT OUTER JOIN ae_rank rNavigator ON rNavigator.id = p.id_rank_navigator
		WHERE p.id_flight_assignment = ? AND p.hide = 0";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idAssignmentFlight);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	// ЛС - ПРЕДВАРИТЕЛЬНАЯ ПОДГОТОВКА по id
	function selectFlightPreparingId($idFlightPreparing){
		global $db;
		$query =
		"SELECT
			p.id,
			p.id_author,
			p.id_manager_e,
			p.id_navigator,
			p.id_sign_route_1,
			p.id_sign_route_2,
			p.id_sign_airport_a_1,
			p.id_sign_airport_a_2,
			p.id_sign_airport_b_1,
			p.id_sign_airport_b_2,
			p.id_sign_airport_c_1,
			p.id_sign_airport_c_2,
			p.id_crew,
			p.id_rank_manager_f,
			p.id_rank_manager_e,
			p.id_rank_navigator,
			p.id_rank_sign_route_1,
			p.id_rank_sign_route_2,
			p.id_rank_sign_airport_a_1,
			p.id_rank_sign_airport_a_2,
			p.id_rank_sign_airport_b_1,
			p.id_rank_sign_airport_b_2,
			p.id_rank_sign_airport_c_1,
			p.id_rank_sign_airport_c_2,
			p.number_assignment,
			p.number_flight_1,
			p.number_flight_2,
			p.number_flight_3,
			p.route_flight_1,
			p.route_flight_2,
			p.route_zar,
			p.components_route_1,
			p.components_route_2,
			p.components_airport_a_1,
			p.components_airport_a_2,
			p.components_airport_b_1,
			p.components_airport_b_2,
			p.components_airport_c_1,
			p.components_airport_c_2,
			p.remarks,
			p.date_manager_flight,
			p.date_manager_engineer,
			p.date_navigator,
			p.date_not_edit,
			p.date_departure,
			p.date_execution_1,
			p.date_execution_2,
			p.date_route_1,
			p.date_route_2,
			p.date_airport_a_1,
			p.date_airport_a_2,
			p.date_airport_b_1,
			p.date_airport_b_2,
			p.date_airport_c_1,
			p.date_airport_c_2,
			p.date_create,
			p.date_sign_route_1,
			p.date_sign_route_2,
			p.date_sign_airport_a_1,
			p.date_sign_airport_a_2,
			p.date_sign_airport_b_1,
			p.date_sign_airport_b_2,
			p.date_sign_airport_c_1,
			p.date_sign_airport_c_2,
			p.ip,
			p.user_agent,
			uManagerF.name_ru as manager_f_name_ru,
			uManagerF.name_en as manager_f_name_en,
			uManagerF.last_name_ru as manager_f_last_name_ru,
			uManagerF.last_name_en as manager_f_last_name_en,
			uManagerF.first_name_ru as manager_f_first_name_ru,
			uManagerF.first_name_en as manager_f_first_name_en,
			rManagerF.name_ru as manager_f_rank_ru,
			rManagerF.name_en as manager_f_rank_en,
			uManagerE.name_ru as manager_e_name_ru,
			uManagerE.name_en as manager_e_name_en,
			uManagerE.last_name_ru as manager_e_last_name_ru,
			uManagerE.last_name_en as manager_e_last_name_en,
			uManagerE.first_name_ru as manager_e_first_name_ru,
			uManagerE.first_name_en as manager_e_first_name_en,
			rManagerE.name_ru as manager_e_rank_ru,
			rManagerE.name_en as manager_e_rank_en,
			uNavigator.name_ru as navigator_name_ru,
			uNavigator.name_en as navigator_name_en,
			uNavigator.last_name_ru as navigator_last_name_ru,
			uNavigator.last_name_en as navigator_last_name_en,
			uNavigator.first_name_ru as navigator_first_name_ru,
			uNavigator.first_name_en as navigator_first_name_en,
			rNavigator.name_ru as navigator_rank_ru,
			rNavigator.name_en as navigator_rank_en
		FROM ae_flight_preparing p
		LEFT OUTER JOIN ae_user uManagerF ON uManagerF.id = p.id_author
		LEFT OUTER JOIN ae_rank rManagerF ON rManagerF.id = p.id_rank_manager_f
		LEFT OUTER JOIN ae_user uManagerE ON uManagerE.id = p.id_manager_e
		LEFT OUTER JOIN ae_rank rManagerE ON rManagerE.id = p.id_rank_manager_e
		LEFT OUTER JOIN ae_user uNavigator ON uNavigator.id = p.id_navigator
		LEFT OUTER JOIN ae_rank rNavigator ON rNavigator.id = p.id_rank_navigator
		WHERE p.id = ? AND p.hide = 0";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idFlightPreparing);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}


 
	// ЛС - ПОЛЬЗОВАТЕЛИ КОТОРЫЕ ДОЛЖНЫ ПРЕДОСТАВИТЬ ОТЧЕТЫ АБ
	function selectAllUsersReportAS($page){
		$record = $page * 30;
		global $db;
		$query =
		"SELECT
			fu.id,
			fu.id_user,
			fu.id_flight_assignment,
			fu.report_as,
			fa.id_author,
			fa.id_pic_a,
			fa.id_pic_r,
			fa.id_navigator_r,
			fa.id_rank_author,
			fa.id_rank_pic_a,
			fa.id_rank_pic_r,
			fa.id_rank_navigator_r,
			fa.id_crew,
			fa.id_aircraft,
			fa.number_assignment,
			fa.number_flight,
			fa.remark_navigator_r,
			fa.remark_pic_r,
			fa.remark_manager_flight_r,
			fa.date_manager_flight_a,
			fa.date_pic_a,
			fa.date_not_edit_a,
			fa.date_navigator_r,
			fa.date_pic_r,
			fa.date_manager_flight_r,
			fa.date_not_edit_r,
			fa.date_departure,
			fa.date_arrival,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en,
			c.name_ru as crew_ru,
			c.name_en as crew_en,
			a.name_ru as aircraft_ru,
			a.name_en as aircraft_en,
			a.model
		FROM ae_flight_user fu
		LEFT OUTER JOIN ae_flight_assignment fa ON fa.id = fu.id_flight_assignment
		LEFT OUTER JOIN ae_user u ON u.id = fu.id_user
		LEFT OUTER JOIN ae_rank r ON r.id = fu.id_rank
		LEFT OUTER JOIN ae_crew c ON c.id = fa.id_crew
		LEFT OUTER JOIN ae_aircraft a ON a.id = fa.id_aircraft
		WHERE fu.report_as = 1 AND fu.hide = 0
		ORDER BY
			fa.date_departure DESC,
			fa.id_aircraft ASC,
			fu.id_user ASC
		LIMIT $record, 30";
		if(!$result = mysqli_query($db, $query))
		{
			return false;
		}
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}


	// ВЗЛЕТЫ И ЗАХОДЫ В АЭРОПОРТАХ
	function selectAllFlightTakeoffApproach($idFlightAssignment){
		global $db;
		$query =
		"SELECT
			id,
			id_flight_assignment,
			number,
			category,
			airport,
			dn,
			conditions,
			mk_pos,
			date_flight
		FROM ae_flight_takeoff_approach
		WHERE id_flight_assignment = ? AND hide = 0
		ORDER BY id ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idFlightAssignment);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	function selectAllPicFlightReportTakeoffApproach(){
		global $db;
		$query =
		"SELECT
			fr.id,
			fr.ta_category,
			fr.ta_airport,
			fr.ta_dn,
			fr.ta_conditions,
			fr.ta_mk_pos,
      fr.ta_take_off_landing,
      fr.ta_id_pilot,
			fr.date_shipping,
			u.id as id_user,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en
		FROM ae_flight_report fr
		INNER JOIN ae_user u ON u.id = fr.ta_id_pilot
		INNER JOIN ae_rank r ON r.id = u.id_rank
    WHERE fr.date_shipping <> 0 AND fr.hide = 0 
		GROUP BY u.id, YEAR(fr.date_shipping)
		ORDER BY fr.date_shipping DESC";
		if(!$result = mysqli_query($db, $query))
		{
			return false;
		}
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}


	function selectAllYearPicFlightTakeoffApproach($idUser){
		global $db;
		$query =
		"SELECT
			t.date_flight,
			u.id as id_user,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en
		FROM ae_flight_takeoff_approach t
		INNER JOIN ae_user u ON u.id = ?
		INNER JOIN ae_flight_assignment a ON a.id = t.id_flight_assignment
		INNER JOIN ae_rank r ON r.id = u.id_rank
		WHERE t.date_flight > 0 AND a.id_pic_a = ?
		GROUP BY YEAR(t.date_flight)
		ORDER BY t.date_flight DESC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $idUser, $idUser);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}


	function selectAllFlightReportTakeoffApproachYear($idUser, $year){
		global $db;
		$query =
		"SELECT
			fr.id,
			fr.ta_category,
			fr.ta_airport,
			fr.ta_dn,
			fr.ta_conditions,
			fr.ta_mk_pos,
			fr.date_shipping,
			u.id as id_user,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en
		FROM ae_flight_report fr
		LEFT OUTER JOIN ae_user u ON u.id = ?
		LEFT OUTER JOIN ae_rank r ON r.id = u.id_rank
		WHERE DATE_FORMAT(fr.date_shipping, '%Y') = ? AND fr.hide = 0
		ORDER BY fr.date_shipping ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $idUser, $year);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  
  
	function selectAllFlightReportTakeoffApproachUserYearQuarter($idUser, $year, $quarter){
    if($quarter == 1) {
      $dateStart = $year.'-01-01';
      $dateEnd = $year.'-03-01';
    } elseif($quarter == 2) {
      $dateStart = $year.'-04-01';
      $dateEnd = $year.'-06-01';
    } elseif($quarter == 3) {
      $dateStart = $year.'-07-01';
      $dateEnd = $year.'-09-01';
    } else {
      $dateStart = $year.'-10-01';
      $dateEnd = $year.'-12-01';
    }
    
		global $db;
		$query =
		"SELECT
			fr.id,
      fr.ta_id_pilot,
			fr.ta_category,
			fr.ta_airport,
			fr.ta_dn,
			fr.ta_conditions,
			fr.ta_mk_pos,
			fr.ta_take_off_landing,
			fr.date_shipping,
			u.id as id_user,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en,
			r.name_ru as rank_ru,
			r.name_en as rank_en
		FROM ae_flight_report fr
		LEFT OUTER JOIN ae_user u ON u.id = ?
		LEFT OUTER JOIN ae_rank r ON r.id = u.id_rank
		WHERE fr.hide = 0 AND fr.ta_id_pilot = ? AND (DATE_FORMAT(fr.date_shipping, '%Y-%m') >= DATE_FORMAT(?, '%Y-%m') AND DATE_FORMAT(fr.date_shipping, '%Y-%m') <= DATE_FORMAT(?, '%Y-%m'))
		ORDER BY fr.date_shipping ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iiss", $idUser, $idUser, $dateStart, $dateEnd);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  
  
  # Групировка отчетов о полётах по годам и воздушным судам
	function selectAllFlightReportGroupYearAircraft(){
		global $db;
		$query =
		"SELECT
			r.date_shipping,
      a.id_aircraft
     FROM ae_flight_report r 
     INNER JOIN ae_flight_assignment a ON a.id = r.id_flight_assignment
     WHERE r.hide = 0
     GROUP BY YEAR(r.date_shipping), a.id_aircraft
     ORDER BY YEAR(r.date_shipping) DESC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
  
  # Групировка отчетов о полётах по годам
	function selectAllFlightReportGroupYear(){
		global $db;
		$query =
		"SELECT
			r.date_shipping,
      a.id_aircraft
     FROM ae_flight_report r 
     INNER JOIN ae_flight_assignment a ON a.id = r.id_flight_assignment
     WHERE r.hide = 0
     GROUP BY YEAR(r.date_shipping)
     ORDER BY YEAR(r.date_shipping) DESC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}

  # Групировка отчетов о полётах по годам
	function selectAllFlightReportGroupYearGroupAircraft(){
		global $db;
		$query =
		"SELECT
			r.date_shipping,
      a.id_aircraft
     FROM ae_flight_report r 
     INNER JOIN ae_flight_assignment a ON a.id = r.id_flight_assignment
     WHERE r.hide = 0
     GROUP BY a.id_aircraft, YEAR(r.date_shipping)
     ORDER BY YEAR(r.date_shipping) DESC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}

    
	//ВОЗДУШНОЕ СУДНО
	function selectAllAircraft(){
		global $db;
		$query =
		"SELECT
			ac.*,
            (SELECT 
              number_assignment
            FROM ae_flight_assignment
            WHERE 
              hide = 0
            AND 
              id_aircraft = ac.id
            ORDER BY YEAR(date_departure) DESC, number_assignment DESC LIMIT 1) as last_number_assignment
		FROM ae_aircraft ac
    WHERE ac.hide = 0
		ORDER BY ac.priority ASC, ac.name_ru ASC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}


  
	//ВОЗДУШНОЕ СУДНО
	function selectAllAircraftHide(){
		global $db;
		$query =
		"SELECT
			*
		FROM ae_aircraft
		ORDER BY priority ASC, name_ru ASC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
  
  
  # Задание на полёт групировка по годам
	function selectAllFlightReportGroupYearAS(){
		global $db;
		$query =
		"SELECT
			date_shipping
     FROM ae_flight_report
     WHERE hide = 0
     GROUP BY YEAR(date_shipping)
     ORDER BY YEAR(date_shipping) DESC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
  
  
  # Задание на полёт групировка по ВС и годам
	function selectAllFlightReportGroupYearGroupAircraftAS(){
		global $db;
		$query =
		"SELECT
			r.date_shipping,
      a.id_aircraft
     FROM ae_flight_report r
     INNER JOIN ae_flight_assignment a ON a.id = r.id_flight_assignment
     WHERE a.hide = 0
     GROUP BY a.id_aircraft, YEAR(r.date_shipping)
     ORDER BY YEAR(r.date_shipping) DESC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
  
  # Задание на полёт групировка месяцам
	function selectAllFlightReportAircraftGroupMonthAS($year, $idAircraft){
		global $db;
		$query =
		"SELECT
			r.date_shipping,
      a.id_aircraft
     FROM ae_flight_report r 
     INNER JOIN ae_flight_assignment a ON a.id = r.id_flight_assignment
     WHERE 
      r.hide = 0
     AND
      YEAR(r.date_shipping) = ?
     AND 
      a.id_aircraft = ? 
     GROUP BY MONTH(r.date_shipping) 
     ORDER BY MONTH(r.date_shipping) DESC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $year, $idAircraft);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  
  # Задание на полёт групировка пользователей по месяцам
	function selectAllFlightReportAircraftGroupMonthGropPicAS($year, $idAircraft){
		global $db;
		$query =
		"SELECT
      a.id_pic_a,
      a.id_aircraft,
			r.date_shipping,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en
     FROM ae_flight_assignment a
     INNER JOIN ae_user u ON u.id = a.id_pic_a
     INNER JOIN ae_flight_report r ON a.id = r.id_flight_assignment
     WHERE 
      a.hide = 0
     AND
      YEAR(r.date_shipping) = ?
     AND 
      a.id_aircraft = ? 
     GROUP BY a.id_pic_a, MONTH(r.date_shipping) 
     ORDER BY MONTH(r.date_shipping) DESC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $year, $idAircraft);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

  # Отчеты по воздушному судну за год
	function selectAllReportPicAircraftYearAS($year, $idAircraft){
		global $db;
		$query =
		"SELECT
      a.id_pic_a,
      a.id_aircraft,
			r.date_shipping,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en
     FROM ae_flight_assignment a
     INNER JOIN ae_user u ON u.id = a.id_pic_a
     INNER JOIN ae_flight_report r ON a.id = r.id_flight_assignment
     WHERE 
      a.hide = 0
     AND
      YEAR(r.date_shipping) = ?
     AND 
      a.id_aircraft = ? 
     GROUP BY a.id_pic_a, MONTH(r.date_shipping) 
     ORDER BY MONTH(r.date_shipping) DESC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $year, $idAircraft);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  
  # Подразделения для главной страниыцы раздела 
	function selectAllDivisionDepartment($idSection) {
		global $db;
		$query =
		"SELECT
			id,
      id_author,
      id_section,
			name_ru,
			name_en,
			priority,
      type_photo
		FROM ae_division_department
    WHERE id_section = ? AND hide = 0
		ORDER BY priority ASC, name_ru ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idSection);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  
  # Подразделения для главной страниыцы раздела
	function selectAllImgType() {
		global $db;
		$query =
		"SELECT
			id,
      id_author,
			name_ru,
			name_en
		FROM ae_img_type
		ORDER BY id ASC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
  
  
  
	//ВОЗДУШНОЕ СУДНО
	function selectCurrentAircraft($idAircraft){
		global $db;
		$query =
		"SELECT
			id,
			name_ru,
			name_en,
			model,
      flight_weight,
      average_speed
		FROM ae_aircraft
		WHERE id = ?";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idAircraft);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  
	//ВОЗДУШНОЕ СУДНО - групировка по самолетам
	function selectAircraftGroupName(){
		global $db;
		$query =
		"SELECT
			id,
			name_ru,
			name_en,
			model
		FROM ae_aircraft
		ORDER BY name_ru ASC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}


	//НОВОСТИ + ССЫЛКИ + РАЗНОЕ
	function selectAllNews($idSection, $idSubsection, $page){
		global $db;
		$record = $page * 30;
		$query =
		"SELECT
			n.*,
            se.name_ru as section_name_ru,
            se.name_en as section_name_en,
        (SELECT 
          COUNT(*)
        FROM ae_news
        WHERE
          id_section = ?
        AND
          id_subsection = ?
        AND
          hide = 0) as count_news
		FROM ae_news n
        LEFT OUTER JOIN ae_section se ON se.id = n.id_department
		WHERE
			n.id_section = ?
		AND
			n.id_subsection = ?
		AND
			n.hide = 0
		ORDER BY
			n.priority ASC,
			n.date_create DESC
		LIMIT $record, 30";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iiii", $idSection, $idSubsection, $idSection, $idSubsection);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  
	# Картинки
	function selectAllImg($idSection, $idSubsection, $idNews) {
		global $db;
		$query =
		"SELECT
			id,
			id_section,
			id_subsection,
			id_author,
      id_news,
			name_ru,
			name_en,
			extension,
			date_create,
			hide
		FROM ae_img
		WHERE
			id_section = ?
		AND
			id_subsection = ?
		AND
			id_news = ?
		AND
			hide = 0
		ORDER BY id ASC";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iii", $idSection, $idSubsection, $idNews);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}
  

	//НОВОСТИ + ССЫЛКИ + РАЗНОЕ - количество записей
	function selectCountNews($idSection, $idSubsection){
		global $db;
		$query =
		"SELECT
		COUNT(*)
		FROM ae_news
		WHERE
			id_section = ?
		AND
			id_subsection = ?";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $idSection, $idSubsection);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//НОВОСТИ - одна новость
	function selectNews($idNews){
		global $db;
		$query =
		"SELECT
			n.*
		FROM ae_news n
		INNER JOIN ae_section s ON s.id = n.id_section
		WHERE n.id = ? AND n.hide = 0";
		$stmt = mysqli_stmt_init($db);
		if(!mysqli_stmt_prepare($stmt, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idNews);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			$arr[] = $row;
		mysqli_stmt_close($stmt);
		return $arr;
	}

	//ПОСЛЕДНЯЯ НОВОСТЬ
	function selectLastNews(){
		global $db;
		$query =
		"SELECT
      id,
      id_section,
			name_ru,
			name_en,
			date_create
		FROM ae_news
		WHERE
			id_section = 2
		AND
			hide = 0
		ORDER BY date_create DESC
		LIMIT 2";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}

	//СТАТИСТИКА - количество пользователей за текущий день
	function selectCountVisitorsToday(){
		global $db;
		$query =
		"SELECT
		COUNT(DISTINCT id_user)
		FROM ae_visitor
		WHERE DATE_FORMAT(date_visit, '%Y-%m-%d') = DATE_FORMAT(CURDATE(), '%Y-%m-%d')";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr[0]['COUNT(DISTINCT id_user)'];
	}

	//СТАТИСТИКА - количество визитов за день
	function selectCountVisitsToday(){
		global $db;
		$query =
		"SELECT
		COUNT(*)
		FROM ae_visitor
		WHERE DATE_FORMAT(date_visit, '%Y-%m-%d') = DATE_FORMAT(CURDATE(), '%Y-%m-%d')";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr[0]['COUNT(*)'];
	}

	//СТАТИСТИКА - количество визитов за день ГРУПИРОВКА
	function selectAllVisitorsGroup(){
		global $db;
		$query =
		"SELECT
			COUNT(*) as cout_visits,
			v.id,
			v.id_user,
			v.ip,
			v.user_agent,
			v.date_visit,
			u.id_section as id_section_user,
			u.name_ru,
			u.name_en,
			u.last_name_ru,
			u.last_name_en,
			u.first_name_ru,
			u.first_name_en
		FROM (SELECT * FROM ae_visitor ORDER BY date_visit DESC) AS v
		INNER JOIN ae_user u ON v.id_user = u.id
		GROUP BY v.id_user, DATE_FORMAT(v.date_visit, '%Y-%m-%d')
		ORDER BY v.date_visit DESC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}

	//СТАТИСТИКА - количество визитов за день
	function selectAllDateVisitGroup(){
		global $db;
		$query =
		"SELECT
			date_visit
		FROM ae_visitor
		GROUP BY DATE_FORMAT(date_visit, '%Y-%m-%d')
		ORDER BY date_visit DESC";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
  
	//ОБНОВИТЬ ВЗЛЕТНЫЙ ВЕС - для полётных заданий
	function selectAssignmentFlightWeight(){
		global $db;
		$query =
		"SELECT
			fa.id,
      a.flight_weight as flight_weight_aircraft
		FROM ae_flight_assignment fa
    LEFT OUTER JOIN ae_aircraft a ON a.id = fa.id_aircraft";
		if(!$result = mysqli_query($db, $query))
			return false;
		$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $arr;
	}
	?>
