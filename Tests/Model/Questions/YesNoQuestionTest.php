<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Egulias\QuizBundle\Tests\Model\Questions;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase,
    Egulias\QuizBundle\Model\Questions\YesNoQuestion,
    Egulias\QuizBundle\Model\Questions\Question,
    Egulias\QuizBundle\Form\Type\YesNoQuestionType,
    Egulias\QuizBundle\Model\Answers\Answer,
    Egulias\QuizBundle\Model\Answers\BooleanAnswer
;

class YesNoQuestionTest extends WebTestCase
{

    public function testYesNoQuestionAddAnswer()
    {
        $q = new YesNoQuestion();
        $a = new Answer();
        $q->addAnswer($a);
        $this->assertEquals($a, $q->getAnswer());
    }

    public function testYesNoQuestionBooleanResponse()
    {
        $q = new YesNoQuestion();
        $a = new BooleanAnswer();
        $a->setResponse('some text');
        $q->addAnswer($a);
        $this->assertTrue((TRUE === $q->getAnswer()->getResponse()));
    }

    public function testYesNoQuestionSetForm()
    {
        $q = new YesNoQuestion();
        $q->setForm(new YesNoQuestionType());
        $this->assertInstanceOf('YesNoQuestionType',$q->getForm());
    }
}
