/* Присваевает .active в клосе .pagination для текущей страницы */
(function() {
  var page;

  $('.pagination').each(function() {
    page = $(this).data('page');
    $('.pagination__page a').css('cursor', 'pointer');
    if(!page){
      $(this).children('.pagination__page:first').addClass('active');
    } else {
      $(this).children('.pagination__page[data-page=' + page + ']').addClass('active');
    }
  });
}).call(this);


/* Добавляет якоря в постраничную навигацию если предок имеет атрибут [data-anchor-pagination] */
(function() {
  var anchor, href;
  $('.pagination [href]').each(function() {
    anchor = $(this).parents('[data-anchor-pagination]').data('anchor-pagination');
    href = $(this).attr('href');
    $(this).attr('href', href + anchor);
  });
}).call(this);
