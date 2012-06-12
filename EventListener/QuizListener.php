<?php

namespace Egulias\QuizBundle\EventListener;

use Egulias\QuizBundle\Event\PreSaveQuizResponseEvent;
use Egulias\QuizBundle\Model\Answers\Answer;
use Egulias\QuizBundle\Model\Answers\AnswerResponseFactory;

class QuizListener
{
    public function onPreSaveResponse(PreSaveQuizResponseEvent $event)
    {
        $answers = $event->getAnswers();
        foreach ($answers as $answer) {
            $factory = new AnswerResponseFactory($answer, $answer->getQuizQuestion()->getQuestion());
            $answer->setResponse($factory->getResponse());
        }
    }
}
