<h1 class="title-page text-center text-uppercase"> <?= $word[269]['name_'.$lang].' - '.$getYear; ?> </h1>

<div class="nav-tabs--flight">
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#flightTimeUser" aria-controls="flightTimeUser" role="tab" data-toggle="tab">
       <span class="fa fa-user"></span> <?= $word[390]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#flightTimeUserTypeAircraft" aria-controls="flightTimeUserTypeAircraft" role="tab" data-toggle="tab">
       <span class="fa fa-plane"></span> <?= $word[392]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#flightTimeUserAircraft" aria-controls="flightTimeUserAircraft" role="tab" data-toggle="tab">
       <span class="fa fa-plane"></span> <?= $word[391]['name_'.$lang]; ?>
      </a>
    </li>
    
  </ul>
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="flightTimeUser">
      <?php include('flight-consolidated-report-crew-year-group-user.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="flightTimeUserTypeAircraft">
      <?php include('flight-consolidated-report-crew-year-group-aircraft-type.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="flightTimeUserAircraft">
      <?php include('flight-consolidated-report-crew-year-group-aircraft.php'); ?>
    </div>
  </div>
</div>