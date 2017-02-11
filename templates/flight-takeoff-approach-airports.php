<h1 class="title-page text-center text-uppercase"> 
<div class="text-bold"><?= $word[129]['name_'.$lang].' '.$_GET['year']; ?></div> 
<?= $user[0]['last_name_'.$lang].' '.$user[0]['name_'.$lang].' '.$user[0]['first_name_'.$lang]; ?> 
</h1>

<div class="flight-takeoff-approach-airports">
  <table class="table table-striped">
    <thead>
     <tr>
      <th class="title text-center"><?= $word[130]['name_'.$lang]; ?></th>
      <th class="title text-center"><?= $word[131]['name_'.$lang]; ?></th>
      <th class="title"><?= $word[132]['name_'.$lang]; ?></th>
      <th class="title"><?= $word[317]['name_'.$lang]; ?></th>
      <th class="title text-center"><?= $word[133]['name_'.$lang]; ?></th>
      <th class="title"><?= $word[134]['name_'.$lang]; ?></th>
      <th class="title"><?= $word[135]['name_'.$lang]; ?></th>
    </tr>
    <thead>
      <tr class="text-center text-bold">
        <td colspan="7"><?= $word[136]['name_'.$lang]; ?> <?= $_GET['quarter']; ?></td>
      </tr>
      <?php foreach($allFlightReportTakeoffApproachUserYearQuarter as $flightReportTakeoffApproachUserYearQuarter): ?>
        <tr class="center">
          <td class="text-center"><?= $flightReportTakeoffApproachUserYearQuarter['date_shipping']; ?></td>
          <td class="text-center"><?= $flightReportTakeoffApproachUserYearQuarter['ta_category']; ?></td>
          <td><?= $flightReportTakeoffApproachUserYearQuarter['ta_airport']; ?></td>
          <td><?= $flightReportTakeoffApproachUserYearQuarter['ta_take_off_landing']; ?></td>
          <td class="text-center"><?= $flightReportTakeoffApproachUserYearQuarter['ta_dn']; ?></td>
          <td><?= $flightReportTakeoffApproachUserYearQuarter['ta_conditions']; ?></td>
          <td><?= $flightReportTakeoffApproachUserYearQuarter['ta_mk_pos']; ?></td>
        </tr>
      <?php endforeach; ?>
  </table>
</div>