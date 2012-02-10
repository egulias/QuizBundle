<?php

namespace Egulias\QuizBundle\Model\Quizes;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Egulias\QuizBundle\Model\Quizes\Quiz;
use Egulias\QuizBundle\Model\Questions\QuestionInterface;
use Egulias\QuizBundle\Model\Answers\Answer;

/**
 * QuizQuestion (Intermediate table)
 *
 * @abstract
 * @package QuizBundle
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
abstract class QuizQuestion
{

    /**
     * @ORM\ManyToOne(targetEntity="Quiz", inversedBy="quiz_question")
     */
    protected $quiz;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="quiz_question")
     */
    protected $question;

    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="quiz_question", cascade={"remove"})
     */
    protected $answers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = intval($id);
    }

    public function getQuiz()
    {
        return $this->quiz;
    }

    public function setQuiz(Quiz $quiz)
    {
        $this->quiz = $quiz;
        return $this;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion(QuestionInterface $question)
    {
        $this->question = $question;
        return $this;
    }

    public function setAnswers(ArrayCollection $answers)
    {
        $this->answers = $answers;
        return $this;
    }

    public function getAnswers()
    {
        return $this->answers;
    }

    public function getAnswer()
    {
        return $this->answers->current();
    }

    public function setAnswer(Answer $answer)
    {
        $this->answers->add($answer);
        return $this;
    }

    public function __toString()
    {
        $label = $this->getQuestion()->getText();
        return $label;
    }
}
