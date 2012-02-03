<?php

namespace Egulias\QuizBundle\Entity;

use
    Egulias\QuizBundle\Model\Answers\Answer as BaseAnswer,
    Egulias\QuizBundle\Model\Answers\AnswerResponseFactory,
    Egulias\QuizBundle\Entity\QuizQuestion,
    Doctrine\ORM\Mapping as ORM
;

/**
 *
 * @ORM\Entity(repositoryClass="Egulias\QuizBundle\Repository\AnswerRepository")
 * @ORM\Table (name="answer")
 * @ORM\HasLifecycleCallbacks
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
     *  @ORM\Column(type="object", nullable=true)
     */
    protected $response;

    /**
     *  @ORM\Column(type="datetime", nullable=false)
     */
    protected $created;

    public function __construct()
    {
        $this->created = new \DateTime('now');
    }

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

    public function getCreated()
    {
        return $this->created;
    }

    /**
     *  @ORM\PrePersist
     */
    public function setResponseObject()
    {
        $factory = new AnswerResponseFactory($this, $this->getQuizQuestion()->getQuestion());
        $this->setResponse($factory->getResponse());
    }
}

