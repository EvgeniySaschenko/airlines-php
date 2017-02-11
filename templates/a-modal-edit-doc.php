<!-- Modal -->
<div class="a-modal-edit-doc modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog a-modal-edit-doc__dialog">
    <div class="modal-content a-modal-edit-doc__content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="a-modal-edit-doc__title modal-title"></h4>
      </div>
      <div class="modal-body a-modal-edit-doc__body">
        <form method="post" enctype="multipart/form-data" action="">
          <input type="file" name="uploadfile" class="form-control">
            <div>
              <h5>
                <?= $word[172]['name_'.$lang]; ?>
              </h5>
              <?php foreach($allowExtension as $extension): ?>
                <span class="label label-default"><?= $extension; ?>;</span>
              <?php endforeach; ?>
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
