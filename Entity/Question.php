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

    /**
     * @ORM\OneToMany(targetEntity="QuizQuestion", mappedBy="question")
     */
    protected $quizes;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $text;

    /**
     * @ORM\Column(type="string")
     */
    protected $type = 'text';

    /**
     *  @ORM\OneToOne(targetEntity="Choices", cascade={"persist"})
     */
    protected $choices;

    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="quiz_question")
     */
    protected $answer;

    public function __construct()
    {
        parent::__construct();
        $this->quizes = new ArrayCollection;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }

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


    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getChoices()
    {
        return $this->choices;
    }

    public function setChoices(Choices $choices)
    {
        $this->choices = $choices;
        return $this;
    }
}
