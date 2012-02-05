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

    public function __construct($response, QuestionInterface $question)
    {
        $this->response = $response;
        $this->setValue($question->getText());
    }

    public function getRawValue()
    {
        return $this->response;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    abstract public function setText($text);
    abstract public function getText();

}
