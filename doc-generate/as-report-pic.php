<?php
  include('../general.php');
  
	if(!$permissionReadSubsection)
            exit;
        $user = selectUser($getIdUser);
        $allASFlightReportAircraftMonthPicAirports = selectAllASFlightReportAircraftMonthPicAirports($getYear, $getMonth, $getIdAircraft, $getIdUser);
        $ASPicReportAircraftUserYearMonth = selectASPicReportAircraftUserYearMonth($getIdAircraft, $getIdUser, $getYear.'-'.$getMonth.'-'.'01');
        $AS_REPORT_PIC = 'REPORT-PIC-'.$currentAircraft[0]['name_'.$lang].' '.$currentAircraft[0]['model'].'-'.fullNameUser($user[0]['last_name_'.$lang], $user[0]['name_'.$lang], $user[0]['first_name_'.$lang]).'-'.$getMonth.'-'.$getYear;
        
	# PHPWord
	require_once '../PHPWord/src/PhpWord/Autoloader.php';
	\PhpOffice\PhpWord\Autoloader::register();
	$phpWord = new \PhpOffice\PhpWord\PhpWord();
	$phpWord->setDefaultFontName('Times New Roman');

        
        
        
        
	// ЗАДАНИЕ НА ПОЛЕТ		
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
	
	$styleSignature = array('align' => 'center', 'height'=> 38);
	
	// Стили таблиц
	$phpWord->addTableStyle('table1', array('align' => 'center'));
	$phpWord->addTableStyle('table2', array('align'=>'center'));
	
	$cell = array('borderSize' => 1, 'valign' => 'center');
	
	$cellNoBorder = array('valign' => 'center', 'valign' => 'center');
	$cellNoBorderValignTop = array('valign' => 'center', 'valign' => 'top');
	$cellNoBorderValignBottom = array('valign' => 'center', 'valign' => 'bottom');
        $cellBorderTopBottom = array('borderTopSize' => 1, 'borderBottomSize' => 1, 'valign' => 'left', 'valign' => 'center');
        $cellBorderBottom = array('borderBottomSize' => 1, 'valign' => 'left', 'valign' => 'center');
        $cellBorderTopBottomLeftRight = array('borderTopSize' => 1, 'borderBottomSize' => 1, 'borderLeftSize' => 1, 'borderRightSize' => 1, 'valign' => 'left', 'valign' => 'center');
        
        
        $cellBorderTopBottomLeftRightGreen = array('bgColor' => '03ae4e', 'borderTopSize' => 1, 'borderBottomSize' => 1, 'borderLeftSize' => 1, 'borderRightSize' => 1, 'valign' => 'left', 'valign' => 'center');
        $cellBorderTopBottomLeftRightYellow = array('bgColor' => 'fffe04', 'borderTopSize' => 1, 'borderBottomSize' => 1, 'borderLeftSize' => 1, 'borderRightSize' => 1, 'valign' => 'left', 'valign' => 'center');
        $cellBorderTopBottomLeftRightRed = array('bgColor' => 'fe0000', 'borderTopSize' => 1, 'borderBottomSize' => 1, 'borderLeftSize' => 1, 'borderRightSize' => 1, 'valign' => 'left', 'valign' => 'center');
        
        $cellBorderTopBottomLeftRightGreen2 = array('bgColor' => '00ff00', 'borderTopSize' => 1, 'borderBottomSize' => 1, 'borderLeftSize' => 1, 'borderRightSize' => 1, 'valign' => 'left', 'valign' => 'center');
        $cellBorderTopBottomLeftRightYellow2 = array('bgColor' => 'feff01', 'borderTopSize' => 1, 'borderBottomSize' => 1, 'borderLeftSize' => 1, 'borderRightSize' => 1, 'valign' => 'left', 'valign' => 'center');
        $cellBorderTopBottomLeftRightOrange2 = array('bgColor' => 'ff9800', 'borderTopSize' => 1, 'borderBottomSize' => 1, 'borderLeftSize' => 1, 'borderRightSize' => 1, 'valign' => 'left', 'valign' => 'center');
        $cellBorderTopBottomLeftRightRed2 = array('bgColor' => 'fe0002', 'borderTopSize' => 1, 'borderBottomSize' => 1, 'borderLeftSize' => 1, 'borderRightSize' => 1, 'valign' => 'left', 'valign' => 'center');
        
        
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
	
	// Стили текста
	$phpWord->addFontStyle('font-cell7', array('size' => 7, 'bold' => false));
	$phpWord->addFontStyle('font-cell', array('size' => 10, 'bold' => false));
	$phpWord->addFontStyle('font-bold', array('size' => 10, 'bold' => true));
	$phpWord->addFontStyle('font-bold-italic', array('size' => 10, 'bold' => true, 'italic' => true));
	$phpWord->addFontStyle('font-header', array('size' => 14, 'bold' => true));
	$phpWord->addParagraphStyle('paragrap-cell', array('align' => 'center', 'spaceBefore' => 0, 'spaceAfter' => 0));
	$phpWord->addParagraphStyle('paragrap-cell-justify', array('align' => 'justify', 'spaceBefore' => 0, 'spaceAfter' => 0));
	$phpWord->addParagraphStyle('paragrap-left-no-spacing', array('align' => 'left', 'spaceBefore' => 100, 'spaceAfter' => 0, 'spacing' => 0));
	$phpWord->addParagraphStyle('paragrap-right-no-spacing', array('align' => 'right', 'spaceBefore' => 100, 'spaceAfter' => 0, 'spacing' => 0));
	$phpWord->addParagraphStyle('paragrap-center-no-spacing', array('align' => 'center', 'spaceBefore' => 100, 'spaceAfter' => 0, 'spacing' => 0));
        
        
	// Таблица
	$table = $section->addTable('table1');
            $table->addRow(m2t(13));
                $table->addCell(m2t(65), $cellNoBorder)->addText($GENERAL_SITE_SETTINGS[0]['name_company_ru'], 'font-bold', 'paragrap-cell');
                $table->addCell(m2t(60), $cellNoBorder)->addImage('../images/logo-doc.png', array('align' => 'center'));
                $table->addCell(m2t(65), $cellNoBorder)->addText($GENERAL_SITE_SETTINGS[0]['name_company_en'], 'font-bold', 'paragrap-cell');

	$table = $section->addTable('table1');
            $table->addRow(m2t(13));
                $table->addCell(m2t(80), $cellNoBorderValignTop)->addText($word[513]['name_'.$lang].': '.$currentAircraft[0]['name_'.$lang].' '.$currentAircraft[0]['model'].' <w:br/>'.$word[499]['name_ru'].': '.fullNameUser($user[0]['last_name_'.$lang], $user[0]['name_'.$lang], $user[0]['first_name_'.$lang]).' <w:br/>'.$word[514]['name_ru'].': '.showNameMonth($getYear.'-'.$getMonth.'-'.'01', 'ukr').' '. $getYear.' <w:br/>'.$word[8]['name_ru'].': '.replacementEmpty($user[0]['mail_2']), 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(45), $cellNoBorderValignTop)->addText('', 'font-bold', 'paragrap-cell');
                $table->addCell(m2t(65), $cellNoBorderValignTop)->addText($GENERAL_SITE_SETTINGS[0]['remark_report_pic_as'], 'font-cell', 'paragrap-cell-justify');
                
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[454]['name_'.$lang], 'font-header', 'paragrap-cell');      
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[455]['name_'.$lang], 'font-bold', 'paragrap-cell');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[456]['name_'.$lang].' '.showNameMonth($getYear.'-'.$getMonth.'-'.'01', 'ukr').' '. $getYear, 'font-bold', 'paragrap-cell');
        
        /* 1 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(54), $cellNoBorder)->addText('1. '.$word[457]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(136), $cellBorderBottom)->addText($ASPicReportAircraftUserYearMonth[0]['paragraph_1'], 'font-bold-italic', 'paragrap-left-no-spacing'); 
                
        /* 2 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('2. '.$word[458]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText(arraySeparatedCommasAirport($allASFlightReportAircraftMonthPicAirports), 'font-bold-italic', 'paragrap-center-no-spacing'); 
                
        /* 3 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('3. '.$word[459]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportAircraftUserYearMonth[0]['paragraph_3'], 'font-bold-italic', 'paragrap-center-no-spacing'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[461]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
                
        /* 4 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('4. '.$word[462]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
         /* 4.1 */
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(87), $cellNoBorder)->addText('4.1. '.$word[463]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(103), $cellBorderBottom)->addText($ASPicReportAircraftUserYearMonth[0]['paragraph_4_1'], 'font-bold-italic', 'paragrap-left-no-spacing');
                
         /* 4.2 */
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(72), $cellNoBorder)->addText('4.2. '.$word[465]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(118), $cellBorderBottom)->addText($ASPicReportAircraftUserYearMonth[0]['paragraph_4_2'], 'font-bold-italic', 'paragrap-left-no-spacing'); 
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[467]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing');
                
                
        /* 5 */
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('5. '.$word[468]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
                
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportAircraftUserYearMonth[0]['paragraph_5'].', '.$ASPicReportAircraftUserYearMonth[0]['paragraph_5_1'], 'font-bold-italic', 'paragrap-center-no-spacing'); 
                
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[461]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
                
        /* 6 */
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(95), $cellNoBorder)->addText('6. '.$word[472]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(95), $cellBorderBottom)->addText($ASPicReportAircraftUserYearMonth[0]['paragraph_6'], 'font-bold-italic', 'paragrap-left-no-spacing');
                
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[461]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing');
                
        /* 7 */
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(70), $cellNoBorder)->addText('7. '.$word[475]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(110), $cellBorderBottom)->addText($ASPicReportAircraftUserYearMonth[0]['paragraph_7'], 'font-bold-italic', 'paragrap-left-no-spacing');
                
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[461]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing');
                
        /* 8 */
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('8. '.$word[478]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportAircraftUserYearMonth[0]['paragraph_8'], 'font-bold-italic', 'paragrap-center-no-spacing');
                
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[480]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing');
                
                
        /* 9 */
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('9. '.$word[481]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportAircraftUserYearMonth[0]['paragraph_9'], 'font-bold-italic', 'paragrap-center-no-spacing');
                
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[480]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing');
               
                
        /* 10 */
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('10. '.$word[487]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportAircraftUserYearMonth[0]['paragraph_10'], 'font-bold-italic', 'paragrap-center-no-spacing');
 
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[489]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing');
                
                
        /* 11 */
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('11. '.$word[490]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportAircraftUserYearMonth[0]['paragraph_11'], 'font-bold-italic', 'paragrap-center-no-spacing');
 
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[492]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing');
                
                
        /* 12 */
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('12. '.$word[493]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportAircraftUserYearMonth[0]['paragraph_12'], 'font-bold-italic', 'paragrap-center-no-spacing');
 
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[495]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing');
                
                
        /* 13 */
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('13. '.$word[496]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing'); 
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportAircraftUserYearMonth[0]['paragraph_13'], 'font-bold-italic', 'paragrap-center-no-spacing');
 
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[498]['name_'.$lang], 'font-cell', 'paragrap-left-no-spacing');
                
        /* 14 */
        if($ASPicReportAircraftUserYearMonth[0]['paragraph_14']) {
            $table = $section->addTable('table1'); 
                $table->addRow(m2t(0));
                    $table->addCell(m2t(190), $cellNoBorder)->addText('14. '.$word[34]['name_'.$lang].': ', 'font-cell', 'paragrap-left-no-spacing'); 
            $table = $section->addTable('table1'); 
                $table->addRow(m2t(0));
                    $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportAircraftUserYearMonth[0]['paragraph_14'], 'font-bold-italic', 'paragrap-left-no-spacing');
        }

                
        /* Подпись КВС */
        if($ASPicReportAircraftUserYearMonth[0]['date_signature'] != 0)
            $userSign= '../images/user/signature/'.$ASPicReportAircraftUserYearMonth[0]['id_user'].'.jpg';
        else
            $userSign = '../images/transparent.gif';  
                
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(30));
                $table->addCell(m2t(45), $cellNoBorder)->addText($word[499]['name_'.$lang], 'font-bold', 'paragrap-center-no-spacing'); 
                $table->addCell(m2t(50), $cellNoBorder)->addText(fullNameUser($user[0]['last_name_'.$lang], $user[0]['name_'.$lang], $user[0]['first_name_'.$lang]), 'font-bold', 'paragrap-right-no-spacing');
                $table->addCell(m2t(45), $cellNoBorder)->addImage(checkFileSign($userSign), $styleSignature);
                $table->addCell(m2t(50), $cellNoBorder)->addText(convertDate($ASPicReportAircraftUserYearMonth[0]['date_signature']), 'font-cell', 'paragrap-left-no-spacing'); 


                
 	// Создание документа
	$path = '../tmp/'.time().'_'.$currentUser[0]['id'].'.docx';
	$contentType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
	$name = translit(replaceInvalidCharacters($AS_REPORT_PIC)).'.docx';
	$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
	$objWriter->save($path);
	
	// Отдать документ на скачивание
	header('Content-type: '.$contentType);
	header('Content-Disposition: attachment; filename= '.$name);
	readfile($path);
	unlink($path);
?>