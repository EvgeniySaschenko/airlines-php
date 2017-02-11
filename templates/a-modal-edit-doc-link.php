<!-- Modal -->
<div class="a-modal-edit-doc-link modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog a-modal-edit-doc-link__dialog">
    <div class="modal-content a-modal-edit-doc-link__content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="a-modal-edit-doc-link__title modal-title"></h4>
      </div>
      <div class="modal-body a-modal-edit-doc-link__body">
        <form method="post" enctype="multipart/form-data" action="">
          
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon"><span class="glyphicon glyphicon-link"></span></div>  
                <input name="link" type="text" class="form-control a-modal-edit-doc-link__field-link"  required="required"  placeholder="<?= $word[257]['name_'.$lang]; ?>" value="">
              </div>
            </div>
            <div class="text-right">
              <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
            </div>
        </form>  
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
