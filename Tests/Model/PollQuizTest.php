<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Egulias\QuizBundle\Tests\Model;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase,
    Egulias\QuizBundle\Model\Quizes\Poll,
    Egulias\QuizBundle\Model\Questions\YesNoQuestion
;

class PollQuizTest extends WebTestCase
{
    public function testPollAddSingleQuestion()
    {
        $p = new Poll;
        $p->addQuestion(new YesNoQuestion('Are you Sure?'));
        $p->addQuestion(new YesNoQuestion('Second Question'));
        $this->assertCount(1,$p->getQuestions());
    }
}
