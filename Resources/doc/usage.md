# Usage

The QuizBundle comes with a set of predefined urls to point to basic controllers so you can start using the bundle
out of the box.

## Controllers

All the controllers mostly implements one of the two available services (see services section for mor information).

  - QuizManagerController.php
  - QuestionController.php (in course of beeing refactored)
  - QuizController.php
  - AnswerController.php

If you want to personalize any of the controllers you can just pick the services and create your owns.

## Services

Two services are available with the bundle (a third is planned for managing questions):

- egulias.quiz.manager
- egulias.take.quiz

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
