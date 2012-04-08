# Usage

The QuizBundle comes with a set of predefined urls to point to basic controllers so you can start using the bundle
out of the box. but these controllers are basic ones so you can test the bundle to see if it fits your needs.

## Controllers

All the controllers mostly implements one of the three available services (see services section for mor information).
Except for those who are used for listings, where they just call the Entity Manager.

  - QuizManagerController.php: for CRUD on Quizes. 
  - QuestionController.php: for CRUD on Questions.
  - QuizController.php: for "taking" a Quiz.
  - AnswerController.php: for creating Answers

If you want to personalize any of the controllers you can just pick the services and create your own Controllers with
them.

## Services

Three services are available with the bundle:

- egulias.quiz.manager
- egulias.take.quiz
- egulias.question.manager

1. egulias.quiz.manager

Implements a series of methods to allow the cration and modification of quizes. These are:

* getQuizForm
* saveQuizForm
* editQuizForm
* updateQuizForm

2. egulias.take.quiz

This service allows the user to take a given quiz. It implements two methods for this:

* takeQuiz
  Returning the quiz form

* responseQuiz
  Responsible for saving the user answers from the quiz id

3. egulias.question.manager

Same as ```egulias.quiz.manager```, but with methods for questions: These are:

* editQuestion
* getQuestionForm
* saveQuestion
