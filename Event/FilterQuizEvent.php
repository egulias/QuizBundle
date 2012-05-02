<?php

namespace Egulias\QuizBundle\Event;

use Symfony\Component\EventDispatcher\Event;

use Egulias\QuizBundle\Model\Quizes\Quiz;
use Egulias\QuizBundle\Model\Answers\Answer;

/**
 * FilterQuizEvent
 *
 * @package    EguliasQuizBundle
 * @subpackage Event
 * @author     Eduardo Gulias Davis <me@egulias.com>
 *
 */
class FilterQuizEvent extends Event
{
    protected $quiz;
    protected $answers;

    public function __construct(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    /**
     * getQuiz
     *
     * @return Quiz
     */
    public function getQuiz()
    {
        return $this->quiz;
    }

}
