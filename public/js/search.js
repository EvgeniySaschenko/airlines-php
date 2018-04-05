(function() {
  var idSection, userIdSection;
  /* Скрывает лишние пункты меню */
  idSection= $('.search .dropdown-section').data('id-section');
  $('.search .dropdown-user option').each( function(i, e){
      userIdSection= $(this).data('id-section');
      if(idSection != userIdSection){
          $(this).css('display' , 'none');
      }
  });
  

  $('.search .dropdown-section').on('change', function(e){
      idSection= $(this).val();
      $('.search .dropdown-user option').css('display' , 'block');
      
        $('.search .dropdown-user option').each( function(i, e){
            userIdSection= $(this).data('id-section');
            if(idSection != userIdSection){
                $(this).css('display' , 'none');
            }
        });
        
  });
  
}).call(this);