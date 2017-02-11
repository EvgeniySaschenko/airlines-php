<?php
  include('../general.php');
	if(!$permissionReadSubsection)
		exit;
	$allUserFlight = selectAllUserFlight($getIdFlightAssignment);
	$flightPreparing = selectFlightPreparing($getIdFlightAssignment);
	
	foreach($allUserFlight as $userFlight)
	{
		if($userFlight['id_section'] != 4)
		{
			$crewFlight[] = $userFlight;
		}	
	}
	
	
	
	# PHPWord
	require_once '../PHPWord/src/PhpWord/Autoloader.php';
	\PhpOffice\PhpWord\Autoloader::register();
	$phpWord = new \PhpOffice\PhpWord\PhpWord();
	$phpWord->setDefaultFontName('Times New Roman');
	// Стиль документа
	function m2t($millimeters){
		return floor($millimeters*56.7);
	}
	$sectionStyle = array('orientation' => null,
		'marginLeft' => m2t(10),
		'marginRight' => m2t(10),
		'marginTop' => m2t(5),
		'marginBottom' => m2t(5),
	 );
	$section = $phpWord->addSection($sectionStyle);
	//Нижний колонтитул с нумерацией страниц посередине
/* 	$footer = $section->createFooter();
	
	$userPreserveText = fullNameUser($currentUser[0]['last_name_'.$lang], $currentUser[0]['name_'.$lang], $currentUser[0]['first_name_'.$lang]);
	$datePreserveText = date('d.m.Y H:i:s');
	
	$footer->addPreserveText('Ст. {PAGE} из {NUMPAGES}, '.$langFullName.': '.$userPreserveText.', '.$langDateCreate.': '.$datePreserveText.', IP: '.$currentUserIp, array('bold'=>false, 'size' => 7),array('align'=>'left', 'spaceBefore' => 0, 'spaceAfter' => 0));
	 */
	// Стили таблиц
	$phpWord->addTableStyle('table1', array('align'=>'center'));
	$phpWord->addTableStyle('table2', array('align'=>'center'));
	$phpWord->addTableStyle('table3', array('align'=>'center'));
	
	
	$cell = array('borderSize' => 1, 'valign' => 'center');
	$cellColSpan2 = array('borderSize' => 1, 'gridSpan' => 2, 'valign' => 'center');
	$cellColSpan3 = array('borderSize' => 1, 'gridSpan' => 3, 'valign' => 'center');
	
	$cellNoBorder = array('', 'valign' => 'center');
	$cellColSpan3NoBorder = array('', 'gridSpan' => 3, 'valign' => 'center');
	$cellColSpan6NoBorder = array('', 'gridSpan' => 6, 'valign' => 'center');
	
	
	
	$cellRowContinue = array('borderSize' => 1, 'vMerge' => 'continue');
	$styleSignature = array('align' => 'center', 'height'=> 40);
	
	// Стили текста
	$phpWord->addFontStyle('font-cell', array('size' => 11, 'bold' => false));
	$phpWord->addFontStyle('font-bold', array('size' => 11, 'bold' => true));
	$phpWord->addFontStyle('font-header', array('size' => 13, 'bold' => true));
	$phpWord->addParagraphStyle('paragrap-cell', array('align' => 'center', 'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));
	$phpWord->addParagraphStyle('paragrap-cell-left', array('align' => 'left', 'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));
	$phpWord->addParagraphStyle('paragrap-cell-right', array('align' => 'right', 'spaceBefore' => 0, 'spaceAfter' => 0, 'spacing' => 0));
	
	// Таблица
	$table = $section->addTable('table1');
		$table->addRow(m2t(0));
			$table->addCell(m2t(50), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(40), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(2), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(40), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(10), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(40), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			
		$table->addRow(m2t(0));
			$table->addCell(m2t(), $cellColSpan3NoBorder)->addImage('../images/logo-doc.png', array('align' => 'left'));
			$table->addCell(m2t(), $cellColSpan3NoBorder)->addText('OPS 1.975', 'font-bold', 'paragrap-cell-right');
			
		$table->addRow(m2t(0));
			$table->addCell(m2t(), $cellColSpan6NoBorder)->addText('ПРЕДВАРИТЕЛЬНАЯ ПОДГОТОВКА', 'font-bold', 'paragrap-cell');
			
		$table->addRow(m2t(0));
			$table->addCell(m2t(), $cellColSpan6NoBorder)->addText('ПО  МАРШРУТАМ  И  АЭРОДРОМАМ', 'font-bold', 'paragrap-cell');
			
		$table->addRow(m2t(5));
			$table->addCell(m2t(), $cellColSpan6NoBorder)->addText('ЛИСТ КОНТРОЛЬНОЙ ПРОВЕРКИ,  а/к “МАКСИМУС ЭЙРЛАЙНС”', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText('Тип ВС: '.$currentAssignmentFlight[0]['aircraft_'.$lang], 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('Рейс '.replacementNull($flightPreparing[0]['number_flight_1']), 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('Должность', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('№', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('Фамилия', 'font-cell', 'paragrap-cell');
			
			
			$userId = $crewFlight[0]['id'];	
			$userFullname = fullNameUser($crewFlight[0]['last_name_'.$lang], $crewFlight[0]['name_'.$lang], $crewFlight[0]['first_name_'.$lang]);
			$userRank = $crewFlight[0]['rank_'.$lang];
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText('', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('Рейс '.replacementNull($flightPreparing[0]['number_flight_2']), 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userRank), 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, 1), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userFullname), 'font-cell', 'paragrap-cell-left');
			
			$userId = $crewFlight[1]['id'];	
			$userFullname = fullNameUser($crewFlight[1]['last_name_'.$lang], $crewFlight[1]['name_'.$lang], $crewFlight[1]['first_name_'.$lang]);
			$userRank = $crewFlight[1]['rank_'.$lang];
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText('', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('Рейс '.replacementNull($flightPreparing[0]['number_flight_3']), 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userRank), 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, 2), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userFullname), 'font-cell', 'paragrap-cell-left');
			
			$userId = $crewFlight[2]['id'];	
			$userFullname = fullNameUser($crewFlight[2]['last_name_'.$lang], $crewFlight[2]['name_'.$lang], $crewFlight[2]['first_name_'.$lang]);
			$userRank = $crewFlight[2]['rank_'.$lang];
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cellColSpan2)->addText('Маршрут полета: '.$flightPreparing[0]['route_flight_1'], 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userRank), 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, 3), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userFullname), 'font-cell', 'paragrap-cell-left');
			
			$userId = $crewFlight[3]['id'];	
			$userFullname = fullNameUser($crewFlight[3]['last_name_'.$lang], $crewFlight[3]['name_'.$lang], $crewFlight[3]['first_name_'.$lang]);
			$userRank = $crewFlight[3]['rank_'.$lang];
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cellColSpan2)->addText('Маршрут полета: '.$flightPreparing[0]['route_flight_2'], 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userRank), 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, 4), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userFullname), 'font-cell', 'paragrap-cell-left');
			
			$userId = $crewFlight[4]['id'];	
			$userFullname = fullNameUser($crewFlight[4]['last_name_'.$lang], $crewFlight[4]['name_'.$lang], $crewFlight[4]['first_name_'.$lang]);
			$userRank = $crewFlight[4]['rank_'.$lang];
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cellColSpan2)->addText('ЗАР: '.$flightPreparing[0]['route_zar'], 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userRank), 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, 5), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userFullname), 'font-cell', 'paragrap-cell-left');
			
			$userId = $crewFlight[5]['id'];	
			$userFullname = fullNameUser($crewFlight[5]['last_name_'.$lang], $crewFlight[5]['name_'.$lang], $crewFlight[5]['first_name_'.$lang]);
			$userRank = $crewFlight[5]['rank_'.$lang];
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cellColSpan2)->addText('Дата и время проведения: '.convertDate($flightPreparing[0]['date_execution_1']).'   '.convertDate($flightPreparing[0]['date_execution_2']), 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userRank), 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, 6), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userFullname), 'font-cell', 'paragrap-cell-left');
			
			$userId = $crewFlight[6]['id'];	
			$userFullname = fullNameUser($crewFlight[6]['last_name_'.$lang], $crewFlight[6]['name_'.$lang], $crewFlight[6]['first_name_'.$lang]);
			$userRank = $crewFlight[6]['rank_'.$lang];
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cellColSpan2)->addText('', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userRank), 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, 7), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userFullname), 'font-cell', 'paragrap-cell-left');
			
			$userId = $crewFlight[7]['id'];	
			$userFullname = fullNameUser($crewFlight[7]['last_name_'.$lang], $crewFlight[7]['name_'.$lang], $crewFlight[7]['first_name_'.$lang]);
			$userRank = $crewFlight[7]['rank_'.$lang];
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cellColSpan2)->addText('', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userRank), 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, 8), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userFullname), 'font-cell', 'paragrap-cell-left');
			
			$userId = $crewFlight[8]['id'];	
			$userFullname = fullNameUser($crewFlight[8]['last_name_'.$lang], $crewFlight[8]['name_'.$lang], $crewFlight[8]['first_name_'.$lang]);
			$userRank = $crewFlight[8]['rank_'.$lang];
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cellColSpan2)->addText('', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userRank), 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, 9), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userFullname), 'font-cell', 'paragrap-cell-left');
			
			$userId = $crewFlight[9]['id'];	
			$userFullname = fullNameUser($crewFlight[9]['last_name_'.$lang], $crewFlight[9]['name_'.$lang], $crewFlight[9]['first_name_'.$lang]);
			$userRank = $crewFlight[9]['rank_'.$lang];
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cellColSpan2)->addText('', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userRank), 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, 10), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(checkEmpty1Return2($userId, $userFullname), 'font-cell', 'paragrap-cell-left');
			
	// Таблица
	$table = $section->addTable('table2');
		$table->addRow(m2t(3));
			$table->addCell(m2t(132), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(30), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(20), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText('Контрольные вопросы', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('Кто отвечает', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('Оценка', 'font-bold', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cellColSpan3)->addText('1. ОСОБЕННОСТИ ПОЛЕТА В ДАННУЮ СТРАНУ', 'font-bold', 'paragrap-cell-left');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('1.1  Государственные требования', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('1.2  Используемые единицы измерения', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('2П', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('1.3  Процедуры полета в зоне ожидания', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('1.4  Аварийные процедуры:', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('        - аварийные частоты', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('Б/Р', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('        - использование ответчика, TCAS', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('        - сигналы бедствия и срочности', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('Б/Р', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('        - действия при потере радиосвязи', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('        - действия при перехвате. Сигналы', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cellColSpan3)->addText('2. ОСОБЕННОСТИ ПОЛЕТА В ВОЗДУШНОМ ПРОСТРАНСТВЕ ПРОЛЕТАЕМЫХ ГОСУДАРСТВ', 'font-bold', 'paragrap-cell-left');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('2.1 Отличие процедур УВД от процедур ИКАО', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('2.2 Действия при потере радиосвязи', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('2.3 Аварийное снижение', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cellColSpan3)->addText('3 .ПОЛЕТ ПО МАРШРУТУ', 'font-bold', 'paragrap-cell-left');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('3.1 Радионавигационное обеспечение по трассе', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('Б/Р', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('3.2 Безопасные высоты', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('3.3 Рельеф по трассе', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('3.4 Порядок ведения радиосвязи. Рубежи передачи', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('Б/Р', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('3.5 Особенности эшелонирования', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('3.6 Запретные зоны. Зоны с ограниченным режимом', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('3.7 Спрямленные маршруты', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('3.8 Аэродромы по маршруту, пригодные для вынужденной посадки', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('3.9 Полёты с RVSM,   RNAV', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС/2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('3.10 Переход из футовой в метрическую системы измерения и обратно', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cellColSpan3)->addText('4. АЭРОДРОМ ПОСАДКИ', 'font-bold', 'paragrap-cell-left');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('4.1 Снижение с эшелона полета / рубежи, высоты', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС/2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('4.2 STAR, Нбез. подхода, ограничения по Н и V', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС/2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('4.3 Превышение аэродрома. Препятствия в районе а / д.', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС/2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('4.4 Характеристики   BПП (длина, ширина, превышения торцов), системы захода, светотехническое оборудование, УНГ, минимумы для посадки', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС/2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('4.5 Схемы ухода на второй круг', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС/2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('4.6 Правила и особенности руления', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС/2П', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('4.7 Запрос запуска, буксировки, руления, диспетчерского разрешения,        антиобледенительные процедуры', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС/2П', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('4.8 SID-ы, особенности УВД и связи. Градиенты набора', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС/2П', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('4.9 Ограничения по шуму, расположение мониторов', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС/2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cellColSpan3)->addText('5. ЗАПАСНЫЕ АЭРОДРОМЫ', 'font-bold', 'paragrap-cell-left');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('5.1 Запасной аэродром для взлета и для посадки', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('5.2 Маршрут следования на запасной аэродром', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('5.3 SТAR-ы, Нбез, подхода. Ограничения по V и Н', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('5.4 Превышение аэродрома. Препятствия в районе а / д', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('5.5 Характеристики ВПП (длина, ширина, превышения торцов), системы захода, светотехническое оборудование, УНГ, минимумы для посадки. Ограничения по шуму', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС/2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('5.6 Схемы ухода на второй круг', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС/2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('5.7 Правила и особенности руления', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС/2П/ШТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(4));
			$table->addCell(m2t(0), $cell)->addText('5.8 Ограничения по шуму', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText('КВС', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('C', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(10));
			$table->addCell(m2t(0), $cellColSpan3)->addText('Замечания: '.$flightPreparing[0]['remarks'], 'font-cell', 'paragrap-cell-left');
			
		// СПЕЦИАЛИСТЫ, ПРОВОДИВШИЕ ПРЕДВАРИТЕЛЬНУЮ ПОДГОТОВКУ
	$table = $section->addTable('table3');
		$table->addRow(m2t(0));
			$table->addCell(m2t(102), $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(40), $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(40), $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
	
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cellColSpan3NoBorder)->addText('ЭКИПАЖ К ПОЛЁТУ ГОТОВ', 'font-bold', 'paragrap-cell');
			
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cellColSpan3NoBorder)->addText('СПЕЦИАЛИСТЫ, ПРОВОДИВШИЕ ПРЕДВАРИТЕЛЬНУЮ ПОДГОТОВКУ', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText('ДОЛЖНОСТЬ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('ФАМИЛИЯ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('ПОДПИСЬ', 'font-cell', 'paragrap-cell');
			

		// Начальник ЛС	
		$userManager_Flight_Rank = $flightPreparing[0]['manager_f_rank_'.$lang];
		$userManager_Flight_Name = shortenName($flightPreparing[0]['manager_f_last_name_'.$lang], $flightPreparing[0]['manager_f_name_'.$lang], $flightPreparing[0]['manager_f_first_name_'.$lang]);
		if($flightPreparing[0]['date_manager_flight'] != 0)
			$userManager_Flight_Signature = '../images/user/signature/'.$flightPreparing[0]['id_manager_f'].'.jpg';
		else
			$userManager_Flight_Signature = '../images/transparent.gif';
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText($userManager_Flight_Rank, 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText($userManager_Flight_Name, 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addImage(checkFileSign($userManager_Flight_Signature), $styleSignature);
			
		// Начальник ИТО	
		$userManager_Engineer_Rank = $flightPreparing[0]['manager_e_rank_'.$lang];
		$userManager_Engineer_Name = shortenName($flightPreparing[0]['manager_e_last_name_'.$lang], $flightPreparing[0]['manager_e_name_'.$lang], $flightPreparing[0]['manager_e_first_name_'.$lang]);
		if($flightPreparing[0]['date_manager_engineer'] != 0)
			$userManager_Engineer_Signature = '../images/user/signature/'.$flightPreparing[0]['id_manager_e'].'.jpg';
		else
			$userManager_Engineer_Signature = '../images/transparent.gif';
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText($userManager_Engineer_Rank, 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText($userManager_Engineer_Name, 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addImage(checkFileSign($userManager_Engineer_Signature), $styleSignature);
			
		// Штурман 
		$userNavigator_Rank = $flightPreparing[0]['navigator_rank_'.$lang];
		$userNavigator_Name = shortenName($flightPreparing[0]['navigator_last_name_'.$lang], $flightPreparing[0]['navigator_name_'.$lang], $flightPreparing[0]['navigator_first_name_'.$lang]);
		if($flightPreparing[0]['date_navigator'] != 0)
			$userNavigator_Signature = '../images/user/signature/'.$flightPreparing[0]['id_navigator'].'.jpg';
		else
			$userNavigator_Signature = '../images/transparent.gif';
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText($userNavigator_Rank, 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addText($userNavigator_Name, 'font-cell', 'paragrap-cell-left');
			$table->addCell(m2t(0), $cell)->addImage(checkFileSign($userNavigator_Signature), $styleSignature);
			
		//	ЛЕТНАЯ / ПРАКТИЧЕСКАЯ КОМПЕТЕНЦИЯ МАРШРУТА
		$table->addRow(m2t(10));
			$table->addCell(m2t(0), $cellColSpan3NoBorder)->addText('ЛЕТНАЯ / ПРАКТИЧЕСКАЯ КОМПЕТЕНЦИЯ МАРШРУТА', 'font-bold', 'paragrap-cell');
		
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText('ЗОНА/МАРШРУТ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('ДАТА', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('ПОДПИСЬ', 'font-cell', 'paragrap-cell');
			
			$dateSign_Route_1 = convertDate($flightPreparing[0]['date_route_1']);
			if($flightPreparing[0]['date_sign_route_1'] != 0)
				$userSign_Route_1 = '../images/user/signature/'.$flightPreparing[0]['id_sign_route_1'].'.jpg';
			else
				$userSign_Route_1 = '../images/transparent.gif';
			
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText($flightPreparing[0]['components_route_1'], 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(replacementNull($dateSign_Route_1), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addImage(checkFileSign($userSign_Route_1), $styleSignature);
			
			$dateSign_Route_2 = convertDate($flightPreparing[0]['date_route_2']);
			if($flightPreparing[0]['date_sign_route_2'] != 0)
				$userSign_Route_2 = '../images/user/signature/'.$flightPreparing[0]['id_sign_route_2'].'.jpg';
			else
				$userSign_Route_2 = '../images/transparent.gif';
			
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText($flightPreparing[0]['components_route_2'], 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(replacementNull($dateSign_Route_2), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addImage(checkFileSign($userSign_Route_2), $styleSignature);
			
		//ЛЕТНАЯ / ПРАКТИЧЕСКАЯ КОМПЕТЕНЦИЯ АЭРОДРОМА КАТЕГОРИИ “А”
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cellColSpan3NoBorder)->addText('ЛЕТНАЯ / ПРАКТИЧЕСКАЯ КОМПЕТЕНЦИЯ АЭРОДРОМА КАТЕГОРИИ “А”', 'font-bold', 'paragrap-cell');
		
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText('АЭРОДРОМ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('ДАТА', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('ПОДПИСЬ', 'font-cell', 'paragrap-cell');
			
			$dateSign_Airport_A_1 = convertDate($flightPreparing[0]['date_airport_a_1']);
			if($flightPreparing[0]['date_sign_airport_a_1'] != 0)
				$userSign_Airport_A_1 = '../images/user/signature/'.$flightPreparing[0]['id_sign_airport_a_1'].'.jpg';
			else
				$userSign_Airport_A_1 = '../images/transparent.gif';
			
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText($flightPreparing[0]['components_airport_a_1'], 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(replacementNull($dateSign_Airport_A_1), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addImage(checkFileSign($userSign_Airport_A_1), $styleSignature);
			
			$dateSign_Airport_A_2 = convertDate($flightPreparing[0]['date_airport_a_2']);
			if($flightPreparing[0]['date_sign_airport_a_2'] != 0)
				$userSign_Airport_A_2 = '../images/user/signature/'.$flightPreparing[0]['id_sign_airport_a_2'].'.jpg';
			else
				$userSign_Airport_A_2 = '../images/transparent.gif';
			
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText($flightPreparing[0]['components_airport_a_2'], 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(replacementNull($dateSign_Airport_A_2), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addImage(checkFileSign($userSign_Airport_A_2), $styleSignature);
			
		//ЛЕТНАЯ / ПРАКТИЧЕСКАЯ КОМПЕТЕНЦИЯ АЭРОДРОМА КАТЕГОРИИ “B”
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cellColSpan3NoBorder)->addText('ЛЕТНАЯ / ПРАКТИЧЕСКАЯ КОМПЕТЕНЦИЯ АЭРОДРОМА КАТЕГОРИИ “B”', 'font-bold', 'paragrap-cell');
		
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText('АЭРОДРОМ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('ДАТА', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('ПОДПИСЬ', 'font-cell', 'paragrap-cell');
			
			$dateSign_Airport_B_1 = convertDate($flightPreparing[0]['date_airport_b_1']);
			if($flightPreparing[0]['date_sign_airport_b_1'] != 0)
				$userSign_Airport_B_1 = '../images/user/signature/'.$flightPreparing[0]['id_sign_airport_b_1'].'.jpg';
			else
				$userSign_Airport_B_1 = '../images/transparent.gif';
			
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText($flightPreparing[0]['components_airport_b_1'], 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(replacementNull($dateSign_Airport_B_1), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addImage(checkFileSign($userSign_Airport_B_1), $styleSignature);
			
			$dateSign_Airport_B_2 = convertDate($flightPreparing[0]['date_airport_b_2']);
			if($flightPreparing[0]['date_sign_airport_b_2'] != 0)
				$userSign_Airport_B_2 = '../images/user/signature/'.$flightPreparing[0]['id_sign_airport_b_2'].'.jpg';
			else
				$userSign_Airport_B_2 = '../images/transparent.gif';
			
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText($flightPreparing[0]['components_airport_b_2'], 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(replacementNull($dateSign_Airport_B_2), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addImage(checkFileSign($userSign_Airport_B_2), $styleSignature);
			
		//ЛЕТНАЯ / ПРАКТИЧЕСКАЯ КОМПЕТЕНЦИЯ АЭРОДРОМА КАТЕГОРИИ “C”
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cellColSpan3NoBorder)->addText('ЛЕТНАЯ / ПРАКТИЧЕСКАЯ КОМПЕТЕНЦИЯ АЭРОДРОМА КАТЕГОРИИ “C”', 'font-bold', 'paragrap-cell');
		
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText('АЭРОДРОМ', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('ДАТА', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText('ПОДПИСЬ', 'font-cell', 'paragrap-cell');
			
			$dateSign_Airport_C_1 = convertDate($flightPreparing[0]['date_airport_c_1']);
			if($flightPreparing[0]['date_sign_airport_c_1'] != 0)
				$userSign_Airport_C_1 = '../images/user/signature/'.$flightPreparing[0]['id_sign_airport_c_1'].'.jpg';
			else
				$userSign_Airport_C_1 = '../images/transparent.gif';
			
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText($flightPreparing[0]['components_airport_c_1'], 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(replacementNull($dateSign_Airport_C_1), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addImage(checkFileSign($userSign_Airport_C_1), $styleSignature);
			
			$dateSign_Airport_C_2 = convertDate($flightPreparing[0]['date_airport_c_2']);
			if($flightPreparing[0]['date_sign_airport_c_2'] != 0)
				$userSign_Airport_C_2 = '../images/user/signature/'.$flightPreparing[0]['id_sign_airport_c_2'].'.jpg';
			else
				$userSign_Airport_C_2 = '../images/transparent.gif';

			
		$table->addRow(m2t(5));
			$table->addCell(m2t(0), $cell)->addText($flightPreparing[0]['components_airport_c_2'], 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addText(replacementNull($dateSign_Airport_C_2), 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(0), $cell)->addImage(checkFileSign($userSign_Airport_C_2), $styleSignature);
			
		/* $table->addRow(m2t(5));
			$table->addCell(m2t(0), $cellColSpan3NoBorder)->addText('', 'font-cell', 'paragrap-cell'); */
			
		$table->addRow(m2t(0));
			$table->addCell(m2t(0), $cellColSpan3NoBorder)->addText('Шкала оцінок: С – стандарт; М – майже стандарт; Н – нижче стандарту; НЗ – не задовільно;', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(0));
			$table->addCell(m2t(0), $cellColSpan3NoBorder)->addText('НВ – не виконувалося.Примітка: Для оцінок Н та НЗ повинно бути надано письмове пояснення', 'font-cell', 'paragrap-cell');
			
			
			$BEFORE_YOU_BEGIN = $langBEFORE_YOU_BEGIN.' № '.$currentAssignmentFlight[0]['aircraft_'.$lang].'-'.convertDateMonth($currentAssignmentFlight[0]['date_departure']).'-'.convertDateYear($currentAssignmentFlight[0]['date_departure']);


	// Создание документа
 	$path = '../tmp/'.time().'_'.$currentUser[0]['id'].'.docx';
	$contentType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
	$name = translit(replaceInvalidCharacters($BEFORE_YOU_BEGIN)).'.docx';
	$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
	$objWriter->save($path);
	
	// Отдать документ на скачивание
	header('Content-type: '.$contentType);
	header('Content-Disposition: attachment; filename= '.$name);
	readfile($path);
	unlink($path);
?>