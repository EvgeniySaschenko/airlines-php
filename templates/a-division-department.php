<h1 class="title-page text-center text-uppercase"> 
  <div><?= $word[272]['name_'.$lang]; ?></div>
  <?= $currentSection[0]['name_'.$lang]; ?>
</h1>

<div class="a-division-department">
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#userList" aria-controls="userList" role="tab" data-toggle="tab">
       <span class="fa fa-user"></span> <?= $word[140]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#userListAdd" aria-controls="userListAdd" role="tab" data-toggle="tab">
       <span class="fa fa-user-plus"></span> <?= $word[141]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#listDivision" aria-controls="listDivision" role="tab" data-toggle="tab">
       <span class="fa fa-university"></span> <?= $word[273]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#addNews" aria-controls="addNews" role="tab" data-toggle="tab">
       <span class="fa fa-plus"></span> <?= $word[275]['name_'.$lang]; ?>
      </a>
    </li>
  </ul>

  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="userList">
      <?php include('templates/a-division-department-list-user-edit.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="userListAdd">
      <?php include('templates/a-division-department-list-user-add.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="listDivision">
      <?php include('templates/a-division-department-list-division.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="addNews">
      <?php include('templates/a-news-add.php'); ?>
    </div>
  </div>
</div>