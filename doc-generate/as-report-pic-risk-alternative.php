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
        $ASReportPICRiskPICUserYearMonth = selectASReportPICRiskPICUserYearMonth($getIdUser, $getYear.'-'.$getMonth.'-'.'01');
        
        
        $AS_REPORT_PIC = $word[518]['name_'.$lang].'-'.fullNameUser($user[0]['last_name_'.$lang], $user[0]['name_'.$lang], $user[0]['first_name_'.$lang]).'-'.$getMonth.'-'.$getYear;
        
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
        $cellBorderLeft = array('borderLeftSize' => 1, 'valign' => 'left', 'valign' => 'center');
        $cellBorderRight = array('borderRightSize' => 1, 'valign' => 'left', 'valign' => 'center');
        
        
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
                $table->addCell(m2t(190), $cellNoBorder)->addText('Оценка угрозы', 'font-header', 'paragrap-cell');      
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('в странах, аэропортах выполнения полетов ВС АК', 'font-bold', 'paragrap-cell');
                
       /* Отчетный период | КВС*/
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(50), $cellNoBorder)->addText('Отчетный период (месяц, год):', 'font-cell', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(140), $cellBorderBottom)->addText(showNameMonth($getYear.'-'.$getMonth.'-'.'01').' '. $getYear, 'font-bold-italic', 'paragrap-left-no-spacing');
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(55), $cellNoBorder)->addText('ФИО ответственного за АБ - КВС:', 'font-cell', 'paragrap-left-no-spacing'); 
                $table->addCell(m2t(135), $cellBorderBottom)->addText(fullNameUser($user[0]['last_name_'.$lang], $user[0]['name_'.$lang], $user[0]['first_name_'.$lang]), 'font-bold-italic', 'paragrap-left-no-spacing'); 
                
         /* Шапка */       
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(190), $cellNoBorder)->addText('', 'font-bold', 'paragrap-cell');
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellBorderTopBottomLeftRight)->addText('№ п/п', 'font-bold', 'paragrap-cell');
                $table->addCell(m2t(50), $cellBorderTopBottomLeftRight)->addText('Критерии оценки угроз', 'font-bold', 'paragrap-cell');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('Описание мероприятий', 'font-bold', 'paragrap-cell');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText('Оценочные показатели (да-2, не значительн.-1, нет-0)', 'font-bold', 'paragrap-cell');
                
        /* 1 */        
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellBorderTopBottomLeftRight)->addText('1', 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(50), $cellBorderTopBottomLeftRight)->addText('Наличие в стране террор. организаций, способных совершить теракты, АНВ', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('Есть ли сведения о наличии группы, которая способна совершить АНВ? Описание ее деятельности.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_1'], 'font-bold', 'paragrap-cell');
                
        /* 2 */        
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellBorderTopBottomLeftRight)->addText('2', 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(50), $cellBorderTopBottomLeftRight)->addText('Информация о совершении террористических актов в стране, городе в прошлом', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('Кроме террористических актов, это могут быть другие АНВ, вооруженные нападения как на людей так и на объекты, любые виды насильственных действий. Однако особое внимание следует обращать на любые акции, направленные против гражданской авиации.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_2'], 'font-bold', 'paragrap-cell');
                 
        /* 3 */        
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellBorderTopBottomLeftRight)->addText('3', 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(50), $cellBorderTopBottomLeftRight)->addText('Наличие в стране внутренних конфликтов, политической нестабильности', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('Не спокойная внутренняя обстановка, а именно, продолжающаяся или назревающая гражданская война или другие политические волнения. Конфликты на религиозном, национальном, региональном уровнях.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_3'], 'font-bold', 'paragrap-cell');
                 
        /*4 */        
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellBorderTopBottomLeftRight)->addText('4', 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(50), $cellBorderTopBottomLeftRight)->addText('Наличие экономических проблем', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('Эконом. кризис, который может привести к значительному сокращению финансирования и таким образом повлиять на способность поддерживать на необходимом уровне мероприятия по обеспечению АБ.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_4'], 'font-bold', 'paragrap-cell');   
                
        /* Аеропорты */        
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(30), $cellBorderLeft)->addText('Аэропорт (ы):', 'font-ищдв', 'paragrap-cell');
                $table->addCell(m2t(160), $cellBorderRight)->addText(arraySeparatedCommasAirport($allASFlightReportMonthPicAirports), 'font-bold', 'paragrap-cell');  
                
        /* 5 */        
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellBorderTopBottomLeftRight)->addText('5', 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(50), $cellBorderTopBottomLeftRight)->addText('Информация о совершении АНВ в аэропорту в прошлом', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('Это могут быть взрывы в АП, а также другие вооруженные нападения произошедшие, как в аэропорту, так и вблизи его.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_5'], 'font-bold', 'paragrap-cell');
                
        /* 6 */        
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellRowSpan)->addText('6', 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(50), $cellRowSpan)->addText('Выявление нарушений АБ в аэропорту, которые могут нести угрозу для совершения АНВ', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('Нарушения со стороны персонала АП по:', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText('', 'font-cell', 'paragrap-cell');

            $table->addRow(m2t(0));
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('- контролю на безопасность членов экипажа ВС, пассажиров, груза;', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_6_1'], 'font-bold', 'paragrap-cell');

            $table->addRow(m2t(0));
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('- охране ВС и объектов, их защиты от АНВ;', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_6_2'], 'font-bold', 'paragrap-cell');

            $table->addRow(m2t(0));
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('- пропускному и внутреннему объектовому режиму.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_6_3'], 'font-bold', 'paragrap-cell');
                
        /* ВС */        
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(40), $cellBorderLeft)->addText('Воздушные судна АК:', 'font-ищдв', 'paragrap-cell');
                $table->addCell(m2t(150), $cellBorderRight)->addText(arraySeparatedCommasAircrafts($allFlightReportAircraftGroupPicAS), 'font-bold', 'paragrap-cell');  
                
        /* 7 */        
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellBorderTopBottomLeftRight)->addText('7', 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(50), $cellBorderTopBottomLeftRight)->addText('Общее количество рейсов', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('Имеет ли влияние количество рейсов на вероятность совершения АНВ?', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_7'], 'font-bold', 'paragrap-cell');   
                
        /* 8 */        
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellBorderTopBottomLeftRight)->addText('8', 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(50), $cellBorderTopBottomLeftRight)->addText('Выявление рейсов, которые могут быть наиболее уязвимы для совершения АНВ. Рейсы повышенного риска', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('Рейсы, которые могут рассматриваться как особо уязвимые для совершения АНВ с учетом места выполнения полета. К рейсам повышенного риска относятся, например, те, которые ранее уже подвергались нападениям. Рейсы, периодически, часто повторяются. Рейсы по перевозке грузов, которые могут вызвать интерес для их ограбления.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_8'], 'font-bold', 'paragrap-cell');  
                
        /* 9 */        
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellBorderTopBottomLeftRight)->addText('9', 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(50), $cellBorderTopBottomLeftRight)->addText('Выявление рейсов запрещенных, не согласованные для выполнению', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('Выполнение рейсов должно осуществляться в соответствии с Приказом ГАСУ от 29.04.2014 № 317 “Об утверждении Перечня стран и АП, в которых временно запрещено или ограничено полеты ВС укр. эксплуатантов”.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_9'], 'font-bold', 'paragrap-cell');
                
        /* 10 */        
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellRowSpan)->addText('10', 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(50), $cellRowSpan)->addText('Выявление на борту ВС посторонних предметов', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('1 - Выполнение предполетного / послеполетного осмотров ВС по АБ перед / после каждого вылета.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_10_1'], 'font-bold', 'paragrap-cell');

            $table->addRow(m2t(0));
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('2 - Выполнение предполетного досмотра по АБ в случае необходимости и целенаправленно.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_10_2'], 'font-bold', 'paragrap-cell');

            $table->addRow(m2t(0));
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('3 - Выполнение спец. досмотра по АБ в случае получения информации об угрозе безопаснос- ти ВС, когда есть обоснованное подозрение о размещении на ВС предметов угрозы совершения АНВ.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_10_3'], 'font-bold', 'paragrap-cell');
                
        /* 11 */        
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellRowSpan)->addText('11', 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(50), $cellRowSpan)->addText('Выявление в грузе посторонних предметов, перевозимых на ВС, как потенциального объекта для совершения АНВ', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('1 - Принятие груза от известного грузоотправителя.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_11_1'], 'font-bold', 'paragrap-cell');

            $table->addRow(m2t(0));
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('2 - Груз должен быть доставлен лицом, указанным в Декларации.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_11_2'], 'font-bold', 'paragrap-cell');

            $table->addRow(m2t(0));
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('3 - Осмотр груза на отсутствие признаков вскрытия.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_11_3'], 'font-bold', 'paragrap-cell');

            $table->addRow(m2t(0));
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('4 - Наличие и правильное заполнение Декларации по безопасности грузового отправления.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_11_4'], 'font-bold', 'paragrap-cell');

            $table->addRow(m2t(0));
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell');
                $table->addCell(null, $cellRowContinue)->addText('', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(100), $cellBorderTopBottomLeftRight)->addText('5 - Досмотр груза по АБ экипажем при необходимости.', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['val_11_5'], 'font-bold', 'paragrap-cell');

            $summRisk= 
                $ASReportPICRiskPICUserYearMonth[0]['val_1'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_2'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_3'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_4'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_5'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_6_1'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_6_2'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_6_3'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_7'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_8'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_9'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_10_1'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_10_2'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_10_3'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_11_1'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_11_2'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_11_3'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_11_4'] +
                $ASReportPICRiskPICUserYearMonth[0]['val_11_5'];
                
        /* Сумма */        
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(160), $cellBorderTopBottomLeftRight)->addText('Суммарный показатель:', 'font-cell', 'paragrap-cell-left');
                $table->addCell(m2t(30), $cellBorderTopBottomLeftRight)->addText($summRisk, 'font-bold', 'paragrap-cell');
                
                
        /* 12 */
	$table = $section->addTable('table1');
            $table->addRow(m2t(0));
                $table->addCell(m2t(10), $cellBorderTopBottomLeftRight)->addText('12', 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(50), $cellBorderTopBottomLeftRight)->addText('Дополнительная информация', 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(130), $cellBorderTopBottomLeftRight)->addText($ASReportPICRiskPICUserYearMonth[0]['remark'], 'font-bold-italic', 'paragrap-cell-left');

                
        /* Подпись КВС */
        if($ASReportPICRiskPICUserYearMonth[0]['date_signature'] != 0)
            $userSign= '../images/user/signature/'.$ASReportPICRiskPICUserYearMonth[0]['id_user'].'.jpg';
        else
            $userSign = '../images/transparent.gif';  
                
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(30));
                $table->addCell(m2t(45), $cellNoBorder)->addText('КВС', 'font-bold', 'paragrap-center-no-spacing'); 
                $table->addCell(m2t(50), $cellNoBorder)->addText(fullNameUser($user[0]['last_name_'.$lang], $user[0]['name_'.$lang], $user[0]['first_name_'.$lang]), 'font-bold', 'paragrap-right-no-spacing');
                $table->addCell(m2t(45), $cellNoBorder)->addImage(checkFileSign($userSign), $styleSignature);
                $table->addCell(m2t(50), $cellNoBorder)->addText(convertDate($ASReportPICRiskPICUserYearMonth[0]['date_signature']), 'font-cell', 'paragrap-left-no-spacing'); 
                
                
                
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