<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Egulias\QuizBundle\Tests\Model\Quizes;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase,
    Egulias\QuizBundle\Model\Quizes\Poll,
    Egulias\QuizBundle\Model\Questions\YesNoQuestion,
    Egulias\QuizBundle\Model\Questions\Question,
    Egulias\QuizBundle\Model\Answers\BooleanAnswer
;

class PollQuizTest extends WebTestCase
{
    public function testPollAddQuestion()
    {
        $p = new Poll;
        $q = new YesNoQuestion('Are you sure');
        $p->addQuestion($q);
        $this->assertEquals($q,$p->getQuestion());

    }
    public function testPollHasSingleQuestion()
    {
        $p = new Poll;
        $p->addQuestion(new YesNoQuestion('Are you Sure?'));
        $p->addQuestion(new YesNoQuestion('Second Question'));
        $this->assertTrue((1==count($p->getQuestions())));
    }

    public function testFullPoll()
    {
        $p = new Poll;
        $q = new YesNoQuestion();
        $p->addQuestion($q);
        $a = new BooleanAnswer();
        $a->setResponse(TRUE);
        $p->getQuestion()->addAnswer($a);
        $this->assertTrue($p->getQuestion()->getAnswer()->getResponse());


    }
}
