<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Entity;

use
    Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection
;

/**
 *
 * @ORM\Entity
 * @ORM\Table (name="choices")
 */
class Choices
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="array")
     */
    protected $choices = array();


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getChoices()
    {
        return $this->choices;
    }

    public function setChoices(array $choices)
    {
        $this->choices = $choices;
        return $this;
    }
}
