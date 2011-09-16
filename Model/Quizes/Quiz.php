<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Quizes;

/**
 * Declaration of abstract class Quiz to allow the creation of multiple types of quizes
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
class Quiz implements QuizInterface
{
    /**
     * To store quiz questions
     * @var $question SplObjectStorage
     * @see SplObjectStorage
     */
    protected $questions = Null;

    protected $name = '';

    public function __construct()
    {
        $this->questions = new \SplObjectStorage();
    }
    /**
     * Add a question to the quiz
     *
     * @param Question $q
     * @return Quiz for concatenation
     */
    public function addQuestion(Question $q)
    {
        $this->question->attach($q);
        return $this;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

}

?>
