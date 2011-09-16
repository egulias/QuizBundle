<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Questions;

/**
 * Declaration of class Question to allow the creation of multiple types of questions
 *
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
class Question
{
    protected $name = '';

    public function __construct($name = '')
    {
        if($name)$this->setName($name);
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
