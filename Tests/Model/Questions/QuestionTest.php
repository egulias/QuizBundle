<?php
namespace Egulias\QuizBundle\Tests\Model\Questions;

use Egulias\QuizBundle\Model\Questions\Question;
use Doctrine\Common\Collections\ArrayCollection;

class QuestionTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateQuestion()
    {
        $question = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Questions\Question');
        $question->setName('Test Question');
        $question->setType('textarea');
        $question->setQuizes(new ArrayCollection());

        $this->assertInstanceOf('Egulias\QuizBundle\Model\Questions\QuestionInterface',$question);
        $this->assertEquals('Test Question', $question->getName());
        $this->assertEquals('textarea', $question->getType());
        $this->assertInstanceOf('Doctrine\Common\Collections\ArrayCollection', $question->getQuizes());
    }

    public function testBaseTypes()
    {
        $this->assertArrayHasKey('text',Question::getBaseTypes());
        $this->assertArrayHasKey('textarea',Question::getBaseTypes());
        $this->assertArrayHasKey('choice',Question::getBaseTypes());
    }

    public function testChoiceQuestion()
    {
        $question = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Questions\Question');
        $choices = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Questions\QuestionChoices');
        $choices->setChoices(array('1'=> 'yes', 'more'=>'twoanswers', 'not' => 'selected'));
        $choices->setConfig('checkbox');
        $question->setType(Question::CHOICE);
        $question->setChoices($choices);

        $this->assertEquals($choices, $question->getchoices());
    }
}
