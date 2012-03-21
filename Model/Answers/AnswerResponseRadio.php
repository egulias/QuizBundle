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

    /**
     * setValue
     *
     * @param array $value
     * @access public
     * @return Egulias\QuizBundle\Model\Answers\AnswerResponseRadio
     */
    public function setValue($value)
    {
        $this->value = key($value);
        return $this;
    }

    /**
     * getValue
     *
     * @access public
     * @return mixed
     */
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
        $this->text = current($choice);
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
