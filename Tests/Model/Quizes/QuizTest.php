<?php
namespace Egulias\QuizBundle\Tests\Model\Quizes;

use Egulias\QuizBundle\Model\Questions\Question;
use Egulias\QuizBundle\Model\Quizes\Quiz;
use Doctrine\Common\Collections\ArrayCollection;

class QuizTest extends  \PHPUnit_Framework_TestCase
{
    public function testCreateQuiz()
    {
        $q1 = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Questions\Question');
        $q2 = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Questions\Question');

        $questions = new ArrayCollection;
        $questions->add($q1);
        $questions->add($q2);
        $quiz = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Quizes\Quiz');
        $uuid = $quiz->getUUID();

        $quiz->setQuestions($questions);

        $this->assertInstanceOf('Egulias\QuizBundle\Model\Quizes\QuizInterface', $quiz);
        $this->assertEquals($q1, $quiz->getQuestion());
        $this->assertEquals($q2, $quiz->getQuestion(1));
        $this->assertEquals($uuid,$quiz->getUUID());

    }
}

