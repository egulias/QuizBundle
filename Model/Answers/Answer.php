<?php

namespace Egulias\QuizBundle\Model\Answers;

use Doctrine\ORM\Mapping as ORM;
use Egulias\QuizBundle\Model\Answers\AnswerResponseInterface;
use Egulias\QuizBundle\Model\Quizes\QuizQuestion;

/**
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 *
 * @ORM\HasLifecycleCallbacks
 */
abstract class Answer
{
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

    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
