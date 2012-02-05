<?php

namespace Egulias\QuizBundle\Model\Answers;

use Egulias\QuizBundle\Model\Questions\Question;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;

/**
 * @author Eduardo Gulias Davis
 * @package EguliasQuizBundle
 * @subpackage Model
 **/
class AnswerResponseCheckbox extends AnswerResponse
{

    public function __construct($response, Question $question)
    {
        $this->response = $response;
        $choices = $question->getChoices();
        $this->setValue($choices);
        $this->setText($choices);
    }
    public function setValue($choices)
    {
        if (!$choices instanceOf ChoiceListInterface ) {
           throw new InvalidArgumentException('Must be an instance of ChoiceListInterface ');
        }
        $choices = $choices->getChoices();
        foreach ($choices as $value => $text) {
            $this->value[] = $value;
        }
        return $this;
    }

    public function getValue()
    {
        return implode(",",$this->value);
    }

    public function setText($choices)
    {
        if (!$choices instanceOf ChoiceListInterface ) {
           throw new InvalidArgumentException('Must be an instance of ChoiceListInterface ');
        }
        $choices = $choices->getChoices();
        foreach ($choices as $value => $text) {
            $this->text .= $text . ' ';
        }
        return $this;
    }

    public function getText()
    {
        return $this->text;
    }
}
