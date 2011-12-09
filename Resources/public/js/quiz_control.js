$(function(){
  var qTable = $('#questions_table');
  //add Question
  $('a.addQuestion').click(function(e){
    e.stopPropagation();
    $.get($(this).attr('href'),function(data){
      n = $('.question_form').length;
      n += $("#quiz_questions").children("div").length;
      qTable.append(data);

      $('#questions_table').find('#question_question').each(function(i){
        $(this).attr('id', 'question_'+n).addClass('question_form').attr('name','quiz[questions]['+n+'][question]');
      });

      $('#questions_table').find('#question_quiz').each(function(i){
        $(this).attr('id', 'quiz_'+n).addClass('question_form').attr('name','quiz[questions]['+n+'][quiz]');
      });

    });
    return false;
  });

});
