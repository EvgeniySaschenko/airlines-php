<div class="notice">
  <!--Add-->
  <div data-notice="#noticeFlightAssignmentUserCabinCrewAdd" data-ancor="userCabinCrew" class="hidden alert alert-success" role="alert">
    <?= $word[147]['name_'.$lang]; ?>
  </div>
  <!--Edit-->
  <div data-notice="#noticeFlightAssignmentUserCabinCrewEdit" data-ancor="userCabinCrew" class="hidden alert alert-success" role="alert">
    <?= $word[180]['name_'.$lang]; ?>
  </div>
</div>

<!--Добавить пользователя в экипаж-->
<div class="a-flight-assignment-user-cabin-crew">
  <form role="form" method="post" action="insert.php?lang=<?= $lang ;?>&id_section=<?= $getIdSection ;?>&id_subsection=<?= $getIdSubsection ;?>&id_flight_assignment=<?= $getIdFlightAssignment;?>&action=user_assignment_flight_cabin">
    <table class="table table-bordered">
      <caption class="text-bold text-center"><?= $word[211]['name_'.$lang]; ?></caption>
      <tbody>
        <tr>
          <td>
            <?php dropDownListUsersSection('id_user', $allUserSortLastNameNoHide, '', 4); ?>
          </td>
        </tr>
        <!--Отправить-->
        <tr>
          <td class="a-crew-generate__submit text-right" colspan="2">
             <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>

<!--Добавить пользователя в экипаж-->
<div class="a-flight-assignment-user-cabin-crew">
  <form role="form" method="post" action="update.php?lang=<?= $lang ;?>&id_section=<?= $getIdSection ;?>&id_subsection=<?= $getIdSubsection ;?>&id_flight_assignment=<?= $getIdFlightAssignment;?>&action=user_assignment_flight_cabin">
    <table class="table table-striped table-align-middle">
      <caption class="text-bold text-center"><?= $word[212]['name_'.$lang]; ?></caption>
      <thead>
        <tr>
          <th class="text-center"><?= $word[15]['name_'.$lang]; ?></th>
          <th class="text-center"><?= $word[18]['name_'.$lang]; ?></th>
          <th class="text-center"><?= $word[53]['name_'.$lang]; ?></th>
          <th class="title text-bold text-center">
            <span class="glyphicon glyphicon-trash visible-xs" data-toggle="tooltip" title="<?= $word[26]['name_'.$lang]; ?>"></span>
            <span class="hidden-xs"><?= $word[26]['name_'.$lang]; ?></span>
          </th>
        </tr>
      </thead>
      <tbody>
			<?php foreach($allUserFlight as $userFlight): ?>
				<?php if($userFlight['id_section'] == 4): ?>
        <tr>
          <!--Должность-->
          <td>
            <?= dropDownList('id_rank[]', $allRankCabinCrew, $userFlight['id_rank_user']); ?>
          </td>
          <!--Имя-->
          <td>
            <?= shortenName($userFlight['last_name_'.$lang], $userFlight['name_'.$lang], $userFlight['first_name_'.$lang]); ?>
            <input name="id_flight_user[]" type="hidden" value="<?=$userFlight['id'];?>>">
          </td>
          <!--Приоритет-->
          <td>
            <div class="form-group">
               <div class="input-group">
                <input type="text" class="form-control" value="<?= $userFlight['priority_f']; ?>" pattern="[0-9]+$">
                <input name="priority_f[]" type="hidden" value="<?= $userFlight['priority_f']; ?>">
              </div>
            </div> 
          </td>
          <!--Удалить-->
          <td>
            <div class="form-group">
               <div class="input-group">
                <input type="checkbox" value="1">
                <input name="hide[]" type="hidden" value="0">
              </div> 
            </div> 
          </td>
        </tr>
				<?php endif;?>
			<?php endforeach;?>
        <!--Отправить-->
        <tr>
          <td class="a-crew-generate__submit text-right" colspan="4">
             <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>