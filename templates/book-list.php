<div class="book-list" data-anchor-pagination="#bookList">
  
  <table class="table table-striped">
    <thead>
      <tr>
        <th class="text-center title">
          <span class="fa fa-folder-open" data-toggle="tooltip" title="<?= $word[113]['name_'.$lang]; ?>"></span>
        </th>
        <th class="title">
          <?= $word[51]['name_'.$lang]; ?>
        </th>
        <th class="title text-right hidden-xs">
          <?= $word[71]['name_'.$lang]; ?>
        </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($allBook as $book): ?>
        <tr>
          <td class="book-list__folder-link text-center">
            <a href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $book['id_section']; ?>&amp;id_subsection=<?= $book['id_subsection']; ?>&amp;id_book=<?= $book['id']; ?>#navBottom">
              <span class="fa fa-folder-open"></span>
            </a>
          </td>
          <td class="book-list__folder-name">
            <div class="cut-text">
            <a href="index.php?lang=<?= $lang; ?>&amp;id_section=<?= $book['id_section']; ?>&amp;id_subsection=<?= $book['id_subsection']; ?>&amp;id_book=<?= $book['id']; ?>#navBottom">
              <?= $book['name_'.$lang]; ?>
            </a>
            </div>
          </td>
          <td class="book-list__date-create text-right hidden-xs">
             <?= convertDate($book['date_create']); ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
