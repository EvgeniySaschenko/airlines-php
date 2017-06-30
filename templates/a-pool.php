<h1 class="title-page text-center text-uppercase"> <?= $currentSubsection[0]['name_'.$lang]; ?> </h1>

<div class="nav-tabs--control">
<!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#poolList" aria-controls="poolList" role="tab" data-toggle="tab">
        <span class="fa fa-list"></span> 
        <span><?= $word[403]['name_'.$lang]; ?></span>
      </a>
    </li>
    <li>
      <a href="#poolAdd" aria-controls="poolAdd" role="tab" data-toggle="tab">
        <span class="fa fa-plus"></span> 
        <span><?= $word[400]['name_'.$lang]; ?></span>
      </a>
    </li>
    <li>
      <a href="#poolTemplateList" aria-controls="poolTemplateList" role="tab" data-toggle="tab">
        <span class="fa fa-list"></span> 
        <span><?= $word[409]['name_'.$lang]; ?></span>
      </a>
    </li>
    <li>
      <a href="#poolTemplateAdd" aria-controls="poolTemplateAdd" role="tab" data-toggle="tab">
        <span class="fa fa-plus"></span> 
        <span><?= $word[408]['name_'.$lang]; ?></span>
      </a>
    </li>
  </ul>

  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="poolList">
      <?php include('templates/a-pool-list.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="poolAdd">
      <?php include('templates/a-pool-add.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="poolTemplateList">
      <?php include('templates/a-pool-template-list.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="poolTemplateAdd">
      <?php include('templates/a-pool-template-add.php'); ?>
    </div>
  </div>
</div>