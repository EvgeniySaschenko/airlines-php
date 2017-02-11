<!-- Modal -->
<div class="modal-auth modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-auth__dialog modal-dialog modal-sm">
    <div class="modal-content modal-auth__content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-auth__title modal-title"><?= $word[270]['name_'.$lang]; ?></h4>
      </div>
      <div class="modal-body modal-auth__body">

        <form class="header__form-auth" action="authorization.php?enter=enter" method="post">
          
          <div class="form-group">
            <input name="login" type="text" class="form-control header__form-auth-field header__form-auth-field--login" placeholder="<?= $word[1]['name_'.$lang]; ?>">
          </div>
          
          <div class="form-group">
            <input name="pass" type="password" class="form-control header__form-auth-field header__form-auth-field--pass" placeholder="<?= $word[2]['name_'.$lang]; ?>">
          </div>
          
          <div class="text-right">
            <button name="enter" type="submit" class="header__form-auth-btn--submit btn btn-success"><?= $word[3]['name_'.$lang]; ?></button>
          </div>

        </form>
        
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
