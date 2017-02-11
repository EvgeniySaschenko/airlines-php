/* Устанавливает чекбокс для скрытых разделов */

(function() {
  var sectionSiteListHide;
  $('.a-section-site-list-edit [data-section-site-list-hide]').each(function() {
    sectionSiteListHide = $(this).data('section-site-list-hide');
    if(sectionSiteListHide) {
      $(this).find('.section__hide').attr('checked', 'checked');
      $(this).find('.subsection__hide').attr('checked', 'checked');
    }
  });
}).call(this);


/* Устанавливает чекбокс для скрытых воздушных суден */
(function() {
  var dataAircraftSiteListHide;
  $('.a-aircraft-site-list-edit [data-aircraft-site-list-hide]').each(function() {
    dataAircraftSiteListHide = $(this).data('aircraft-site-list-hide');
    if(dataAircraftSiteListHide) {
      $(this).find('.a-aircraft-site-list-edit__hide').attr('checked', 'checked');
    }
  });
}).call(this);



/* Отмечает чекбоксы */
(function() {
  var sectionSiteListHide;
  $('.a-section-site-list-edit [data-section-site-list-hide]').each(function() {
    sectionSiteListHide = $(this).data('section-site-list-hide');
    if(sectionSiteListHide == 1) {
      $(this).find('input[type="hidden"]').val('1');
    } else {
      $(this).find('input[type="hidden"]').val('0');
    }
  });
}).call(this);


/* Отмечает чекбоксами Скрытые воздушные суда */
(function() {
  var aircraftSiteListHide;
  $('.a-aircraft-site-list-edit [data-aircraft-site-list-hide]').each(function() {
    aircraftSiteListHide = $(this).data('aircraft-site-list-hide');
    if(aircraftSiteListHide == 1) {
      $(this).find('input[type="hidden"]').val('1');
    } else {
      $(this).find('input[type="hidden"]').val('0');
    }
  });
}).call(this);