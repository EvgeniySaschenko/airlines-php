<?php if(empty($currentSubsection[0]['id'])): ?>
  <h1 class="title-page text-center text-uppercase"> <?= $currentSection[0]['name_'.$lang]; ?> </h1>
<?php else: ?>
  <h1 class="title-page text-center text-uppercase"> <?= $currentSubsection[0]['name_'.$lang]; ?> </h1>
<?php endif; ?>

<!-- Навигация -->
<div class="nav-tabs--doc-and-book">
  <ul class="nav nav-tabs" role="tablist">
    <li data-id-section="<?= $allBook[0]['id_section']; ?>">
      <a href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $allBook[0]['id_section']; ?>&amp;id_subsection=<?= $allBook[0]['id_subsection']; ?>#bookList" data-ancor="#bookList" aria-controls="bookList" role="tab" data-toggle="tab">
        <span class="fa fa-folder-open"></span> <?= $word[112]['name_'.$lang]; ?>
      </a>
    </li>
    <li data-id-section="<?= $allDoc[0]['id_section']; ?>">
      <a href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $allDoc[0]['id_section']; ?>&amp;id_subsection=<?= $allDoc[0]['id_subsection']; ?>#docList" data-ancor="#docList" aria-controls="docList" role="tab" data-toggle="tab">
        <span class="fa fa-file-text"></span> <?= $word[85]['name_'.$lang]; ?>
      </a>
    </li>
  </ul>
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div data-id-section="<?= $allBook[0]['id_section']; ?>" data-ancor="#bookList" role="tabpanel" class="tab-pane" id="bookList">
      <?php include('templates/book-list.php'); ?>
    </div>
    <div data-id-section="<?= $allDoc[0]['id_section']; ?>" data-ancor="#docList" role="tabpanel" class="tab-pane" id="docList">
      <?php
          # Дата документа
          if
            ($currentBook[0]['doc_sort'] == 'doc_sort_date_doc'
          or
             $currentSection[0]['doc_sort'] == 'doc_sort_date_doc'
          or 
             $currentSubsection[0]['doc_sort'] == 'doc_sort_date_doc')
          {
            include('templates/doc-date.php');
          }
          # Дата pfuheprb документа
          elseif
            ($currentBook[0]['doc_sort'] == 'doc_sort_date_upload'
          or
             $currentSection[0]['doc_sort'] == 'doc_sort_date_upload'
          or 
             $currentSubsection[0]['doc_sort'] == 'doc_sort_date_upload')
          {
            include('templates/doc-date-upload.php');
          }
          # Главы
          elseif
            ($currentBook[0]['doc_sort'] == 'doc_sort_chapter'
          or
             $currentSection[0]['doc_sort'] == 'doc_sort_chapter'
          or 
             $currentSubsection[0]['doc_sort'] == 'doc_sort_chapter')
          {
            include('templates/doc-chapter.php');
          }
          # Список
          else
          {
            include('templates/doc-list.php');
          }
        ?>
    </div>
  </div>
</div>