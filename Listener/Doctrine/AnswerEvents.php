<?php

namespace Egulias\QuizBundle\Listener\Doctrine;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Egulias\QuizBundle\Model\Answers\Answer;
use Egulias\QuizBundle\Model\Answers\AnswerResponseFactory;

class AnswerEvents
{

    /**
     *  PrePersist Event to handle Annswer response objet conversion
     *
     *  @param Doctrine\ORM\Event\LifecycleEventArgs $args
     *  @return void
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if ($entity instanceOf Answer) {

            $factory = new AnswerResponseFactory($entity, $entity->getQuizQuestion()->getQuestion());
            $entity->setResponse($factory->getResponse());
        }
    }
}
