<h1 class="title-page text-center text-uppercase"> 
  <?= $word[124]['name_'.$lang].' № '.$CURRENT_NUMBER_ASSIGMENT_FLIGHT; ?></h1>
<div class="nav-tabs--a-user">
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#flightAssignment" aria-controls="flightAssignment" role="tab" data-toggle="tab">
       <span class="fa fa-file-text"></span> <?= $word[126]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#userCrew" aria-controls="userCrew" role="tab" data-toggle="tab">
       <span class="fa fa-user"></span> <?= $word[16]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#userCabinCrew" aria-controls="userCabinCrew" role="tab" data-toggle="tab">
       <span class="fa fa-user"></span> <?= $word[47]['name_'.$lang]; ?>
      </a>
    </li>
  </ul>
  
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="flightAssignment">
      <?php include('templates/a-flight-assignment-edit.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="userCrew">
      <?php include('templates/a-flight-assignment-user-crew.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="userCabinCrew">
      <?php include('templates/a-flight-assignment-user-cabin-crew.php'); ?>
    </div>
  </div>
</div>