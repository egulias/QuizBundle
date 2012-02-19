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
    /**
     * choices
     *
     * @var array
     * @access protected
     */
    protected $choices = array();

    public function __construct($response, Question $question)
    {
        $this->response = $response;
        $this->choices = $question->getChoices()->getChoices();
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
     */
    public function setText($choice)
    {
        $text = $this->choices[$choice];
        $this->text = $text;
        return $this;
    }

    public function getText()
    {
        return $this->text;
    }
}
