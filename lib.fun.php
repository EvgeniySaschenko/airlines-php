<?php
  //Защита формы от подмены
  function getToken(){
   $_SESSION['token'] = md5(uniqid()); // случайное значение
   return $_SESSION['token'];
  }
  // Переключение языка
  function removeLangUrl($lang) {
    if($lang) {
      return substr_replace($_SERVER['QUERY_STRING'], '', 0, 7);
    }
  }



	//ПОКАЗАТЬ на скрытый документ
	function linkDocView($lang, $idSection, $idSubsection, $idDoc, $dateSend){
		if($dateSend != 0)
		{
			$idContainer = $idDoc.'_'.$dateSend;
		}
		else
		{
			$idContainer = $idDoc;
		}
		$data =
		'<div class="hidden" id="doc'.$idContainer.'">
    <div class="front-iframe"></div>
			<script type="text/javascript">
			$(function(){
				$("#link'.$idContainer.'").on("click", function(){
					if($("div#doc'.$idContainer.'").css("display") == "none"){
						$("div#doc'.$idContainer.'").show();
							$("div#doc'.$idContainer.' iframe").attr("src", "doc.php?lang='.$lang.'&id_section='.$idSection.'&id_subsection='.$idSubsection.'&id_doc='.$idDoc.'&action=view");
						}else{
							$("div#doc'.$idContainer.'").hide();
						}
						event.preventDefault();
				})
			})
			</script>
        <iframe src=""></iframe>
		</div>';
		return $data;
	}

	//ПОКАЗАТЬ на скрытый текст
	function textView($idNews, $data){
		global $lang;
		echo
		'<div class="hidden-text" id="news'.$idNews.'">
			<script type="text/javascript">
			$(function(){
				$("#link'.$idNews.'").on("click", function(){
					if($("div#news'.$idNews.'").css("display") == "none"){
						$("div#news'.$idNews.'").show();
						}else{
							$("div#news'.$idNews.'").hide();
						}
						event.preventDefault();
				})
			})
			</script>';
			$arrContent =	explode("@@@&&&###", $data);
			foreach($arrContent as $content)
			{
				echo '<p>'.$content.'</p>';
			}
		echo
		'</div>';
	}

	//Ссылка для просмотра НОВОСТИ
	function linkNewsСlickView($idNews){
		global $langShowText;
		$data = '<a id="link'.$idNews.'">'.$langShowText.'</a>';
		return $data;
	}

	//Ссылка для просмотра докемента ИКОНКА
	function linkDocСlickView($idDoc, $dateSend){
		if($dateSend != 0)
		{
			$idContainer = $idDoc.'_'.$dateSend;
		}
		else
		{
			$idContainer = $idDoc;
		}
		$data = '<a class="download" id="link'.$idContainer.'"></a>';
		return $data;
	}

	//Ссылка для просмотра докемента ТЕКСТ
	function linkDocСlickViewAnchor($idDoc, $name, $dateSend){
		if($dateSend != 0)
		{
			$idContainer = $idDoc.'_'.$dateSend;
		}
		else
		{
			$idContainer = $idDoc;
		}
		$data = '<a id="link'.$idContainer.'" href="#doc'.$idContainer.'">'.$name.'</a>';
		return $data;
	}

	//Ссылка на загрузку документа ИКОНКА
	function linkDocDownload($idSection, $idSubsection, $idDoc, $idSentDoc){
		global $lang;
		global $langDownload;
		$data = '<a id="download'.$idSentDoc.'" class="download" data-toggle="tooltip" title="'.$langDownload.'" href="doc.php?lang='.$lang.'&id_section='.$idSection.'&id_subsection='.$idSubsection.'&id_doc='.$idDoc.'&id_sent_doc='.$idSentDoc.'&action=download"></a>';
		return $data;
	}

	//Ссылка на загрузку документа ТЕКСТ
	function linkDocDownloadAnchor($idSection, $idSubsection, $idDoc, $idSentDoc, $name){
		global $lang;
		global $langDownload;
		$data = '<a class="download-anchor" title="'.$langDownload.'" href="doc.php?lang='.$lang.'&id_section='.$idSection.'&id_subsection='.$idSubsection.'&id_doc='.$idDoc.'&id_sent_doc='.$idSentDoc.'&action=download">'.$name.'</a>';
		return $data;
	}

	//Ссылка ОТПРАВИТЬ документ список пользователей
	function linkSendDoc($lang, $idSection, $idSubsection, $langSend, $idDoc){
		global $permissionEditSection;
		global $permissionEditSubsection;
		if($idSubsection != 0)
			$permission =	$permissionEditSubsection;
		else
			$permission = $permissionEditSection;
		if($permission)
		{
			$data = '<a class="send fa fa-mail-forward" data-toggle="tooltip" title="'.$langSend.'" href="index.php?lang='.$lang.'&id_section='.$idSection.'&id_subsection='.$idSubsection.'&id_doc='.$idDoc.'&action=send_doc#navBottom"></a>';
		}
		return $data;
	}

	//Удалить отправленный документ
	function linkDeleteSentDoc($idSentDoc, $idDoc){
		global $lang;
		global $langDelete;
		$data = '<a class="delete" title="'.$langDelete.'" href="delete.php?lang='.$lang.'&id_sent_doc='.$idSentDoc.'&id_doc='.$idDoc.'&action=sent_doc"></a>';
		return $data;
	}

	//Удалить книгу
	function linkDeleteBook($idBook){
		global $lang;
		global $langDelete;
		$data = '<a class="delete" title="'.$langDelete.'" href="delete.php?lang='.$lang.'&id_book='.$idBook.'&action=book"></a>';
		return $data;
	}

	//Удалить главу
	function linkDeleteChapter($idChapter){
		global $lang;
		global $langDelete;
		$data = '<a class="delete" title="'.$langDelete.'" href="delete.php?lang='.$lang.'&id_chapter='.$idChapter.'&action=chapter"></a>';
		return $data;
	}

	//Удалить документ
	function linkDeleteDoc($idDoc){
		global $lang;
		global $langDelete;
		$data = '<a class="delete" title="'.$langDelete.'" href="delete.php?lang='.$lang.'&id_doc='.$idDoc.'&action=doc"></a>';
		return $data;
	}

	//Удалить задание на полет
	function linkDeleteFlightAssignment($idSection, $idSubsection, $idFlightAssignment){
		global $lang;
		global $langDelete;
		$data = '<a class="delete" title="'.$langDelete.'" href="delete.php?lang='.$lang.'&id_section='.$idSection.'&id_subsection='.$idSubsection.'&id_flight_assignment='.$idFlightAssignment.'&action=flight_assignment"></a>';
		return $data;
	}

	//Удалить пользователя из задания на полет
	function linkDeleteFlightUser($idSection, $idSubsection, $IdFlightUser, $idAssignmentFlight){
		global $lang;
		global $langDelete;
		$data = '<a class="delete" title="'.$langDelete.'" href="delete.php?lang='.$lang.'&id_section='.$idSection.'&id_subsection='.$idSubsection.'&id_flight_user='.$IdFlightUser.'&id_flight_assignment='.$idAssignmentFlight.'&action=user_flight"></a>';
		return $data;
	}

	//Удалить полет
	function linkDeleteReportAS($idReportAs, $idSection, $idSubsection){
		global $lang;
		global $langDelete;
		$data = '<a class="delete" title="'.$langDelete.'" href="delete.php?lang='.$lang.'&id_report_as='.$idReportAs.'&id_section='.$idSection.'&id_subsection='.$idSubsection.'&action=report_as"></a>';
		return $data;
	}

	//Удалить должность
	function linkDeleteRank($idSection, $idRank){
		global $lang;
		global $langDelete;
		$data = '<a class="delete" title="'.$langDelete.'" href="delete.php?lang='.$lang.'&id_section='.$idSection.'&id_rank='.$idRank.'&action=rank"></a>';
		return $data;
	}

	//Удалить тип документа
	function linkDeleteTypeDoc($idSection, $idTypeDoc){
		global $lang;
		global $langDelete;
		$data = '<a class="delete" title="'.$langDelete.'" href="delete.php?lang='.$lang.'&id_section='.$idSection.'&id_type='.$idTypeDoc.'&action=type_doc"></a>';
		return $data;
	}

	//Удалить пользователя
	function linkDeleteUser($idSection, $idUser){
		global $lang;
		global $langDelete;
		$data = '<a class="delete" title="'.$langDelete.'" href="delete.php?lang='.$lang.'&id_section='.$idSection.'&id_user='.$idUser.'&action=user"></a>';
		return $data;
	}



	//Удалить экипаж
	function linkDeleteCrew($idSection, $idSubsection, $idCrew){
		global $lang;
		global $langDelete;
		$data = '<a class="delete" title="'.$langDelete.'" href="delete.php?lang='.$lang.'&id_section='.$idSection.'&id_subsection='.$idSubsection.'&id_crew='.$idCrew.'&action=crew"></a>';
		return $data;
	}

	//Удалить документ
	function linkDeleteNews($idNews){
		global $lang;
		global $langDelete;
		$data = '<a class="delete" title="'.$langDelete.'" href="delete.php?lang='.$lang.'&id_news='.$idNews.'&action=news"></a>';
		return $data;
	}

	//Удалить изображение в новости
	function linkUpdateDeleteImgNews($idNews){
		global $lang;
		global $langDelete;
		$data = '<a class="delete" title="'.$langDelete.'" href="update.php?lang='.$lang.'&id_news='.$idNews.'&action=img_news"></a>';
		return $data;
	}

	//Ссылка АРХИВ отправленных ДОКУМЕНТОВ
	function linkSentDocArchive($lang, $idSection, $idSubsection, $langSentDocuments, $idDoc, $idSectionUser){
		$data = '<a class="send" title="'.$langSentDocuments.'" href="index.php?lang='.$lang.'&id_section='.$idSection.'&id_subsection='.$idSubsection.'&id_doc='.$idDoc.'&id_section_user='.$idSectionUser.'&action=sent_doc&page=0"></a>';
		return $data;
	}

	//Ссылка на документы ОТПРАВЛЕННЫЕ ПОЛЬЗОВАТЕЛЮ
	function linkSentDocUser($idUser, $idSection, $lastName, $name, $firstName){
		global $lang;
		$name = mb_substr($name, 0, 1, 'utf-8');
		$firstName = mb_substr($firstName, 0, 1, 'utf-8');
		$data =
		'<a href="index.php?lang='.$lang.'&id_user='.$idUser.'&id_section='.$idSection.'&action=sent_doc_user&page=0">'
			.$lastName.' '.$name.'.'.$firstName.
		'.</a>';
		return $data;
	}

	//Ссылка ЗАДАНИЕ НА ПОЛЕТ
	function linkAssignmentForFlight($idSection, $idSubsection, $idFlightAssignment, $idAircraft, $numAsignmentMonthGet, $numberFlightAssignment){
		global $lang;
		$data =
		'<a href="index.php?lang='.$lang.'&id_section='.$idSection.'&id_subsection='.$idSubsection.'&id_flight_assignment='.$idFlightAssignment.'&id_aircraft='.$idAircraft.'&num_asignment_month_get='.$numAsignmentMonthGet.'#navBottom">'
			.$numberFlightAssignment.
		'</a>';
		return $data;
	}

	//Удалить ЗАДАНИЕ НА ПОЛЕТ
	function linkDeleteReportFlight($idSection, $idSubsection, $idFlightAssignment, $idReportFlight){
		global $lang;
		global $langDelete;
		$data = '<a class="delete" title="'.$langDelete.'" href="delete.php?lang='.$lang.'&id_section='.$idSection.'&id_subsection='.$idSubsection.'&id_flight_assignment='.$idFlightAssignment.'&id_report_flight='.$idReportFlight.'&action=report_flight"></a>';
		return $data;
	}

	//Ссылка профиль пользователя
	function linkUser($idSection, $idUser, $lastName, $name, $firstName){
		global $lang;
		$name = mb_substr($name, 0, 1, 'utf-8');
		$firstName = mb_substr($firstName, 0, 1, 'utf-8');
		$data =
		'<a class="link-profile-user" data-link-profile-user-id="'.$idUser.'" href="index.php?lang='.$lang.'&id_section='.$idSection.'&id_user='.$idUser.'&action=user_profile#navBottom">'
			.$lastName.' '.$name.'.'.$firstName.
		'.</a>';
		return $data;
	}

	//Ссылка на отпраленные документы пользователю
	function linkUserSentDoc($idSection, $idUser, $lastName, $name, $firstName){
		global $lang;
		$name = mb_substr($name, 0, 1, 'utf-8');
		$firstName = mb_substr($firstName, 0, 1, 'utf-8');
		$data =
		'<a href="index.php?lang='.$lang.'&id_section='.$idSection.'&id_user='.$idUser.'&action=user_profile#docUserReceived">'
			.$lastName.' '.$name.'.'.$firstName.
		'.</a>';
		return $data;
	}
  
	//Ссылка на КНИГУ
	function linkBook($lang, $idSection, $idSubsection, $idBook, $name){
		$data =
		'<a href="index.php?lang='.$lang.'&id_section='.$idSection.'&id_subsection='.$idSubsection.'&id_book='.$idBook.'">
			<span class="book"></span>'.$name.
		'</a>';
		return $data;
	}

	//Загрузить файл на сервер
	function formUploadsDoc($lang, $idSection, $idSubsection, $idUser, $idNews, $idBook, $listRecords){
		global $noticeUploadsFile;
		global $allowExtension;
		global $langDownloadCountFile;
		global $langAllowableFileTypes;
		echo
		'<div class="notice">'
				.$noticeUploadsFile.
		'</div>
		<form class="add-doc" method="post" enctype="multipart/form-data" action="insert.php?
			lang='.$lang.
			'&id_section='.$idSection.
			'&id_subsection='.$idSubsection.
			'&id_user='.$idUser.
			'&id_news='.$idNews.
			'&id_book='.$idBook.
			'&action=doc">
			<input type="file" name="uploadfile[]" multiple="true"/>';
			if(!empty($listRecords))
			{
				if(!empty($idBook))
				{
					$namePost = 'id_chapter';
				}
				else
				{
					$namePost = 'id_aircraft';
				}
				echo '<select name="'.$namePost.'">';
				foreach($listRecords as $record)
				{
					echo'<option value="'.$record['id'].'">'.$record['name_'.$lang].'</option>';
				}
				echo '</select>';
			}
			echo
			'<div class="notice">';
				echo $langAllowableFileTypes;
				foreach($allowExtension as $extension)
				{
					echo '.'.$extension.' ';
				}
				echo '<br/>'.$langDownloadCountFile.
			'</div>
			<input class="save" type="image"  src="images/transparent.gif"/>
		</form>';
	}

	//Имя пользователя сокращенно
	function fullNameUser($lastName, $name, $firstName){
		$name = mb_substr($name, 0, 1, 'utf-8');
		$firstName = mb_substr($firstName, 0, 1, 'utf-8');
		$data = $lastName.' '.$name.'.'.$firstName.'.';
		return $data;
	}

	//Возвращает целое положытельное число
	function clearInt($data){
		return abs((int)$data);
	}
	//Экранирует одинарные кавычки, удаляеет пробелы из начала и конца строки, удаляет HTML и PHP тэги
	function clearStr($data){
		global $db;
		return mysqli_real_escape_string($db, trim(strip_tags(str_replace("\r\n", "@@@&&&###", str_replace('"', '&#34;',$data)))));
	}
	//ЗАМЕНЯЕТ @@@&&&### на \r\n
	function newline($data){
		return str_replace("@@@&&&###", "\r\n", $data);
	}
  
	//ДОБАВЛЯЕТ парграф
	function addParagraph($data){
		$arrContent =	explode("@@@&&&###", $data);
		foreach($arrContent as $content)
		{
			echo '<p>'.$content.'</p>';
		}
	}
  

	//Шифровать пароль
	function codePass($data){
		return md5(md5(md5($data)));
	}
	//Зашифровать проверочную сесию
	function codeSessionCheck($data){
		return md5($data);
	}
	//Получает первую букву из имени и отчества, возвращает сокрщенное имя
	function shortenName($lastName, $name, $firstName){
		$name = mb_substr($name, 0, 1, 'utf-8');
		$firstName = mb_substr($firstName, 0, 1, 'utf-8');
		return $fullName = $lastName.' '.$name.'.'.$firstName.'.';
	}

	//Выделяет истекающий срок	ДОРАБОТАТЬ
	function allocateExpires($dateEnd, $countDays1, $countDays2, $dateStudied, $fontWeight){
	if(empty($fontWeight))
		$fontWeight = 'normal';
		$countDays = round ((strtotime($dateEnd) - strtotime(date('Y'.'m'.'d'))) / 60 / 60 / 24);
	if($dateStudied == 0)
	{
		if($countDays <= $countDays1)
		{
			if($fontWeight == 'bold')
			{
				$allocate = 'class="deadline-bold-1"';
			}
			else
			{
				$allocate = 'class="deadline-1"';
			}
		}
		else if($countDays > $countDays1 and $countDays <= $countDays2)
			if($fontWeight == 'bold')
			{
				$allocate = 'class="deadline-bold-2"';
			}
			else
			{
				$allocate = 'class="deadline-2"';
			}
		else
		{
			if($fontWeight == 'bold')
			{
				$allocate = 'class="deadline-bold-0"';
			}
			else
			{
				$allocate = 'class="deadline-0"';
			}
		}
	}
	else
	{
		$allocate = " ";
	}
		return $allocate;
}
	//Удаляет недопустимые знаки из строки
	function replaceInvalidCharacters($data){
		$invalidCharacters = array("#", ".", " ", "/", "\"", "\'", "\\", ":", "*", "?", "<", ">", "|", "\"", "\'", "$", ";", "%", "^", "&", ",");
		return $data = str_replace($invalidCharacters, '-', $data);
	}

	//Показывает название месяца на RUS и ENG
	function showNameMonth($date, $ukr){
		global $lang;
		$ref = date('n', strtotime($date));
		if($lang == 'en')
			$month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		else
			$month = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');
                
                if(!empty($ukr)) {
                    $month = array('січень', 'лютий', 'березень', 'квітень', 'травень', 'червень', 'липень', 'серпень', 'вересень', 'жовтень', 'листопад', 'грудень');
                }
                
		for($i = 0; $i <= $ref - 1; $i++)
		{
			if($i == $ref - 1)
				return $month[$i];
		}
	}
        

	//Показывает название месяца на RUS и ENG для таблицы
	function showNameMonthTableTD(){
		global $lang;
		if($lang == 'en')
			$month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		else
			$month = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');
		for($i = 0; $i < 11; $i++)
		{
				echo '<td>'.$month[$i].'</td>';
		}
	}
        
	//Показывает название месяца на RUS и ENG для таблицы
	function showNameMonthTableTH(){
		global $lang;
		if($lang == 'en')
			$month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		else
			$month = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');
		for($i = 0; $i <= 11; $i++)
		{
				echo '<th>'.$month[$i].'</th>';
		}
	}

	//Преобразует дату в формат d.m.Y
	function currentDateTimeMySQL(){
			return date('Y-m-d H:i:s');
	}

	//Преобразует дату в формат d.m.Y
	function convertDate($date){
		if($date != 0)
			return date('d.m.Y', strtotime($date));
		else
			return '-';
	}
  
	//Преобразует дату в формат d.m.Y - если 0 не возвращает "-" 
	function convertDate2($date){
		if($date != 0)
			return date('d.m.Y', strtotime($date));
	}
  
	//Преобразует дату в формат d.m.Y - если 0 не возвращает "-" 
	function convertDate3($date){
		if($date != 0)
			return date('d.m.Y', strtotime($date));
    else {
			return 0;
    }
	}
  
	//Преобразует дату в формат d.m.Y - если 0 не возвращает ничего 
	function convertDateEmpty($date){
		if($date != 0)
			return date('d.m.Y', strtotime($date));
    else {
			return '';
    }
	}
  
	//Преобразует дату в формат d.m.Y H:i:s
	function convertDateTime($date){
		if($date != 0)
			return date('d.m.Y H:i:s', strtotime($date));
		else
			return '-';
	}

	//Преобразует дату в формат G:i
	function convertTime($data){
			return date('G.i', strtotime($data));
	}

	//Разница во времени в течении 24 часов
	function differenceInTime($start, $end){
		if($start > $end)
		{
			$time = strtotime('1970-01-02 '.$end) - strtotime('1970-01-01 '.$start);
			$hh = floor($time / 3600);
			$mm = floor(($time % 3600) / 60);
			return $hh.':'.$mm;
		}
		else if($start < $end)
		{
			$time = strtotime('1970-01-01 '.$end) - strtotime('1970-01-01 '.$start);
			$hh = floor($time / 3600);
			$mm = floor(($time % 3600) / 60);
			return $hh.':'.$mm;
		}
		else
		{
			return '0';
		}
	}

	//Разница во времени в течении 24 часов + время работы ночью
	function timeNightAndTimeDifference($start, $end, $night){
		list($hours, $mins, $secs) = explode(':', $night);
		$nightTime = ($hours * 3600 ) + ($mins * 60 ) + $secs;

		if($start > $end)
		{
			$time = strtotime('1970-01-02 '.$end) - strtotime('1970-01-01 '.$start);
			$hh = floor(($time + $nightTime) / 3600);
			$mm = floor((($time + $nightTime) % 3600) / 60);
			return $hh.'.'.$mm;
		}
		else if($start < $end)
		{
			$time = strtotime('1970-01-01 '.$end) - strtotime('1970-01-01 '.$start);
			$hh = floor(($time + $nightTime) / 3600);
			$mm = floor((($time + $nightTime) % 3600) / 60);
			return $hh.'.'.$mm;
		}
		else
		{
			return '0';
		}
	}

	//Разница во времени в течении 24 часов + время работы ночью
	function convertTimeToNumber($time){
		list($hours, $mins, $secs) = explode(':', $time);
		$hh = $hours * 3600;
		$mm = $mins * 60;
		return $hh + $mm;
	}

	//Разница во времени в течении 24 часов + время работы ночью
	function convertNumberToTime($data){
		$hh = floor($data / 3600);
		$mm = ($data - $hh * 3600) / 60;

		if(($data - $hh * 3600) / 60 <= 9)
		{
			$mm = '0'.$mm;
		}
 		if($data / 3600 < 1)
		{
			$hh = 0;
			$mm = $data / 60;
		}
		return $hh.'.'.$mm;
	}


	//Преобразует дату в формат Y
	function convertDateYear($date){
		if($date != 0)
			return date('Y', strtotime($date));
		else
			return '-';
	}

	//Преобразует дату в формат m
	function convertDateMonth($date){
		if($date != 0)
			return date('m', strtotime($date));
		else
			return '-';
	}
    
    
	//Преобразует дату в формат d-m-Y
	function convertDateDayMonthYearDash($date){
		if($date != 0)
			return date('d-m-Y', strtotime($date));
		else
			return '-';
	}


	//Преобразует дату в формат Y.m
	function convertDateYearMonth($date){
		if($date != 0)
			return date('Y.m', strtotime($date));
		else
			return '-';
	}

	//Преобразует дату в формат Y.m
	function convertDateYearEndMonth($date){
		if($date != 0)
			return date('Y-m-t', strtotime($date));
		else
			return '-';
	}


		//Преобразовует русский текст в транслит
	function translit($str){
		$tr = array(
		"А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
		"Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
		"Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
		"О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
		"У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
		"Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
		"Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
		"в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
		"з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
		"м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
		"с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
		"ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
		"ы"=>"yi","ь"=>"'","э"=>"e","ю"=>"yu","я"=>"ya",
		"."=>".","?"=>"?","/"=>"_","\\"=>"_",
		"*"=>"_",":"=>":","*"=>"_","\""=>"_","<"=>"_",
		">"=>"_","|"=>"_"
	);
	return strtr($str,$tr);
	};

	//Блокирует кнопку подтверждения если документ не был просмотрен и выводт подсказку
	function blocksButton($dateStudied, $dateView){
			global $langConfirm;
			global $langNeedDownloadDoc;
			global $langDocStudied;
			if($_GET['id_user'] == $_SESSION['id_user'])
			{
				if($dateStudied == 0)
				{
					if($dateView != 0)
						$state = 'title="'.$langConfirm.'"';
					else
						$state = 'disabled title="'.$langNeedDownloadDoc.'"';
				}
				else
				{
						$state = 'disabled title="'.$langDocStudied.'"';
				}
			}
			else
			{
				$state = 'disabled';
			}
			return $state;
	}
	//Заменяет символы которые невозможно передать методом GET
	function cleanStrGET($data){
		$invalidCharacters = array("#", ".", "/", "\"", "\'", "\\", ":", "*", "?", "<", ">", "|", "\"", "\'", "$", ";", "%", "^", "&", ",");
		return $data = str_replace($invalidCharacters, ' ', $data);
	}

//Выводит раскрывающийся список для выбора даты актуальные позиции выделяет
//$id - добавляется если в форме используются 2 и больше поля для дат
function dropdownListDate2($date, $id, $start){
	$date = strtotime($date);
	echo
	"<select name='day{$id}' size='1'>";
	for ($i = 1; $i <= 31; $i++)
	{
		$day = str_pad($i , 2, '0', STR_PAD_LEFT);
		if(date('d', $date) == $day and $date != 0)
		{
			$selected = 'selected';
		}
		else if($date == 0 and $i == 1 and $start == 'null')
		{
			echo "<option selected value='00'>00</option>";
		}
		else if($date == 0 and $day == date('d') and empty($start))
		{
			$selected = 'selected';
		}
		echo
		"<option {$selected} value='{$day}'>{$day}</option>";
		unset ($selected);
	}
	echo
	"</select>";

	echo
	"<select name='month{$id}' size='1'>";
	for ($i = 1; $i <= 12; $i++)
	{
		$month = str_pad($i , 2, '0', STR_PAD_LEFT);
		if(date('m', $date) == $month and $date != 0)
		{
			$selected = 'selected';
		}
		else if($date == 0 and $i == 1 and $start == 'null')
		{
			echo "<option selected value='00'>00</option>";
		}
		else if($date == 0 and $month == date('m') and empty($start))
		{
			$selected = 'selected';
		}
		echo
		"<option {$selected} value='{$month}'>{$month}</option>";
		unset ($selected);
	}
	echo
	"</select>";

	echo
	"<select name='year{$id}' size='1'>";
	for ($i = 1940; $i <= date('Y') + 20; $i++)
	{
		if(date('Y', $date) === (string)$i and empty($start))
		{
			$selected = 'selected';
		}
		else if($date == 0 and $i == 1940 and $start == 'null')
		{
			echo "<option selected value='0000'>0000</option>";
		}
		else if($date == 0 and $i == date('Y') and empty($start))
		{
			$selected = 'selected';
		}
		else if(date('Y', $date) === (string)$i and !empty($start) and $date != 0)
		{
			$selected = 'selected';
		}
		echo
		"<option {$selected} value='{$i}'>{$i}</option>";
		unset ($selected);
	}
	echo
	"</select>";
}

// Проверить находится ли дата в диапазоне UNIX dhtvtyb
function diapasonUnixTime($date){
	$unix = strtotime($date);
	if($unix <= 0)
	{
		return 0;
	}
	else
	{
		return $date;
	}
}


//Выводит раскрывающийся список для выбора даты актуальные позиции выделяет
//$id - добавляется если в форме используются 2 и больше поля для дат
function dropdownListTime($time, $id, $start){
	$time = strtotime($time);
	echo
	"<select name='hh{$id}' size='1'>";
	for ($i = 0; $i <= 23; $i++)
	{
		$hh = str_pad($i , 2, '0', STR_PAD_LEFT);
		if(date('H', $time) == $hh and $time != 0)
		{
			$selected = 'selected';
		}
		else if($time == 0 and $i == 1 and $start == 'null')
		{
			echo "<option selected value='00'>00</option>";
		}
		else if($time == 0 and $hh == date('H') and empty($start))
		{
			$selected = 'selected';
		}
		echo
		"<option {$selected} value='{$hh}'>{$hh}</option>";
		unset ($selected);
	}
	echo
	"</select>";

	echo
	"<select name='mm{$id}' size='1'>";
	for ($i = 0; $i <= 59; $i++)
	{
		$mm = str_pad($i , 2, '0', STR_PAD_LEFT);
		if(date('i', $time) == $mm and $time != 0)
		{
			$selected = 'selected';
		}
		else if($time == 0 and $i == 1 and $start == 'null')
		{
			echo "<option selected value='00'>00</option>";
		}
		else if($time == 0 and $mm == date('i') and empty($start))
		{
			$selected = 'selected';
		}
		echo
		"<option {$selected} value='{$mm}'>{$mm}</option>";
		unset ($selected);
	}
	echo
	"</select>";
}


//Получить расширение файла
 function extensionFile($filename){
    $extensionFile = pathinfo($filename);
    return strtolower($extensionFile['extension']);
  }
//Получить название файла
 function nameFile($filename){
    $nameFile = pathinfo($filename);
    return $nameFile['filename'];
  }
	//Выпадающий список
 function dropDownList($nameList, $arrRecords, $idSelected, $notice){
	global $lang;
	echo "<div class=\"form-group form-inline\">";
  if($nameList != 'id_rank' and $nameList != 'id_section_department') {
    echo   "<select class=\"form-control\" name=\"{$nameList}\">
            <option value=\"0\">НЕТ</option>";
  } else {
    echo   "<select required=\"required\"  class=\"form-control\" name=\"{$nameList}\">";
  }

	foreach($arrRecords as $record)
	{
		if($record['hide'] == 0)
		{
			if($record['id'] == $idSelected)
				$selected = 'selected="selected"';
			if(empty($idSelected) and !empty($notice))
				$notice = 'SAVE';
			echo
			"<option {$selected} value=\"{$record['id']}\">{$notice} {$record['name_'.$lang]}</option>";
			unset($selected);
		}
	}
	echo
	"</select>
  </div>";
  }
  
	//Выпадающий список с обязательным полем
 function dropDownListRquired($nameList, $arrRecords, $idSelected, $notice){
	global $lang;
	echo "<div class=\"form-group form-inline\">";

    echo   "<select required=\"required\"  class=\"form-control\" name=\"{$nameList}\">";

	foreach($arrRecords as $record)
	{
		if($record['hide'] == 0)
		{
			if($record['id'] == $idSelected)
				$selected = 'selected="selected"';
			if(empty($idSelected) and !empty($notice))
				$notice = 'SAVE';
			echo
			"<option {$selected} value=\"{$record['id']}\">{$notice} {$record['name_'.$lang]}</option>";
			unset($selected);
		}
	}
	echo
	"</select>
  </div>";
  }
  
  //Выпадающий список с обязательным полем + нет
 function dropDownListRquiredNo($nameList, $arrRecords, $idSelected, $notice){
	global $lang;
	echo "<div class=\"form-group form-inline\">";

    echo   "<select required=\"required\"  class=\"form-control\" name=\"{$nameList}\">
      <option value=\"0\">НЕТ</option>";

	foreach($arrRecords as $record)
	{
		if($record['hide'] == 0)
		{
			if($record['id'] == $idSelected)
				$selected = 'selected="selected"';
			if(empty($idSelected) and !empty($notice))
				$notice = 'SAVE';
			echo
			"<option {$selected} value=\"{$record['id']}\">{$notice} {$record['name_'.$lang]}</option>";
			unset($selected);
		}
	}
	echo
	"</select>
  </div>";
  }
  
  //Выпадающий список с обязательным полем + нет
 function dropDownListSimpleArrayNo($nameList, $arrRecords, $valSelected){
	global $lang;
	echo "<div class=\"form-group form-inline\">";

    echo   "<select class=\"form-control\" name=\"{$nameList}\">
      <option value=\"0\">НЕТ</option>";
    
	foreach($arrRecords as $key => $record)
	{
            if($record == $valSelected)
                $selected = 'selected="selected"';
            echo "<option {$selected} value=\"{$record}\">{$record}</option>";
            unset($selected);
	}
	echo
	"</select>
  </div>";
  }
  
  

	//Выпадающий список пользователей
 function dropDownListUsers($nameList, $arrRecords, $idSelected){
	global $lang;
	echo
	"<select name=\"{$nameList}\">";
	foreach($arrRecords as $record)
	{
		if($record['hide'] == 0)
		{
			if($record['id'] == $idSelected)
				$selected = 'selected="selected"';
			$name = mb_substr($record['name_'.$lang], 0, 1, 'utf-8');
			$firstName = mb_substr($record['first_name_'.$lang], 0, 1, 'utf-8');
			$fullName = $record['last_name_'.$lang].' '.$name.'.'.$firstName.'.';
			echo
			"<option {$selected} value=\"{$record['id']}\"> {$fullName}</option>";
			unset($selected);
		}
	}
	echo
	"</select>";
  }

  
	//Выпадающий список пользователей
 function dropDownListUsersDisabled($nameList, $arrRecords, $idSelected){
	global $lang;
	echo
	"<select name=\"{$nameList}\" disabled=\"disabled\">";
	foreach($arrRecords as $record)
	{
		if($record['hide'] == 0)
		{
			if($record['id'] == $idSelected)
				$selected = 'selected="selected"';
			$name = mb_substr($record['name_'.$lang], 0, 1, 'utf-8');
			$firstName = mb_substr($record['first_name_'.$lang], 0, 1, 'utf-8');
			$fullName = $record['last_name_'.$lang].' '.$name.'.'.$firstName.'.';
			echo
			"<option {$selected} value=\"{$record['id']}\"> {$fullName}</option>";
			unset($selected);
		}
	}
	echo
	"</select>";
  }
	//Выпадающий список пользователей РАЗДЕЛА
 function dropDownListUsersSection($nameList, $arrRecords, $idSelected, $idSection){
	global $lang;
	echo
	"<select name=\"{$nameList}\">";
	if(empty($idSelected))
	{
		echo "<option value=\"0\"> </option>";
	}
	foreach($arrRecords as $record)
	{
		if($record['hide'] == 0 and $record['id_section'] == $idSection)
		{
			if($record['id_user'] == $idSelected)
				$selected = 'selected="selected"';
			$name = mb_substr($record['name_'.$lang], 0, 1, 'utf-8');
			$firstName = mb_substr($record['first_name_'.$lang], 0, 1, 'utf-8');
			$fullName = $record['last_name_'.$lang].' '.$name.'.'.$firstName.'.';
			echo
			"<option {$selected} value=\"{$record['id_user']}\"> {$fullName}</option>";
			unset($selected);
		}
	}
	echo
	"</select>";
  }

	//Выпадающий список пользователей для ПОЛЕТНОГО ЛИСТА (idSection пользователи которые не будут отображатся)
 function dropDownListUsersSectionFL($nameList, $arrRecords, $idSelected, $idSection){
	global $lang;
	echo
	"<select name=\"{$nameList}\">";
	if(empty($idSelected))
	{
		echo "<option value=\"0\"> </option>";
	}
	foreach($arrRecords as $record)
	{
		if($record['hide'] == 0 and $record['id_section'] != $idSection)
		{
			if($record['id_user'] == $idSelected)
				$selected = 'selected="selected"';
			$name = mb_substr($record['name_'.$lang], 0, 1, 'utf-8');
			$firstName = mb_substr($record['first_name_'.$lang], 0, 1, 'utf-8');
			$fullName = $record['last_name_'.$lang].' '.$name.'.'.$firstName.'.';
			echo
			"<option {$selected} value=\"{$record['id_user']}\"> {$fullName}</option>";
			unset($selected);
		}
	}
	echo
	"</select>";
  }

	//Удаление директории и файлов
function dirDel ($dir)
{
    $d=opendir($dir);
    while(($entry=readdir($d))!==false)
    {
        if ($entry != "." && $entry != "..")
        {
            if (is_dir($dir."/".$entry))
            {
                dirDel($dir."/".$entry);
            }
            else
            {
                unlink ($dir."/".$entry);
            }
        }
    }
    closedir($d);
    rmdir ($dir);
}


function wtf($data){
  echo '<pre>';
    print_r($data);
  echo '</pre>';
}


function firstSymbol($data){
	return mb_substr($data, 0, 1, 'UTF-8');
}

// Заменяет 0 на символ -
function replacementNull($data){
	if(empty($data))
	{
		return '-';
	}
	else
	{
		return $data;
	}
}

// Заменяет 0 на символ ''
function replacementEmpty($data){
	if(empty($data))
	{
		return '';
	}
	else
	{
		return $data;
	}
}

// Ессли строка пустая - вернет 0
function replacementEmptyNull($data){
	if(empty($data))
	{
		return 0;
	}
	else
	{
		return $data;
	}
}

// Заменяет 0 на символ -
function checkEmpty1Return2($data1, $data2){
	if($data1 == 0)
	{
		return '';
	}
	else
	{
		return $data2;
	}
}


// Проверить существует ли файл с подписью
function checkFileSign($data){
	if(file_exists($data))
	{
		return $data;
	}
	else
	{
		return '../images/transparent.gif';
	}
}

// Перевести килограмы в тонны
function convertKgToT($data){
	return round($data / 1000, 2);
}

function convertDateToMySQL($data){
  if(!empty($data))
  {
    $part = explode('.', $data);
    return $part[2].'-'.$part[1].'-'.$part[0];
  }
  else 
  {
    return 0;
  }

}

function redirect($ancor) {
 	if(strstr($_SERVER['HTTP_REFERER'], $_SERVER["HTTP_HOST"]))
		header('location: '.$_SERVER['HTTP_REFERER'].$ancor);
	else
		header('location: http://'.$_SERVER['HTTP_HOST']);
}

function linkPhotoUser($idUser, $extension) {
  if($extension) {
    return '/images/user/'.$idUser.'.'.$extension;
  } 
  else
  {
    return '/images/user/user.png';
  }
}


function definingBrowser($userAgent) {
  if (strpos($userAgent, "Firefox") !== false) $browser = "firefox";
  elseif (strpos($userAgent, "Opera") !== false) $browser = "opera";
  elseif (strpos($userAgent, "Chrome") !== false) $browser = "chrome";
  elseif (strpos($userAgent, "MSIE") !== false) $browser = "internet-explorer";
  elseif (strpos($userAgent, "Safari") !== false) $browser = "safari";
  elseif (strpos($userAgent, "Edge") !== false) $browser = "edge";
  else $browser = "Unknown";
  return $browser;
}

function phone($phone) {
  $phone = explode("|", $phone);
  if($phone[0] != 0)
    return '+'.$phone[0].' ('.$phone[1].')'.$phone[2];
}

function phonePartNumber($phone) {
  $phone = explode("|", $phone);
  return $phone[2];
}

function phonePartOperator($phone) {
  $phone = explode("|", $phone);
  return $phone[1];
}

function phonePartCountry($phone) {
  $phone = explode("|", $phone);
  return $phone[0];
}

function userDateBirth10days($date) {
  $dm = date('d.m', strtotime($date));
  $dmy = $dm.'.'.date('Y');

  $daysLeft = (strtotime($dmy) - strtotime(date('d.m.Y'))) / 3600 / 24;
  if($daysLeft >= 0 and $daysLeft <= 10) {
    return 1;
  } elseif($daysLeft < 0) {
    $dmy = $dm.'.'.date('Y', strtotime('+1 year'));
    $daysLeft = (strtotime($dmy) - strtotime(date('d.m.Y'))) / 3600 / 24;
    if($daysLeft > 0 and $daysLeft <= 10) {
      return 1;
    } else {
      return 0;
    }
  } else {
    return 0;
  }

  return $dmy; 
}

function checkEmptyOr0($data) {
  if(!empty($data)) {
    $result = $data;
  } else {
    $result = "";
  }
  return $result;
}

// Получить последний символ строки
function getLastSymbol($str) {
  return substr($str, -1);
}

// Номер полетного задания для списка
function NUMBER_ASSIGMENT_FLIGHT($GSS_numberingFlightAssignment, $nameAircraft, $modelAircraft, $numberAssignment, $dateDeparture, $numAsignmentMonth, $countFlightAssignmentMonth, $numAsignmentMonthGet) {
    // "Название ВС"-"номер задания (уникальный для текущего года и ВС)"-"месяц"-"год"
	if($GSS_numberingFlightAssignment == 'name_aircraft-number_flight_assignment-month-year')
	{
		$NUMBER_ASSIGMENT_FLIGHT = $nameAircraft.'-'.$numberAssignment.'-'.convertDateMonth($dateDeparture).'-'.convertDateYear($dateDeparture);
	}
    // "Последняя буква Рег. номера ВС"-"день"-"месяц"-"год"
	elseif($GSS_numberingFlightAssignment == 'reg_number_last_leter-day-month-year')
	{
		$NUMBER_ASSIGMENT_FLIGHT = getLastSymbol($modelAircraft).'-'.convertDateDayMonthYearDash($dateDeparture);
	}
    // "Название ВС"-"Рег. номер"-"день"-"месяц"-"год"
	elseif($GSS_numberingFlightAssignment == 'name_aircraft-reg_number-day-month-year')
	{
		$NUMBER_ASSIGMENT_FLIGHT = $nameAircraft.'-'.$modelAircraft.'-'.convertDateDayMonthYearDash($dateDeparture);
	}
    // "Название ВС"-"Рег. номер"-"день"-"месяц"-"год"/"номер задания (уникальный для текущего года и ВС)"
	elseif($GSS_numberingFlightAssignment == 'name_aircraft-reg_number-day-month-year/number_flight_assignment')
	{
		$NUMBER_ASSIGMENT_FLIGHT = $nameAircraft.'-'.$modelAircraft.'-'.convertDateDayMonthYearDash($dateDeparture).'/'.$numberAssignment;
	}
	elseif($GSS_numberingFlightAssignment == 'reg_number_last_leter-number_task_in_month-month-year')
	{
        if($numAsignmentMonthGet == 0) {
          $NUMBER_ASSIGMENT_FLIGHT = getLastSymbol($modelAircraft).'-'.($countFlightAssignmentMonth - ($numAsignmentMonth - 1)).'-'.convertDateMonth($dateDeparture).'-'.convertDateYear($dateDeparture);
        }
        else {
          $NUMBER_ASSIGMENT_FLIGHT = getLastSymbol($modelAircraft).'-'.$numAsignmentMonthGet.'-'.convertDateMonth($dateDeparture).'-'.convertDateYear($dateDeparture);
        }
	}
    
    return $NUMBER_ASSIGMENT_FLIGHT;
}


// Отправка уведомления на почту о загрузке / обноновлении документа
function sendMessageAddOrUpdateDoc($mails, $nameDoc, $idDoc, $idUser, $idAuthor, $nameAuthor, $addOrUpdate) {
  if($mails) {
    $subject = $_SERVER['HTTP_HOST'].' - '.$addOrUpdate.' - '.$nameDoc.' id-doc: '.$idDoc.' id-user: '.$idUser.' id-author: '.$idAuthor; 
    $message = 'Author: '.$nameAuthor.' - '.$addOrUpdate.' - '.$nameDoc.' id-doc: '.$idDoc.' id-user: '.$idUser.' id-author: '.$idAuthor;
    $headers = 'From: doc <doc@'.$_SERVER['HTTP_HOST'].'>' . "\r\n";
    $headers .= 'Content-type: text/html; charset="utf-8"';
    $arrMail = explode(",", $mails);
    foreach($arrMail as $itemMail) {
      $to = $itemMail;
      mail($to, $subject, $message, $headers); 
    }
  }
}

    // Подcddtnrf цветом ячейки при формировании документа
    function colorHighlightingPool($poollProbability, $poollSeriousness, $arrStyle, $riskAssessmentSetings) {
        $evaluation = $poollProbability.$poollSeriousness;
        
        if($riskAssessmentSetings == 'risk_assessment_1') {
            // Красный
            if($evaluation == '5A' || $evaluation == '4A' || $evaluation == '3A' || $evaluation == '5B' || $evaluation == '4B' || $evaluation == '5C') {
                 return $arrStyle[0];
            }
            // Желтый
            elseif($evaluation == '5D' || $evaluation == '5E' || $evaluation == '4C' || $evaluation == '4D' || $evaluation == '4E' || $evaluation == '3B' || $evaluation == '3C' || $evaluation == '3D' || $evaluation == '2A' || $evaluation == '2B' || $evaluation == '2C') {
                 return $arrStyle[1];
            }
            // Зеленый 
            elseif($evaluation == '1A' || $evaluation == '1B' || $evaluation == '1C' || $evaluation == '1D' || $evaluation == '1E' || $evaluation == '2D' || $evaluation == '2E' || $evaluation == '3E') {
                 return $arrStyle[2];
            }
            else {
                 return $arrStyle[3];
            } 
        }
        
        if($riskAssessmentSetings == 'risk_assessment_2') {
            // Красный 
            if($evaluation == '5D' || $evaluation == '5E' || $evaluation == '4E') {
                return $arrStyle[0];
            }
            // Оранжевый 
            elseif($evaluation == '4C' || $evaluation == '5C' || $evaluation == '3D' || $evaluation == '4D' || $evaluation == '3E') {
                return $arrStyle[1];
            }
            // Желтый 
            elseif($evaluation == '3B' || $evaluation == '4B' || $evaluation == '5B' || $evaluation == '2C' || $evaluation == '3C' || $evaluation == '2D' || $evaluation == '2E') {
                return $arrStyle[2];
            }
            // Зеленый 
            elseif($evaluation == '1A' || $evaluation == '2A' || $evaluation == '3A' || $evaluation == '4A' || $evaluation == '5A' || $evaluation == '1B'  || $evaluation == '2B' || $evaluation == '1C' || $evaluation == '1D' || $evaluation == '1E') {
                return $arrStyle[3];
            }
            else {
                return $arrStyle[4];
            } 
        }

    }
    
    
    // Массив через запятую
    function arraySeparatedCommasAirport($arr) {
        foreach($arr  as $key => $value) {
            $str = $str.$value['airport'].', ';
        }
        return substr($str, 0, -2);
    }
    
    // Массив через запятую ВС 
    function arraySeparatedCommasAircrafts($arr) {
        foreach($arr  as $key => $value) {
            $str = $str.$value['name_ru'].$value['model'].', ';
        }
        return substr($str, 0, -2);
    }
?>