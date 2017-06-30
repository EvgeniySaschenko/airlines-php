<?php
	header("Expires: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // always modified
	header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
	header("Pragma: no-cache"); // HTTP/1.0
	ini_set('session.cookie_httponly', 1);
	session_start();
	include('lib.notice.php');
	include('lib.fun.php');
	include('lib.lang.php');
	include('lib.pattern.php');
	include('query/query.select.php');
	include('query/query.update.php');
	include('query/query.insert.php');
	include('query/query.delete.php');

	set_include_path(get_include_path() . PATH_SEPARATOR . '/google/src');

	//Удаление статистики
	deleteVisitors();
	//Чистка переменных
	$getIdUser = clearInt($_GET['id_user']);
	$getIdSection = clearInt($_GET['id_section']);
	$getIdSubsection = clearInt($_GET['id_subsection']);
	$getIdNews = clearInt($_GET['id_news']);
	$getIdBook = clearInt($_GET['id_book']);
	$getIdChapter = clearInt($_GET['id_chapter']);
	$getIdType = clearInt($_GET['id_type']);
	$getIdDoc = clearInt($_GET['id_doc']);
	$getPage = clearInt($_GET['page']);
	$getIdSectionUser = clearInt($_GET['id_section_user']);
	$getIdSentDoc = clearInt($_GET['id_sent_doc']);
	$getYear = clearInt($_GET['year']);
	$getMonth = clearStr($_GET['month']);
	$getIdFlightAssignment = clearInt($_GET['id_flight_assignment']);
	$getIdRank = clearInt($_GET['id_rank']);
	$getIdCrew = clearInt($_GET['id_crew']);
	$getIdReportFlight = clearInt($_GET['id_report_flight']);
	$getIdFlightUser = clearInt($_GET['id_flight_user']);
	$getNumberFlightAssignment = clearInt($_GET['number_flight_assignment']);
	$getYearFlightAssignment = clearInt($_GET['year_flight_assignment']);
	$getIdFlightPreparing = clearInt($_GET['id_flight_preparing']);
	$getIdReportAs = clearInt($_GET['id_report_as']);
        $getIdAircraft = clearInt($_GET['id_aircraft']);
        $getIdUserPermission = clearInt($_GET['id_user_permission']);
        $getIdPoolTemplate = clearInt($_GET['id_pool_template']);
        $getIdPool = clearInt($_GET['id_pool']);
        
	if(empty($_SERVER['REMOTE_ADDR']))
		$currentUserIp = 0;
	if(empty($_SERVER['HTTP_USER_AGENT']))
		$currentUserAgent = 0;
	if(empty($_GET['id_user']))
		$getIdUser = 0;
	if(empty($_GET['id_section']))
		$getIdSection = 1;
	if(empty($_GET['id_subsection']))
		$getIdSubsection = 0;
	if(empty($_GET['id_news']))
		$getIdNews = 0;
	if(empty($_GET['id_book']))
		$getIdBook = 0;
	if(empty($_GET['id_chapter']))
		$getIdChapter = 0;
	if(empty($_GET['id_type']))
		$getIdType = 0;
	if(empty($_GET['id_doc']))
		$getIdDoc = 0;
	if(empty($_GET['page']))
		$getPage = 0;
	if(empty($_GET['id_section_user']))
		$getIdSectionUser = 0;
	if(empty($_GET['id_sent_doc']))
		$getIdSentDoc = 0;
	if(empty($_GET['year']))
		$getYear = date('Y');
	if(empty($_GET['month']))
		$getMonth = date('m');
	if(empty($_GET['id_flight_assignment']))
		$getIdFlightAssignment = 0;
	if(empty($_GET['id_rank']))
		$getIdRank = 0;
	if(empty($_GET['id_crew']))
		$getIdCrew = 0;
	if(empty($_GET['id_report_flight']))
		$getIdReportFlight = 0;
	if(empty($_GET['id_flight_user']))
		$getIdFlightUser = 0;
	if(empty($_GET['number_flight_assignment']))
		$getNumberFlightAssignment = 0;
	if(empty($_GET['year_flight_assignment']))
		$getYearFlightAssignment = 0;
	if(empty($_GET['id_flight_preparing']))
		$getIdFlightPreparing = 0;
	if(empty($_GET['id_report_as']))
		$getIdReportAs = 0;
	if(empty($_GET['id_aircraft']))
		$getIdAircraft = 0;
	if(empty($_GET['id_user_permission']))
		$getIdUserPermission = 0;
	if(empty($_GET['id_pool_template']))
		$getIdPoolTemplate = 0;
	if(empty($_GET['id_pool']))
		$getIdPool = 0;
    
	//Данные о текущем пользователе
	$currentUserLogin = clearStr($_SESSION['login']);
	$currentUserPass = clearStr($_SESSION['pass']);
	$currentUserId = clearInt($_SESSION['id_user']);
	$currentUserIp = clearStr($_SERVER['REMOTE_ADDR']);
	$currentUserAgent = clearStr($_SERVER['HTTP_USER_AGENT']);
	$currentUser = selectUserСurrent($currentUserLogin, $currentUserPass);
  
	//Текущий раздел / подраздел
		$currentSection = selectSection($getIdSection);
		$currentSubsection = selectSubsection($getIdSubsection);
	if($_GET['id_section'] != 0)
	{
		$permissionSectionMark = $currentSection[0]['mark'];
		$permissionSubsectionId = $currentSubsection[0]['id'];
	}
	//Текущий документ
	if($_GET['id_doc'] != 0)
	{
		$currentDoc = selectDoc($getIdDoc);
		$currentSentDoc = selectCurrentSentDoc($getIdDoc, $currentUser[0]['id']);
		if($_GET['action'] == 'doc' or $_GET['action'] == 'sent_doc' or $_GET['action'] == 'send_doc')
		{
			$permissionSectionMark = $currentDoc[0]['mark'];
			$permissionSubsectionId = $currentDoc[0]['id_subsection'];
		}
	}
	//Текущая книга
	if($_GET['id_book'] != 0)
	{
		$currentBook = selectBook($getIdBook);
		if($_GET['action'] == 'book')
		{
			$permissionSectionMark = $currentBook[0]['mark'];
			$permissionSubsectionId = $currentBook[0]['id_subsection'];
		}
	}
	//Текущая глава
	if($_GET['id_chapter'] != 0)
	{
		$currentChapter = selectChapter($getIdChapter);
		if($_GET['action'] == 'chapter')
		{
			$permissionSectionMark = $currentChapter[0]['mark'];
			$permissionSubsectionId = $currentChapter[0]['id_subsection'];
		}
	}
	//Текущая новость
	if($_GET['id_news'] != 0)
	{
		$currentNews = selectNews($getIdNews);
		if($_GET['action'] == 'news')
		{
			$permissionSectionMark = $currentNews[0]['mark'];
			$permissionSubsectionId = $currentNews[0]['id_subsection'];
		}
	}
	//Текущее задание на полет
	if($_GET['id_flight_assignment'] != 0)
	{
		$currentAssignmentFlight = selectAssignmentFlight($getIdFlightAssignment); 
	}
    
	//Текущее воздушное судно
	if($_GET['id_aircraft'] != 0)
	{
		$currentAircraft = selectCurrentAircraft($getIdAircraft);
	}
        
	//Текущий опрос - шаблон
	if($_GET['id_pool_template'] != 0)
	{
		$currentPoolTemplate = selectCurrentPoolTemplate($getIdPoolTemplate);
	}
        
	//Текущий опрос
	if($_GET['id_pool'] != 0)
	{
		$currentPool = selectCurrentPool($getIdPool);
	}
        
    
	# НОМЕР ЗАДАНИЯ НА ПОЛЁТ

      $getNumAsignmentMonthGet = $_GET['num_asignment_month_get'];

    $CURRENT_NUMBER_ASSIGMENT_FLIGHT = NUMBER_ASSIGMENT_FLIGHT($GENERAL_SITE_SETTINGS[0]['numbering_flight_assignment'], $currentAssignmentFlight[0]['aircraft_'.$lang], $currentAssignmentFlight[0]['model'], $currentAssignmentFlight[0]['number_assignment'], $currentAssignmentFlight[0]['date_departure'], $currentAssignmentFlight[0]['num_assignment_month'], $currentAssignmentFlight[0]['count_flight_assignment_month'], $getNumAsignmentMonthGet);
    
    

	$lastNews = selectLastNews();
	//Права доступа
    if(empty($currentUser[0]['permission_new'])) {
      // Старые
      $permissionReadSection = strstr($currentUser[0]['permission'], ':'.$permissionSectionMark.':');//Чтение разделов
      $permissionReadSubsection = strstr($currentUser[0]['permission'], $permissionSectionMark.$permissionSubsectionId.'~');//Чтение подразделов
      $permissionEditSection = strstr($currentUser[0]['permission'], '!:'.$permissionSectionMark.':');//Редактирование разделов
      $permissionEditSubsection = strstr($currentUser[0]['permission'], '!'.$permissionSectionMark.$permissionSubsectionId.'~');//Редактирование подразделов
      $permissionDeleteSection = strstr($currentUser[0]['permission'], '_!:'.$permissionSectionMark.':');//Удаление документов разделов
      $permissionDeleteSubsection = strstr($currentUser[0]['permission'], '_!'.$permissionSectionMark.$permissionSubsectionId.'~');//Удаление документов  подразделов
      $permissionManageUsers = strstr($currentUser[0]['permission'], '@'.$permissionSectionMark);//Управление пользователями
      $permissionReadPersonalDoc = strstr($currentUser[0]['permission'], '#');//Просмотр персональных документов
      $permissionManageSite = strstr($currentUser[0]['permission'], '*');//Редактироване сайта
      $permissionAssignmentFlight = strstr($currentUser[0]['permission'], '%');//ЗАДАНИЕ НА ПОЛЕТ Запретить редактирование
    } else {
      // Новые
      $permissionReadSection = strstr($currentUser[0]['permission_new'], ':'.$permissionSectionMark.':');//Чтение разделов
      $permissionReadSubsection = strstr($currentUser[0]['permission_new'], $permissionSectionMark.$permissionSubsectionId.'~');//Чтение подразделов
      $permissionEditSection = strstr($currentUser[0]['permission_new'], '!:'.$permissionSectionMark.':');//Редактирование разделов
      $permissionEditSubsection = strstr($currentUser[0]['permission_new'], '!'.$permissionSectionMark.$permissionSubsectionId.'~');//Редактирование подразделов
      $permissionDeleteSection = strstr($currentUser[0]['permission_new'], '_!:'.$permissionSectionMark.':');//Удаление документов разделов
      $permissionDeleteSubsection = strstr($currentUser[0]['permission_new'], '_!'.$permissionSectionMark.$permissionSubsectionId.'~');//Удаление документов  подразделов
      $permissionManageUsers = strstr($currentUser[0]['permission_new'], '@'.$permissionSectionMark);//Управление пользователями
      $permissionReadPersonalDoc = strstr($currentUser[0]['permission_new'], '#');//Просмотр персональных документов
      $permissionManageSite = strstr($currentUser[0]['permission_new'], '*');//Редактироване сайта
      $permissionAssignmentFlight = strstr($currentUser[0]['permission_new'], '%');//ЗАДАНИЕ НА ПОЛЕТ Запретить редактирование
      $currentUser[0]['permission'] = $currentUser[0]['permission_new'];
    }

	//Разрешенные расширения
	$allowExtension = array('pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'xlsx', 'xls', 'mp4');
    $allSections =	selectAllSections();
	$allSubsections =	selectAllSubSections();
	$word = selectAllWord();
?>
