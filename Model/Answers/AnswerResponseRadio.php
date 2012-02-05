<?php


namespace Egulias\QuizBundle\Model\Answers;

use Egulias\QuizBundle\Model\Questions\Question;

/**
 * @author Eduardo Gulias Davis
 * @package EguliasQuizBundle
 * @subpackage Model
 **/
class AnswerResponseRadio extends AnswerResponse
{
    public function __construct($response, Question $question)
    {
        $this->response = $response;
        $choices = $question->getChoices()->getChoices();
        $this->setValue($response);
        $this->setText($choices[$response]);
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

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
