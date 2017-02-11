<h1 class="title-page text-center text-uppercase"> 
  <?= $currentSubsection[0]['name_'.$lang].' № '.$currentAssignmentFlight[0]['aircraft_'.$lang].'-'.$currentAssignmentFlight[0]['number_assignment'].'-'.convertDateMonth($currentAssignmentFlight[0]['date_departure']).'-'.convertDateYear($currentAssignmentFlight[0]['date_departure']); ?></h1>
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