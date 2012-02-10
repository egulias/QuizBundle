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
        $this->setText($response);
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    /**
     * setText
     *
     * @param array $choice
     * @access public
     * @return Egulias\QuizBundle\Model\Answers\AnswerResponseRadio
     * @throw \InvalidArgumentException
     */
    public function setText($choice)
    {
        if (!is_array($choice)) {
           throw new \InvalidArgumentException('Must be an array');
        }
        $this->text = array_pop($choice);
        return $this;
    }

    public function getText()
    {
        return $this->text;
    }
}
