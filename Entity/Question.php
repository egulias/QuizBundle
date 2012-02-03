<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Entity;

use
    Egulias\QuizBundle\Model\Questions\Question as BaseQuestion,
    Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection,
    Egulias\QuizBundle\Entity\Choices,
    Doctrine\Common\Util\Debug
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
