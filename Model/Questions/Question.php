<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Questions;

use Egulias\QuizBundle\Model\Questions\QuestionInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;

/**
 * Question
 *
 * @uses QuestionInterface
 * @abstract
 * @package QuizBundle
 * @subpackage Model
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
abstract class Question implements QuestionInterface
{
    const TEXT = 'text';
    const TEXTAREA = 'textarea';
    const NUMBER = 'number';
    const BOOLEAN = 'boolean';
    const CHOICE = 'choice';

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

    public function setChoices(ChoiceListInterface $choices)
    {
        $this->choices = $choices;
        return $this;
    }

    public function setQuizes(ArrayCollection $quizes)
    {
        $this->quizes = $quizes;
        return $this;
    }

    public function getQuizes()
    {
        return $this->quizes;
    }

    public static function getBaseTypes()
    {
        $t = array(
            self::TEXT      => self::TEXT,
            self::TEXTAREA  => self::TEXTAREA,
 //           self::NUMBER    => self::NUMBER,
 //           self::BOOLEAN   => self::BOOLEAN,
            self::CHOICE    => self::CHOICE,
        );
        return $t;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
