<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Entity;

use
    Egulias\QuizBundle\Model\Answers\Answer as BaseAnswer,
    Egulias\QuizBundle\Entity\QuizQuestion,
    Doctrine\ORM\Mapping as ORM
;

/**
 *
 * @ORM\Entity
 * @ORM\Table (name="answer")
 */
class Answer extends BaseAnswer
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $quizUuid = '';

    /**
     * @ORM\ManyToOne(targetEntity="QuizQuestion", inversedBy="answer")
     */
    protected $quiz_question;

    /**
     *  @ORM\Column(type="text", nullable=true)
     */
    protected $response = '';

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function setQuizUuid($uuid)
    {
        $this->quizUuid = strval($uuid);
        return $this;
    }

    public function getQuizUuid()
    {
        return $this->quizUuid;
    }

    public function setQuizQuestion(QuizQuestion $qq)
    {
        $this->quiz_question = $qq;
        return $this;
    }

    public function getQuizQuestion()
    {
        return $this->quiz_question;
    }

}
