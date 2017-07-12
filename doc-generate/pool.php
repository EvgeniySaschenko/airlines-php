<?php
  include('../general.php');
	if(!$permissionReadSubsection)
		exit;
        $allPoolQuestion = selectAllPoolQuestion($getIdPool);
	
        $RISK_ASSESSMENT = $word[419]['name_'.$lang].' '.$currentPool[0]['name_'.$lang].' '.$word[417]['name_'.$lang].' '.convertDate($currentPool[0]['date_doc']);
        
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
	
/* 	$userPreserveText = fullNameUser($currentUser[0]['last_name_'.$lang], $currentUser[0]['name_'.$lang], $currentUser[0]['first_name_'.$lang]);
	$datePreserveText = date('d.m.Y H:i:s');
	
	$footer->addPreserveText('Ст. {PAGE} из {NUMPAGES}, '.$langFullName.': '.$userPreserveText.', '.$langDateCreate.': '.$datePreserveText.', IP: '.$currentUserIp, array('bold'=>false, 'size' => 7),array('align'=>'left', 'spaceBefore' => 0, 'spaceAfter' => 0)); */
	
	// Стили таблиц
	$phpWord->addTableStyle('table1', array('align'=>'center'));
	$phpWord->addTableStyle('table2', array('align'=>'center'));
	
	$cell = array('borderSize' => 1, 'valign' => 'center');
	$cellBorderTopBottom = array('borderTopSize' => 1, 'borderBottomSize' => 1, 'valign' => 'center');
	
	$cellNoBorder = array('valign' => 'center', 'valign' => 'center');
        $cellBorderTopBottom = array('borderTopSize' => 1, 'borderBottomSize' => 1, 'valign' => 'left', 'valign' => 'center');
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
	$phpWord->addFontStyle('font-header', array('size' => 14, 'bold' => true));
	$phpWord->addParagraphStyle('paragrap-cell', array('align' => 'center', 'spaceBefore' => 0, 'spaceAfter' => 0));
	$phpWord->addParagraphStyle('paragrap-cell-left', array('align' => 'left', 'spaceBefore' => 0, 'spaceAfter' => 0));
	
	// Таблица
	$table = $section->addTable('table1');
            $table->addRow(m2t(13));
                $table->addCell(m2t(65), $cellNoBorder)->addText($GENERAL_SITE_SETTINGS[0]['name_company_ru'], 'font-bold', 'paragrap-cell');
                $table->addCell(m2t(60), $cellNoBorder)->addImage('../images/logo-doc.png', array('align' => 'center'));
                $table->addCell(m2t(65), $cellNoBorder)->addText($GENERAL_SITE_SETTINGS[0]['name_company_en'], 'font-bold', 'paragrap-cell');

         // Оценка рисков   
	$table = $section->addTable('table1');
            $table->addRow(m2t(13));
                $table->addCell(m2t(190), $cellNoBorder)->addText($word[419]['name_'.$lang].' № '.$currentPool[0]['name_'.$lang].' '.$word[417]['name_'.$lang].' '.convertDate($currentPool[0]['date_doc']), 'font-bold', 'paragrap-cell');
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(8));
                $table->addCell(m2t(50), $cellBorderTopBottomLeftRight)->addText($word[420]['name_en'].' <w:br/>'.$word[420]['name_ru'], 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(42), $cellBorderTopBottomLeftRight)->addText($currentPool[0]['name_'.$lang], 'font-bold', 'paragrap-cell');
                $table->addCell(m2t(50), $cellBorderTopBottomLeftRight)->addText($word[421]['name_en'].' /<w:br/>'.$word[421]['name_ru'], 'font-cell', 'paragrap-cell');
                $table->addCell(m2t(48), $cellBorderTopBottomLeftRight)->addText(convertDate($currentPool[0]['date_doc']), 'font-bold', 'paragrap-cell');
	$table = $section->addTable('table1'); 
            $table->addRow(m2t(8));
                $table->addCell(m2t(50), $cellBorderTopBottomLeftRight)->addText($word[422]['name_en'].' / '.$word[422]['name_ru'], 'font-cell7', 'paragrap-cell');
                $table->addCell(m2t(14), $cellBorderTopBottomLeftRight)->addText($word[423]['name_en'].' <w:br/>'.$word[423]['name_ru'], 'font-cell7', 'paragrap-cell');
                $table->addCell(m2t(14), $cellBorderTopBottomLeftRight)->addText($word[449]['name_en'].' <w:br/>'.$word[449]['name_ru'], 'font-cell7', 'paragrap-cell');
                $table->addCell(m2t(14), $cellBorderTopBottomLeftRight)->addText($word[424]['name_en'].' <w:br/>'.$word[424]['name_ru'], 'font-cell7', 'paragrap-cell');
                $table->addCell(m2t(36), $cellBorderTopBottomLeftRight)->addText($word[425]['name_en'].' <w:br/>'.$word[425]['name_ru'], 'font-cell7', 'paragrap-cell');
                $table->addCell(m2t(14), $cellBorderTopBottomLeftRight)->addText($word[423]['name_en'].' <w:br/>'.$word[423]['name_ru'], 'font-cell7', 'paragrap-cell');
                $table->addCell(m2t(14), $cellBorderTopBottomLeftRight)->addText($word[449]['name_en'].' <w:br/>'.$word[449]['name_ru'], 'font-cell7', 'paragrap-cell');
                $table->addCell(m2t(14), $cellBorderTopBottomLeftRight)->addText($word[424]['name_en'].' <w:br/>'.$word[424]['name_ru'], 'font-cell7', 'paragrap-cell');
                $table->addCell(m2t(20), $cellBorderTopBottomLeftRight)->addText($word[450]['name_en'].' <w:br/>'.$word[450]['name_ru'], 'font-cell7', 'paragrap-cell');
                
                
	$table = $section->addTable('table1'); 
            foreach($allPoolQuestion  as $key => $poolQuestion):
                
                $poolNameRu = $poolQuestion['name_ru'];
                $poolNameEn = $poolQuestion['name_en'];
                
                $poollProbability1 = $poolQuestion['probability_admin_1'];
                if(empty($poolQuestion['probability_admin_1']))
                    $poollProbability1 = $poolQuestion['probability_user_1'];
                
                $poollProbability2 = $poolQuestion['probability_admin_2'];
                if(empty($poolQuestion['probability_admin_2']))
                    $poollProbability2 = $poolQuestion['probability_user_2'];
                
                $poollSeriousness1 = $poolQuestion['seriousness_admin_1'];
                if(empty($poolQuestion['seriousness_admin_1']))
                    $poollSeriousness1 = $poolQuestion['seriousness_user_1'];
                
                $poollSeriousness2 = $poolQuestion['seriousness_admin_2'];
                if(empty($poolQuestion['seriousness_admin_2']))
                    $poollSeriousness2 = $poolQuestion['seriousness_user_2'];
                
                $remark = $poolQuestion['remark_admin'];
                if(empty($poolQuestion['remark_admin']))
                    $remark = $poolQuestion['remark_user'];
                
                $nameDepartament = $poolQuestion['name_departament'];
                
                if($GENERAL_SITE_SETTINGS[0]['risk_assessment'] == 'risk_assessment_1')
                    $arrStyleCellIndexRisk = array(0 => $cellBorderTopBottomLeftRightRed, 1 => $cellBorderTopBottomLeftRightYellow, 2 => $cellBorderTopBottomLeftRightGreen, 3 => $cellBorderTopBottomLeftRight);
                if($GENERAL_SITE_SETTINGS[0]['risk_assessment'] == 'risk_assessment_2')
                    $arrStyleCellIndexRisk = array(0 => $cellBorderTopBottomLeftRightRed2, 1 => $cellBorderTopBottomLeftRightOrange2, 2 => $cellBorderTopBottomLeftRightYellow2, 3 => $cellBorderTopBottomLeftRightGreen2, 4 => $cellBorderTopBottomLeftRight);
                
                
                $cellIndexRisk1 = colorHighlightingPool($poollProbability1, $poollSeriousness1, $arrStyleCellIndexRisk, $GENERAL_SITE_SETTINGS[0]['risk_assessment']);
                $cellIndexRisk2 = colorHighlightingPool($poollProbability2, $poollSeriousness2, $arrStyleCellIndexRisk, $GENERAL_SITE_SETTINGS[0]['risk_assessment']);
                
                
                $table->addRow(m2t(8));
                    $table->addCell(m2t(10), $cellBorderTopBottomLeftRight)->addText($key + 1, 'font-cell7', 'paragrap-cell');
                    $table->addCell(m2t(40), $cellBorderTopBottomLeftRight)->addText($poolNameRu.'<w:br/>'.$poolNameEn, 'font-cell7', 'paragrap-cell-left');
                    $table->addCell(m2t(14), $cellBorderTopBottomLeftRight)->addText(replacementEmpty($poollProbability1), 'font-bold', 'paragrap-cell');
                    $table->addCell(m2t(14), $cellBorderTopBottomLeftRight)->addText(replacementEmpty($poollSeriousness1), 'font-bold', 'paragrap-cell');
                    $table->addCell(m2t(14), $cellIndexRisk1)->addText(replacementEmpty($poollProbability1).replacementEmpty($poollSeriousness1), 'font-bold', 'paragrap-cell');
                    $table->addCell(m2t(36), $cellBorderTopBottomLeftRight)->addText(replacementEmpty($remark), 'font-cell7', 'paragrap-cell');
                    $table->addCell(m2t(14), $cellBorderTopBottomLeftRight)->addText(replacementEmpty($poollProbability2), 'font-bold', 'paragrap-cell');
                    $table->addCell(m2t(14), $cellBorderTopBottomLeftRight)->addText(replacementEmpty($poollSeriousness2), 'font-bold', 'paragrap-cell');
                    $table->addCell(m2t(14), $cellIndexRisk2)->addText(replacementEmpty($poollProbability2).replacementEmpty($poollSeriousness2), 'font-bold', 'paragrap-cell');
                    $table->addCell(m2t(20), $cellBorderTopBottomLeftRight)->addText($nameDepartament, 'font-cell7', 'paragrap-cell');
            endforeach;
            
            
        if($GENERAL_SITE_SETTINGS[0]['risk_assessment'] == 'risk_assessment_1') {
            $styleImgRisk = array('align' => 'center', 'height'=> 230);
            $risk_assessment_doc = '../images/risk-assessment-doc.jpg';
        }

        if($GENERAL_SITE_SETTINGS[0]['risk_assessment'] == 'risk_assessment_2') {
            $styleImgRisk = array('align' => 'center', 'height'=> 150);
            $risk_assessment_doc = '../images/risk-assessment-doc-2.jpg';
        }

            
            
            
	$table = $section->addTable('table1'); 
            $table->addRow();
                $table->addCell(m2t(190), $cellNoBorder)->addImage($risk_assessment_doc, $styleImgRisk);
                    
 	// Создание документа
	$path = '../tmp/'.time().'_'.$currentUser[0]['id'].'.docx';
	$contentType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
	$name = translit(replaceInvalidCharacters($RISK_ASSESSMENT)).'.docx';
	$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
	$objWriter->save($path);
	
	// Отдать документ на скачивание
	header('Content-type: '.$contentType);
	header('Content-Disposition: attachment; filename= '.$name);
	readfile($path);
	unlink($path);
?>