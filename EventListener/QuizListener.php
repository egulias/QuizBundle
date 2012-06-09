<?php

namespace Egulias\QuizBundle\EventListener;

use Symfony\Component\EventDispatcher\Event;
use Egulias\QuizBundle\Model\Answers\Answer;
use Egulias\QuizBundle\Model\Answers\AnswerResponseFactory;

class QuizListener
{
    public function onPreSaveResponse($event)
    {
        $a = $event->getAnswers();
        foreach ($a as $answer) {
            $factory = new AnswerResponseFactory($a[0], $a[0]->getQuizQuestion()->getQuestion());
            $a[0]->setResponse($factory->getResponse());
        }
    }
}
