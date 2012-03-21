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
        $this->setValue($response);
        $this->setText($response);
    }

    /**
     * setValue
     *
     * @param Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface $choices
     * @access public
     * @return Egulias\QuizBundle\Model\Answers\AnswerResponseCheckbox
     * @throw \InvalidArgumentException
     */
    public function setValue($choices)
    {
        if (!is_array($choices)) {
            throw new \InvalidArgumentException('Must be an array');
        }
        foreach ($choices as $value => $text) {
            $this->value[] = $value;
        }
        return $this;
    }

    /**
     * getValue
     *
     * @access public
     * @return array
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set response text
     *
     * @param Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface $choices
     * @access public
     * @return Egulias\QuizBundle\Model\Answers\AnswerResponseCheckbox
     * @throw \InvalidArgumentException
     */
    public function setText($choices)
    {
        if (!is_array($choices)) {
           throw new \InvalidArgumentException('Must be an array');
        }
        $this->text = implode(',', $choices);

        return $this;
    }

    /**
     * getText
     *
     * @access public
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}
