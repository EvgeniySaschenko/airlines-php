<?php
	include('general.php');
	//Отправить файл пользователю
	if
		(!empty($currentUser)
	and
		$_SESSION['check'] == codeSessionCheck($currentUser[0]['login'].$currentUser[0]['pass'].session_id())
	and
		strstr($_SERVER['HTTP_REFERER'], $_SERVER["HTTP_HOST"]))
	{
		if
			(($currentNews[0]['id_section'] == 2
		or 
			$currentNews[0]['id_section'] == 7
		or 
			$currentNews[0]['id_section'] == 8) and $permissionEditSection)
		{
			//НОВОСТИ + ССЫЛКИ + РАЗНОЕ 
			if($_GET['action'] == 'news')
			{
				$idNews = $getIdNews;
				deleteNews($idNews);
			}
		}
		
		if
			(($currentBook[0]['id_subsection'] == 2
		or
			$currentBook[0]['id_subsection'] == 4
		or
			$currentBook[0]['id_subsection'] == 5
		or
			$currentBook[0]['id_subsection'] == 9
		or
			$currentBook[0]['id_subsection'] == 11
		or 
			$currentBook[0]['id_subsection'] == 12
		or 
			$currentBook[0]['id_subsection'] == 13
		or
			$currentBook[0]['id_subsection'] == 17
		or
			$currentBook[0]['id_subsection'] == 18
		or
			$currentBook[0]['id_subsection'] == 19
		or 
			$currentBook[0]['id_subsection'] == 20
		or 
			$currentBook[0]['id_subsection'] == 23
		or
			$currentBook[0]['id_subsection'] == 24
		or
			$currentBook[0]['id_subsection'] == 25
		or
			$currentBook[0]['id_subsection'] == 26
		or
			$currentBook[0]['id_subsection'] == 27
		or
			$currentBook[0]['id_subsection'] == 28
		or
			$currentBook[0]['id_subsection'] == 30
		or
			$currentBook[0]['id_subsection'] == 33
		or
			$currentBook[0]['id_subsection'] == 34
		or
			$currentBook[0]['id_subsection'] == 35
		or
			$currentBook[0]['id_subsection'] == 36
		or
			$currentBook[0]['id_subsection'] == 37) and $permissionEditSubsection
		or
			$currentBook[0]['id_section'] == 6 and $permissionEditSection)
		{
			//КНИГА
			if($_GET['action'] == 'book')
			{
				$idBook = $getIdBook;
				deleteBook($idBook);
			}
		}
		
		if
			(($currentChapter[0]['id_subsection'] == 2
		or
			$currentChapter[0]['id_subsection'] == 4
		or
			$currentChapter[0]['id_subsection'] == 5
		or
			$currentChapter[0]['id_subsection'] == 9
		or
			$currentChapter[0]['id_subsection'] == 11
		or 
			$currentChapter[0]['id_subsection'] == 12
		or 
			$currentChapter[0]['id_subsection'] == 13
		or
			$currentChapter[0]['id_subsection'] == 17
		or
			$currentChapter[0]['id_subsection'] == 18
		or
			$currentChapter[0]['id_subsection'] == 19
		or 
			$currentChapter[0]['id_subsection'] == 20
		or 
			$currentChapter[0]['id_subsection'] == 23
		or
			$currentChapter[0]['id_subsection'] == 24
		or
			$currentChapter[0]['id_subsection'] == 25
		or
			$currentChapter[0]['id_subsection'] == 26
		or
			$currentChapter[0]['id_subsection'] == 27
		or
			$currentChapter[0]['id_subsection'] == 28
		or
			$currentChapter[0]['id_subsection'] == 30
		or
			$currentChapter[0]['id_subsection'] == 33
		or
			$currentChapter[0]['id_subsection'] == 34
		or
			$currentChapter[0]['id_subsection'] == 35
		or
			$currentChapter[0]['id_subsection'] == 36
		or
			$currentChapter[0]['id_subsection'] == 37) and $permissionEditSubsection
		or
			$currentChapter[0]['id_section'] == 6 and $permissionEditSection)
		{
			//ГЛАВА
			if($_GET['action'] == 'chapter')
			{
				$idChapter = $getIdChapter;
				deleteChapter($idChapter);
			}	
		}			
		
		if
			(($currentDoc[0]['id_subsection'] == 2
		or
			$currentDoc[0]['id_subsection'] == 4
		or
			$currentDoc[0]['id_subsection'] == 5
		or
			$currentDoc[0]['id_subsection'] == 9
		or
			$currentDoc[0]['id_subsection'] == 11
		or 
			$currentDoc[0]['id_subsection'] == 12
		or 
			$currentDoc[0]['id_subsection'] == 13
		or
			$currentDoc[0]['id_subsection'] == 17
		or
			$currentDoc[0]['id_subsection'] == 18
		or
			$currentDoc[0]['id_subsection'] == 19
		or 
			$currentDoc[0]['id_subsection'] == 20
		or 
			$currentDoc[0]['id_subsection'] == 23
		or
			$currentDoc[0]['id_subsection'] == 24
		or
			$currentDoc[0]['id_subsection'] == 25
		or
			$currentDoc[0]['id_subsection'] == 26
		or
			$currentDoc[0]['id_subsection'] == 27
		or
			$currentDoc[0]['id_subsection'] == 28
		or
			$currentDoc[0]['id_subsection'] == 30
		or
			$currentDoc[0]['id_subsection'] == 33
		or
			$currentDoc[0]['id_subsection'] == 34
		or
			$currentDoc[0]['id_subsection'] == 35
		or
			$currentDoc[0]['id_subsection'] == 36
		or
			$currentDoc[0]['id_subsection'] == 37) and $permissionEditSubsection
		or
			($currentDoc[0]['id_section'] == 3 
		or
			$currentDoc[0]['id_section'] == 5 
		or
			$currentDoc[0]['id_section'] == 4
		or
			$currentDoc[0]['id_section'] == 9
		or
			$currentDoc[0]['id_section'] == 11
		or
			$currentDoc[0]['id_section'] == 12) and $permissionManageUsers
		or
			($currentDoc[0]['id_section'] == 2
		or
			$currentDoc[0]['id_section'] == 6) and $permissionEditSection)
		{
			//ДОКУМЕНТ
			if($_GET['action'] == 'doc')
			{
				$idDoc = $getIdDoc;
				$path = '../docs/'.convertDate($currentDoc[0]['date_create']).'/'.$currentDoc[0]['id'].'.'.$currentDoc[0]['extension'];
				unlink($path);
				deleteDoc($idDoc);
			}
			//ОТПРАВЛЕННЫЙ ДОКУМЕНТ
			if($_GET['action'] == 'sent_doc')
			{
				$idSentDoc = $getIdSentDoc;
				deleteSentDoc($getIdSentDoc);
			}
		}
		
		if
			(($_GET['id_section'] == 1
		or
			$_GET['id_section'] == 3
		or
			$_GET['id_section'] == 4
		or
			$_GET['id_section'] == 5
		or
			$_GET['id_section'] == 9
		or
			$_GET['id_section'] == 11
		or
			$_GET['id_section'] == 12) and $permissionManageUsers)
		{
			//УДАЛИТЬ ДОЛЖНОСТЬ
			if($_GET['action'] == 'rank')
			{
				$idRank = $getIdRank;
				deleteRank($idRank);
			}	
			//УДАЛИТЬ ТИП ДОКУМЕНТА
			if($_GET['action'] == 'type_doc')
			{
				$idTypeDoc = $getIdType;
				deleteTypeDoc($idTypeDoc);
			}	
			//УДАЛИТЬ ПОЛЬЗОВАТЕЛЯ
			if($_GET['action'] == 'user')
			{
				$idUser = $getIdUser;
				deleteUser($getIdUser);
			}	
		}
		
		if($_GET['id_subsection'] == 1 and $permissionEditSubsection)
		{
			//ЭКИПАЖ
			if($_GET['action'] == 'crew')
			{
				$idCrew = $getIdCrew;
				deleteCrew($idCrew);
			}	
		}
		
		if($_GET['id_subsection'] == 15 and $permissionEditSubsection)
		{
			//ПОЛЕТ
			if($_GET['action'] == 'report_as')
			{
				$idReportAs = $getIdReportAs;
				deleteReportAS($idReportAs);
			}	
		}
		
    if($_GET['id_subsection'] == 32 and $permissionEditSubsection)
    {
			// Пользователи которые могут редактировать отчет о полете
			$allUserFlight = selectAllUserFlight($getIdFlightAssignment);
			foreach($allUserFlight as $userFlight)
			{
				if($userFlight['id_user'] == $currentUser[0]['id'])
				{
					$permissionEditFlightGenerateDoc = $userFlight['id_user'];
					break;
				}
			}
			
			// ЗАДАНИЕ НА ПОЛЕТ 
			if
				($_GET['action'] == 'flight_assignment'
			and 
				($permissionAssignmentFlight
			or
				($currentAssignmentFlight[0]['date_not_edit_a'] == 0 and $permissionEditFlightGenerateDoc)))

			{
				$idFlightAssignment = $getIdFlightAssignment;
				deleteFlightAssignment($idFlightAssignment);
			}	
			
      // ОТЧЕТ О ПОЛЕТЕ
			if
				($_GET['action'] == 'report_flight'
			and 
				($permissionAssignmentFlight
			or
				($currentAssignmentFlight[0]['date_not_edit_r'] == 0 and $permissionEditFlightGenerateDoc)))
			{
        $idReportFlight = $getIdReportFlight;
        deleteReportFlight($idReportFlight);
      }

      // ПОЛЬЗОВАТЕЛЬ В ЗАДАНИИ НА ПОЛЕТ 
			if
				($_GET['action'] == 'user_flight'
			and 
				($permissionAssignmentFlight
			or
			($currentAssignmentFlight[0]['date_not_edit_a'] == 0 and $permissionEditFlightGenerateDoc)))
			{
        $idUserFlight = $getIdFlightUser;
        deleteUserFlight($idUserFlight);
      }
    }
	}
?>
<?
 	if(strstr($_SERVER['HTTP_REFERER'], $_SERVER["HTTP_HOST"]))
		header('location: '.$_SERVER['HTTP_REFERER']);
	else
		header('location: http://'.$_SERVER['HTTP_HOST']);
?>