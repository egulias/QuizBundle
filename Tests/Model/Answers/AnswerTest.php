<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Egulias\QuizBundle\Tests\Model\Answers;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase,
    Egulias\QuizBundle\Model\Answers\Answer
;

class AnswerTest extends WebTestCase
{
    public function testSetBooleanResponse()
    {
        $a = new Answer();
        $a->setResponse(TRUE);
        $this->assertEquals(TRUE, $a->getResponse());
    }

    public function testSetTextResponse()
    {
        $a = new Answer();
        $a->setResponse('My Response');
        $this->assertEquals('My Response', $a->getResponse());
    }
}
