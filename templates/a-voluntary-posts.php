<h1 class="title-page text-center text-uppercase"> <?= $currentSection[0]['name_'.$lang]; ?> </h1>
<div class="nav-tabs--a-voluntary-posts">
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="active">
      <a href="#voluntaryPostsEdit" aria-controls="voluntaryPostsEdit" role="tab" data-toggle="tab">
       <span class="fa fa-envelope"></span> <?= $word[377]['name_'.$lang]; ?>
      </a>
    </li>
    <li>
      <a href="#docUser" aria-controls="docUser" role="tab" data-toggle="tab">
       <span class="fa fa-file-text"></span> <?= $word[85]['name_'.$lang]; ?>
      </a>
    </li>
  </ul>
  
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="voluntaryPostsEdit">
      <?php include('templates/a-voluntary-posts-edit.php'); ?>
      <?php include('templates/doc-list-voluntary-posts.php'); ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="docUser">
      <?php include('templates/a-doc-add.php'); ?>
      <?php include('templates/a-doc-edit.php'); ?>
    </div>
  </div>
</div>