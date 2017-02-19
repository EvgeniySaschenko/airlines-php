<h1 class="title-page text-center text-uppercase"> 
  <?= $word[137]['name_'.$lang].' № '.$CURRENT_NUMBER_ASSIGMENT_FLIGHT; ?></h1>
<div class="nav-tabs--a-user">
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#flightReport" aria-controls="flightReport" role="tab" data-toggle="tab">
       <span class="fa fa-file-text"></span> <?= $word[137]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#takeoffApproachAirports" aria-controls="takeoffApproachAirports" role="tab" data-toggle="tab">
       <span class="fa fa-road"></span> <?= $word[129]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#operatingCrewTime" aria-controls="operatingCrewTime" role="tab" data-toggle="tab">
       <span class="glyphicon glyphicon-time"></span> <?= $word[314]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#postFlightAnalysis" aria-controls="postFlightAnalysis" role="tab" data-toggle="tab">
       <span class="glyphicon glyphicon-ok"></span> <?= $word[219]['name_'.$lang]; ?>
      </a>
    </li>
  </ul>
  
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="flightReport">
      <?php include('templates/a-flight-report-edit.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="takeoffApproachAirports">
      <?php include('templates/a-flight-report-takeoff-approach-airports.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="operatingCrewTime">
      <?php include('templates/a-flight-report-operating-crew-time.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="postFlightAnalysis">
      <?php include('templates/a-flight-report-post-flight-analysis.php'); ?>
    </div>
  </div>
</div>