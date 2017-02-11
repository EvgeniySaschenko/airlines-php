<?php
	if
		($currentSubsection[0]['type'] == 'doc' and $permissionEditSubsection
	or
		$currentSection[0]['type'] == 'doc' and $permissionEditSection)
	{
    # Выстроить документы
		if($_GET['action'] == 'doc_sort_list' or $_GET['action'] == 'doc_sort_date_doc' or $_GET['action'] == 'doc_sort_date_upload' or $_GET['action'] == 'doc_sort_priority' or $_GET['action'] == 'doc_sort_chapter')
		{
      $docSort = clearStr($_GET['action']);
      # В книге
      if($_GET['id_book'] != 0) {
        updateBookDocSort($getIdBook, $docSort);
      } 
      # В подразделе
      elseif($_GET['id_subsection'] != 0)
      {
        updateSubsectionDocSort($getIdSubsection, $docSort);
      }
      # В разделе
      elseif($_GET['id_section'] != 0)
      {
        updateSectionDocSort($getIdSection, $docSort);
      }
      redirect();
    }
  }
?>