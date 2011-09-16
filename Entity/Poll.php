<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Entity;

use
    Egulias\QuizBundle\Model\Questions\YesNoQuestion,
    Egulias\QuizBundle\Model\Quizes\Poll as PollQuiz,
    Doctrine\Common\Collections\ArrayCollection
;

/**
 *
 * @ORM\Entity
 * @ORM\Table (name="Quiz")
 */
class Poll extends PollQuiz
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
     * @ORM\OneToMany(TargetEntity="Questions", mappedBy="quiz")
     *
     */
    protected $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }
}
