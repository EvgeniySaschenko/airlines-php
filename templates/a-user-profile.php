<h1 class="title-page text-center text-uppercase"><?= $user[0]['last_name_'.$lang].' '.$user[0]['name_'.$lang].' '.$user[0]['first_name_'.$lang]; ?></h1>
<div class="nav-tabs--a-user-profile">
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#userEdit" aria-controls="userEdit" role="tab" data-toggle="tab">
       <span class="fa fa-user"></span> <?= $word[39]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#docUser" aria-controls="docUser" role="tab" data-toggle="tab">
       <span class="fa fa-plus"></span> <?= $word[75]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#docType" aria-controls="docType" role="tab" data-toggle="tab">
       <span class="fa fa-plus"></span> <?= $word[167]['name_'.$lang]; ?>
      </a>
    </li>
  </ul>
  
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="userEdit">
      <?php include('templates/a-user-edit.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="docUser">
      <?php include('templates/a-doc-add.php'); ?>
      <?php include('templates/a-doc-user.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="docType">
      <?php include('templates/a-doc-type.php'); ?>
    </div>
  </div>
</div>