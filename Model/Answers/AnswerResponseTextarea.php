<?php

namespace Egulias\QuizBundle\Model\Answers;

/**
 * @author Eduardo Gulias Davis
 * @package EguliasQuizBundle
 * @subpackage Model
 **/
class AnswerResponseTextarea extends AnswerResponse
{
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    public function getText()
    {
        return $this->text;
    }

}
