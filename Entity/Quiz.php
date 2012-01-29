<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Entity;

use
    Egulias\QuizBundle\Model\Quizes\Quiz as BaseQuiz,
    Doctrine\ORM\Mapping as ORM
;
use Doctrine\Common\Util\Debug;

/**
 *
 * @ORM\Entity
 * @ORM\Table (name="quiz")
 */
class Quiz extends BaseQuiz
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
     * @ORM\OneToMany(targetEntity="QuizQuestion", mappedBy="quiz", cascade={"persist"})
     */
    protected $questions;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *  Get Quiz questions
     *
     *  @return Doctrine\Common\Collections\ArrayCollection
     */
    public function getQuestions()
    {
        return $this->questions;
    }


    public function __toString()
    {
        return (string)$this->getId();
    }

}
