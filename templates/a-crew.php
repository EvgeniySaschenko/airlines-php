<h1 class="title-page text-center text-uppercase"> <?= $currentSubsection[0]['name_'.$lang]; ?> </h1>

<div class="nav-tabs--a-crews">
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#crewGenerate" aria-controls="crewGenerate" role="tab" data-toggle="tab">
       <span class="fa fa-user"></span> <?= $word[181]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#crewsList" aria-controls="crewsList" role="tab" data-toggle="tab">
       <span class="fa fa-list"></span> <?= $word[182]['name_'.$lang]; ?>
      </a>
    </li>
  </ul>
  
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="crewGenerate">
      <?php include('templates/a-crews-generate.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="crewsList">
      <?php include('templates/a-crews-list.php'); ?>
    </div>
  </div>
</div>