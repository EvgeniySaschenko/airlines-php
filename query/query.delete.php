<?php
	include('db.connect.php');
	//ДОКУМЕНТ ОТПРАВЛЕННЫЙ пользователю
	function deleteSentDoc($idSentDoc){
		global $db;
		$query = 
		"DELETE FROM ae_doc_sent
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idSentDoc);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}	
	
	//КНИГА
	function deleteBook($idBook){
		global $db;
		$query = 
		"DELETE ae_book, ae_chapter, ae_doc, ae_doc_sent
		FROM ae_book
		LEFT OUTER JOIN ae_chapter ON ae_chapter.id_book  = ?
		LEFT OUTER JOIN ae_doc ON ae_doc.id_book  = ?
		LEFT OUTER JOIN ae_doc_sent ON ae_doc_sent.id_doc  = ae_doc.id
		WHERE ae_book.id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "iii", $idBook, $idBook, $idBook);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}	
	
	//ГЛАВА
	function deleteChapter($idChapter){
		global $db;
		$query = 
		"DELETE ae_chapter, ae_doc, ae_doc_sent
		FROM ae_chapter
		LEFT OUTER JOIN ae_doc ON ae_doc.id_chapter  = ?
		LEFT OUTER JOIN ae_doc_sent ON ae_doc_sent.id_doc  = ae_doc.id
		WHERE ae_chapter.id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $idChapter, $idChapter);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	
	//ДОКУМЕНТ
	function deleteDoc($idDoc){
		global $db;
		$query = 
		"DELETE ae_doc, ae_doc_sent
		FROM ae_doc
		LEFT OUTER JOIN ae_doc_sent ON ae_doc_sent.id_doc  = ? 
		WHERE ae_doc.id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $idDoc, $idDoc);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	
	//ПОЛЕТ
	function deleteFlightAssignment($idFlightAssignment){
		global $db;
		$query = 
		"DELETE ae_flight_assignment, ae_flight_user, ae_flight_report, ae_flight_preparing, ae_flight_takeoff_approach
		FROM ae_flight_assignment
		LEFT OUTER JOIN ae_flight_user ON ae_flight_user.id_flight_assignment  = ?
		LEFT OUTER JOIN ae_flight_report ON ae_flight_report.id_flight_assignment  = ?
		LEFT OUTER JOIN ae_flight_preparing ON ae_flight_preparing.id_flight_assignment  = ?
		LEFT OUTER JOIN ae_flight_takeoff_approach ON ae_flight_takeoff_approach.id_flight_assignment  = ?
		WHERE ae_flight_assignment.id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
		{
			return false;
		}
		mysqli_stmt_bind_param($stmt, "iiiii", $idFlightAssignment, $idFlightAssignment, $idFlightAssignment, $idFlightAssignment, $idFlightAssignment);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	
	//ОТЧЕТ О ПОЛЕТЕ АБ
	function deleteReportAS($idReportAs){
		global $db;
		$query = 
		"DELETE FROM ae_report_as
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idReportAs);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	
	//ДОЛЖНОСТЬ
	function deleteRank($idRank){
		global $db;
		$query = 
		"DELETE FROM ae_rank
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idRank);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	
	//ТИП ДОКУМЕНТА
	function deleteTypeDoc($idTypeDoc){
		global $db;
		$query = 
		"DELETE FROM ae_doc_type
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idTypeDoc);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	
	//ПОЛЬЗОВАТЕЛЬ
	function deleteUser($idUser){
		global $db;
		$query = 
		"DELETE 
		FROM ae_user
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idUser);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	
	//ЭКИПАЖ
	function deleteCrew($idCrew){
		global $db;
		$query = 
		"DELETE 
		FROM ae_crew
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idCrew);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	
	//НОВОСТЬ
	function deleteNews($idNews){
		global $db;
		$query = 
		"DELETE ae_news, ae_doc
		FROM ae_news
		LEFT OUTER JOIN ae_doc ON ae_doc.id_news  = ?
		WHERE ae_news.id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "ii", $idNews, $idNews);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
  
	//ЗАДАНИЕ НА ПОЛЕТ
	function deleteReportFlight($idAssignmentFlight){
		global $db;
		$query = 
		"DELETE
		FROM ae_flight_report
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idAssignmentFlight);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	
	//ПОЛЬЗОВАТЕЛЬ В ЗАДАНИИ НА ПОЛЕТ 
	function deleteUserFlight($idUserFlight){
		global $db;
		$query = 
		"DELETE
		FROM ae_flight_user
		WHERE id = ?";
		if(!$stmt = mysqli_prepare($db, $query))
			return false;
		mysqli_stmt_bind_param($stmt, "i", $idUserFlight);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
	
	//СТАТИСТИКА
	function deleteVisitors(){
		global $db;
		$query = 
		"DELETE FROM ae_visitor
		WHERE date_visit < (NOW() - INTERVAL 10 DAY)";
		mysqli_query($db, $query) or die(mysqli_error($db));
	}
?>