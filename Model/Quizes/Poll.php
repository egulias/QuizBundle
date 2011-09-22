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
        $this->questions[0] = $q;
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
        return $this->questions[0];
    }
}
