<?php

namespace Egulias\QuizBundle\Tests\Event;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Egulias\QuizBundle\Event\PreSaveQuizResponseEvent;
use Egulias\QuizBundle\Event\QuizEvents;
use Egulias\QuizBundle\Tests\EventListener\ListenerMock;

class PreSaveQuizResponseTest extends \PHPUnit_Framework_TestCase
{

    private $quiz;
    private $qq;

    public function setUp()
    {
        $this->quiz = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Quizes\Quiz');
        $this->qq = $this->getMockForAbstractClass('Egulias\QuizBundle\Model\Quizes\QuizQuestion');

    }

    public function testEventInstanceOfKernel()
    {
        $event = new PreSaveQuizResponseEvent($this->quiz, $this->qq, array());

        $this->assertInstanceOf('Symfony\Component\EventDispatcher\Event', $event);
    }

    public function testListenerAddedAndDispatched()
    {
        $listener = new ListenerMock();
        $event = new PreSaveQuizResponseEvent($this->quiz, $this->qq, array());
        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(QuizEvents::PRE_SAVE_RESPONSE, array($listener, 'preSaveResponse'));
        $dispatcher->dispatch(QuizEvents::PRE_SAVE_RESPONSE, $event);
        $this->assertEquals(1,$event->getQuizQuestion()->getId());
    }
}
