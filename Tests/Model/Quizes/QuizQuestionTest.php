<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Egulias\QuizBundle\Tests\Model\Quizes;

use Egulias\QuizBundle\Model\Answers\Answer;
use Egulias\QuizBundle\Model\Quizes\QuizQuestion;
use Egulias\QuizBundle\Model\Quizes\Quiz;
use Egulias\QuizBundle\Model\Questions\Question;

class QuizQuestionTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateQuizQuestion()
    {
        $qqMock = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Quizes\QuizQuestion');
        $quizMock = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Quizes\Quiz');
        $questionMock = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Questions\Question');
        $answerMock = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Answers\Answer');
        $qqMock->setQuiz($quizMock);
        $qqMock->setQuestion($questionMock);
        $qqMock->setAnswer($answerMock);

        $this->assertInstanceOf('Egulias\QuizBundle\Model\Quizes\Quiz', $qqMock->getQuiz());
        $this->assertInstanceOf('Egulias\QuizBundle\Model\Questions\Question', $qqMock->getQuestion());
        $this->assertInstanceOf('Egulias\QuizBundle\Model\Answers\Answer', $qqMock->getAnswer());

    }
}
