<?php if(empty($currentBook[0]['id'])): ?>
  <h1 class="title-page text-center text-uppercase"> <?= $currentBook[0]['name_'.$lang]; ?> </h1>
<?php elseif(empty($currentSubsection[0]['id'])): ?>
  <h1 class="title-page text-center text-uppercase"> <?= $currentSection[0]['name_'.$lang]; ?> </h1>
<?php else: ?>
  <h1 class="title-page text-center text-uppercase"> <?= $currentSubsection[0]['name_'.$lang]; ?> </h1>
<?php endif; ?>
  
<div class="nav-tabs--a-doc-and-book">
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <!--Список документов-->
    <li class="active">
      <a href="#docList" aria-controls="docList" role="tab" data-toggle="tab">
       <span class="fa fa-file-text"></span> <?= $word[186]['name_'.$lang]; ?>
      </a>
    </li>
    <!--Список Книг-->
    <li>
      <a href="#bookList" aria-controls="bookList" role="tab" data-toggle="tab">
       <span class="fa fa-folder-open"></span> <?= $word[187]['name_'.$lang]; ?>
      </a>
    </li>
    <!--Список Глав-->
    <li>
      <a href="#chapterList" aria-controls="chapterList" role="tab" data-toggle="tab">
       <span class="fa fa-header"></span> <?= $word[188]['name_'.$lang]; ?>
      </a>
    </li>
  </ul>
  
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <!--Список документов-->
    <div role="tabpanel" class="tab-pane active" id="docList">
      <?php include('templates/a-doc-add.php'); ?>
      <?php include('templates/a-doc-edit.php'); ?>
    </div>
    <!--Список Книг-->
    <div role="tabpanel" class="tab-pane" id="bookList">
      <?php include('templates/a-book-add.php'); ?>
      <?php include('templates/a-book-edit.php'); ?>
    </div>
    <!--Список Глав-->
    <div role="tabpanel" class="tab-pane" id="chapterList">
      <?php include('templates/a-chapter-add.php'); ?>
      <?php include('templates/a-chapter-edit.php'); ?>
    </div>
  </div>
</div>
