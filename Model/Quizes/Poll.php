<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Quizes;

/**
 * Declaration of Poll quiz type
 * @author Eduardo Gulias Davis <me@egulias.com>
 */
class Poll extends Quiz
{
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addQuestion(Question $q)
    {
        $this->questions->detach($this->questions->current());
        return parent::addQuestion($q);
    }

    public function check()
    {
        return $this->questions->current()->check();
    }
}
