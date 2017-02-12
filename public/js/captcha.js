/* Время  при вводе вручную */
(function() {
    var date, captcha, captchaInput;
      date = new Date();
      captcha = date.getSeconds() * date.getSeconds() * date.getYear() * date.getSeconds();
      
      $('.captcha-maskedinput-text').text(captcha);
      
      
        $('.captcha-maskedinput-input').on('keyup', function(){
            captchaInput = $(this).val();
            if(captcha == captchaInput) {
                $(this).parent('.captcha-maskedinput-form-group').children('.btn').removeAttr('disabled');
            } else {
                $(this).parent('.captcha-maskedinput-form-group').children('.btn').attr("disabled","disabled");
            }
            
        }); 
      
      
      

      
}).call(this);