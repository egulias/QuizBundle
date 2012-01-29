<?php
namespace Egulias\QuizBundle\Tests\Model\Questions;

use Egulias\QuizBundle\Model\Questions\Question;

class QuestionTest extends  \PHPUnit_Framework_TestCase
{
    public function testCreateQuestion()
    {
        $question = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Questions\Question');
        $this->assertInstanceOf('Egulias\QuizBundle\Model\Questions\QuestionInterface',$question);
        $this->assertArrayHasKey('text',Question::getBaseTypes());
        $this->assertArrayHasKey('textarea',Question::getBaseTypes());
        $this->assertArrayHasKey('choice',Question::getBaseTypes());

    }
}
