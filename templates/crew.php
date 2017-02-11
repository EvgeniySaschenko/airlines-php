<h1 class="title-page text-center text-uppercase"> <?= $currentSubsection[0]['name_'.$lang]; ?> </h1>
<div class="crews">
  <?php foreach($allCrewSection as $key => $crew): ?>
    <!--Групировка-->
    <?php if($allCrewSection[$key - 1]['priority'] != $allCrewSection[$key]['priority']): ?>
      <div class="crew__group row"> 
    <?php endif; ?>
    <?php if($crew['count_user'] > 0): ?>
    <div class="crew crew--<?= $crew['location_en']; ?> col-lg-6 col-md-6 col-sm-6 col-xs-12" data-id-section="<?= $crew['id_section']; ?>" data-priority="<?= $crew['priority']; ?>" data-locatio="<?= $crew['location_en']; ?>">
      <table class="table table-striped">
        <caption class="crew__caption--<?= $crew['location_en']; ?> text-center text-uppercase text-bold"><?= $crew['name_'.$lang]; ?></caption>
        <thead class="crew__table-head--<?= $crew['location_en']; ?>">
          <tr>
            <th class="text-center"><span class="fa fa-info-circle" data-toggle="tooltip" title="<?= $word[50]['name_'.$lang]; ?>"></span></th>
            <th class="text-center"><?= $word[15]['name_'.$lang]; ?></th>
      			<th class="text-center"><?= $word[18]['name_'.$lang]; ?></th>
      			<th class="text-center hidden-xs"><?= $word[41]['name_'.$lang]; ?></th>
      			<th class="text-center hidden-sm hidden-xs"><?= $word[34]['name_'.$lang]; ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($allUser as $user): ?>
              <?php if($user['id_crew'] == $crew['id'] and $user['id_section'] == $currentSection[0]['id']): ?>
                  <tr class="crew-user" data-date-end-doc="<?= $user['date_end_doc']; ?>">
                    <td class="crew-user__info">
                      <span class="place-notice fa fa-file-text"></span>
                    </td>
                    <td class="crew-user__rank"> <?= $user['rank_'.$lang]; ?></td>
              			<td class="crew-user__name">
                       <?= linkUser($user['id_section'], $user['id'], $user['last_name_'.$lang], $user['name_'.$lang], $user['first_name_'.$lang]); ?>
                    </td>
              			<td class="crew-user__date-replace hidden-xs"><?= convertDate($user['date_replace']); ?></td>
              			<td class="crew-user__remark hidden-sm hidden-xs"><?= $user['remark']; ?></td>
                  </tr>
                  <!--Для мобильных устройств-->
                  <tr class="crew-user">
                    <td class="visible-xs"><span class="fa fa-commenting-o" data-toggle="tooltip" title="<?= $word[34]['name_'.$lang]; ?>"></span></td>
                    <td class="crew-user__date-replace visible-xs"><?= $user['remark']; ?></td>
                    <td class="crew-user__remark visible-xs"> <span class="fa fa-repeat" data-toggle="tooltip" title="<?= $word[41]['name_'.$lang]; ?>"></span> <?= convertDate($user['date_replace']); ?></td>
                    <td class="hidden-lg hidden-md hidden-sm hidden-xs"></td>
                    <td class="hidden-lg hidden-md hidden-sm hidden-xs"></td>
                  </tr>
            <?php endif; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
      <table class="table table-striped">
        <tbody>
          <tr>
            <td class="text-center text-uppercase text-bold">
              <?php if($currentSection[0]['id'] != 4): ?>
                <?= $word[47]['name_'.$lang]; ?>
              <?php else: ?>
                <?= $word[16]['name_'.$lang]; ?>
              <?php endif; ?>
            </td>
          </tr>
          <tr>
            <td>
            <?php foreach($allUser as $user): ?>
              <?php if($user['id_crew'] == $crew['id'] and $user['id_section'] != $currentSection[0]['id'] and $user['hide'] == 0): ?>
                <span class="fa fa-user"></span> <?= shortenName($user['last_name_'.$lang], $user['name_'.$lang], $user['first_name_'.$lang]); ?>
              <?php endif; ?>
            <?php endforeach; ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div> 
  <?php endif; ?>
  <!--Групировка-->
  <?php if($allCrewSection[$key + 1]['priority'] != $allCrewSection[$key]['priority']): ?>
    </div> 
  <?php endif; ?>
  <?php endforeach; ?>
</div>
