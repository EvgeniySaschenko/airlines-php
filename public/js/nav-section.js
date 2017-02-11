/* Присваевает текущему разделу / подразделу класс .active */
(function() {
  var currentSection, currentSubsection;
  currentSection = $('body').data('current-id-section');
  currentSubsection = $('body').data('current-id-subsection');
  $('.header__nav [data-id-section=' + currentSection + ']').addClass('active');
  $('.header__nav [data-id-subsection=' + currentSubsection + ']').addClass('active');
}).call(this);

/* Меняет высоту пункта меню - для мобильных */
(function() {
  var active;
  $('.header__nav-bottom-list-item').each(function(){
    active = $(this).hasClass('active');
    if($(window).width() <= '749') {
      if(active !== true) {
        $(this).css({'height' : '45px'});
      }
    }
  });
}).call(this);

