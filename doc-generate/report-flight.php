<?php
  include('../general.php');
	if(!$permissionReadSubsection)
		exit;
	$allUserFlight = selectAllUserFlight($getIdFlightAssignment);
	$allFlightTakeoffApproach = selectAllFlightTakeoffApproach($getIdFlightAssignment);
	
	# PHPWord
	require_once '../PHPWord/src/PhpWord/Autoloader.php';
	\PhpOffice\PhpWord\Autoloader::register();
	$phpWord = new \PhpOffice\PhpWord\PhpWord();
	$phpWord->setDefaultFontName('Times New Roman');
	// Стиль документа
	function m2t($millimeters){
		return floor($millimeters*56.7);
	}
	$sectionStyle = array('orientation' => 'landscape',
		'marginLeft' => m2t(10),
		'marginRight' => m2t(10),
		'marginTop' => m2t(5),
		'marginBottom' => m2t(0),
	 );
	$section = $phpWord->addSection($sectionStyle);
	//Нижний колонтитул с нумерацией страниц посередине
/* 	$footer = $section->createFooter();
	
	$userPreserveText = fullNameUser($currentUser[0]['last_name_'.$lang], $currentUser[0]['name_'.$lang], $currentUser[0]['first_name_'.$lang]);
	$datePreserveText = date('d.m.Y H:i:s');
	
	$footer->addPreserveText('Ст. {PAGE} из {NUMPAGES}, '.$langFullName.': '.$userPreserveText.', '.$langDateCreate.': '.$datePreserveText.', IP: '.$currentUserIp, array('bold'=>false, 'size' => 7),array('align'=>'left', 'spaceBefore' => 0, 'spaceAfter' => 0)); */
	
	// Стили таблиц
	$phpWord->addTableStyle('table1', array('align'=>'center'));
	$phpWord->addTableStyle('table2', array('align'=>'center'));
	$cell = array('borderSize' => 1, 'valign' => 'center');
	
	$cellNoBorder = array('valign' => 'center', 'valign' => 'center');
	
	$cellColSpanNoBorder2 = array('gridSpan' => 2, 'valign' => 'center'); 
	$cellColSpanNoBorder3 = array('gridSpan' => 3, 'valign' => 'center'); 
	$cellColSpanNoBorder4 = array('gridSpan' => 4, 'valign' => 'center'); 
	$cellColSpanNoBorder5 = array('gridSpan' => 5, 'valign' => 'center');
	$cellColSpanNoBorder6 = array('gridSpan' => 6, 'valign' => 'center');
	$cellColSpanNoBorder7 = array('gridSpan' => 7, 'valign' => 'center');
	$cellColSpanNoBorder8 = array('gridSpan' => 8, 'valign' => 'center');
	$cellColSpanNoBorder9 = array('gridSpan' => 9, 'valign' => 'center');
	$cellColSpanNoBorder10 = array('gridSpan' => 10, 'valign' => 'center');
	$cellColSpanNoBorder12 = array('gridSpan' => 12, 'valign' => 'center');
	$cellColSpanNoBorder13 = array('gridSpan' => 13, 'valign' => 'center');
	$cellColSpanNoBorder14 = array('gridSpan' => 14, 'valign' => 'center');
	$cellColSpanNoBorder15 = array('gridSpan' => 15, 'valign' => 'center');
	$cellColSpanNoBorder16 = array('gridSpan' => 16, 'valign' => 'center');
	
	$cellColSpan2 = array('borderSize' => 1, 'gridSpan' => 2, 'valign' => 'center');
	$cellColSpan3 = array('borderSize' => 1, 'gridSpan' => 3, 'valign' => 'center');
	$cellColSpan5 = array('borderSize' => 1, 'gridSpan' => 5, 'valign' => 'center');
	
	$cellColSpanBorderBottom16 = array('borderBottomSize' => 1, 'gridSpan' => 16, 'valign' => 'center');
	$cellColSpanBorderBottom24 = array('borderBottomSize' => 1, 'gridSpan' => 24, 'valign' => 'bottom');
	
	$cellColSpanNoBorder16 = array('gridSpan' => 16, 'valign' => 'center');
	
	$cellRowSpan = array('borderSize' => 1, 'vMerge' => 'restart', 'valign' => 'center');
	
	$styleSignature = array('align' => 'center', 'height'=> 38);
	
	$cellRowSpanDirection = array('borderSize' => 1, 'vMerge' => 'restart', 'valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
	$cellRowContinue = array('borderSize' => 1, 'vMerge' => 'continue');
	
	// Стили текста
	$phpWord->addFontStyle('font-cell-alert', array('size' => 8, 'bold' => false, 'color' => '#FF0000'));
	$phpWord->addFontStyle('font-cell-header', array('size' => 9, 'bold' => false));
	$phpWord->addFontStyle('font-cell', array('size' => 8, 'bold' => false));
	$phpWord->addFontStyle('font-cell-7', array('size' => 7, 'bold' => false));
	$phpWord->addFontStyle('font-bold', array('size' => 9, 'bold' => true));
	$phpWord->addParagraphStyle('paragrap-cell', array('align' => 'center', 'spaceBefore' => 0, 'spaceAfter' => 0));
	$phpWord->addParagraphStyle('paragrap-cell-left', array('align' => 'left', 'spaceBefore' => 0, 'spaceAfter' => 0));
	$phpWord->addParagraphStyle('paragrap-cell-right', array('align' => 'right', 'spaceBefore' => 0, 'spaceAfter' => 0));
	
			$REPORT_OF_FLIGHT = $word[325]['name_'.$lang].' № '.$currentAssignmentFlight[0]['aircraft_'.$lang].'-'.$currentAssignmentFlight[0]['number_assignment'].'-'.convertDateMonth($currentAssignmentFlight[0]['date_departure']).'-'.convertDateYear($currentAssignmentFlight[0]['date_departure']);
	
	 $allReportFlight = selectAllReportFlight($getIdFlightAssignment);
	// Таблица
	$table = $section->addTable('table1');
	
		$table->addRow(m2t(8));
			$table->addCell(null, $cellColSpanBorderBottom24)->addText($REPORT_OF_FLIGHT, 'font-bold' ,'paragrap-cell'); 
		
		$table->addRow(m2t(10));
			$table->addCell(m2t(20), $cellRowSpan)->addText($word[128]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(15), $cellRowSpan)->addText($word[200]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(30), $cellRowSpan)->addText($word[202]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(15), $cellRowSpanDirection)->addText($word[220]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(20), $cellColSpan2)->addText($word[221]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(20), $cellColSpan2)->addText($word[222]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[223]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[326]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[224]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(30), $cellColSpan3)->addText($word[225]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(30), $cellColSpan3)->addText($word[226]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(20), $cellColSpan2)->addText($word[227]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[228]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[229]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[303]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[230]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[231]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			
		$table->addRow(m2t(25));
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[232]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[327]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[284]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[328]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[235]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[236]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[284]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[235]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[236]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[284]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[237]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(m2t(10), $cellRowSpanDirection)->addText($word[238]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			
		$table->addRow(m2t(5));
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[239]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[240]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[240]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[240]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[240]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[240]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[240]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[240]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[241]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[241]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[241]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[239]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[239]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[239]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[241]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[349]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[329]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[329]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[241]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[241]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[330]['name_'.$lang], 'font-cell-header', 'paragrap-cell');
			
			foreach($allReportFlight as $reportFlight)
			{
				$table->addRow(m2t(5));
					$table->addCell(null, $cell)->addText(convertDate($reportFlight['date_shipping']), 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['number_flight'], 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['point_departure'].' - '.$reportFlight['point_arrival'], 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['distance'], 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText(convertTime($reportFlight['time_takeoff']), 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText(convertTime($reportFlight['time_landing']), 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText(convertTime(differenceInTime($reportFlight['time_takeoff'], $reportFlight['time_landing'])), 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText(convertTime($reportFlight['time_night']), 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText(convertTime($reportFlight['time_job_ground']), 'font-cell', 'paragrap-cell');
					
					$table->addCell(null, $cell)->addText(convertNumberToTime(convertTimeToNumber(differenceInTime($reportFlight['time_takeoff'], $reportFlight['time_landing'])) + convertTimeToNumber($reportFlight['time_job_ground'])), 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText(convertTime($reportFlight['time_hours_crew']), 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['fuel_balance'], 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['fuel_fueled'], 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['fuel_balance'] + $reportFlight['fuel_fueled'], 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['oil_balance'], 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['oil_fueled'], 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['oil_balance'] + $reportFlight['oil_fueled'], 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['weight_cargo'], 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['weight_passenger'], 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['centering_rise'], 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['centering_landing'], 'font-cell', 'paragrap-cell');
					
					$takeoffWeight = convertKgToT($currentAssignmentFlight[0]['weight_aircraft']) + convertKgToT($currentAssignmentFlight[0]['curb_weight_aircraft']) + $reportFlight['fuel_balance'] + $reportFlight['fuel_fueled'] + convertKgToT($reportFlight['oil_balance'] + $reportFlight['oil_fueled']) + $reportFlight['weight_cargo'] + ($reportFlight['weight_passenger'] * 80) / 1000;
					// Проверка допустимого веса
					if($takeoffWeight > convertKgToT($currentAssignmentFlight[0]['flight_weight']))
						$fontCellTakeoffWeight = 'font-cell-alert';
					else
						$fontCellTakeoffWeight = 'font-cell';
					
					$table->addCell(null, $cell)->addText($takeoffWeight, $fontCellTakeoffWeight, 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['landing_weight'], 'font-cell', 'paragrap-cell');
					$table->addCell(null, $cell)->addText($reportFlight['echelon'], 'font-cell', 'paragrap-cell');
					
					
					$distance = $distance + $reportFlight['distance'];
					$differenceInTime = $differenceInTime + convertTimeToNumber(differenceInTime($reportFlight['time_takeoff'], $reportFlight['time_landing']));
					$timeNight = $timeNight + convertTimeToNumber($reportFlight['time_night']);
					$timeJobGround = $timeJobGround + convertTimeToNumber($reportFlight['time_job_ground']);
					$timeBlockHours = $timeBlockHours + convertTimeToNumber(differenceInTime($reportFlight['time_takeoff'], $reportFlight['time_landing'])) + convertTimeToNumber($reportFlight['time_job_ground']);
					$timeHoursCrew = $timeHoursCrew + convertTimeToNumber($reportFlight['time_hours_crew']);
					//$fuelBalance = $fuelBalance + $reportFlight['fuel_balance'];
					$fuelFueled = $fuelFueled + $reportFlight['fuel_fueled'];
				//	$allFuel = $allFuel + $reportFlight['fuel_fueled'] + $reportFlight['fuel_balance'];
					//$oilBalance = $oilBalance + $reportFlight['oil_balance'];
					$oilFueled = $oilFueled + $reportFlight['oil_fueled'];
				//	$allOil = $allOil + $reportFlight['oil_fueled'] + $reportFlight['oil_balance'];
					$weightCargo = $weightCargo + $reportFlight['weight_cargo'];
					$weightPassenger = $weightPassenger + $reportFlight['weight_passenger'];
			}
			// Итоговые данные
			$table->addRow(m2t(4));
				$table->addCell(null, $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
				$table->addCell(null, $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
				$table->addCell(null, $cellNoBorder)->addText($langOnly, 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cell)->addText($distance, 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cell)->addText('', 'font-cell', 'paragrap-cell');
				$table->addCell(null, $cell)->addText('', 'font-cell', 'paragrap-cell');
				$table->addCell(null, $cell)->addText(convertNumberToTime($differenceInTime), 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cell)->addText(convertNumberToTime($timeNight), 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cell)->addText(convertNumberToTime($timeJobGround), 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cell)->addText(convertNumberToTime($timeBlockHours), 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cell)->addText(convertNumberToTime($timeHoursCrew), 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cell)->addText($currentAssignmentFlight[0]['balance_fuel'], 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cell)->addText($fuelFueled, 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cell)->addText($allFuel, 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cell)->addText($currentAssignmentFlight[0]['balance_oil'], 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cell)->addText($oilFueled, 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cell)->addText($allOil, 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cell)->addText($weightCargo, 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cell)->addText($weightPassenger, 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
				$table->addCell(null, $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
				$table->addCell(null, $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
				$table->addCell(null, $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
				$table->addCell(null, $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
			// Разрыв страницы
/* 			if(count($allReportFlight) >= 7)
			{
				$section->addPageBreak();	
			} */

      
      // Таблица учёта рабочего времени экипажа  
			foreach($allReportFlight as $reportFlight)
      {
        $time_1 = convertTime($reportFlight['wt_time_preliminary_preparation']);
        $time_2 = convertTime($reportFlight['wt_time_post_flight_work']);
        $time_3 = convertTime($reportFlight['wt_time_parking']);
        $time_4 = convertTime($reportFlight['wt_time_recreation']);
        
        $summ_time_1234 = $summ_time_1234 + $time_1 + $time_2 + $time_3 + $time_4;
      }

			$table->addRow(m2t(5));
				$table->addCell(null, $cellColSpanNoBorder10)->addText($word[129]['name_'.$lang], 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
        
        if($summ_time_1234) {
          $table->addCell(null, $cellColSpanNoBorder14)->addText($word[315]['name_'.$lang], 'font-bold', 'paragrap-cell');
        }
				
        $table->addRow(m2t(5));
            $table->addCell(null, $cell)->addText($word[128]['name_'.$lang], 'font-cell', 'paragrap-cell');
            $table->addCell(null, $cell)->addText($word[131]['name_'.$lang], 'font-cell', 'paragrap-cell');
            $table->addCell(null, $cell)->addText($word[132]['name_'.$lang], 'font-cell', 'paragrap-cell');
            $table->addCell(null, $cell)->addText($word[133]['name_'.$lang], 'font-cell', 'paragrap-cell');
            $table->addCell(null, $cell)->addText($word[317]['name_'.$lang], 'font-cell', 'paragrap-cell');
            $table->addCell(null, $cellColSpan3)->addText($word[134]['name_'.$lang], 'font-cell', 'paragrap-cell');
            $table->addCell(null, $cell)->addText($word[135]['name_'.$lang], 'font-cell', 'paragrap-cell');
            $table->addCell(null, $cellColSpan3)->addText($word[316]['name_'.$lang], 'font-cell', 'paragrap-cell');
        
        $table->addCell(null, $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');     
        
        if($summ_time_1234) {
          $table->addCell(null, $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
          $table->addCell(null, $cellColSpan2)->addText($word[202]['name_'.$lang], 'font-cell', 'paragrap-cell');
          $table->addCell(null, $cellColSpan2)->addText($word[324]['name_'.$lang], 'font-cell', 'paragrap-cell');
          $table->addCell(null, $cell)->addText($word[323]['name_'.$lang], 'font-cell', 'paragrap-cell');
          $table->addCell(null, $cell)->addText($word[319]['name_'.$lang], 'font-cell', 'paragrap-cell');
          $table->addCell(null, $cell)->addText($word[320]['name_'.$lang], 'font-cell', 'paragrap-cell');
          $table->addCell(null, $cell)->addText($word[321]['name_'.$lang], 'font-cell', 'paragrap-cell');
          $table->addCell(null, $cellColSpan2)->addText($word[322]['name_'.$lang], 'font-cell', 'paragrap-cell');
        }

        
			foreach($allReportFlight as $reportFlight)
			{
        $time_all_sum = convertTimeToNumber($reportFlight['wt_time_preliminary_preparation']) +  convertTimeToNumber(differenceInTime($reportFlight['time_takeoff'], $reportFlight['time_landing'])) + convertTimeToNumber($reportFlight['wt_time_post_flight_work']) + convertTimeToNumber($reportFlight['wt_time_parking']) + convertTimeToNumber($reportFlight['wt_time_recreation']);
        $table->addRow(m2t(5));
          $table->addCell(null, $cell)->addText(convertDate($reportFlight['date_shipping']), 'font-cell', 'paragrap-cell');
          $table->addCell(null, $cell)->addText(replacementNull($reportFlight['ta_category']), 'font-cell', 'paragrap-cell');
          $table->addCell(null, $cell)->addText(replacementNull($reportFlight['ta_airport']), 'font-cell', 'paragrap-cell');
          $table->addCell(null, $cell)->addText(replacementNull($reportFlight['ta_dn']), 'font-cell', 'paragrap-cell');
          $table->addCell(null, $cell)->addText(replacementNull($reportFlight['ta_take_off_landing']), 'font-cell', 'paragrap-cell');
          $table->addCell(null, $cellColSpan3)->addText(replacementNull($reportFlight['ta_conditions']), 'font-cell', 'paragrap-cell');
          $table->addCell(null, $cell)->addText(replacementNull($reportFlight['ta_mk_pos']), 'font-cell', 'paragrap-cell');
          $table->addCell(null, $cellColSpan3)->addText(fullNameUser($reportFlight['last_name_'.$lang], $reportFlight['name_'.$lang], $reportFlight['first_name_'.$lang]), 'font-cell', 'paragrap-cell');
          
          $table->addCell(null, $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
        
          if($summ_time_1234) {
            $table->addCell(null, $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
            $table->addCell(null, $cellColSpan2)->addText($reportFlight['point_departure'].'-'.$reportFlight['point_arrival'], 'font-cell-7', 'paragrap-cell');
            $table->addCell(null, $cellColSpan2)->addText(convertTime($reportFlight['wt_time_preliminary_preparation']), 'font-cell', 'paragrap-cell');
            $table->addCell(null, $cell)->addText(convertTime(differenceInTime($reportFlight['time_takeoff'], $reportFlight['time_landing'])), 'font-cell', 'paragrap-cell');
            $table->addCell(null, $cell)->addText(convertTime($reportFlight['wt_time_post_flight_work']), 'font-cell', 'paragrap-cell');
            $table->addCell(null, $cell)->addText(convertTime($reportFlight['wt_time_parking']), 'font-cell', 'paragrap-cell');
            $table->addCell(null, $cell)->addText(convertTime($reportFlight['wt_time_recreation']), 'font-cell', 'paragrap-cell');
            $table->addCell(null, $cellColSpan2)->addText(convertNumberToTime($time_all_sum), 'font-bold', 'paragrap-cell');

            $time_wt_time_preliminary_preparation = $time_wt_time_preliminary_preparation + convertTimeToNumber($reportFlight['wt_time_preliminary_preparation']);
            $time_wt_flight = $time_wt_flight + convertTimeToNumber(differenceInTime($reportFlight['time_takeoff'], $reportFlight['time_landing']));
            $time_wt_time_post_flight_work = $time_wt_time_post_flight_work + convertTimeToNumber($reportFlight['wt_time_post_flight_work']);
            $time_wt_time_parking = $time_wt_time_parking + convertTimeToNumber($reportFlight['wt_time_parking']);
            $time_wt_time_recreation = $time_wt_time_recreation + convertTimeToNumber($reportFlight['wt_time_recreation']);
            $time_all_sum_total = $time_all_sum_total + $time_all_sum;
          }
          
      }
      
      // Итоговые данные
			$table->addRow(m2t(5));
				$table->addCell(null, $cellColSpanNoBorder10)->addText($langNotesPostFlightAnalysis, 'font-bold', 'paragrap-cell');
				$table->addCell(null, $cellColSpanNoBorder3)->addText('', 'font-cell', 'paragrap-cell');
        
      if($summ_time_1234) {
        $table->addCell(null, $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');
        $table->addCell(null, $cellColSpanNoBorder2)->addText('', 'font-cell', 'paragrap-cell');
        $table->addCell(null, $cellColSpan2)->addText(convertNumberToTime($time_wt_time_preliminary_preparation), 'font-bold', 'paragrap-cell');
        $table->addCell(null, $cell)->addText(convertNumberToTime($time_wt_flight), 'font-bold', 'paragrap-cell');
        $table->addCell(null, $cell)->addText(convertNumberToTime($time_wt_time_post_flight_work), 'font-bold', 'paragrap-cell');
        $table->addCell(null, $cell)->addText(convertNumberToTime($time_wt_time_parking), 'font-bold', 'paragrap-cell');
        $table->addCell(null, $cell)->addText(convertNumberToTime($time_wt_time_recreation), 'font-bold', 'paragrap-cell');
        $table->addCell(null, $cellColSpan2)->addText(convertNumberToTime($time_all_sum_total), 'font-bold', 'paragrap-cell');
      }

        
    //$table->addCell(null, $cellColSpanNoBorder6)->addText($langNotesPostFlightAnalysis, 'font-cell', 'paragrap-cell');
		//$table->addCell(null, $cellNoBorder)->addText('', 'font-cell', 'paragrap-cell');	
    //$table->addCell(null, $cellColSpanBorderBottom16)->addText(replacementEmpty($currentAssignmentFlight[0]['remark_pic_r']), 'font-cell', 'paragrap-cell-left');  
    //$table->addCell(null, $cellColSpanBorderBottom16)->addText(replacementEmpty($currentAssignmentFlight[0]['remark_navigator_r']), 'font-cell', 'paragrap-cell-left');  
     
     
				// КВС *****
				$userPIC_Name = fullNameUser($currentAssignmentFlight[0]['pic_r_last_name_'.$lang], $currentAssignmentFlight[0]['pic_r_name_'.$lang], $currentAssignmentFlight[0]['pic_r_first_name_'.$lang]);
				if($currentAssignmentFlight[0]['date_pic_r'] != 0)
					$userPIC_Signature = '../images/user/signature/'.$currentAssignmentFlight[0]['id_pic_r'].'.jpg';
				else
					$userPIC_Signature = '../images/transparent.gif';
				
				foreach($allUserFlight as $userFlightPIC)
				{
					if($userFlightPIC['id_user'] == $currentAssignmentFlight[0]['id_pic_r'])
						$userPIC_Rank = $userFlightPIC['rank_'.$lang];
				}
				
        if($userPIC_Rank and ($userPIC_Rank != $currentAssignmentFlight[0]['manager_f_rank_'.$lang])) {
          $table->addRow(m2t(5));
            $table->addCell(null, $cellColSpanNoBorder2)->addText($userPIC_Rank, 'font-bold', 'paragrap-cell-left');
            $table->addCell(null, $cellColSpanNoBorder15)->addText(replacementEmpty($currentAssignmentFlight[0]['remark_pic_r']), 'font-cell-header', 'paragrap-cell-left');
            $table->addCell(null, $cellColSpanNoBorder4)->addImage(checkFileSign($userPIC_Signature), $styleSignature);
            $table->addCell(null, $cellColSpanNoBorder4)->addText($userPIC_Name, 'font-bold', 'paragrap-cell');
        }

				
				// Штурман 
				$userNavigator_Name = fullNameUser($currentAssignmentFlight[0]['navigator_r_last_name_'.$lang], $currentAssignmentFlight[0]['navigator_r_name_'.$lang], $currentAssignmentFlight[0]['navigator_r_first_name_'.$lang]);
				if($currentAssignmentFlight[0]['date_navigator_r'] != 0)
					$userNavigator_Signature = '../images/user/signature/'.$currentAssignmentFlight[0]['id_navigator_r'].'.jpg';
				else
					$userNavigator_Signature = '../images/transparent.gif';
				
				foreach($allUserFlight as $userFlightNavigator)
				{
					if($userFlightNavigator['id_user'] == $currentAssignmentFlight[0]['id_navigator_r'])
						$userNavigator_Rank = $userFlightNavigator['rank_'.$lang];
				}
        
        if($userNavigator_Rank) {
          $table->addRow(m2t(5));
            $table->addCell(null, $cellColSpanNoBorder2)->addText($userNavigator_Rank, 'font-bold', 'paragrap-cell-left');
            $table->addCell(null, $cellColSpanNoBorder15)->addText(replacementEmpty($currentAssignmentFlight[0]['remark_navigator_r']), 'font-cell-header', 'paragrap-cell-left');
            $table->addCell(null, $cellColSpanNoBorder4)->addImage(checkFileSign($userNavigator_Signature), $styleSignature);
            $table->addCell(null, $cellColSpanNoBorder4)->addText($userNavigator_Name, 'font-bold', 'paragrap-cell');
        }

				
			$userManagerF_Rank = $currentAssignmentFlight[0]['manager_f_rank_'.$lang];
			$userManagerF_Name = fullNameUser($currentAssignmentFlight[0]['manager_f_last_name_'.$lang], $currentAssignmentFlight[0]['manager_f_name_'.$lang], $currentAssignmentFlight[0]['manager_f_first_name_'.$lang]);
		
			if($currentAssignmentFlight[0]['id_pic_r'] != 0)
				$userManagerF_Signature = '../images/user/signature/'.$currentAssignmentFlight[0]['id_manager_f'].'.jpg';
			else
				$userManagerF_Signature = '../images/transparent.gif';
        
      if($userManagerF_Rank) {
        $table->addRow(m2t(5));
          $table->addCell(null, $cellColSpanNoBorder2)->addText($userManagerF_Rank, 'font-bold', 'paragrap-cell-left');
          $table->addCell(null, $cellColSpanNoBorder15)->addText('  '.replacementEmpty($currentAssignmentFlight[0]['remark_manager_flight_r']), 'font-cell-header', 'paragrap-cell-left');
          $table->addCell(null, $cellColSpanNoBorder4)->addImage(checkFileSign($userManagerF_Signature), $styleSignature);
          $table->addCell(null, $cellColSpanNoBorder4)->addText($userManagerF_Name, 'font-bold', 'paragrap-cell');
      }

	// ЗАДАНИЕ НА ПОЛЕТ		
	// Стиль документа

	
	$sectionStyle = array('orientation' => null,
		'marginLeft' => m2t(10),
		'marginRight' => m2t(10),
		'marginTop' => m2t(5),
		'marginBottom' => m2t(5),
	 );
	$section = $phpWord->addSection($sectionStyle);
	//Нижний колонтитул с нумерацией страниц посередине
	
/* 	$userPreserveText = fullNameUser($currentUser[0]['last_name_'.$lang], $currentUser[0]['name_'.$lang], $currentUser[0]['first_name_'.$lang]);
	$datePreserveText = date('d.m.Y H:i:s');
	
	$footer->addPreserveText('Ст. {PAGE} из {NUMPAGES}, '.$langFullName.': '.$userPreserveText.', '.$langDateCreate.': '.$datePreserveText.', IP: '.$currentUserIp, array('bold'=>false, 'size' => 7),array('align'=>'left', 'spaceBefore' => 0, 'spaceAfter' => 0)); */
	
	// Стили таблиц
	$phpWord->addTableStyle('table1', array('align'=>'center'));
	$phpWord->addTableStyle('table2', array('align'=>'center'));
	
	$cell = array('borderSize' => 1, 'valign' => 'center');
	$cellBorderTopBottom = array('borderTopSize' => 1, 'borderBottomSize' => 1, 'valign' => 'center');
	
	$cellNoBorder = array('valign' => 'center', 'valign' => 'center');
	$cellNoBorderColSpan2 = array('valign' => 'center', 'gridSpan' => 2, 'valign' => 'center');
	
	$cellColSpan2 = array('borderSize' => 1, 'gridSpan' => 2, 'valign' => 'center');
	$cellColSpan3 = array('borderSize' => 1, 'gridSpan' => 3, 'valign' => 'center');
	
	$cellColSpan2BorderTopBottomLeft = array('borderTopSize' => 1, 'borderBottomSize' => 1, 'borderLeftSize' => 1, 'gridSpan' => 2, 'valign' => 'center');
	$cellColSpan3BorderTopBottomLeft = array('borderTopSize' => 1, 'borderBottomSize' => 1, 'borderLeftSize' => 1, 'gridSpan' => 3, 'valign' => 'center');
	$cellColSpan2BorderTopBottomRight = array('borderTopSize' => 1, 'borderBottomSize' => 1, 'borderRightSize' => 1, 'gridSpan' => 2, 'valign' => 'center');
	$cellColSpan3BorderTopBottom = array('borderTopSize' => 1, 'borderBottomSize' => 1, 'gridSpan' => 3, 'valign' => 'center');
	$cellColSpan5BorderTopBottom = array('borderTopSize' => 1, 'borderBottomSize' => 1, 'gridSpan' => 5, 'valign' => 'center');
	$cellColSpan6BorderTopBottom = array('borderTopSize' => 1, 'borderBottomSize' => 1, 'gridSpan' => 6, 'valign' => 'center');
	$cellColSpan5BorderBottom = array('borderBottomSize' => 1, 'gridSpan' => 5, 'valign' => 'center');
	$cellColSpan6BorderBottom = array('borderBottomSize' => 1, 'gridSpan' => 6, 'valign' => 'center');
	$cellRowSpan = array('borderSize' => 1, 'vMerge' => 'restart', 'valign' => 'center');
	
	$cellRowContinue = array('borderSize' => 1, 'vMerge' => 'continue');
	$styleSignature = array('align' => 'center', 'height'=> 50);
	
	// Стили текста
	$phpWord->addFontStyle('font-cell', array('size' => 10, 'bold' => false));
	$phpWord->addFontStyle('font-bold', array('size' => 10, 'bold' => true));
	$phpWord->addFontStyle('font-header', array('size' => 14, 'bold' => true));
	$phpWord->addParagraphStyle('paragrap-cell', array('align' => 'center', 'spaceBefore' => 0, 'spaceAfter' => 0));
	$phpWord->addParagraphStyle('paragrap-cell-left', array('align' => 'left', 'spaceBefore' => 0, 'spaceAfter' => 0));
	
	// Таблица
	$table = $section->addTable('table1');
		$table->addRow(m2t(13));
			$table->addCell(m2t(65), $cellNoBorder)->addText('ООО "МАКСИМУС ЭЙРЛАЙНС"', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(60), $cellNoBorder)->addImage('../images/logo-doc.png', array('align' => 'center'));
			$table->addCell(m2t(65), $cellNoBorder)->addText('LLC "MAXIMUS AIRLINES"', 'font-bold', 'paragrap-cell');
			

			$ASSIGNMENT_FOR_FLIGHT = $word[331]['name_'.$lang].' № '.$currentAssignmentFlight[0]['aircraft_'.$lang].'-'.$currentAssignmentFlight[0]['number_assignment'].'-'.convertDateMonth($currentAssignmentFlight[0]['date_departure']).'-'.convertDateYear($currentAssignmentFlight[0]['date_departure']);
			
		$table->addRow(m2t(8));
			$table->addCell(null, $cellColSpan3BorderTopBottom)->addText($ASSIGNMENT_FOR_FLIGHT, 'font-header', 'paragrap-cell');

		$table->addRow(m2t(8));
			$table->addCell(null, $cellBorderTopBottom)->addText($word[332]['name_'.$lang].' '.$currentAssignmentFlight[0]['aircraft_'.$lang].' №'.$currentAssignmentFlight[0]['model'], 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($currentAssignmentFlight[0]['pic_a_last_name_'.$lang].' '.$currentAssignmentFlight[0]['pic_a_name_'.$lang].' '.$currentAssignmentFlight[0]['pic_a_first_name_'.$lang], 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cellBorderTopBottom)->addText($word[333]['name_'.$lang], 'font-bold', 'paragrap-cell');
			
		$table->addRow(m2t(8));
			$table->addCell(null, $cellColSpan3BorderTopBottom)->addText($word[334]['name_'.$lang], 'font-cell', 'paragrap-cell');
		// Экипаж
		foreach($allUserFlight as $userFlight)
		{
			if($userFlight['id_section'] != 4 and $userFlight['id_user'] != $currentAssignmentFlight[0]['id_pic_a'])
			{
				$userCrew = fullNameUser($userFlight['last_name_'.$lang], $userFlight['name_'.$lang], $userFlight['first_name_'.$lang]);	
				$table->addRow(m2t(6));
					$table->addCell(null, $cellBorderTopBottom)->addText(' '.$userFlight['rank_'.$lang], 'font-cell', 'paragrap-cell-left');
					$table->addCell(null, $cell)->addText(' '.$userCrew, 'font-cell', 'paragrap-cell-left');
					$table->addCell(null, $cellBorderTopBottom)->addText('+', 'font-cell', 'paragrap-cell');
			}
		}
		// Кабинный экипаж
		foreach($allUserFlight as $userFlight)
		{
			if($userFlight['id_section'] == 4)
			{
				$userCabinCrew = fullNameUser($userFlight['last_name_'.$lang], $userFlight['name_'.$lang], $userFlight['first_name_'.$lang]);	
				$usersCabinCrew = $usersCabinCrew.' ~'.$userCabinCrew;
			}
		}
		$table->addRow(m2t(13));
			$table->addCell(null, $cellBorderTopBottom)->addText(' '.$word[47]['name_'.$lang], 'font-cell', 'paragrap-cell-left');
			$table->addCell(null, $cellColSpan2BorderTopBottomLeft)->addText($usersCabinCrew, 'font-cell', 'paragrap-cell-left');
		
		$table->addRow(m2t(6));
			$table->addCell(null, $cellBorderTopBottom)->addText(' '.$word[128]['name_'.$lang].': ', 'font-bold', 'paragrap-cell-left');
			$table->addCell(null, $cell)->addText(convertDate($currentAssignmentFlight[0]['date_departure']), 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cellBorderTopBottom)->addText($word[335]['name_'.$lang].': '.$currentAssignmentFlight[0]['number_flight'], 'font-bold', 'paragrap-cell-left');
		// Цель полета
		$table->addRow(m2t(8));
			$table->addCell(null, $cellColSpan3BorderTopBottom)->addText($word[201]['name_'.$lang].': ('.$word[336]['name_'.$lang].')', 'font-bold', 'paragrap-cell-left');
			
		$table->addRow(m2t(6));
			$table->addCell(null, $cellColSpan3BorderTopBottom)->addText(replacementEmpty($currentAssignmentFlight[0]['purpose_flight_'.$lang]), 'font-cell', 'paragrap-cell-left');
		// Маршрут полета
		$table->addRow(m2t(8));
			$table->addCell(null, $cellColSpan3BorderTopBottom)->addText(' '.$word[202]['name_'.$lang].':', 'font-bold', 'paragrap-cell-left');
			
		$table->addRow(m2t(6));
			$table->addCell(null, $cellColSpan3BorderTopBottom)->addText(replacementEmpty($currentAssignmentFlight[0]['route_flight_'.$lang]), 'font-cell', 'paragrap-cell-left');

			
	$table = $section->addTable('table2');
		$table->addRow(m2t(6));
			$table->addCell(m2t(55), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(20), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(30), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(40), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(20), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(m2t(25), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			
		$table->addRow(m2t(6));
			$table->addCell(null, $cellColSpan3BorderTopBottom)->addText($word[208]['name_'.$lang], 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cellColSpan3BorderTopBottom)->addText('ППП      '.$currentAssignmentFlight[0]['pilot_admission'], 'font-bold', 'paragrap-cell');

		$table->addRow(m2t(6));
			$table->addCell(null, $cellBorderTopBottom)->addText($word[305]['name_'.$lang], 'font-bold', 'paragrap-cell-left');
			$table->addCell(null, $cell)->addText($currentAssignmentFlight[0]['flight_weight'], 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[283]['name_'.$lang], 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[337]['name_'.$lang], 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($currentAssignmentFlight[0]['centering_empty_aircraft'], 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cellBorderTopBottom)->addText($word[329]['name_'.$lang], 'font-bold', 'paragrap-cell');
			
		$table->addRow(m2t(6));
			$table->addCell(null, $cellBorderTopBottom)->addText($word[338]['name_'.$lang], 'font-bold', 'paragrap-cell-left');
			$table->addCell(null, $cell)->addText($currentAssignmentFlight[0]['weight_aircraft'], 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[283]['name_'.$lang], 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($word[339]['name_'.$lang], 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cell)->addText($currentAssignmentFlight[0]['curb_weight_aircraft'], 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cellBorderTopBottom)->addText($word[283]['name_'.$lang], 'font-bold', 'paragrap-cell');
			
		$table->addRow(m2t(6));
			$table->addCell(null, $cellColSpan6BorderTopBottom)->addText('', 'font-cell', 'paragrap-cell-left');
		
		// Командир ВС

			$userPIC_Name = fullNameUser($currentAssignmentFlight[0]['pic_a_last_name_'.$lang], $currentAssignmentFlight[0]['pic_a_name_'.$lang], $currentAssignmentFlight[0]['pic_a_first_name_'.$lang]);
			if($currentAssignmentFlight[0]['id_pic_a'] != 0)
				$userPIC_Signature = '../images/user/signature/'.$currentAssignmentFlight[0]['id_pic_a'].'.jpg';
			else
				$userPIC_Signature = '../images/transparent.gif';
			
			foreach($allUserFlight as $userFlightPIC)
			{
				if($userFlightPIC['id_user'] == $currentAssignmentFlight[0]['id_pic_a'])
					$userPIC_Rank = $userFlightPIC['rank_'.$lang];
			}
			
      
    if($userPIC_Rank) {
		// Подпись КВС	
		$table->addRow();
			$table->addCell(null, $cellNoBorderColSpan2)->addText($word[340]['name_'.$lang].':', 'font-bold', 'paragrap-cell-left');
			$table->addCell(null, $cellNoBorder)->addText($userPIC_Rank, 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cellNoBorder)->addImage(checkFileSign($userPIC_Signature), $styleSignature);
			$table->addCell(null, $cellNoBorderColSpan2)->addText($userPIC_Name, 'font-bold', 'paragrap-cell');
			
		$table->addRow();
			$table->addCell(null, $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
			$table->addCell(null, $cellNoBorder)->addText(convertDate($currentAssignmentFlight[0]['date_pic_a']), 'font-cell', 'paragrap-cell');
			$table->addCell(null, $cellNoBorderColSpan2)->addText('', 'font-cell', 'paragrap-cell');
    }

			$userManagerF_Rank = $currentAssignmentFlight[0]['manager_f_rank_'.$lang];
			$userManagerF_Name = fullNameUser($currentAssignmentFlight[0]['manager_f_last_name_'.$lang], $currentAssignmentFlight[0]['manager_f_name_'.$lang], $currentAssignmentFlight[0]['manager_f_first_name_'.$lang]);
		
			if($currentAssignmentFlight[0]['id_manager_f'] != 0 and $currentAssignmentFlight[0]['id_pic_a'] != 0)
				$userManagerF_Signature = '../images/user/signature/'.$currentAssignmentFlight[0]['id_manager_f'].'.jpg';
			else
				$userManagerF_Signature = '../images/transparent.gif';
      
    if($userManagerF_Rank) {
      // Зам. Директора по ОЛР
      $table->addRow();
        $table->addCell(null, $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell-left');
        $table->addCell(null, $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
        $table->addCell(null, $cellNoBorder)->addText($userManagerF_Rank, 'font-bold', 'paragrap-cell');
        $table->addCell(null, $cellNoBorder)->addImage(checkFileSign($userManagerF_Signature), $styleSignature);
        $table->addCell(null, $cellNoBorderColSpan2)->addText($userManagerF_Name, 'font-bold', 'paragrap-cell');

      $table->addRow();
        $table->addCell(null, $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
        $table->addCell(null, $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
        $table->addCell(null, $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
        $table->addCell(null, $cellNoBorder)->addText(convertDate($currentAssignmentFlight[0]['date_manager_flight_a']), 'font-cell', 'paragrap-cell');
        $table->addCell(null, $cellNoBorderColSpan2)->addText('', 'font-cell', 'paragrap-cell');
    } 
			
		$table->addRow(m2t(6));
			$table->addCell(null, $cellColSpan6BorderBottom)->addText($word[341]['name_'.$lang], 'font-bold', 'paragrap-cell');
				
				
 	// Создание документа
	$path = '../tmp/'.time().'_'.$currentUser[0]['id'].'.docx';
	$contentType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
	$name = translit(replaceInvalidCharacters($REPORT_OF_FLIGHT)).'.docx';
	$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
	$objWriter->save($path);
	
	// Отдать документ на скачивание
	header('Content-type: '.$contentType);
	header('Content-Disposition: attachment; filename= '.$name);
	readfile($path);
	unlink($path);
?>