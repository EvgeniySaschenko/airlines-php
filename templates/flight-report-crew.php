<div class="flight-report-crew">
<table class="table table-striped">
    <caption class="text-center text-uppercase text-bold"><?= $word[48]['name_'.$lang]; ?></caption>
    <tbody>
    <?php foreach($allFlightReportGroupYear as $flightReportYear): ?>
      <tr>
          <td class="text-bold">
            <a href="index.php?lang=<?= $lang ;?>&id_section=<?= $getIdSection ;?>&id_subsection=<?= $getIdSubsection ;?>&id_aircraft=<?= $aircraft['id'];?>&year=<?= convertDateYear($flightReportYear['date_shipping']); ?>&action=flight_consolidated_report_crew_year#navBottom">
              <?= convertDateYear($flightReportYear['date_shipping']); ?>
            </a>   
          </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>