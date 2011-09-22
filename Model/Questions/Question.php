<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Questions;

use Egulias\QuizBundle\Model\Answers\Answer;

/**
 * Declaration of class Question to allow the creation of multiple types of questions
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
abstract class Question
{
    protected $name = '';
    protected $text = '';
    protected $answer = null;

    abstract public function setText($text);
    abstract public function getText();
    abstract public function addAnswer(Answer $q);
    abstract public function getAnswer();
}
