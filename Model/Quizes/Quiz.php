<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Quizes;

use Egulias\QuizBundle\Model\Questions\Question;
/**
 * Declaration of abstract class Quiz to allow the creation of multiple types of quizes
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
abstract class Quiz implements QuizInterface
{
    /**
     * To store quiz questions
     * @var $question array
     */
    protected $questions = Null;

    protected $name = '';

    protected $type = 'Quiz';

    public function __construct()
    {
        $this->questions = array();
    }
    /**
     * Add a question to the quiz
     *
     * @param Question $q
     * @return Quiz for concatenation
     */
    public function addQuestion(Question $q)
    {
        $this->questions[] = $q;
        return $this;
    }

    public function getQuestions()
    {
        return $this->questions;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }
}

?>
