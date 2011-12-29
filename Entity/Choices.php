<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Entity;

use
    Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection
;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;

/**
 *
 * @ORM\Entity
 * @ORM\Table (name="choices")
 */
class Choices implements ChoiceListInterface
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

    /**
     * @ORM\Column(type="array")
     */
    protected $config = array('type' => 'radio');

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
        $choices = $this->choices;
        foreach($choices as $key => $ch) {
            $choices[$key] = $ch['label'];
        }
        return $choices;

    }

    public function setChoices(array $choices)
    {
        $this->choices = $choices;
        return $this;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig($config)
    {
        $this->config = array('type' => $config);
        return $this;
    }

    public function getType()
    {
        $config = $this->getConfig();
        return $config['type'];
    }

}
