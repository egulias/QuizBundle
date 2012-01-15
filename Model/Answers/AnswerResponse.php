<?php

namespace Egulias\QuizBundle\Model\Answers;

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

    public function __construct($response)
    {
        $this->response = $response;
        $this->setValue($response);
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

}
