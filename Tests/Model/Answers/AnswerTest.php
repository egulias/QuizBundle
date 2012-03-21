<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Egulias\QuizBundle\Tests\Model\Answers;

use Egulias\QuizBundle\Model\Answers\Answer;
use Egulias\QuizBundle\Model\Quizes\QuizQuestion;
use Egulias\QuizBundle\Model\Questions\Question;
use Egulias\QuizBundle\Model\Questions\QuestionChoices;
use Egulias\QuizBundle\Model\Answers\AnswerResponseFactory;

class AnswerTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->answerMock = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Answers\Answer');
        $this->questionMock = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Questions\Question');
    }

    public function testSetTextResponse()
    {
        $question = clone $this->questionMock;
        $question->setType(Question::TEXT);
        $this->answerMock->setResponse('My Response');
        $responseFactory = new AnswerResponseFactory($this->answerMock, $question);
        $response = $responseFactory->getResponse();
        $this->assertEquals('My Response', $response->getValue());
    }

    public function testSetTextareaResponse()
    {
        $question = clone $this->questionMock;
        $question->setType(Question::TEXTAREA);
        $this->answerMock->setResponse('My Response with a lot more \r\n TEXT');
        $responseFactory = new AnswerResponseFactory($this->answerMock, $question);
        $response = $responseFactory->getResponse();
        $this->assertEquals('My Response with a lot more \r\n TEXT', $response->getValue());
    }

    public function testSetCheckboxResponse()
    {
        $choices = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Questions\QuestionChoices');
        $choices->setChoices(array('1'=> 'yes', 'more'=>'twoanswers', 'not' => 'selected'));
        $choices->setConfig('checkbox');

        $question = clone $this->questionMock;
        $question->setType(Question::CHOICE);
        $question->setChoices($choices);

        $this->answerMock->setResponse(array('1'=> 'Yes', 'more'=>'TwoAnswers'));
        $responseFactory = new AnswerResponseFactory($this->answerMock, $question);
        $response = $responseFactory->getResponse();

        $this->assertEquals('Yes,TwoAnswers', $response->getText());
        $this->assertArrayHasKey(1, $response->getRawValue());
        $this->assertArrayHasKey('more', $response->getRawValue());
    }

    public function testSetRadioResponse()
    {
        $choices = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Questions\QuestionChoices');
        $choices->setChoices(array('1'=> 'yes', 'more'=>'twoanswers', 'not' => 'selected'));

        $question = clone $this->questionMock;
        $question->setType(Question::CHOICE);
        $question->setChoices($choices);

        $answer = clone $this->answerMock;
        $answer->setResponse(array('1'=> 'Yes'));
        $responseFactory = new AnswerResponseFactory($answer, $question);
        $response = $responseFactory->getResponse();

        $this->assertEquals('Yes', $response->getText());
        $this->assertArrayHasKey(1, $response->getRawValue());
    }

    public function testIntermediateTableSetting()
    {
        $qq = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Quizes\QuizQuestion');
        $this->answerMock->setQuizQuestion($qq);
        $this->assertEquals($qq,$this->answerMock->getQuizQuestion());
    }
}
