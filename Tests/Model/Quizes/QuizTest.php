<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Tests\Model\Quizes;

use Egulias\QuizBundle\Entity\Question;
use Egulias\QuizBundle\Entity\Quiz;

class QuizTest extends  \PHPUnit_Framework_TestCase
{
    public function testCreateQuiz()
    {
        $questions = array(new Question(), new Question());

        $quizMock = $this->getMock('Egulias\QuizBundle\Model\Quizes\QuizInterface');
        $quizMock->expects($this->once())->method('setName');
        $quizMock->expects($this->once())->method('getName')->will($this->returnValue('Quiz'));
        $quizMock->expects($this->once())->method('setQuestions')->with($this->equalTo($questions));
        $quizMock->expects($this->once())->method('getQuestions')->will($this->returnValue($questions));

        $quizMock->setName('Quiz');
        $quizMock->setQuestions($questions);


        $this->assertEquals('Quiz',$quizMock->getName());
        $this->assertCount(2,$quizMock->getQuestions());
    }

}

