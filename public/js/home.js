/* Делает прозрачным фон у блока content если Главная */
(function() {
  var typeSection;
  typeSection = $('body').data('current-type-section');
  if(typeSection == 'home') {
    $('.content').css('background-color', 'transparent');
  }
}).call(this);

/* Кнопка показать текст */
(function() {
  var status;
  $('.home_btn-show-content').on('click', function() {
    status = $('.home__content').data('status');
    if(status == 'hidden') {
      $('.home__content').attr('data-status', 'show');
      $('.home__content').css('height', 'auto');
      $('.home_btn-show-content').css({display : 'none'});
    } 
  });
}).call(this);

/* Кнопка показать текст */
(function() {
  var height = 0;
  $('.home__content p').each(function(key, value){
    if(key <= 11) {
      height = height + $(this).height();
    }
  });
  
  $('.home__content').css({'height' : height});
}).call(this);