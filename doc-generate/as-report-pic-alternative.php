<?php
  include('../general.php');
  
	if(!$permissionReadSubsection)
            exit;
        $user = selectUser($getIdUser);
        // ВС
        $allFlightReportAircraftGroupPicAS = selectAllFlightReportAircraftGroupPicAS($getIdUser, $getYear.'-'.$getMonth.'-'.'01');
        
        // Аеропорты
        $allASFlightReportMonthPicAirports = selectAllASFlightReportMonthPicAirports($getYear, $getMonth, $getIdUser);
        // Отчет 
        $ASPicReportPICUserYearMonth = selectASPicReportPICUserYearMonth($getIdUser, $getYear.'-'.$getMonth.'-'.'01');
        
        
        $AS_REPORT_PIC = $word[517]['name_'.$lang].'-'.fullNameUser($user[0]['last_name_'.$lang], $user[0]['name_'.$lang], $user[0]['first_name_'.$lang]).'-'.$getMonth.'-'.$getYear;
        
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
	$phpWord->addParagraphStyle('paragrap-cell-right', array('align' => 'right', 'spaceBefore' => 0, 'spaceAfter' => 0));
	$phpWord->addParagraphStyle('paragrap-left-no-spacing', array('align' => 'left', 'spaceBefore' => 100, 'spaceAfter' => 0, 'spacing' => 0));
	$phpWord->addParagraphStyle('paragrap-right-no-spacing', array('align' => 'right', 'spaceBefore' => 100, 'spaceAfter' => 0, 'spacing' => 0));
	$phpWord->addParagraphStyle('paragrap-center-no-spacing', array('align' => 'center', 'spaceBefore' => 100, 'spaceAfter' => 0, 'spacing' => 0));
        
        
	// Таблица
	$table = $section->addTable('table1');
            $table->addRow(m2t(13));
                $table->addCell(m2t(65), $cellNoBorder)->addText($GENERAL_SITE_SETTINGS[0]['name_company_ru'], 'font-bold', 'paragrap-cell-left');
                $table->addCell(m2t(60), $cellNoBorder)->addImage('../images/logo-doc.png', array('align' => 'center'));
                $table->addCell(m2t(65), $cellNoBorder)->addText($GENERAL_SITE_SETTINGS[0]['name_company_en'], 'font-bold', 'paragrap-cell-right');

	$table = $section->addTable('table1');
            $table->addRow(m2t(13));
                $table->addCell(m2t(55), $cellNoBorderValignTop)->addText('КВС: '.fullNameUser($user[0]['last_name_'.$lang], $user[0]['name_'.$lang], $user[0]['first_name_'.$lang]).'<w:br/>Отчетный период: '.showNameMonth($getYear.'-'.$getMonth.'-'.'01').' '. $getYear, 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(80), $cellNoBorderValignTop)->addText('', 'font-bold', 'paragrap-cell');
                $table->addCell(m2t(55), $cellNoBorderValignTop)->addText($GENERAL_SITE_SETTINGS[0]['remark_report_pic_as'], 'font-cell', 'paragrap-cell-right');
                
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('ОТЧЕТ', 'font-header', 'paragrap-cell');      
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('по авиационной безопасности при выполнении полетов за пределами Украины', 'font-bold', 'paragrap-cell');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('за '.showNameMonth($getYear.'-'.$getMonth.'-'.'01').' '. $getYear, 'font-bold', 'paragrap-cell');
                
                
                
                
       /* КВС*/
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellNoBorder)->addText('КВC:', 'font-cell', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(60), $cellBorderBottom)->addText(fullNameUser($user[0]['last_name_'.$lang], $user[0]['name_'.$lang], $user[0]['first_name_'.$lang]), 'font-bold-italic', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(8), $cellNoBorder)->addText('ВC:', 'font-cell', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(112), $cellBorderBottom)->addText(arraySeparatedCommasAircrafts($allFlightReportAircraftGroupPicAS), 'font-bold-italic', 'paragrap-left-no-spacing'); 

        /* 1 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(45), $cellNoBorder)->addText('1.  Аэропорт базирования:', 'font-cell', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(145), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_1'], 'font-bold-italic', 'paragrap-left-no-spacing'); 

        /* 2 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('2.  Аэродромы, на которые выполнялись полеты в отчетном периоде:', 'font-cell', 'paragrap-left-no-spacing'); 
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText(arraySeparatedCommasAirport($allASFlightReportMonthPicAirports), 'font-bold-italic', 'paragrap-left-no-spacing'); 
                
        /* 3 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('3. Выполнение предполетных, послеполетных осмотров, предполетных и специальных досмотров:', 'font-cell', 'paragrap-left-no-spacing'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_3'], 'font-bold-italic', 'paragrap-center-no-spacing'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('* указываются в рапорте, прилагаемом к отчету: даты, № ВС, Ф.И.О. КВС, аэродром, причины нарушений, принятые меры', 'font-cell', 'paragrap-left-no-spacing'); 

                
        /* 4 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('4. Оценка уровня контроля на безопасность пассажиров, ручной клади, груза', 'font-cell', 'paragrap-left-no-spacing'); 
         /* 4.1 */
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(70), $cellNoBorder)->addText('4.1. На аэродроме временного базирования:', 'font-cell', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(120), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_4_1'], 'font-bold-italic', 'paragrap-left-no-spacing');
                
         /* 4.2 */
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(60), $cellNoBorder)->addText('4.2. На промежуточных аэродромах:', 'font-cell', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(130), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_4_2'], 'font-bold-italic', 'paragrap-left-no-spacing'); 
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('* указываются в рапорте, прилагаемом к отчету: даты, аэропорт, принятые мери.', 'font-cell', 'paragrap-left-no-spacing');
                
        /* 5 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('5. Уровень обеспечения охраны воздушных судов:', 'font-cell', 'paragrap-left-no-spacing'); 
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(45), $cellNoBorder)->addText('на аэродроме базирования:', 'font-cell', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(145), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_5'], 'font-bold-italic', 'paragrap-left-no-spacing'); 
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellNoBorder)->addText('кем:', 'font-cell', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(180), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_5_1'], 'font-bold-italic', 'paragrap-left-no-spacing');
                
        /* 6 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('6. Наличие бортовой документации по АБ, комплекта (100 шт.) бланков Чек-листов предполетного осмотра ВС по АБ, комплекта (100 шт.) печатей (стикеров) для опечатывания ВС:', 'font-cell', 'paragrap-left-no-spacing'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_6'], 'font-bold-italic', 'paragrap-center-no-spacing'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('* указываются в рапорте, прилагаемом к отчету: даты проверок, № ВС, Ф.И.О. КВС, принятие мери', 'font-cell', 'paragrap-left-no-spacing'); 
     
        /* 7 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('7. Наличие бортового оборудования (аптечки) по авиабезопасности на каждом борту ВС (металлоискатель ручной, зеркало с телескопической поворотной штангой, маркеры для маркировки досмотренных мест, фонарик):', 'font-cell', 'paragrap-left-no-spacing'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_7'], 'font-bold-italic', 'paragrap-center-no-spacing'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('* указываются в рапорте, прилагаемом к отчету: даты проверок, № ВС, Ф.И.О. КВС, принятие меры', 'font-cell', 'paragrap-left-no-spacing'); 
     
        /* 8 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('8. Контрольная оценка уровня знаний у членов экипажа по АБ', 'font-cell', 'paragrap-left-no-spacing'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_8'], 'font-bold-italic', 'paragrap-center-no-spacing'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('* указываются в рапорте, прилагаемом к отчету: даты проверок, должность и Ф.И.О. членов экипажа, у которых выявлены недостаточные знания, принятие мери, даты повторных проверок и выводи', 'font-cell', 'paragrap-left-no-spacing'); 
     
        /* 9 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('9. Источники информации о текущем состоянии АБ, уровне угроз и рисков в регионе полетов (брифинги, наблюдения за состоянием АБ, средства массовой информации, информация от других экипажей, интернет, службы и работники аэропортов):', 'font-cell', 'paragrap-left-no-spacing'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_9'], 'font-bold-italic', 'paragrap-center-no-spacing');
     
        /* 10 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('10. Знание схемы эвакуации экипажа и ВС в случае возникновения чрезвычайных ситуаций: ', 'font-cell', 'paragrap-left-no-spacing'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_10'], 'font-bold-italic', 'paragrap-center-no-spacing');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('*выявленные факты незнания схемы эвакуации устраняются немедленно на месте, о причинах сообщается в рапорте, прилагаемом к данному отчету', 'font-cell', 'paragrap-left-no-spacing');
                
        /* 11 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('11. Наличие случаев принуждения экипажа к выполнению полетов, безопасность которых должным образом не гарантировалась:', 'font-cell', 'paragrap-left-no-spacing'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_11'], 'font-bold-italic', 'paragrap-center-no-spacing');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('* выявленные факты принуждения приводятся в рапорте, прилагаемом к данному отчету, в котором указываются: даты, Ф.И.О. КВС, запланированный маршрут полета, объективные данные о состоянии АБ в аэропорту вылета, назначения или по маршруту полета, которые препятствовали принятию решения о выполнении полета, принятие по данному инциденту меры и выводы.', 'font-cell', 'paragrap-left-no-spacing');
        
        // Разрыв страницы        
        $section->addPageBreak();  
                
                
        /* 12 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('12. Обеспечение выполнения требований личной безопасности членами экипажа:', 'font-cell', 'paragrap-left-no-spacing'); 
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('- знание мест расположения дипломатических представительств Украины,отдельной полиции, госпиталей, больниц, военных комендатур и маршрутов движения к ним', 'font-cell', 'paragrap-left-no-spacing');
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_12'], 'font-bold-italic', 'paragrap-center-no-spacing');
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('- знание информации о наличии в данном регионе определенных ограничений:', 'font-cell', 'paragrap-left-no-spacing');
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_12_1'], 'font-bold-italic', 'paragrap-center-no-spacing');
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('- уровень безопасности места проживания экипажа:', 'font-cell', 'paragrap-left-no-spacing');
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_12_2'], 'font-bold-italic', 'paragrap-center-no-spacing');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('* (*) выявленные факты нарушения требований личной безопасности приводятся в рапорте, прилагаемом к данному отчету, с указанием дат, должностей, Ф.И.О. нарушителей, принятых по отношению к ним мер и сделанных выводов', 'font-cell', 'paragrap-left-no-spacing'); 
                
        /* 13 */
        $table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('13. Другая (дополнительная) информация по АБ и личной безопасности:', 'font-cell', 'paragrap-left-no-spacing'); 
        $table = $section->addTable('table1'); 
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellBorderBottom)->addText($ASPicReportPICUserYearMonth[0]['paragraph_13'], 'font-bold-italic', 'paragrap-left-no-spacing');

        /* Подпись КВС */
        if($ASPicReportPICUserYearMonth[0]['date_signature'] != 0)
            $userSign= '../images/user/signature/'.$ASPicReportPICUserYearMonth[0]['id_user'].'.jpg';
        else
            $userSign = '../images/transparent.gif';  
                
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(30));
                $table->addCell(m2t(45), $cellNoBorder)->addText('Ответственный за АБ', 'font-bold', 'paragrap-center-no-spacing'); 
                $table->addCell(m2t(50), $cellNoBorder)->addText(fullNameUser($user[0]['last_name_'.$lang], $user[0]['name_'.$lang], $user[0]['first_name_'.$lang]), 'font-bold', 'paragrap-right-no-spacing');
                $table->addCell(m2t(45), $cellNoBorder)->addImage(checkFileSign($userSign), $styleSignature);
                $table->addCell(m2t(50), $cellNoBorder)->addText(convertDate($ASPicReportPICUserYearMonth[0]['date_signature']), 'font-cell', 'paragrap-left-no-spacing'); 
                
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