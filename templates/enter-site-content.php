<form class="content__form-auth" action="authorization.php?enter=enter" method="post">

  <div class="form-group">
    <input name="login" type="text" class="form-control content__form-auth-field content__form-auth-field--login" placeholder="<?= $word[1]['name_'.$lang]; ?>">
  </div>

  <div class="form-group">
    <input name="pass" type="password" class="form-control content__form-auth-field content__form-auth-field--pass" placeholder="<?= $word[2]['name_'.$lang]; ?>">
  </div>

  <div>
    <button name="enter" type="submit" class="content__form-auth-btn--submit btn btn-success"><?= $word[3]['name_'.$lang]; ?></button>
  </div>

</form>