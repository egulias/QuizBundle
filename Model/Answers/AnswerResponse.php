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


    public function getRawValue()
    {
        return $this->response;
    }

}
