<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Egulias\QuizBundle\Tests\Model;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase,
    Egulias\QuizBundle\Model\Quizes\Poll,
    Egulias\QuizBundle\Model\Questions\YesNoQuestion,
    Egulias\QuizBundle\Model\Questions\Question
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
        $this->assertTrue((1==count($p->getQuestions()->count())));
    }
}
