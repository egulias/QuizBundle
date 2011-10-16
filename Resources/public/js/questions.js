$(function(){

  $('.question_type').live('change',function(e){
    e.stopPropagation();
    container = $(this).parents('div.question_form').parent('td');
    element = $('.add_options:not(:visible)',container);
    option = $(this).val();
    if(element && option == 'choice') {
      element.show();
      $(this).parent('div').append(element);
    }
    else {
      element = $('.add_options::visible',container);
      element.hide();
      container.append(element);
    }
  });
  $('.add_options > a').live('click', function(e){
    e.stopPropagation();
    container = $(this).parents('div.question_form').parent('td');
    option = $('.question_options', container);
    cloned = option.not(':visible').clone();
    n = $('.question_options').length;
    $('#question_options_value',cloned).attr('name', 'question_options[' + n  + '][value]');
    $('#question_options_key',cloned).attr('name', 'question_options[' + n  + '][key]');
    cloned.show();
    $(this).closest('div').append(cloned);
  });
});
