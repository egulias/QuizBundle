<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Entity;

use
    Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection
;

/**
 *
 * @ORM\Entity
 * @ORM\Table (name="quiz_question")
 */
class QuizQuestion
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Quiz", inversedBy="question")
     */
    protected $quiz;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="quiz_question")
     */
    protected $question;

    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="quiz_question")
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

    public function setQuiz($quiz)
    {
        $this->quiz = $quiz;
        return $this;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($question)
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
    public function getAnswer($uuid = '')
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
        $label = $this->getQuestion();
        return 'Quiz Question';
    }
 }
