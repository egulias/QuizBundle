<?php
namespace Egulias\QuizBundle\Entity;

use
    Egulias\QuizBundle\Model\Questions\Question as BaseQuestion,
    Doctrine\ORM\Mapping as ORM
;

/**
 *
 * @ORM\Entity
 * @ORM\Table (name="question")
 */
class Question extends BaseQuestion
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

}
