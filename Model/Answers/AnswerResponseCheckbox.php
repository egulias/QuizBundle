<?php

namespace Egulias\QuizBundle\Model\Answers;

/**
 * @author Eduardo Gulias Davis
 * @package EguliasQuizBundle
 * @subpackage Model
 **/
class AnswerResponseCheckbox extends AnswerResponse
{
    public function __construct($response)
    {
        $this->response = $response;
        $this->setValue($response);

    }

    public function setValue($response)
    {
        $this->value = $response[0]['value'];
    }

    public function getHumanReadable()
    {
        return $this->response[0]['label'];
    }

    public function getValue()
    {
        return $this->value;
    }
}
