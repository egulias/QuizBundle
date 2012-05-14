<?php

namespace Egulias\QuizBundle\Event;

use Symfony\Component\EventDispatcher\Event;

use Egulias\QuizBundle\Model\Quizes\Quiz;
use Egulias\QuizBundle\Model\Quizes\QuizQuestion;
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
    protected $qq;

    /**
     * __construct
     *
     * @param Quiz         $quiz Current Quiz
     * @param QuizQuestion $qq   Questions from the form
     *
     * @return void
     */
    public function __construct(Quiz $quiz, QuizQuestion $qq)
    {
        $this->quiz = $quiz;
        $this->qq = $qq;
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

    /**
     * getQuizQuestion
     *
     * @return QuizQuestion
     */
    public function getQuizQuestion()
    {
        return $this->qq;
    }

}
