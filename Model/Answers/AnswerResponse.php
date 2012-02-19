<?php

namespace Egulias\QuizBundle\Model\Answers;

use Egulias\QuizBundle\Model\Questions\QuestionInterface;

/**
  * Answers response object to manage multiple kind of posible stored values
  * @author Eduardo Gulias
  * @package EguliasQuizBundle
  * @subpackage Model
 **/
abstract class AnswerResponse implements AnswerResponseInterface
{

    protected $response;
    protected $value;
    protected $text;

    /**
     * Constructor
     *
     * @param mixed $response
     * @param QuestionInterface $question
     * @access public
     */
    public function __construct($response, QuestionInterface $question)
    {
        $this->response = $response;
        $this->setText($response);
        $this->setValue($response);
    }

    /**
     * Get raw response value
     *
     * @access public
     * @return mixed
     */
    public function getRawValue()
    {
        return $this->response;
    }

    /**
     * Get response value
     *
     * @access public
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * setValue
     *
     * @param mixed $value
     * @access public
     * @return void
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    abstract public function setText($text);
    abstract public function getText();

}
