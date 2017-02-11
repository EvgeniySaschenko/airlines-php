<?php
    
		if
			(($currentSubsection[0]['type'] == 'doc' and $permissionReadSubsection
		or
			$currentSection[0]['type'] == 'doc' and $permissionReadSection)
    and 
      $currentSubsection[0]['type'] != 'control')
		{
      # Дата документа
      if
        ($currentBook[0]['doc_sort'] == 'doc_sort_date_doc'
      or
         $currentSection[0]['doc_sort'] == 'doc_sort_date_doc' and empty($getIdBook)
      or 
         $currentSubsection[0]['doc_sort'] == 'doc_sort_date_doc' and empty($getIdBook))
      {
      	$allDoc = selectAllDocDateDoc($getIdUser, $getIdSection, $getIdSubsection, $getIdNews, $getIdBook, $getPage);
      }
      # Дата загрузки
      elseif
        ($currentBook[0]['doc_sort'] == 'doc_sort_date_upload'
      or
         $currentSection[0]['doc_sort'] == 'doc_sort_date_upload' and empty($getIdBook)
      or 
         $currentSubsection[0]['doc_sort'] == 'doc_sort_date_upload' and empty($getIdBook))
      {
      	$allDoc = selectAllDocDateUpload($getIdUser, $getIdSection, $getIdSubsection, $getIdNews, $getIdBook, $getPage);
      }
      # Главы
      elseif
        ($currentBook[0]['doc_sort'] == 'doc_sort_chapter'
      or
         $currentSection[0]['doc_sort'] == 'doc_sort_chapter' and empty($getIdBook)
      or 
         $currentSubsection[0]['doc_sort'] == 'doc_sort_chapter' and empty($getIdBook))
      {
      	$allDoc = selectAllDocСhapter($getIdUser, $getIdSection, $getIdSubsection, $getIdNews, $getIdBook, $getPage);
      }
      # Приоритет
      elseif
        ($currentBook[0]['doc_sort'] == 'doc_sort_priority'
      or
         $currentSection[0]['doc_sort'] == 'doc_sort_priority' and empty($getIdBook)
      or 
         $currentSubsection[0]['doc_sort'] == 'doc_sort_priority' and empty($getIdBook))
      {
      	$allDoc = selectAllDocPriority($getIdUser, $getIdSection, $getIdSubsection, $getIdNews, $getIdBook, $getPage);
      }
      # Название
      else
      {
      	$allDoc = selectAllDocName($getIdUser, $getIdSection, $getIdSubsection, $getIdNews, $getIdBook, $getPage);
      }

			$allBook = selectAllBook($getIdSection, $getIdSubsection);
			$allChapter = selectAllChapter($getIdSection, $getIdSubsection, $getIdBook);
			$countRecordsYear = selectDocGroupYear($getIdUser, $getIdSection, $getIdSubsection, $getIdNews, $getIdBook, $getIdChapter, $getIdType);
			$docGroupMonth = selectDocGroupMonth($getIdSection, $getIdSubsection, $getIdBook);
      $docGroupMonthUpload = selectDocGroupMonthUpload($getIdSection, $getIdSubsection, $getIdBook);
      
			# Просмотр
      if(empty($_GET['action']))
			{
        # Документы / Список книг
        if(empty($_GET['id_book']))
        {
          include('templates/doc-and-book.php');
        }
        if(!empty($_GET['id_book']))
        {
          # По дате документа
          if($currentBook[0]['doc_sort'] == 'doc_sort_date_doc')
            include('templates/doc-date.php');
          # По дате загрузки документа
          else if($currentBook[0]['doc_sort'] == 'doc_sort_date_upload')
            include('templates/doc-date-upload.php');
          # Главы
          else if($currentBook[0]['doc_sort'] == 'doc_sort_chapter')
            include('templates/doc-chapter.php');
          # Список
          else
            include('templates/doc-list.php');
        }
			}
      # Редактирование
      if($_GET['action'] == 'edit')
			{
        include('templates/a-doc-and-book.php');
			}
		}
?>