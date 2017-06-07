<h1 class="title-page text-center text-uppercase"> <?= $currentSubsection[0]['name_'.$lang]; ?> </h1>

<div class="nav-tabs--control">
<!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#sentDoc" aria-controls="sentDoc" role="tab" data-toggle="tab">
        <span class="fa fa-envelope"></span> 
        <span><?= $word[86]['name_'.$lang]; ?></span>
      </a>
    </li>
    <li>
      <a href="#docUser" aria-controls="docUser" role="tab" data-toggle="tab">
        <span class="fa fa-user"></span> 
        <span><?= $word[106]['name_'.$lang]; ?></span>
      </a>
    </li>
    <li>
      <a href="#doc" aria-controls="doc" role="tab" data-toggle="tab">
        <span class="fa fa-file-text"></span> 
        <span><?= $word[107]['name_'.$lang]; ?></span>
      </a>
    </li>
  </ul>
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="sentDoc">
      <?php include('templates/control-doc-user-received.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="docUser">
      <?php include('templates/control-doc-user.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="doc">
      <?php include('templates/control-doc.php'); ?>
    </div>
  </div>
</div>		