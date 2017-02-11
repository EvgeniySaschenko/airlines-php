<h1 class="title-page text-center text-uppercase"> <?= $currentSection[0]['name_'.$lang]; ?> </h1>
<div class="nav-tabs--a-user">
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#newsEdit" aria-controls="newsEdit" role="tab" data-toggle="tab">
       <span class="fa fa-newspaper-o"></span> <?= $word[263]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#docUser" aria-controls="docUser" role="tab" data-toggle="tab">
       <span class="fa fa-file-text"></span> <?= $word[85]['name_'.$lang]; ?>
      </a>
    </li>
  </ul>
  
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="newsEdit">
      <?php include('templates/a-news-edit.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="docUser">
      <?php include('templates/a-doc-add.php'); ?>
      <?php include('templates/a-news-doc-edit.php'); ?>
    </div>
  </div>
</div>