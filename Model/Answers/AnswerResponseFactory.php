<?php

namespace Egulias\QuizBundle\Model\Answers;

use Egulias\QuizBundle\Model\Questions\Question;

/**
 * @author Eduardo Gulias Davis
 * @package EguliasQuizBundle
 * @subpackage Model
 **/
class AnswerResponseFactory
{

    protected $answer;
    protected $question;
    protected $response = NULL;

    public function __construct(Answer $answer, Question $question)
    {
       $this->answer = $answer;
       $this->question = $question;
    }

    public function getResponse()
    {
        if (is_null($this->response)) {
            $type = ucfirst(strtolower($this->question->getChoices()->getType()));
            $class = "Egulias\\QuizBundle\\Model\\Answers\\AnswerResponse" . $type;
            $this->response = new $class($this->answer->getResponse());
        }
        return $this->response;
    }
}
