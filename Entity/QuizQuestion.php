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


 }
