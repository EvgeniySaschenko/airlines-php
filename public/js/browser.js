/* Добавляет иконку к элементу с класом .icon-section и атрибутом [data-id-section]  */
(function() {
  var browser;
  $('[data-browser]').each(function() {
    browser = $(this).data('browser');
    $(this).find('.icon-browser').addClass('fa fa-' + browser);
    $(this).find('.icon-browser').attr('title', browser);
  });
}).call(this);
