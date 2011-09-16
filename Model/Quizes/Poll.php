<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
namespace Egulias\QuizBundle\Model\Quizes;

use Egulias\QuizBundle\Model\Questions\Question;
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
        parent::addQuestion($q);
        if($this->questions->count() > 1)
        {
            $this->questions->rewind();
            $this->questions->detach($this->questions->current());
        }
        return $this;
    }

    public function check()
    {
        return $this->questions->current()->check();
    }

    /**
     *
     *
     * @see Quiz
     */
    public function getQuestion()
    {
        $this->questions->rewind();
        return $this->questions->current();
    }
}
