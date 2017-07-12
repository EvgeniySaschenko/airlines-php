// Блокировать поле если вопрос не соответствует текущему пользователю
(function() {
  var idUser, currentIdUser;
    $('.a-pool-edit__table-edit [data-id-user]').each(function(){
        idUser = $(this).data('id-user');
        currentIdUser = $('body').data('current-id-user');
        if(idUser != currentIdUser) {
            $(this).find('[name="remark_user[]"]').attr('readonly', 'readonly');
            $(this).find('[name="seriousness_user_1[]"]').parent('.form-group').addClass('readonly');
            $(this).find('[name="seriousness_user_2[]"]').parent('.form-group').addClass('readonly');
            $(this).find('[name="probability_user_1[]"]').parent('.form-group').addClass('readonly');
            $(this).find('[name="probability_user_2[]"]').parent('.form-group').addClass('readonly');
        }
    });
}).call(this);

// Подсветка рисков
(function() {
  var indexRiskBefore, indexRiskAfter, riskAssessmentSetings;
  riskAssessmentSetings = $('body').data('risk-assessment')
  
    if(riskAssessmentSetings == 'risk_assessment_1') {
        function colorHighlighting(selector, value) {
            // Красный
            if(value == '5A' || value == '4A' || value == '3A' || value == '5B' || value == '4B' || value == '5C') {
                 selector.find('select').css('backgroundColor', '#fd0100')
            }

            // Желтый
            if(value == '5D' || value == '5E' || value == '4C' || value == '4D' || value == '4E' || value == '3B' || value == '3C' || value == '3D' || value == '2A' || value == '2B' || value == '2C') {
                 selector.find('select').css('backgroundColor', '#ffff01')
            }

            // Зеленый 
            if(value == '1A' || value == '1B' || value == '1C' || value == '1D' || value == '1E' || value == '2D' || value == '2E' || value == '3E') {
                 selector.find('select').css('backgroundColor', '#00af50')
            }
        }
    }
    if(riskAssessmentSetings == 'risk_assessment_2') {
        function colorHighlighting(selector, value) {
            // Красный 
            if(value == '5D' || value == '5E' || value == '4E') {
                 selector.find('select').css('backgroundColor', '#fe0002')
            }
            // Оранжевый 
            if(value == '4C' || value == '5C' || value == '3D' || value == '4D' || value == '3E') {
                 selector.find('select').css('backgroundColor', '#ff9800')
            }
            // Желтый 
            if(value == '3B' || value == '4B' || value == '5B' || value == '2C' || value == '3C' || value == '2D' || value == '2E') {
                 selector.find('select').css('backgroundColor', '#feff01')
            }
            // Зеленый 
            if(value == '1A' || value == '2A' || value == '3A' || value == '4A' || value == '5A' || value == '1B'  || value == '2B' || value == '1C' || value == '1D' || value == '1E') {
                 selector.find('select').css('backgroundColor', '#00ff00')
            }
        }
    }

    
    // Страница с ответами пользователя
    $('.a-pool-edit-user [data-id-user]').each(function(){
        indexRiskBefore = $(this).find('[data-index-risk-before]').data('index-risk-before');
        indexRiskAfter = $(this).find('[data-index-risk-after]').data('index-risk-after');
        
        colorHighlighting($(this).find('[data-index-risk-before]'), indexRiskBefore);
        colorHighlighting($(this).find('[data-index-risk-after]'), indexRiskAfter);

    });
    
    // Страница администратора
    $('.a-pool-edit [data-id-user]').each(function(){
        indexRiskBefore = $(this).find('[data-index-risk-before]').data('index-risk-before');
        indexRiskAfter = $(this).find('[data-index-risk-after]').data('index-risk-after');
        
        colorHighlighting($(this).find('[data-index-risk-before]'), indexRiskBefore);
        colorHighlighting($(this).find('[data-index-risk-after]'), indexRiskAfter);

    });
    
    // Страница администратора
    $('.a-pool-edit [data-id-admin]').each(function(){
        indexRiskBefore = $(this).find('[data-index-risk-before]').data('index-risk-before');
        indexRiskAfter = $(this).find('[data-index-risk-after]').data('index-risk-after');
        
        colorHighlighting($(this).find('[data-index-risk-before]'), indexRiskBefore);
        colorHighlighting($(this).find('[data-index-risk-after]'), indexRiskAfter);

    });
    
}).call(this);