<?php

namespace Egulias\QuizBundle\Entity;

use
    Egulias\QuizBundle\Model\Answers\Answer as BaseAnswer,
    Doctrine\ORM\Mapping as ORM
;

/**
 *
 * @ORM\Entity(repositoryClass="Egulias\QuizBundle\Repository\AnswerRepository")
 * @ORM\Table (name="answer")
 */
class Answer extends BaseAnswer
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


}

