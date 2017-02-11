/* Дата документа при вводе вручную */
(function() {
      $('.date-picker .form-control').mask('99.99.9999',{placeholder: 'dd.mm.yyyy'});
}).call(this);

/* Время  при вводе вручную */
(function() {
      $('.picker-time .form-control').mask('99:99',{placeholder: 'hh.mm'});
}).call(this);