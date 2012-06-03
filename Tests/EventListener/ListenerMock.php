<?php

namespace Egulias\QuizBundle\Tests\EventListener;

class ListenerMock
{
    public function preSaveResponse($event)
    {
       $event->getQuizQuestion()->setId(1);
    }
}
