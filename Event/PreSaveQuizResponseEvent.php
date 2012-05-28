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
class PreSaveQuizResponseEvent extends Event
{
    protected $quiz;
    protected $qq;
    protected $answers;

    /**
     * __construct
     *
     * @param Quiz         $quiz    Current Quiz
     * @param QuizQuestion $qq      Questions from the form
     * @param array        $answers Answers normalized
     *
     * @return void
     */
    public function __construct(Quiz $quiz, QuizQuestion $qq, array $answers)
    {
        $this->quiz = $quiz;
        $this->qq = $qq;
        $this->answers = $answers;
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

    /**
     * getAnswers
     *
     * @return array
     */
    public function getAnswers()
    {
        return $this->answers;
    }

}
