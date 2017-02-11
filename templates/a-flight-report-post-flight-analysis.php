<div class="notice">
  <!-- Added-->
  <div data-notice="#noticeEditPostFlightAnalysis" data-ancor="postFlightAnalysis" class="hidden alert alert-success" role="alert">
    <?= $word[218]['name_'.$lang]; ?>
  </div>
  <!-- Error-->
  <div data-notice="#noticeErrorEditPostFlightAnalysis" data-ancor="postFlightAnalysis" class="hidden alert alert-danger" role="alert">
    <?= $word[145]['name_'.$lang]; ?>
  </div>
</div>



<div class="a-flight-report-post-flight-analysis-edit">
  <form role="form" method="post" action="update.php?lang=<?= $lang; ?>&amp;id_section=<?= $getIdSection; ?>&amp;id_subsection=<?= $getIdSubsection; ?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>&amp;action=flight_report_notes">
    <table class="table table-striped">
      <caption class="text-bold text-center"><?= $word[214]['name_'.$lang]; ?></caption>
    <thead>
			<tr class="title">
				<th><?= $word[15]['name_'.$lang]; ?></th>
				<th><?= $word[51]['name_'.$lang]; ?></th>
				<th><?= $word[34]['name_'.$lang]; ?></th>
				<th><?= $word[209]['name_'.$lang]; ?></th>
			</tr>
    </thead>
    <tbody>
      
			<tr>
				<td><?= $word[84]['name_'.$lang]; ?> 1 (<?= $word[342]['name_'.$lang]; ?> <?= $word[242]['name_'.$lang]; ?>)</td>
				<td>
					<?php dropDownListUsersSectionFL('id_navigator_r', $allUserFlight, $currentAssignmentFlight[0]['id_navigator_r'], 4); ?>
				</td>
				<td class="remark">
          <div class="form-group">
           <div class="input-group">
             <input name="remark_navigator_r" class="form-control" type="text" value="<?=$currentAssignmentFlight[0]['remark_navigator_r'];?>">
           </div>
          </div>
        </td>
				<td></td>
			</tr>
      
			<tr>
				<td><?= $word[84]['name_'.$lang]; ?> 2 (<?= $word[342]['name_'.$lang]; ?> <?= $word[243]['name_'.$lang]; ?>)</td>
				<td>
					<?php dropDownListUsersSectionFL('id_pic_r', $allUserFlight, $currentAssignmentFlight[0]['id_pic_r'], 4); ?>
				</td>
				<td class="remark">
          <div class="form-group">
           <div class="input-group">
             <input name="remark_pic_r" class="form-control" type="text" value="<?=$currentAssignmentFlight[0]['remark_pic_r'];?>">
           </div>
          </div>
        </td>
				<td></td>
			</tr>
      
			<tr>
				<td><?=$currentAssignmentFlight[0]['manager_f_rank_'.$lang];?></td>
				<td>
					<?=shortenName($currentAssignmentFlight[0]['manager_f_last_name_'.$lang], $currentAssignmentFlight[0]['manager_f_name_'.$lang], $currentAssignmentFlight[0]['manager_f_first_name_'.$lang]);?>
				</td>
				<td class="remark">
          <div class="form-group">
           <div class="input-group">
             <input name="remark_manager_flight_r" class="form-control" type="text" value="<?=$currentAssignmentFlight[0]['remark_manager_flight_r'];?>">
           </div>
          </div>
        </td>
				<td></td>
			</tr>
      
			<tr>
				<td><?=$currentAssignmentFlight[0]['manager_f_rank_'.$lang];?></td>
				<td>
					<?=shortenName($currentAssignmentFlight[0]['manager_f_last_name_'.$lang], $currentAssignmentFlight[0]['manager_f_name_'.$lang], $currentAssignmentFlight[0]['manager_f_first_name_'.$lang]);?>
				</td>
				<td class="title"></td>
        <?php
          if($currentAssignmentFlight[0]['date_not_edit_r'] != 0)
            $checkedHide = 'checked="checked"';
        ?>
				<td>
          <div class="form-group">
           <div class="input-group">
            <input type="checkbox" value="1"  <?= $checkedHide; ?>>
            <input name="date_not_edit_r" type="hidden" value="<?=$currentAssignmentFlight[0]['date_not_edit_r'];?>">
           </div>
          </div>
				</td>
			</tr>

			<tr class="title">
        <td>
          <span class="text-bold"><?= $word[225]['name_'.$lang]; ?> (<?= $word[235]['name_'.$lang]; ?>)</span>
          <div class="form-group">
           <div class="input-group">
            <input name="balance_fuel" class="form-control" type="text" value="<?=$currentAssignmentFlight[0]['balance_fuel'];?>">
           </div>
          </div>
        </td>
        <td>
          <span class="text-bold"><?= $word[226]['name_'.$lang]; ?> (<?= $word[235]['name_'.$lang]; ?>)</span>
          <div class="form-group">
           <div class="input-group">
             <input name="balance_oil" class="form-control" type="text" value="<?=$currentAssignmentFlight[0]['balance_oil'];?>">
           </div>
          </div>
        </td>
				<td></td>
				<td></td>
			</tr>
			
			<tr>
				<td class="text-right" colspan="4">
          <button type="submit" class="btn btn-success"><?= $word[83]['name_'.$lang]; ?></button>
        </td>
			</tr>
      
    </tbody>
    </table>
    </form>
</div>