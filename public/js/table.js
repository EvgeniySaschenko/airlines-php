/* Полосатые таблицы с учётом скрытых строк */
(function() {
  var i, tableStriped;
  i = 0
    function tableStriped() {
     $('.table-striped tr').each(function() {
       if($(this).height() > 0) {
         i++;
         if(i % 2 == 0) {
           $(this).children('td').addClass('table-td-bg-1');
         } else {
           $(this).children('td').addClass('table-td-bg-2');
         }
       }
     });
   }
   tableStriped();
 // При переключени вкладки необходимо запускать функцию
 $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
     tableStriped();
 })
}).call(this);

/* Сортировка данных таблицы - список всех пользователей службы */
(function() {
  $('.tablesorter-a-user-list').tablesorter({
    headers : {
      0 : { sorter : false },
      3 : { sorter : false },
      5 : { sorter : false },
      6 : { sorter : false }
    }
  });
}).call(this);

/* Сортировка данных таблицы - список пользователей в разделе контроль отправленные документы */
(function() {
  $('.tablesorter-control__doc-user-received').tablesorter({
    headers : {
      0 : { sorter : false },
      3 : { sorter : false },
      4 : { sorter : false }
    }
  });
}).call(this);


/* Сортировка данных таблицы - список пользователей в разделе контроль документы пользователей */
(function() {
  $('.tablesorter-control__doc-user').tablesorter({
    headers : {
      0 : { sorter : false },
      3 : { sorter : false }
    }
  });
}).call(this);


/* Сортировка данных таблицы - в разделе контактная информация */
(function() {
  $('.tablesorter-contact-info__list-user').tablesorter({
    headers : {
      5 : { sorter : false }
    }
  });
}).call(this);