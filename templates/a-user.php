<h1 class="title-page text-center text-uppercase"> <?= $currentSection[0]['name_'.$lang]; ?> </h1>
<div class="nav-tabs--a-user">
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#userList" aria-controls="userList" role="tab" data-toggle="tab">
       <span class="fa fa-user"></span> <?= $word[140]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#userAdd" aria-controls="userAdd" role="tab" data-toggle="tab">
       <span class="fa fa-plus"></span> <?= $word[141]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#userRank" aria-controls="userRankAdd" role="tab" data-toggle="tab">
       <span class="fa fa-plus"></span> <?= $word[168]['name_'.$lang]; ?>
      </a>
    </li>
  </ul>
  
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="userList">
      <?php include('templates/a-user-list.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="userAdd">
      <?php include('templates/a-user-add.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="userRank">
      <?php include('templates/a-user-rank.php'); ?>
    </div>
  </div>
</div>