<?php

namespace Egulias\QuizBundle\Model\Questions;

use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceListInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionChoices
 *
 * @uses ChoiceListInterface
 * @abstract
 * @package QuizBundle
 * @subpackage Model
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
abstract class QuestionChoices implements ChoiceListInterface
{

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
        $ch = array();
        foreach ($choices as $key => $choice) {
            $ch[$choice['value']] = $choice['label'];
        }
        return $ch;

    }

    public function setChoices(array $choices)
    {
        if (!is_array($choices))throw new \InvalidArgumentException;

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
