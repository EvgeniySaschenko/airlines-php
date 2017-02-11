<h1 class="title-page text-center text-uppercase"><?= $word[88]['name_'.$lang]; ?></h1>

<div class="nav-tabs--a-manage-site">
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#sectionSite" aria-controls="sectionSite" role="tab" data-toggle="tab">
       <span class="fa fa-university"></span> <?= $word[307]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#aircraftSite" aria-controls="aircraftSite" role="tab" data-toggle="tab">
       <span class="fa fa-plane"></span> <?= $word[252]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#generalSiteSettings" aria-controls="generalSiteSettings" role="tab" data-toggle="tab">
       <span class="glyphicon glyphicon-cog"></span> <?= $word[356]['name_'.$lang]; ?>
      </a>
    </li>
  </ul>
  
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="sectionSite">
      <?php include('templates/a-section-site-list.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="aircraftSite">
      <?php include('templates/a-aircraft-site-list.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="generalSiteSettings">
      <?php include('templates/a-general-site-settings.php'); ?>
    </div>
  </div>
</div>