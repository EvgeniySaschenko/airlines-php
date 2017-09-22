<h1 class="title-page text-center text-uppercase"> <?= $currentSubsection[0]['name_'.$lang]; ?> </h1>

<div class="reports-pic-as-year__pic">
  <table class="table table-striped">
    <thead>
      <tr>
          <th class="text-center title">
            <?= $word[280]['name_'.$lang]; ?>
          </th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($allFlightReportGroupYearAS as $flightReportGroupYearAS): ?>
      <tr>
          <td class="text-center">
            <a href="index.php?lang=<?= $lang ;?>&id_section=<?= $getIdSection ;?>&id_subsection=<?= $getIdSubsection ;?>&year=<?= convertDateYear($flightReportGroupYearAS['date_shipping']); ?>&action=reports_pic_as_list_users_month#navBottom">
              <?= convertDateYear($flightReportGroupYearAS['date_shipping']); ?>
            </a>
          </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>