<div class="notice">
  <!-- Added-->
  <div data-notice="#noticeEditFlightPreparing" data-ancor="flightPreparing" class="hidden alert alert-success" role="alert">
    <?= $word[217]['name_'.$lang]; ?>
  </div>
  <!-- Error-->
  <div data-notice="#noticeErrorEditFlightPreparing" data-ancor="flightPreparing" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
</div>

<h1 class="title-page text-center text-uppercase">
  <?= $word[138]['name_'.$lang].' № '.$CURRENT_NUMBER_ASSIGMENT_FLIGHT; ?>
</h1>
<div class="a-a-flight-preparing">
  <form role="form" method="post" action="update.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_flight_assignment=<?=$allSubAssignmentFlight[0]['id'];?>&amp;id_flight_preparing=<?=$flightPreparing[0]['id'];?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>&amp;action=flight_preparing"">
    <table class="table table-bordered">
      <caption class="text-center text-uppercase text-bold"><?= $word[214]['name_'.$lang]; ?></caption>
      <tbody>
			<tr>
				<td><?= $word[200]['name_'.$lang]; ?> 1</td>
				<td colspan="2">
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="number_flight_1" value="<?= $flightPreparing[0]['number_flight_1']; ?>" class="form-control field" type="text">
            </div>
          </div>
        </td>
			</tr>
			<tr>
				<td><?= $word[200]['name_'.$lang]; ?> 2</td>
				<td colspan="2">
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="number_flight_2" value="<?= $flightPreparing[0]['number_flight_2']; ?>" class="form-control field" type="text">
            </div>
          </div>
        </td>
			</tr>
			<tr>
				<td><?= $word[200]['name_'.$lang]; ?> 2</td>
				<td colspan="2">
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="number_flight_3" value="<?= $flightPreparing[0]['number_flight_3']; ?>" class="form-control field" type="text">
            </div>
          </div>
        </td>
			</tr>
			<tr>
				<td><?= $word[202]['name_'.$lang]; ?> 1</td>
				<td colspan="2">
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="route_flight_1" value="<?= $flightPreparing[0]['route_flight_1']; ?>" class="form-control field" type="text">
            </div>
          </div>
        </td>
			</tr>
			<tr>
				<td><?= $word[202]['name_'.$lang]; ?> 2</td>
				<td colspan="2">
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="route_flight_2" value="<?= $flightPreparing[0]['route_flight_2']; ?>" class="form-control field" type="text">
            </div>
          </div>
        </td>
			</tr>
			<tr>
				<td>ЗАР</td>
				<td colspan="2">
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="route_zar" value="<?= $flightPreparing[0]['route_zar']; ?>" class="form-control field" type="text">
            </div>
          </div>
        </td>
			</tr>
			<tr>
				<td><?= $word[244]['name_'.$lang]; ?> 1</td>
				<td colspan="2">
          <div class="form-group">
            <div class="input-group date date-picker">
                <input value="<?= convertDateEmpty($flightPreparing[0]['date_execution_1']); ?>" type="text" class="form-control">
                <input name="date_execution_1" type="hidden" value="<?= convertDate3($flightPreparing[0]['date_execution_1']); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </td>
			</tr>
			<tr>
				<td><?= $word[244]['name_'.$lang]; ?> 2</td>
				<td colspan="2">
          <div class="form-group">
            <div class="input-group date date-picker">
                <input value="<?= convertDateEmpty($flightPreparing[0]['date_execution_2']); ?>" type="text" class="form-control">
                <input name="date_execution_2" type="hidden" value="<?= convertDate3($flightPreparing[0]['date_execution_2']); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </td>
			</tr>
			<tr>
				<td><?= $word[245]['name_'.$lang]; ?></td>
				<td colspan="2">
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="remarks" value="<?= $flightPreparing[0]['remarks']; ?>" class="form-control field" type="text">
            </div>
          </div>
        </td>
			</tr>
						
			
			<tr>
				<td class="title text-uppercase text-bold text-center" colspan="3"><?= $word[246]['name_'.$lang]; ?></td>
			</tr>
			<tr class="title">
				<td class="text-uppercase text-bold text-center"><?= $word[247]['name_'.$lang]; ?></td>
				<td class="text-uppercase text-bold text-center"><?= $word[130]['name_'.$lang]; ?></td>
				<td class="text-uppercase text-bold text-center"><?= $word[84]['name_'.$lang]; ?></td>
			</tr>
			<tr>
				<td>
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="components_route_1" value="<?= $flightPreparing[0]['components_route_1']; ?>" class="form-control field" type="text">
            </div>
          </div>
				</td>
				<td>
          <div class="form-group">
            <div class="input-group date date-picker">
                <input value="<?= convertDateEmpty($flightPreparing[0]['date_route_1']); ?>" type="text" class="form-control">
                <input name="date_route_1" type="hidden" value="<?= convertDate3($flightPreparing[0]['date_route_1']); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
				</td>
				<td>
					<!--<input name="date_sign_route_1" data-checkbox-confirm="<?//=$flightPreparing[0]['date_sign_route_1'];?>" type="checkbox" value="0"/>-->
					<?php dropDownListUsersSection('id_sign_route_1', $allUserSortLastNameNoHide, $flightPreparing[0]['id_sign_route_1'], $getIdSection); ?>
				</td>
			</tr>
			<tr>
				<td>
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="components_route_2" value="<?= $flightPreparing[0]['components_route_2']; ?>" class="form-control field" type="text">
            </div>
          </div>
				</td>
				<td>
          <div class="form-group">
            <div class="input-group date date-picker">
                <input value="<?= convertDateEmpty($flightPreparing[0]['date_route_2']); ?>" type="text" class="form-control">
                <input name="date_route_2" type="hidden" value="<?= convertDate3($flightPreparing[0]['date_route_2']); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
				</td>
				<td>
					<!--<input name="date_sign_route_2" data-checkbox-confirm="<?//=$flightPreparing[0]['date_sign_route_2'];?>" type="checkbox" value="0"/>-->
					<?php dropDownListUsersSection('id_sign_route_2', $allUserSortLastNameNoHide, $flightPreparing[0]['id_sign_route_2'], $getIdSection); ?>
				</td>
			</tr>
			
			<tr>
				<td class="title text-uppercase text-bold" colspan="3"><?= $word[246]['name_'.$lang]; ?> "A"</td>
			</tr>
			<tr class="title">
				<td class="text-uppercase text-bold text-center"><?= $word[248]['name_'.$lang]; ?></td>
				<td class="text-uppercase text-bold text-center"><?= $word[130]['name_'.$lang]; ?></td>
				<td class="text-uppercase text-bold text-center"><?= $word[84]['name_'.$lang]; ?></td>
			</tr>
			<tr>
				<td>
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="components_airport_a_1" value="<?= $flightPreparing[0]['components_airport_a_1']; ?>" class="form-control field" type="text">
            </div>
          </div>
				</td>
				<td>
          <div class="form-group">
            <div class="input-group date date-picker">
                <input value="<?= convertDateEmpty($flightPreparing[0]['date_airport_a_1']); ?>" type="text" class="form-control">
                <input name="date_airport_a_1" type="hidden" value="<?= convertDate3($flightPreparing[0]['date_airport_a_1']); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
				</td>
				<td>
					<!--<input name="date_sign_airport_a_1" data-checkbox-confirm="<?//=$flightPreparing[0]['date_sign_airport_a_1'];?>" type="checkbox" value="0"/>-->
					<?php dropDownListUsersSection('id_sign_airport_a_1', $allUserSortLastNameNoHide, $flightPreparing[0]['id_sign_airport_a_1'], $getIdSection); ?>
				</td>
			</tr>
			<tr>
				<td>
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="components_airport_a_2" value="<?= $flightPreparing[0]['components_airport_a_2']; ?>" class="form-control field" type="text">
            </div>
          </div>
				</td>
				<td>
          <div class="form-group">
            <div class="input-group date date-picker">
                <input value="<?= convertDateEmpty($flightPreparing[0]['date_airport_a_2']); ?>" type="text" class="form-control">
                <input name="date_airport_a_2" type="hidden" value="<?= convertDate3($flightPreparing[0]['date_airport_a_2']); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
				</td>
				<td>
					<!--<input name="date_sign_airport_a_2" data-checkbox-confirm="<?//=$flightPreparing[0]['date_sign_airport_a_2'];?>" type="checkbox" value="0"/>-->
					<?php dropDownListUsersSection('id_sign_airport_a_2', $allUserSortLastNameNoHide, $flightPreparing[0]['id_sign_airport_a_2'], $getIdSection); ?>
				</td>
			</tr>
			
			<tr>
				<td class="title text-uppercase text-bold" colspan="3"><?= $word[246]['name_'.$lang]; ?> "B"</td>
			</tr>
			<tr class="title">
				<td class="text-uppercase text-bold text-center"><?= $word[248]['name_'.$lang]; ?></td>
				<td class="text-uppercase text-bold text-center"><?= $word[130]['name_'.$lang]; ?></td>
				<td class="text-uppercase text-bold text-center"><?= $word[84]['name_'.$lang]; ?></td>
			</tr>
			<tr>
				<td>
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="components_airport_b_1" value="<?= $flightPreparing[0]['components_airport_b_1']; ?>" class="form-control field" type="text">
            </div>
          </div>
				</td>
				<td>
          <div class="form-group">
            <div class="input-group date date-picker">
                <input value="<?= convertDateEmpty($flightPreparing[0]['date_airport_b_1']); ?>" type="text" class="form-control">
                <input name="date_airport_b_1" type="hidden" value="<?= convertDate3($flightPreparing[0]['date_airport_b_1']); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
				</td>
				<td>
					<!--<input name="date_sign_airport_b_1" data-checkbox-confirm="<?//=$flightPreparing[0]['date_sign_airport_b_1'];?>" type="checkbox" value="0"/>-->
					<?php dropDownListUsersSection('id_sign_airport_b_1', $allUserSortLastNameNoHide, $flightPreparing[0]['id_sign_airport_b_1'], $getIdSection); ?>
				</td>
			</tr>
			<tr>
				<td>
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="components_airport_b_2" value="<?= $flightPreparing[0]['components_airport_b_2']; ?>" class="form-control field" type="text">
            </div>
          </div>
				</td>
				<td>
          <div class="form-group">
            <div class="input-group date date-picker">
                <input value="<?= convertDateEmpty($flightPreparing[0]['date_airport_b_2']); ?>" type="text" class="form-control">
                <input name="date_airport_b_2" type="hidden" value="<?= convertDate3($flightPreparing[0]['date_airport_b_2']); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
				</td>
				<td>
					<!--<input name="date_sign_airport_b_2" data-checkbox-confirm="<?//=$flightPreparing[0]['date_sign_airport_b_2'];?>" type="checkbox" value="0"/>-->
					<?php dropDownListUsersSection('id_sign_airport_b_2', $allUserSortLastNameNoHide, $flightPreparing[0]['id_sign_airport_b_2'], $getIdSection); ?>
				</td>
			</tr>
			
			<tr>
				<td class="title text-uppercase text-bold" colspan="3"><?= $word[246]['name_'.$lang]; ?> "C"</td>
			</tr>
			<tr class="title">
				<td class="text-uppercase text-bold text-center"><?= $word[248]['name_'.$lang]; ?></td>
				<td class="text-uppercase text-bold text-center"><?= $word[130]['name_'.$lang]; ?></td>
				<td class="text-uppercase text-bold text-center"><?= $word[84]['name_'.$lang]; ?></td>
			</tr>
			<tr>
				<td>
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="components_airport_c_1" value="<?= $flightPreparing[0]['components_airport_c_1']; ?>" class="form-control field" type="text">
            </div>
          </div>
				</td>
				<td>
          <div class="form-group">
            <div class="input-group date date-picker">
                <input value="<?= convertDateEmpty($flightPreparing[0]['date_airport_c_1']); ?>" type="text" class="form-control">
                <input name="date_airport_c_1" type="hidden" value="<?= convertDate3($flightPreparing[0]['date_airport_c_1']); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
				</td>
				<td>
					<!--<input name="date_sign_airport_c_1" data-checkbox-confirm="<?//=$flightPreparing[0]['date_sign_airport_c_1'];?>" type="checkbox" value="0"/>-->
					<?php dropDownListUsersSection('id_sign_airport_c_1', $allUserSortLastNameNoHide, $flightPreparing[0]['id_sign_airport_c_1'], $getIdSection); ?>
				</td>
			</tr>
			<tr>
				<td>
          <div class="form-group form-inline">
            <div class="input-group">
              <input name="components_airport_c_2" value="<?= $flightPreparing[0]['components_airport_c_2']; ?>" class="form-control field" type="text">
            </div>
          </div>
				</td>
				<td>
          <div class="form-group">
            <div class="input-group date date-picker">
                <input value="<?= convertDateEmpty($flightPreparing[0]['date_airport_c_2']); ?>" type="text" class="form-control">
                <input name="date_airport_c_2" type="hidden" value="<?= convertDate3($flightPreparing[0]['date_airport_c_2']); ?>">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
				</td>
				<td>
					<!--<input name="date_sign_airport_c_2" data-checkbox-confirm="<?//=$flightPreparing[0]['date_sign_airport_c_2'];?>" type="checkbox" value="0"/>-->
					<?php dropDownListUsersSection('id_sign_airport_c_2', $allUserSortLastNameNoHide, $flightPreparing[0]['id_sign_airport_c_2'], $getIdSection); ?>
				</td>
			</tr>
			
			<tr>
				<td class="title text-uppercase text-bold" colspan="3"><?= $word[249]['name_'.$lang]; ?></td>
			</tr>
			<tr class="title">
				<td class="text-uppercase text-bold text-center"><?= $word[15]['name_'.$lang]; ?></td>
				<td class="text-uppercase text-bold text-center"><?= $word[18]['name_'.$lang]; ?></td>
				<td class="text-uppercase text-bold text-center"><?= $word[209]['name_'.$lang]; ?></td>
			</tr>
			<tr>
				<td>
					<?= $flightPreparing[0]['manager_f_rank_'.$lang]; ?>
				</td>
				<td>
					<?php dropDownListUsersSection('id_manager_f', $allUserSortLastNameNoHide, $flightPreparing[0]['id_manager_f'], $getIdSection); ?>
				</td>
				<td>
					<!--<input name="date_manager_flight" data-checkbox-confirm="<?//=$flightPreparing[0]['date_manager_flight'];?>" type="checkbox" value="0"/>-->
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $flightPreparing[0]['manager_e_rank_'.$lang]; ?>
				</td>
				<td>
					<?php dropDownListUsers('id_manager_e', $allUserSortLastNameNoHide, $flightPreparing[0]['id_manager_e']); ?>
				</td>
				<td>
					<!--<input name="date_manager_engineer" data-checkbox-confirm="<?//=$flightPreparing[0]['date_manager_engineer'];?>" type="checkbox" value="0"/>-->
				</td>
			</tr>
			
			<tr>
				<td>
					<?= $flightPreparing[0]['navigator_rank_'.$lang]; ?>
				</td>
				<td>
					<?php dropDownListUsersSection('id_navigator', $allUserSortLastNameNoHide, $flightPreparing[0]['id_navigator'], $getIdSection); ?>
				</td>
				<td>
					<!--<input name="date_navigator" data-checkbox-confirm="<?//=$flightPreparing[0]['date_navigator'];?>" type="checkbox" value="0"/>-->
				</td>
			</tr>
			<tr>
				<td>
					<?=$flightPreparing[0]['manager_f_rank_'.$lang];?>
				</td>
				<td>
					<?=shortenName($flightPreparing[0]['manager_f_last_name_'.$lang], $flightPreparing[0]['manager_f_name_'.$lang], $flightPreparing[0]['manager_f_first_name_'.$lang]);?>
				</td>
				<td>
        <?php
          if($flightPreparing[0]['date_not_edit'] != 0)
            $checkedHide = 'checked="checked"';
        ?>
          <div class="form-group">
           <div class="input-group">
            <input type="checkbox" value="1" <?= $checkedHide; ?>>
            <input name="date_not_edit" type="hidden" value="<?= $flightPreparing[0]['date_not_edit']; ?>">
           </div>
          </div>
				</td>
			</tr>
			
			<tr>
        <td class="text-right" colspan="3">
          <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
        </td>
			</tr>
      </tbody>
    </table>
  </form>
</div>

