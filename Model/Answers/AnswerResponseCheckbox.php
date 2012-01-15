<?php

namespace Egulias\QuizBundle\Model\Answers;

/**
 * @author Eduardo Gulias Davis
 * @package EguliasQuizBundle
 * @subpackage Model
 **/
class AnswerResponseCheckbox extends AnswerResponse
{

    public function setValue($response)
    {
        $this->value = $response;
    }

    public function getValue()
    {
        return $this->value;
    }
}
