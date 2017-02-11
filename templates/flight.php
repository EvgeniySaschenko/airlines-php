<h1 class="title-page text-center text-uppercase"> <?= $currentSubsection[0]['name_'.$lang]; ?> </h1>

<div class="nav-tabs--flight">
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#flightAssignmentList" aria-controls="flightAssignmentList" role="tab" data-toggle="tab">
       <span class="fa fa-tasks"></span> <?= $word[124]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#flightTakeoffApproachAirports" aria-controls="flightTakeoffApproachAirports" role="tab" data-toggle="tab">
       <span class="fa fa-road"></span> <?= $word[125]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#flightReportAircraft" aria-controls="flightReportAircraft" role="tab" data-toggle="tab">
       <span class="fa fa-file-text"></span> <?= $word[268]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#flightReportCrew" aria-controls="flightReportCrew" role="tab" data-toggle="tab">
       <span class="fa fa-file-text"></span> <?= $word[269]['name_'.$lang]; ?>
      </a>
    </li>
  </ul>
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="flightAssignmentList">
      <?php include('templates/flight-assignment-aircraft-list.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="flightTakeoffApproachAirports">
      <?php include('templates/flight-takeoff-approach-airports-list.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="flightReportAircraft">
      <?php include('templates/flight-report-aircraft.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="flightReportCrew">
      <?php include('templates/flight-report-crew.php'); ?>
    </div>
  </div>
</div>