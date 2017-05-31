<h1 class="doc-data title-page text-center text-uppercase"
    data-id-doc="<?= $currentDoc[0]['id']; ?>"
    data-id-section="<?= $currentDoc[0]['id_section']; ?>"
    data-id-subsection="<?= $currentDoc[0]['id_subsection']; ?>"
    data-link-doc="<?= $currentDoc[0]['link']; ?>"
    data-name="<?= $doc['name_'.$lang]; ?>"
    data-id-sent-doc="0"
    data-doc-extension="<?= $currentDoc[0]['extension']; ?>">
    <?= $word[93]['name_'.$lang]; ?>
    <?= linkDocDownload($currentDoc[0]['id_section'], $currentDoc[0]['id_subsection'], $currentDoc[0]['id'], 0); ?>
   <div class="call-modal-doc" data-toggle="modal" data-target=".modal-doc">
     <?= $currentDoc[0]['name_'.$lang]; ?>
   </div>
</h1>

<div class="send-doc accordion-open-first-tab panel-group" id="collapse-send-doc">
<?php foreach($allSections as $section): ?>
  <?php if($section['count_user'] > 0): ?>

<div class="panel panel-default">
  <div class="panel-heading">
    <!--Раскрыть блок-->
    <h4 class="panel-title text-bold">
      <a data-toggle="collapse" data-parent="#collapse-send-doc" href="#section<?= $section['id']; ?>"><?= $section['name_'.$lang]; ?></a>
    </h4>
  </div>
   <!--Блок-->
  <div id="section<?= $section['id']; ?>" class="panel-collapse collapse accordion-item">
    <div class="panel-body">
    <form method="post" action="insert.php?lang=<?= $lang; ?>&amp;id_section=<?= $currentDoc[0]['id_section']; ?>&amp;id_subsection=<?= $currentDoc[0]['id_subsection']; ?>&amp;id_section_user=<?= $section['id']; ?>&amp;id_doc=<?= $currentDoc[0]['id']; ?>&amp;action=send_doc#navBottom">
      <table class="table table-striped">
        <tbody>
          <tr>
            <td class="title text-center text-bold hidden-xs"><?= $word[15]['name_'.$lang]; ?></td>
            <td class="title text-center text-bold"><?= $word[18]['name_'.$lang]; ?></td>
            <td class="title text-center text-bold hidden-xs"><?= $word[91]['name_'.$lang]; ?></td>
            <td class="title text-center text-bold hidden-xs"><?= $word[16]['name_'.$lang]; ?></td>
            <td class="title text-center text-bold"><span class="glyphicon glyphicon-envelope" data-toggle="tooltip" title="<?= $word[93]['name_'.$lang]; ?>"></span></td>
          </tr>
            <?php foreach($allUser as $user): ?>
              <?php if($user['hide'] == 0 and $user['id_section'] == $section['id'] and $user['remove_mailing_list'] == '0'): ?>
                <tr data-id-section="<?= $user['id_section']; ?>"
                    data-id-user="<?= $user['id']; ?>">
                  <td class="send-doc__user-rank hidden-xs">
                    <div class="cut-text"><?= $user['rank_'.$lang]; ?></div>
                  </td>
                  <td class="send-doc__user-name">
                    <?= linkUser($user['id_section'], $user['id'], $user['last_name_'.$lang], $user['name_'.$lang], $user['first_name_'.$lang]); ?>
                  </td>
                  <td class="send-doc__section text-center hidden-xs">
                    <span class="icon-section" data-toggle="tooltip" title="<?= $user['section_'.$lang]; ?>"></span>
                  </td>
                  <td class="send-doc__crew hidden-xs">
                    <?= $user['crew_'.$lang]; ?>
                  </td>
                  <td class="send-doc__checkbox text-center">
                    <input type="checkbox" data-checkbox-select="<?= $user['id_section']; ?>" name="id_user[]" value="<?= $user['id']; ?>" >
                    <input type="hidden" name="name_doc" value="<?= $currentDoc[0]['name_'.$lang]; ?>">
                  </td>
                </tr>
              <?php endif; ?>
            <?php endforeach; ?>
            <tr>
              <td class="text-bold hidden-xs">
                <?= $word[31]['name_'.$lang]; ?>
              </td>
              
              <td class="title">
                <div class="input-group date date-picker send-doc__form-date-end">
                  <div class="date-input-group">
                    <input name="date_end" type="text" class="form-control date-input" placeholder="<?= $word[30]['name_'.$lang]; ?>" data-toggle="tooltip" title="<?= $word[31]['name_'.$lang]; ?>">
                  </div>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </td>
              
              <td class="hidden-xs"></td>
              
              <td class="title text-bold text-right hidden-xs"><?= $word[92]['name_'.$lang]; ?></td>
              
              <td class="send-doc__checkbox-all text-center">
                <input type="checkbox" data-checkbox-select-all="<?= $section['id']; ?>" data-toggle="tooltip" title="<?= $word[92]['name_'.$lang]; ?>">
              </td>
              
            </tr>
            <tr>
              <td class="text-left text-bold" colspan="5">
                <span class="glyphicon glyphicon-envelope"> </span> 
                <a href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $currentDoc[0]['id_section']; ?>&amp;id_subsection=<?= $currentDoc[0]['id_subsection']; ?>&amp;id_doc=<?= $currentDoc[0]['id']; ?>&amp;id_section_user=<?= $section['id']; ?>&amp;action=sent_doc#navBottom">
                  <?= $word[99]['name_'.$lang]; ?> 
                </a>
              </td>
            </tr>
            <tr>
              <td class="text-right send-doc__bottom" colspan="5">
                <button type="button" class="send-form btn btn-success"><?= $word[93]['name_'.$lang]; ?></button>
                <input type="reset" value="<?= $word[171]['name_'.$lang]; ?>" class="hidden">
              </td>
            </tr>
        </tbody>
      </table>
      </form>
    </div>
  </div>
</div>
  <?php endif; ?>
<?php endforeach; ?> 
</div>
