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
    protected $answers;

    /**
     * __construct
     *
     * @param Quiz  $quiz    Current Quiz
     * @param array $answers Answers normalized
     *
     * @return void
     */
    public function __construct(Quiz $quiz, array $answers)
    {
        $this->quiz = $quiz;
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
     * getAnswers
     *
     * @return array
     */
    public function getAnswers()
    {
        return $this->answers;
    }

}
