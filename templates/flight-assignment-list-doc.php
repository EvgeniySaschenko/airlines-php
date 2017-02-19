<h1 class="title-page text-center text-uppercase"> <?= $currentSubsection[0]['name_'.$lang]; ?> </h1>

<?php
	$asigmentTitle = ' № '.$CURRENT_NUMBER_ASSIGMENT_FLIGHT;
?>

<div class="flight-assignment-list-doc">
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="text-center">
          <span class="glyphicon glyphicon-download" data-toggle="tooltip" title="<?= $word[13]['name_'.$lang]; ?>"></span>
        </th>
        <th>
          <?= $word[51]['name_'.$lang]; ?>
        </th>
        <th class="text-center hidden-xs">
          <?= $word[128]['name_'.$lang]; ?>
        </th>
        <th class="text-center">
          <span class="hidden-xs"><?= $word[24]['name_'.$lang]; ?></span>
          <span class="glyphicon glyphicon-pencil visible-xs" data-toggle="tooltip" title="<?= $word[24]['name_'.$lang]; ?>"></span>
        </th>
      </tr>
    </thead>
    <tbody>
      <!--Задание на полет-->
      <tr>
        <td class="flight-assignment-list-doc__download text-center">
          <a href="doc-generate/report-flight.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>">
            <span class="fa fa-file-word-o text-color-word" data-toggle="tooltip" title="<?= $word[13]['name_'.$lang]; ?>"></span>
          </a>
        </td>
        <td class="flight-assignment-list-doc__name">
          <div class="cut-text">
            <a href="doc-generate/report-flight.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>">
              <?= $word[126]['name_'.$lang].$asigmentTitle; ?>
            </a>
          </div>
        </td>
        <td class="flight-assignment-list-doc__date-departure text-center hidden-xs">
          <?= convertDate($currentAssignmentFlight[0]['date_departure']); ?>
        </td>
        <td class="text-center">
        <?php if(($currentAssignmentFlight[0]['date_not_edit_a'] == 0 and $permissionEditFlightGenerateDoc or $permissionAssignmentFlight) and $permissionEditSubsection): ?>
          <a href="index.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>&amp;id_aircraft=<?=$currentAssignmentFlight[0]['id_aircraft'];?>&amp;action=edit_assignment#navBottom">
           <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="<?= $word[24]['name_'.$lang]; ?>"></span>
          </a>
        <?php endif; ?>
        </td>
      </tr>
      <!--Отчет о полете-->
      <tr>
        <td class="flight-assignment-list-doc__download text-center">
          <a href="doc-generate/report-flight.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>">
            <span class="fa fa-file-word-o text-color-word" data-toggle="tooltip" title="<?= $word[13]['name_'.$lang]; ?>"></span>
          </a>
        </td>
        <td class="flight-assignment-list-doc__name">
          <div class="cut-text">
            <a href="doc-generate/report-flight.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>">
              <?= $word[137]['name_'.$lang].$asigmentTitle; ?>
            </a>
          </div>
        </td>
        <td class="flight-assignment-list-doc__date-departure text-center hidden-xs">
          <?= convertDate($currentAssignmentFlight[0]['date_departure']); ?>
        </td>
        <td class="text-center">
        <?php if(($currentAssignmentFlight[0]['date_not_edit_r'] == 0 and $permissionEditFlightGenerateDoc or $permissionAssignmentFlight) and $permissionEditSubsection): ?>
          <a href="index.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>&amp;id_aircraft=<?=$currentAssignmentFlight[0]['id_aircraft'];?>&amp;action=edit_report#navBottom">
           <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="<?= $word[24]['name_'.$lang]; ?>"></span>
          </a>
        <?php endif; ?>
        </td>
      </tr>
      <!--Предварительная подготовка-->
      <tr>
        <td class="flight-assignment-list-doc__download text-center">
          <a href="doc-generate/report-flight.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>">
            <span class="fa fa-file-word-o text-color-word" data-toggle="tooltip" title="<?= $word[13]['name_'.$lang]; ?>"></span>
          </a>
        </td>
        <td class="flight-assignment-list-doc__name">
          <div class="cut-text">
            <a href="doc-generate/flight-preparing.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id'];?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>">
              <?= $word[138]['name_'.$lang].$asigmentTitle; ?>
            </a>
          </div>
        </td>
        <td class="flight-assignment-list-doc__date-departure text-center hidden-xs">
          <?= convertDate($currentAssignmentFlight[0]['date_departure']); ?>
        </td>
        <td class="text-center">
        <?php if(
					(($flightPreparing[0]['date_not_edit'] == 0 and ($permissionEditFlightGenerateDoc or $currentUser[0]['id'] == $flightPreparing[0]['id_manager_e'])
				or
					$permissionAssignmentFlight)) and $permissionEditSubsection):?>
          <a href="index.php?lang=<?=$lang;?>&amp;id_section=<?=$currentSubsection[0]['id_section'];?>&amp;id_subsection=<?=$currentSubsection[0]['id']?>&amp;id_flight_assignment=<?=$currentAssignmentFlight[0]['id'];?>&amp;id_aircraft=<?=$currentAssignmentFlight[0]['id_aircraft'];?>&amp;action=edit_flight_preparing#navBottom">
           <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="<?= $word[24]['name_'.$lang]; ?>"></span>
          </a>
        <?php endif; ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>
