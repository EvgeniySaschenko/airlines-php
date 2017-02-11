<h1 class="title-page text-center text-uppercase"> 
<div class="text-bold"><?= $word[129]['name_'.$lang].' '.$_GET['year']; ?></div> 
<?= $user[0]['last_name_'.$lang].' '.$user[0]['name_'.$lang].' '.$user[0]['first_name_'.$lang]; ?> 
</h1>

<div class="flight-takeoff-approach-airports-list-quarter">
  <table class="table table-striped">
    <thead>
     <tr>
      <th class="title text-center"><?= $word[136]['name_'.$lang]; ?></th>
    </tr>
    <thead>
    <tbody>
      <?php for($i = 1; $i <= 4; $i++): ?>
      <tr>
        <td>
          <a href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $currentSubsection[0]['id_section']; ?>&amp;id_subsection=<?= $currentSubsection[0]['id']; ?>&amp;id_user=<?= $_GET['id_user']; ?>&amp;year=<?= $_GET['year']; ?>&amp;quarter=<?= $i; ?>&amp;action=flight_takeoff_approach#navBottom">
            <?= $word[136]['name_'.$lang].' '.$i; ?> 
          </a>
        </td>
      </tr>
      <?php endfor; ?>
    </tbody>   
  </table>
</div>
