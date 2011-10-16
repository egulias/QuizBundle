$(function(){
  var qTable = $('#questions_table');
  //add Question
  $('a.addQuestion').click(function(e){
    e.stopPropagation();
    $.get('quiz/add/question',function(data){
      n = $('.question_form').length;
      qTable.append(data);

      $('#questions_table').find('#questions_questions').each(function(i){
        $(this).attr('id', 'question_'+n).addClass('question_form').attr('name','questions['+n+']');
      });

    });
  });

});
