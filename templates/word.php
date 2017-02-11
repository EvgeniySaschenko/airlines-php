<table class="table table-striped">
  <thead>
    <tr>
      <th class="text-center">id</th>
      <th class="text-center">ru</th>
      <th class="text-center">en</th>
    </tr>
  </thead>
  <tbody>
    <? foreach($word as $key => $item): ?>
    <tr>
      <td><?= $key; ?></td>
      <td><?= $item['name_ru']; ?></td>
      <td><?= $item['name_en']; ?></td>
    </tr>
    <? endforeach; ?>
  </tbody>
</table>