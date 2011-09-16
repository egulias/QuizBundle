<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Entity;

use
    Egulias\QuizBundle\Model\Questions\Question as BaseQuestion
;

/**
 *
 * @ORM\Entity
 * @ORM\Table (name="Question")
 */
class Question extends BaseQuestion
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     *
     *  @ORM\Column(type="string")
     */
    protected $text;
    /**
     *
     * @ORM\ManyToOne(TargetEntity="Quiz", inversedBy="Question")
     * @ORM\JoinColumn(name="quiz_id", referencedColumnName="id")
     *
     */
    protected $Quiz;
}
