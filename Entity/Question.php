<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Entity;

use
    Egulias\QuizBundle\Model\Questions\Question as BaseQuestion,
    Doctrine\ORM\Mapping as ORM
;
use Egulias\QuizBundle\Model\Answers\Answer as BaseAnswer;

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

    //protected $answer;

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
        $this->type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function addAnswer(BaseAnswer $answer)
    {
        $this->answer[] = $answer;
        return $this;
    }

    public function getAnswer()
    {
        return $this->answer;
    }
}
